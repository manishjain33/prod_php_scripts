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
$iccid[]=array("8997112212753978374", "8997112212750888635", "8997112212748102013", "8997112212753978382", "8997112212755271536", "8997112212753978401", "8997112212753978393", "8997112212750888632", "8997112212753978383", "8997112212748096268", "8997112212753978391", "8997112212750888628", "8997112212753978370", "8997112212753978410", "8997112212750888617", "8997112212761255060");
for ($i=0;$i<=count($iccid[0]);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='active' WHERE (iccid = '".$iccid[0][$i]."')");
    echo "Status updated <br>";
}
?>