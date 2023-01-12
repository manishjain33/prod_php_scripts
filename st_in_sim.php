<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM trackers_by_imei where is_deleted = 1 ALLOW FILTERING;");
foreach ($result as $row) {
    $imei= $row['imei'];
    $tid= $row['trackerid'];
    $org= $row['orgid'];
    $st=explode("-",$imei);
    print_r($st[1]);
    echo"<br>";
    $simnumber=$row["sim_number"]."-".$st[1];
    echo "imei - ".$imei." trackerid - ". $tid . " org - " . $org." userid - ". $followed . " simnumber - ".$simnumber."<br>/n";
    // $result_imei= $session->execute("update trackers_by_imei set sim_number='".$simnumber."' where (imei='".$row["imei"]."')");
    // $result_tid= $session->execute("update trackers_by_trackerid set sim_number='".$simnumber."' where (trackerid =".$row["trackerid"]." );");
    // foreach ($row['userid'] as $followed) {
    //     echo "imei - ".$imei." trackerid - ". $tid . " org - " . $org." userid - ". $followed . " simnumber - ".$simnumber."<br>/n";
    //     echo 'update trackers_by_userid set sim_number ="'.$simnumber.'" where ("orgid" ='.$org.') and ("userid" ='.$followed.') and ("trackerid"='.$tid.')';
    //     $result_tid= $session->execute('update trackers_by_userid set sim_number ="'.$simnumber.'" where ("orgid" ='.$org.') and ("userid" ='.$followed.') and ("trackerid"='.$tid.')');
    // }

}
//print_r($st)

?>