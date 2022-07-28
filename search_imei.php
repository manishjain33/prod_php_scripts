<?php
include('connProd.php') ;
$imei=866907057592486;
$result  = $session->execute("SELECT * FROM trackers_by_imei where imei='".$imei."'");
foreach ($result as $row) {
    $catagory=$row['foa_type'];
    $orgId=$row['orgid'];
    $simNumber=$row['sim_number'];
    $model=$row['tracker_model'];
    $tid= $row['trackerid'];
}
$org  = $session->execute("SELECT * FROM organizations where id=".$orgId);
foreach ($org as $orgrow) {
    $vendorID=$orgrow['vendorid'];
    $orgName=$orgrow['name'];
}
$vendQuery  = $session->execute("SELECT * FROM users_by_userid where userid=".$vendorID);
foreach ($vendQuery as $venrow){
    $vendor= $venrow['company'];
}
$res=array("vendor_name"=>$vendor,"orgid"=>$orgId,"orgname"=>$orgName,"category"=>$catagory,"sim number"=>$simNumber,"model"=>$model,"tracker id"=>$tid);
echo json_encode($res);
?>
