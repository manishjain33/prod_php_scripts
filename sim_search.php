<?php
$sim=$_GET["sim"];
$cluster = Cassandra::cluster()
//->withContactPoints('ec2-13-233-195-46.ap-south-1.compute.amazonaws.com')
->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
->withPort(9042)
->withCredentials("earthone", "XuWxgzpZ2rz")
//->withCredentials("earthone", "earthone")
->build();
$session = $cluster->connect('earthone');
$options = array('page_size' => 100);
$future  = $session->executeAsync("SELECT * FROM trackers_by_imei where sim_number='".$sim."'",$options);
$result = $future->get();
while(true){
    echo "entries in page: " . $result->count() . "<br><br>\n\n";
    foreach ($result as $row) {
          echo $row['imei'] . "<br> \n";
    }
    if ($result->isLastPage()){ break; }
    $result=$result->nextPage();
  }
?>