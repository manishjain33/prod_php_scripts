<?php
include('connProd.php') ;
$result  = $session->execute("SELECT trackerid FROM trackers_by_trackerid");
    foreach ($result as $row) {
        $tid[]=$row;
    }
for ($a=0,$a<1;$a++;){
    $resultAVL  = $session->execute("SELECT * from avl_data WHERE year_month=202304 and trackerid =".$tid[$a]." and timestamp >=1682334000000  and timestamp <= 1682334300000");
    foreach($resultAVL as $avl){
        var_dump($row);
    }
}
?>