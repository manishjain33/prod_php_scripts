<?php
$simnum=$_GET['sno'];
$status=$_GET['status'];
$cluster = Cassandra::cluster()
->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
->withPort(9042)
->withCredentials("earthone", "XuWxgzpZ2rz")
->build();
$session = $cluster->connect('earthone');
$result  = $session->execute("SELECT * FROM sim_cards WHERE (msisdn ='". $simnum."') ALLOW FILTERING;");
foreach ($result as $row) {
    $update  = $session->execute("UPDATE sim_cards SET status ='".$status."' WHERE (iccid = '".$row['iccid']."');");
}
?>