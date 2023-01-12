<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM trackers_by_imei where is_deleted = 1 ALLOW FILTERING;");
foreach ($result as $row) {
    $trackersData[]=$row;
}
//for ($a=0;$a<=count($trackersData);$a++){
for ($a=0;$a<=1;$a++){
    $st[]=explode("-",$trackersData[$a]["imei"]);
}
print_r($st)
?>