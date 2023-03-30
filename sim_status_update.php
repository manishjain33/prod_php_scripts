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
$iccid[]=array("8997112212753978268", "8997112212760593528", "8997112212753978263", "8997112212753978273", "8997112212753978306", "8997112212748094841", "8997112212753978292", "8997112212753978279", "8997112212750892498", "8997112212760593509", "8997112212750892495", "8997112212753978272", "8997112212753978265", "8997112212755269437", "8997112212753978290", "8997112212753978308", "8997112212753990015", "8997112212753984761", "8997112212754000801", "8997112212750892511", "8997112212748094842", "8997112212753978291", "8997112212753990018", "8997112212760593511", "8997112212753978269", "8997112212753984780", "8997112212760593477");
for ($i=0;$i<=count($iccid[0]);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='active' WHERE (iccid = '".$iccid[0][$i]."')");
    echo "Status updated <br>";
}
?>