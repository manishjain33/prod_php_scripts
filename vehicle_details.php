<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'dubai') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
$trackers = "select * from premium_lics";
$trackers_result = mysqli_query($dbhandle, $trackers);
while ($trackersRow = mysqli_fetch_assoc($trackers_result))
  {
    $trackersData[]=$trackersRow;
  }
//print_r($trackersData);
echo strtotime($trackersData[$i]["created"]);
die();
echo "<table>";
for ($i=0;$i<=count($trackersData);$i++){
//for ($i=0;$i<=3;$i++){
    echo "<tr>";
  $result  = $session->execute("select * from vehicles_by_vehicleid where trackerid=".$trackersData[$i]["tid"]." allow filtering");
  foreach ($result as $row) {
      $chassis[]=$row['chasis_number'];
      echo "<td>".$trackersData[$i]["tid"]."</td><td>".$row['chasis_number']."</td><td>". $row['category']. "</td><td>".$trackersData[$i]["user"]."</td><td>".$trackersData[$i]["type"]."</td><td>".$trackersData[$i]["created"]."</td></tr>";
  }

}
?>