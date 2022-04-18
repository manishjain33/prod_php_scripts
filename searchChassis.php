<?php
require connProd.php;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://172.16.1.28:8888/api/vehicle/search?criteria=chassis_number&q=3N1CP5BV2LL504946',
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
echo $response;
// for  the testing 
$orgid=$response["orgid"];
// Cassandra query
$result  = $session->execute("SELECT * FROM organizations where orgid=".$orgid);
foreach ($result as $row) {
    $ $row['imei'];
}
?>