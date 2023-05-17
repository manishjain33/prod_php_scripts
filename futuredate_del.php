<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM last_avl_data WHERE year_month > 202305 ALLOW FILTERING;");
foreach ($result as $row) {
    $trackersData[]=$row;
}
//print_r($trackersData);
for ($i=0;$i<=count($trackersData);$i++){
    //for ($i=0;$i<=3;$i++){
    $result  = $session->execute("DELETE FROM avl_data WHERE (timestamp = '".$trackersData[$i]['timestamp']."') AND (trackerid =".$trackersData[$i]['trackerid'] .") AND (year_month =". $trackersData[$i]['year_month'].");");
    echo $trackersData[$i]['trackerid']."- Deleted <br>";
}
$resultlatitude  = $session->execute("SELECT * FROM last_avl_data WHERE latitude = 0.00 ALLOW FILTERING;");
foreach ($resultlatitude as $rowlat) {
    $trackersDatalat[]=$rowlat;
}
//print_r($trackersDatalat);
for ($aa=0;$aa<=count($trackersDatalat);$aa++){
    //for ($aa=0;$aa<=3;$aa++){
        //DELETE FROM "earthone"."last_avl_data" WHERE ("orgid" = 3f16d350-49b9-11eb-8cd8-889d1441870a) AND ("trackerid" = 0d97bc90-1f9c-11ec-b2ad-045cb67029d0) AND ("userid" = 438d29e0-35ce-11e8-9aa9-897dbb4f46f8);
    $result  = $session->execute("DELETE FROM avl_data WHERE (timestamp = '".$trackersDatalat[$aa]['timestamp']."') AND (trackerid =".$trackersDatalat[$aa]['trackerid'] .") AND (year_month =". $trackersDatalat[$aa]['year_month'].");");
    echo $trackersDatalat[$aa]['trackerid']."- Deleted <br>";
}
?>