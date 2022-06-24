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
$orgQuery = "select * from tid1";
$orgQuery_result = mysqli_query($dbhandle, $orgQuery);
while ($orgRow = mysqli_fetch_assoc($orgQuery_result))
{
  $trackers[]=$orgRow;
}
//for($i=0;$i<=count($trackers);$i++){
for($i=0;$i<=2;$i++){
    $tracker="50d0ef00-31e2-11e8-ac55-6cc3e8965b3a";
    //$result  = $session->execute("SELECT * FROM trackers_by_trackerid WHERE (trackerid =".$trackers[$i]['tid']." );");
    $result  = $session->execute("SELECT * FROM trackers_by_trackerid WHERE (trackerid =".$tracker." );");
    foreach($result as $row)
    {
        $imei= $row['imei'];
        $tid= $row['trackerid'];
        $org= $row['orgid'];
        foreach ($row['userid'] as $followed) {
            echo "imei - ".$imei." trackerid - ". $tid . " org - " . $org." userid - ". $followed . "<br>";
            echo 'update trackers_by_userid set "is_deleted"=1 where ("orgid" ='.$org.') and ("userid" ='.$followed.') and ("trackerid"='.$tid.')';
            $update=$session->execute('update trackers_by_userid set "is_deleted"=1 where ("orgid" ='.$org.') and ("userid" ='.$followed.') and ("trackerid"='.$tid.')');
        }
    }
}
?>