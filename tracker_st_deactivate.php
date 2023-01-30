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
$trackers = "select * from imei_org9";
$trackers_result = mysqli_query($dbhandle, $trackers);
while ($trackersRow = mysqli_fetch_assoc($trackers_result))
  {
    $trackersData[]=$trackersRow;
  }
for ($a=0;$a<=1;$a++){
//for ($a=0;$a<=count($trackersData);$a++){
    $imei= $trackersData[$a]['imei'];
    $tid= $trackersData[$a]['tid'];
    $org= $trackersData[$a]['orgid'];
    $sim= $trackersData[$a]['sim'];
    $st=explode("-",$sim);
    echo $st;
}
?>