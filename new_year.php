<?php
include('connProd.php') ;
header("refresh: 60");
//echo date('H:i:s Y-m-d');
//echo "<br>";
$result  = $session->execute("SELECT * FROM new_year_geofence");
foreach ($result as $row) {
    $trackersData[]=$row;
}
print_r($trackersData);
die();
echo "<table>";
echo "<tr><td>Trackerid</td><td>Chassis Number</td><td>Category</td></tr>";
for ($i=0;$i<=count($trackersData);$i++){
//for ($i=0;$i<=3;$i++){
    echo "<tr>";
  $result  = $session->execute("select * from vehicles_by_vehicleid where trackerid=".$trackersData[$i]["tid"]." allow filtering");
  foreach ($result as $row) {
      echo "<td>".$trackersData[$i]["tid"]."</td><td>".$row['chasis_number']."</td><td>". $row['category']. "</td><td>".$trackersData[$i]["user"]."</td></tr>";
  }

}
echo "</table>";

?>