<?php
include('connProd.php') ;
$sim[]=array("971831100216317", "971831100334789", "971831001028503", "971831100288123", "971831001014568", "971831100278478", "971831001023322", "971831001057942", "971831100213805", "971831100230594", "971831000164104", "971831001097571");
for ($i=0;$i<=(count($sim[0])-1);$i++){
    $result  = $session->execute("SELECT * FROM trackers_by_imei where sim_number='".$sim[0][$i]."' ALLOW FILTERING");
    foreach ($result as $row) {
        echo $sim[0][$i]." - ".$row['imei']." , ";
    }
    echo "<br>";
}

?>