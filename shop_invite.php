<?php
header('Content-Type: text/html; charset=utf-8');
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,"boxdrop") ;
mysqli_set_charset($dbhandle,"utf8");
if($dbhandle->connect_errno > 0)
    {
        die('Unable to connect to database' . $dbhandle->connect_error);
    }
$sql = "SELECT * from shops";

$result = mysqli_query($dbhandle,$sql);
while ($usermail = mysqli_fetch_assoc($result))
{
  $user[]=$usermail;
}
mysqli_close($dbhandle);

for ($a=0;$a<count($user);$a++){
    $qu=array("firstName"=>"","lastName"=>"","email"=>$user[$a]['email'],"phone"=>'+'.$user[$a]['mobile'],"designation"=>"","eidNumber"=>$a,"type"=>"companyAdmin","reviewed"=>"false");
    $postdata=json_encode($qu);
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://172.16.1.219:3000/api/v1/user/invite',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>$postdata,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI2NGU2YmI1MWNlZDY4MTQ1NTBkZmY2MjkiLCJpYXQiOjE2OTI5NTI2NTAsImV4cCI6MTcyNDQ4ODY1MH0.q9L6njEvww7xzYJ_bOxmbSk1DvEfFN9a77p5ycj0yos'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    //echo $response;
    $resp=json_decode($response);
    //var_dump($resp);
    //echo $resp->result->_id;
    $id=$resp->result->_id;

//create company
    $comp=array("name"=>$user[$a]['shopname'],"companyType"=>"shop");
    $postdataComp=json_encode($comp);
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://172.16.1.219:3000/api/v1/company',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>$postdataComp,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI2NGU2YmI1MWNlZDY4MTQ1NTBkZmY2MjkiLCJpYXQiOjE2OTI5NTI2NTAsImV4cCI6MTcyNDQ4ODY1MH0.q9L6njEvww7xzYJ_bOxmbSk1DvEfFN9a77p5ycj0yos'
    ),
    ));

    $responseComp = curl_exec($curl);
    $respComp=json_decode($responseComp);
    //echo $respComp->_id;
    $compid=$respComp->_id;

    curl_close($curl);

    // patch user by userid

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://172.16.1.219:3000/api/v1/user/'.$id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PATCH',
    CURLOPT_POSTFIELDS => array('company' => $compid),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI2NDRmNDI1MWY4MGExOThkNzVkZjhhZmMiLCJpYXQiOjE2ODkxNzMwMTYsImV4cCI6MTcyMDcwOTAxNn0.bQOM-kDbgFiFkt_RF_1nyuZFPsIzpWRZS7PAM3gK1QQ'
    ),
    ));

    $responsePatch = curl_exec($curl);

    curl_close($curl);
    echo $responsePatch." - invite sent \n ";
    sleep(3);
}
?>