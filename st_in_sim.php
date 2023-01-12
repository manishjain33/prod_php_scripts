<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM trackers_by_imei where is_deleted = 1 ALLOW FILTERING;");
foreach ($result as $row) {
    $st=explode("-",$row["imei"]);
    $simnumber=$row["sim_number"]."-".$st[1];
    //echo $simnumber."<br>/n";
    $result_imei= $session->execute("update trackers_by_imei set sim_number='".$simnumber."' where (imei='".$row["imei"]."')");
    $result_tid= $session->execute("update trackers_by_trackerid set sim_number='".$simnumber."' where (trackerid =".$row["trackerid"]." );");
    foreach ($row['userid'] as $followed) {
        $result_tid= $session->execute("update trackers_by_userid set sim_number='".$simnumber."' where ('orgid' =".$row["orgid"].") and ('userid' =".$followed.") and ('trackerid'=".$row["trackerid"].")");
    }
    print_r($row["imei"]);
    die();
}
//print_r($st)

?>