<?php
include('connProd.php') ;
$sim[]=array("971831100498322", "971831100444974");
for ($i=0;$i<=(count($sim[0])-1);$i++){
    echo "SELECT * FROM trackers_by_imei where sim_number='".$sim[0][$i]."' ALLOW FILTERING";
    $result  = $session->execute("SELECT * FROM trackers_by_imei where sim_number='".$sim[0][$i]."' ALLOW FILTERING");
    foreach ($result as $row) {
        echo $row['imei']." , ";
    }
    echo "<br>";
}

?>