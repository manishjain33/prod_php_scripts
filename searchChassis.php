<?php
$chassis=$_GET['q'];
$cluster = Cassandra::cluster()
->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
->withPort(9042)
->withCredentials("earthone", "XuWxgzpZ2rz")
->build();
$session = $cluster->connect('earthone');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://172.16.1.28:8888/api/vehicle/search?criteria=chassis_number&q='.$chassis,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$res=json_decode($response);
// for  the testing 
// Cassandra query
$result  = $session->execute("SELECT * FROM organizations where id=".$res->orgid);
foreach ($result as $row) {
    //echo $row['name']. " / ".$row['vendorid']." / ";
    $vendorID=$row['vendorid'];
    $orgName=$row['name'];
}
$vendQuery  = $session->execute("SELECT * FROM users_by_userid where userid=".$vendorID);
foreach ($vendQuery as $venrow){
    $vendor= $venrow['company'];
}
$res=array("vendor_name"=>$vendor,"orgid"=>$res->orgid,"category"=>$res->category,"chasis_number"=>$res->chasis_number,"is_deleted"=>$res->is_deleted,"license_plate_state"=>$res->license_plate_state,"plate_number"=>$res->plate_number,"purchase_date"=>$res->purchase_date,"trackerid"=>$res->trackerid);

echo json_encode($res);
?>