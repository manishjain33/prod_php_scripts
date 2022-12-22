<?php
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,"user") ;
if($dbhandle->connect_errno > 0)
    {
        die('Unable to connect to database' . $dbhandle->connect_error);
    }
$sql = "SELECT * from supportCopy";

$result = mysqli_query($dbhandle,$sql);
while ($trackerid = mysqli_fetch_assoc($result))
{
  $tidData[]=$trackerid;
}
mysqli_close($dbhandle);
die();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => '172.16.1.2/api/http.php/tickets.json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "alert": true,
    "autorespond": true,
    "source": "API",
    "name": "Ahmed",
    "email": "care@securepath.ae",
    "phone": "111111111",
    "subject": "Testing API",
    "ip": "91.73.131.78",
    "message": "data:text/html,MESSAGE <b>This is the terst ticket from API</b>"
}',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: F698568B6E5F7AA32DB2F0EED3D0896F',
    'Content-Type: application/json',
    'Cookie: OSTSESSID=hmul6hied727fkigmom4ntn767'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>