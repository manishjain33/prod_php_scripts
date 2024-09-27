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
//$sql = "SELECT * from support where category = 'Premium'";
$sql = "SELECT * from support";
$result = mysqli_query($dbhandle,$sql);
while ($trackerid = mysqli_fetch_assoc($result))
{
  $tidData[]=$trackerid;
}
mysqli_close($dbhandle);
//print_r($tidData);

for ($a=0;$a<=count($tidData);$a++){
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
          "name": "'.$tidData[$a]["vendor"].'",
          "email": "'.$tidData[$a]["email"].'",
          "phone": "111111111",
          "subject": "Trace5 & Trace5-LTM configuration update",
          "message": "data:text/html,Dear Customer,<br>This is inform you that you may experience slowness/delay in the Securepath application for 2-4 hours due to an urgent system maintenance.<br>We appretiate your understanding in this matter.<br>"
        }',
        CURLOPT_HTTPHEADER => array(
          'x-api-key: 2B87F5FC3EBAC93E478ECCDAC5268E3C',
          'Content-Type: application/json',
          'Cookie: OSTSESSID=hmul6hied727fkigmom4ntn767'
        ),
      ));
      
      $response = curl_exec($curl);
      $err=curl_error($curl);
      curl_close($curl);
      echo $response." - ".$tidData[$a]["vendor"]."<br>";
      echo $err."<br>";
}
?>