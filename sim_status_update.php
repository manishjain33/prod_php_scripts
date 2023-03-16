<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
// $dbhandle = mysqli_connect($hostname, $username, $password) ;
// $selected = mysqli_select_db($dbhandle,'dubai') ;
// if($dbhandle->connect_errno > 0){
// die('Unable to connect to database' . $dbhandle->connect_error);
// }
// $iccidQuery = "select iccid from sim_details_etisalat6";
// $iccidQuery_result = mysqli_query($dbhandle, $iccidQuery);
// while ($iccidRow = mysqli_fetch_assoc($iccidQuery_result))
// {
//     $iccid[]=$iccidRow;
// }
$iccid[]=array("8997112212753990046", "8997112212748101888", "8997112212748101854", "8997112212748101836", "8997112212753987262", "8997112212760328852", "8997112212750830521", "8997112212748101830", "8997112212753976941", "8997112212760197063", "8997112212750831228", "8997112212748101852", "8997112212753999080", "8997112212761255751", "8997112212748101831", "8997112212755265538", "8997112212748101842", "8997112212754009841");
for ($i=0;$i<=count($iccid[0]);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='active' WHERE (iccid = '".$iccid[0][$i]."')");
    echo "Status updated <br>";
}
?>