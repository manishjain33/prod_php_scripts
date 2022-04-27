<?php
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,"dubai") ;
if($dbhandle->connect_errno > 0)
    {
        die('Unable to connect to database' . $dbhandle->connect_error);
    }
$sql = "SELECT * from tid1";
$result = mysqli_query($dbhandle,$sql);
while ($trackerid = mysqli_fetch_assoc($result))
{
  $tidData[]=$trackerid;
}
mysqli_close($dbhandle);
//print_r($tidData[0]['tid']);
$cluster = Cassandra::cluster()
->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
->withPort(9042)
->withCredentials("earthone", "XuWxgzpZ2rz")
->build();
$session = $cluster->connect('earthone');
for($i=0;$i<count($tidData);$i++){
    echo "SELECT * FROM trackers_by_trackerid where trackerid=".$tidData[$i]['tid'];
    //echo "<br>";
    $result  = $session->execute("SELECT * FROM trackers_by_trackerid where trackerid=".$tidData[$i]['tid']);
    foreach ($result as $row) {
        echo $row['imei']." / ".$row['trackerid']." / ".$row['sim_number'];
    }
}

?>