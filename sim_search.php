<?php
echo $sim=$_GET["sim"];
$cluster = Cassandra::cluster()
->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
->withPort(9042)
->withCredentials("earthone", "XuWxgzpZ2rz")
->build();
$session = $cluster->connect('earthone');
$result  = $session->execute("SELECT * FROM trackers_by_imei where sim_number='971831001024750' ALLOW FILTERING");
foreach ($result as $row) {
    echo $row['imei'] . "<br> \n";
}
?>