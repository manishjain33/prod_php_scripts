<?php
include 'connProd.php' ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'tars_vin') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
// $vin_tars = "select * from vin";
// $vin_tars_result = mysqli_query($dbhandle, $vin_tars);
// while ($vin_tarsRow = mysqli_fetch_assoc($vin_tars_result))
//   {
//     $vin_tarsData[]=$vin_tarsRow;
//   }
$result  = $session->execute("select * from vehicles_by_vehicleid where chasis_number='JM7GL4S31P147738' allow filtering");
//$result  = $session->execute("select * from vehicles_by_vehicleid where chassis='".sdfsdfsdfsdfsd."' allow filtering");
foreach ($result as $row) {
    echo count($row);
 if (count($row)==0) {
    echo "blank";
 }else{echo "not blank";}
}
