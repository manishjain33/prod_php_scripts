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
          "subject": "NOTICE !",
          "message": "data:text/html,Dear customer,<br>Please find the HIGH PRIORITY NOTICE RELEASING ON 21/03/2024 !<br>Kindly make sure the correct trade license number, traffic file number, and plate number are added to each organization & vehicle to avoid any inconvenience during renewal at RTA. Any wrong information in the SecurePath system will lead to the rejection from RTA.<br><br>Please correct all details within 5 working days!<br><br>"
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