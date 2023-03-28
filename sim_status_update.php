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
$iccid[]=array("8997112212750835607", "8997112212748098252", "8997112212750832351", "8997112212750841076", "8997112212748103620", "8997112212750832299", "8997112212750841067", "8997112212750841074", "8997112212750832290", "8997112212750841079", "8997112212748099347", "8997112212750841083", "8997112212750841100", "8997112212748099350", "8997112212754001410", "8997112212748101768", "8997112212750839019", "8997112212750829525", "8997112212750841070", "8997112212748098255", "8997112212750884815", "8997112212750832354", "8997112212748096137", "8997112212748096155");
for ($i=0;$i<=count($iccid[0]);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='active' WHERE (iccid = '".$iccid[0][$i]."')");
    echo "Status updated <br>";
}
?>