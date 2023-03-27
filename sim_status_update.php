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
$iccid[]=array("8997112212750838633", "8997112212760196195", "8997112212750838590", "8997112212748106659", "8997112212750886407", "8997112212750882267", "8997112212750895315", "8997112212753988383", "8997112212750889871", "8997112212761273544", "8997112212748106664", "8997112212750886394", "8997112212753996606", "8997112212748095639", "8997112212753975687", "8997112212748106687", "8997112212748103292", "8997112212748095655", "8997112212748097914", "8997112212750840306", "8997112212760196198", "8997112212750889868", "8997112212748103268", "8997112212748097921", "8997112212748095628", "8997112212753975680", "8997112212750890975", "8997112212753986295", "8997112212750831043", "8997112212753988353", "8997112212750835929");
for ($i=0;$i<=count($iccid[0]);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='active' WHERE (iccid = '".$iccid[0][$i]."')");
    echo "Status updated <br>";
}
?>