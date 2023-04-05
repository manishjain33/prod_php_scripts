<?php
include('connProd.php') ;
$sim[]=array("971831100707900", "971831100280414", "971831100255518", "971831100209647", "971831100708378");
for ($i=0;$i<=(count($sim[0])-1);$i++){
    $result  = $session->execute("SELECT * FROM trackers_by_imei where sim_number='".$sim[0][$i]."' ALLOW FILTERING");
    foreach ($result as $row) {
        echo $sim[0][$i]." - ".$row['imei']." , ";
    }
    echo "<br>";
}

?>