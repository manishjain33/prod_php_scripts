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
$trackers = "select * from tid1";
$trackers_result = mysqli_query($dbhandle, $trackers);
while ($simRow = mysqli_fetch_assoc($trackers_result))
{
  $trackersData[]=$trackersRow;
}
for ($i=0;$i<=count($trackersData);$i++){
    $result  = $session->execute("select * from trackers_by_trackerid='".$trackersData[$i]["tid"]."'");
    foreach ($result as $row) {
        print_r($row);
    }
}
?>