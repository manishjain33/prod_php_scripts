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
          "subject": "Renewal notification to avoid fine",
          "message": "data:text/html,Dear Customer,<br>This notification is to let you know that September 30, 2024, is the deadline for renewing any expired vehicles under Securepath/SecurePath Premium. Please be advised that any vehicles that are expired and are not reported by the specified date will automatically be fined without additional warning.<br>Any incomplete or erroneous information about a vehicle record held by any organization—such as the trade license number, traffic file number, email address, contact number, or vehicle details—will prohibit the RTA from being renewed, and it is imperative that the proper information be updated immediately.<br>Please coordinate with the respective clients in order to facilitate the renewal and data correction.<br>Please follow the rules and guidelines. We value your cooperation in order to minimize any disruption.<br>Should you have any queries or require further assistance, please do not hesitate to contact us.<br>Best Regards,<br>SecurePath Customer Care<br>"
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