<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'dubai') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
$trackers = "select * from imei_org13";
$trackers_result = mysqli_query($dbhandle, $trackers);
while ($trackersRow = mysqli_fetch_assoc($trackers_result))
  {
    $trackersData[]=$trackersRow;
  }
  $sleep=0;
//for ($b=0;$b<=3;$b++){
for ($b=0;$b<=count($trackersData);$b++){
    $result  = $session->execute("SELECT * FROM trackers_by_imei where imei ='".$trackersData[$b]['imei']."' ");
    foreach ($result as $row){
        $imei=$trackersData[$b]['imei'];
        $orgid=$trackersData[$b]['orgid'];
        $tid=$trackersData[$b]['tid'];
        $result_imei= $session->execute("update trackers_by_imei set sim_serial='".NULL."' where (imei='".$imei."')");
        $result_tid= $session->execute("update trackers_by_trackerid set sim_serial='".NULL."' where (trackerid =".$tid." );");
        foreach ($row['userid'] as $followed) {
            echo "imei - ".$imei." trackerid - ". $tid . " org - " . $orgid." userid - ". $followed . " iccid - ".NULL."<br><br>";
            $result_uid= $session->execute("update trackers_by_userid set sim_serial ='".NULL."' where (orgid =".$orgid.") and (userid =".$followed.") and (trackerid=".$tid.")");
        }
        if($sleep==1){
          sleep(3);
          $sleep=0;
      }
      $sleep++;
    }
}
?>