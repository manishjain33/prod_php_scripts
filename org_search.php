<?php
include('connProd.php') ;
$org=$_GET["org"];
$result  = $session->execute("SELECT * FROM organizations where name='".$org."' ALLOW FILTERING");
foreach ($result as $row) {
    echo $row['id']." , ";
}
?>