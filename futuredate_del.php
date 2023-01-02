<?php
include('connProd.php') ;
$result  = $session->execute("SELECT * FROM last_avl_data WHERE year_month > 202301 ALLOW FILTERING;");
foreach ($result as $row) {
    $trackersData[]=$row;
}
print_r($trackersData);
?>