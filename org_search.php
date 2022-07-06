<?php
include('connProd.php') ;
//$org=$_GET["org"];
$org="ABAWI EXOTIC CAR RENTAL";
$result  = $session->execute("SELECT * FROM organizations where name='".$org."' ALLOW FILTERING");
foreach ($result as $row) {
    $orgid= $row['id'];
    $vendorid=$row['vendorid'];
    $vendorQ  = $session->execute("SELECT * FROM users_by_userid where userid=".$vendorid);
    foreach ($vendorQ as $rowQ) {
        $vendorname=$rowQ['company'];
    }
    $finaldata[]=array("orgid"=>$orgid,"vendor"=>$vendorid,"vendor_name"=>$vendorname);
}
print_r ($finaldata);
?>