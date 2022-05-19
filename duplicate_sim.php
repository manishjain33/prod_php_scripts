<?php
$cluster = Cassandra::cluster()
->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
->withPort(9042)
->withCredentials("earthone", "XuWxgzpZ2rz")
->build();
$session = $cluster->connect('earthone');
$result  = $session->execute("SELECT * FROM users_by_userid WHERE (user_type = 'vendor') ALLOW FILTERING;");
foreach ($result as $row) {
    echo $row['company'];
}
?>