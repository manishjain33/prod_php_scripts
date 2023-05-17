<?php
include('connProd.php') ;
$tid=$_GET['tid'];
//$tid="6a1acf10-f47b-11ed-a566-7e9fe3e5ea51";
$result  = $session->execute("SELECT * FROM trackers_by_trackerid where trackerid=".$tid);
foreach ($result as $row) {
    $imei=$row['imei'];
    $simNumber=$row['sim_number'];
    $model=$row['tracker_model'];
    $iccid=$row['sim_serial'];
}
$sim  = $session->execute("SELECT count(*) FROM sim_cards where iccid='".$iccid."'");
foreach ($sim as $simrow) {
    $count=$simrow['count'];
}
if ($count==0){
    $resp="no_record_found";
}else{$resp="record_found";}

$res=array("imei"=>$imei,"iccid"=>$iccid,"sim_number"=>$simNumber,"model"=>$model,"status"=>$resp);
echo json_encode($res);
?>