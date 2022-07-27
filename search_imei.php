<?php
include('connProd.php') ;
$imei=$_GET['imei'];
$result  = $session->execute("SELECT * FROM trackers_by_imei where imei=".$imei);
foreach ($result as $row) {
    $catagory=$row['foa_type'];
    $orgId=$row['orgid'];
    $simNumber=$row['sim_number'];
    $model=$row['tracker_model'];
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
$res=array("vendor_name"=>$vendor,"orgid"=>$orgId,"orgname"=>$orgName,"category"=>$catagory,"sim number"=>$simNumber,"model"=>$model);
echo json_encode($res);
?>
