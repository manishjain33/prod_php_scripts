<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM trackers_by_imei where is_deleted = 1 ALLOW FILTERING;");
foreach ($result as $row) {
    $st=explode("-",$row["imei"]);
    $simnumber=$row["sim_number"]."-".$st[1];
    echo $simnumber."<br>/n";
    //$result_imei= $session->execute("update trackers_by_imei set sim_number=");

}
//print_r($st)

?>