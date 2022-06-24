<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'dubai') ;
if($dbhandle->connect_errno > 0){
die('Unable to connect to database' . $dbhandle->connect_error);
}
$iccidQuery = "select iccid from sim_details_etisalat6";
$iccidQuery_result = mysqli_query($dbhandle, $iccidQuery);
while ($iccidRow = mysqli_fetch_assoc($iccidQuery_result))
{
    $iccid[]=$iccidRow;
}
for ($i=;$i<=count($iccid);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='inactive' WHERE (iccid = '".$iccid[$i]['iccid']."')");
    echo "Status updated <br>";
}
?>