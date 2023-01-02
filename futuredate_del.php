<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM last_avl_data WHERE year_month > 202301 ALLOW FILTERING;");
foreach ($result as $row) {
    $trackersData[]=$row;
}
//print_r($trackersData);
echo "DELETE FROM avl_data WHERE (timestamp = '".$trackersData[0]['timestamp']."') AND (trackerid =".$trackersData[0]['trackerid'] .") AND (year_month =". $trackersData[0]['year_month'].");";
die();
for ($i=0;$i<=count($trackersData);$i++){
    //for ($i=0;$i<=3;$i++){
    $result  = $session->execute("DELETE FROM avl_data WHERE (timestamp = '".$trackersData[$i]['timestamp']."') AND (trackerid =".$trackersData[$i]['trackerid'] .") AND (year_month =". $trackersData[$i]['year_month'].");");
}
?>