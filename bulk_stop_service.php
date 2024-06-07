<?php
include('connProd.php') ;
$rawdata = file_get_contents("php://input");
$data=json_decode($rawdata);
#print_r($data->chassis[0]) ;
for($a=0;$a<=count($data->chassis);$a++){
     echo "chassis - ".$data->chassis[$a]."<br>";
    // print_r($sim_array[$a]);
    echo "select trackerid from vehicles_by_vehicleid where chassis=".$data->chassis[$a]." allow filtring";
    //echo $tid  = $session->execute("select trackerid from vehicles_by_vehicleid where chassis=".$data->chassis[$a]." allow filtring");
    //echo $tid;
}