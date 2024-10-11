<?php
$username = "dps";
$password = "dps123";
$hostname = "localhost";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'vendor') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
if($_GET["em"]=="du"){
    $vendors = "select * from vendor_list where emirates= 'Dubai'";
}else if($_GET["eu"]=="sh"){
    $vendors = "select * from vendor_list where emirates= 'Sharjah'";
}else if($_GET["eu"]=="fu"){
    $vendors = "select * from vendor_list where emirates= 'Fajairah'";
}else if($_GET["eu"]=="all"){
    $vendors = "select * from vendor_list";
}
$vendors_result = mysqli_query($dbhandle, $vendors);
while ($vendorsRow = mysqli_fetch_assoc($vendors_result))
  {
    $vendorsData[]=$vendorsRow;
  }
  print_r($vendorsData);
