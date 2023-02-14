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
$trackers = "select * from imei_st2 WHERE sno >4534";
$trackers_result = mysqli_query($dbhandle, $trackers);
while ($trackersRow = mysqli_fetch_assoc($trackers_result))
  {
    $trackersData[]=$trackersRow;
  }
//for ($b=0;$b<=1;$b++){
for ($b=0;$b<=count($trackersData);$b++){
    $result  = $session->execute("SELECT * FROM trackers_by_imei where imei ='".$trackersData[$b]['imei']."' ");
    foreach ($result as $row) {
        $imei= $row['imei'];
        $tid= $row['trackerid'];
        $org= $row['orgid'];
        $st=explode("-",$imei);
        //print_r($st[1]);
        $simserial=$row["sim_serial"]."-".$st[1];
        $simnumber=$row["sim_number"]."-".$st[1];
        $result_imei= $session->execute("update trackers_by_imei set sim_serial='".$simserial."', sim_number='".$simnumber."' where (imei='".$row["imei"]."')");
        $result_tid= $session->execute("update trackers_by_trackerid set sim_serial='".$simserial."', sim_number='".$simnumber."' where (trackerid =".$row["trackerid"]." );");
        foreach ($row['userid'] as $followed) {
            echo "imei - ".$imei." trackerid - ". $tid . " org - " . $org." userid - ". $followed . " simserial - ".$simserial."<br><br>";
            $result_tid= $session->execute("update trackers_by_userid set sim_serial ='".$simserial."', sim_number='".$simnumber."' where (orgid =".$org.") and (userid =".$followed.") and (trackerid=".$tid.")");
        }
    }
}
//print_r($st)
//UPDATE "earthone"."trackers_by_userid" SET "sim_number" = '971564076295-ST1671015399455' WHERE ("orgid" = e99f7860-35e7-11e8-8562-3fa9eb090547) AND ("trackerid" = fb0de730-35e7-11e8-b7c2-d5d197cd5ddc) AND ("userid" = ea0b0b70-35e7-11e8-8db2-0c33bef12861);

?>