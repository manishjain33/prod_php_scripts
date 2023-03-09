<?php
include('connProd.php') ;
$org=$_GET["org"];
//$org="ABAWI EXOTIC CAR RENTAL";
$result  = $session->execute("SELECT * FROM organizations where name='".$org."' ALLOW FILTERING");
foreach ($result as $row) {
    $orgid= $row['id'];
    $vendorid=$row['vendorid'];
    $email=$row['owner_email'];
    $name=$row['owner_name'];
    $vendorQ  = $session->execute("SELECT * FROM users_by_userid where userid=".$vendorid);
    foreach ($vendorQ as $rowQ) {
        $vendorname=$rowQ['company'];
    }
    $finaldata[]=array("orgid"=>$orgid,"Owner name"=>$name, "Owner email"=>$email, "vendor"=>$vendorid,"vendor_name"=>$vendorname);
}
echo json_encode ($finaldata);
?>