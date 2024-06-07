<?php
include('connProd.php') ;
$rawdata = file_get_contents("php://input");
$data=json_decode($rawdata);
#print_r($data->chassis[0]) ;
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => '172.16.1.7:12003/api/token',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
    "email": "$data->email",
    "password": "Ql1Z48ENk%8ER7Q9h7ChxP65BPT%"
}',
CURLOPT_HTTPHEADER => array(
    'Cache-Control: no-cache',
    'Content-Type: application/json'
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

for($a=0;$a<=count($data->chassis);$a++){
     //echo "chassis - ".$data->chassis[$a]."<br>";
    // print_r($sim_array[$a]);
    $result  = $session->execute("select trackerid from vehicles_by_vehicleid where chasis_number='".$data->chassis[$a]."' allow filtering");
    foreach ($result as $row) {
        echo $row['trackerid'].",";

    }
}