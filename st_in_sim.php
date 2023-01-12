<?php
//include('connProd.php') ;
$result  = $session->execute("SELECT * FROM trackers_by_imei where is_deleted = 1 ALLOW FILTERING;");
foreach ($result as $row) {
    $imei= $row['imei'];
    $tid= $row['trackerid'];
    $org= $row['orgid'];
    $st=explode("-",$imei);
    //print_r($st[1]);
    $simnumber=$row["sim_number"]."-".$st[1];
    $result_imei= $session->execute("update trackers_by_imei set sim_number='".$simnumber."' where (imei='".$row["imei"]."')");
    $result_tid= $session->execute("update trackers_by_trackerid set sim_number='".$simnumber."' where (trackerid =".$row["trackerid"]." );");
    foreach ($row['userid'] as $followed) {
        echo "imei - ".$imei." trackerid - ". $tid . " org - " . $org." userid - ". $followed . " simnumber - ".$simnumber."<br><br>";
        $result_tid= $session->execute("update trackers_by_userid set sim_number ='".$simnumber."' where (orgid =".$org.") and (userid =".$followed.") and (trackerid=".$tid.")");
    }
}
//print_r($st)
//UPDATE "earthone"."trackers_by_userid" SET "sim_number" = '971564076295-ST1671015399455' WHERE ("orgid" = e99f7860-35e7-11e8-8562-3fa9eb090547) AND ("trackerid" = fb0de730-35e7-11e8-b7c2-d5d197cd5ddc) AND ("userid" = ea0b0b70-35e7-11e8-8db2-0c33bef12861);

?>