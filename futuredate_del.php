<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM last_avl_data WHERE year_month > 202304 ALLOW FILTERING;");
foreach ($result as $row) {
    $trackersData[]=$row;
}
//print_r($trackersData);
for ($i=0;$i<=count($trackersData);$i++){
    //for ($i=0;$i<=3;$i++){
    $result  = $session->execute("DELETE FROM avl_data WHERE (timestamp = '".$trackersData[$i]['timestamp']."') AND (trackerid =".$trackersData[$i]['trackerid'] .") AND (year_month =". $trackersData[$i]['year_month'].");");
    echo $trackersData[$i]['trackerid']."- Deleted <br>";
}
?>