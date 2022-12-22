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
//print_r($tidData);

$curl = curl_init();
for ($a=0;$a<=count($tidData);$a++){
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
          "name": "$tidData[$a]["vendor"]",
          "email": "$tidData[$a]["email"]",
          "phone": "111111111",
          "subject": "Testing API",
          "ip": "91.73.131.78",
          "message": "data:text/html,Dear Customer,<br>

          As per our verification, the tracker is not sending proper data to the SecurePath server please download the correct configuration from the support & reconfigure the unit. We have noticed that you are still pointing the data of vehicles under different IP and also not using the approved configuration share from our end. This will be subject to penalty/ suspension/ termination from Securepath without any further notice.
          <br>
          Reconfigure all units available at your end & get back to us. "
      }',
        CURLOPT_HTTPHEADER => array(
          'x-api-key: F698568B6E5F7AA32DB2F0EED3D0896F',
          'Content-Type: application/json',
          'Cookie: OSTSESSID=hmul6hied727fkigmom4ntn767'
        ),
      ));
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      echo $response."<br>";
}
?>