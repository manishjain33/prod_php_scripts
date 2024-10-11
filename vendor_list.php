<?php
$username = "dps";
$password = "dps123";
$hostname = "localhost";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'vendor') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
//$_GET["em"]="all";
switch ($_GET["em"]) {
  case "du":
    $vendors = "select * from vendor_list where emirates= 'Dubai'";
    break;
  case "sh":
    $vendors = "select * from vendor_list where emirates= 'Sharjah'";
    break;
  case "fu":
    $vendors = "select * from vendor_list where emirates= 'Fajairah'";
    break;
  case "all":
    $vendors = "select * from vendor_list";
    break;
}
$vendors_result = mysqli_query($dbhandle, $vendors);
while ($vendorsRow = mysqli_fetch_assoc($vendors_result))
  {
    $vendorsData[]=$vendorsRow;
  }
  //print_r($vendorsData);
  $json =json_decode(json_encode($vendorsData, JSON_FORCE_OBJECT));
  var_dump($json);