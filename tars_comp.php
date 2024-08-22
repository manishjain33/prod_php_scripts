<?php
include ('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'tars_vin') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
$vin_tars = "select * from vin";
$vin_tars_result = mysqli_query($dbhandle, $vin_tars);
while ($vin_tarsRow = mysqli_fetch_assoc($vin_tars_result))
  {
    $vin_tarsData[]=$vin_tarsRow;
  }
for($a=0;$a<2;$a++){
//for($a=0;$a<count($vin_tarsData);$a++){
    $result  = $session->execute("select * from vehicles_by_vehicleid where chasis_number='".$vin_tarsData[$a]["vin"]."' allow filtering");
    foreach ($result as $row) {
        if($row['category']==null){
            echo $vin_tars_update = "UPDATE vin SET remark =  'not_exist' WHERE sno =".$vin_tarsData[$a]["sno"];
            $vin_tars_result_update = mysqli_query($dbhandle, $vin_tars_update);
        }
        if($row['category']!=null){
            echo $vin_tars_update = "UPDATE vin SET remark =  'exist' WHERE sno =".$vin_tarsData[$a]["sno"];
            $vin_tars_result_update = mysqli_query($dbhandle, $vin_tars_update);
        } 
    }
    print_r($vin_tarsData[$a]["vin"]);
    echo "<br> \n";
    print_r($row['category']);
}
