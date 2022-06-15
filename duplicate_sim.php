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
$orgQuery = "select * from tid1";
$orgQuery_result = mysqli_query($dbhandle, $orgQuery);
while ($orgRow = mysqli_fetch_assoc($orgQuery_result))
{
  $trackers[]=$orgRow;
}
// print_r($trackers);
//  echo "<br>";
//  die();
// $result  = $session->execute("SELECT * FROM users_by_userid WHERE (user_type = 'vendor') ALLOW FILTERING;");
// foreach ($result as $row) {
//     echo $row['company'];
// }

$curl = curl_init();
for($a=0;$a<=2;$a++){
//for($a=0;$a<=count($trackers);$a++){
    $qu=array("trackerid"=>$trackers[$a]["tid"],"suffix"=>"ST1605336988952");
    $postdata=json_encode($qu);
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://172.16.1.28:8888/api/licmgr/vehicle/stop',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>$postdata,
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Cookie: SERVERID=kore'
        ),
      ));
      
      $response = curl_exec($curl);
      print_r($trackers[$a]["tid"]);
      echo " - ".curl_getinfo($ch, CURLINFO_HTTP_CODE)."<br>";
}
curl_close($curl);
?>