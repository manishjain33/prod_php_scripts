<?php
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,"boxdrop") ;
if($dbhandle->connect_errno > 0)
    {
        die('Unable to connect to database' . $dbhandle->connect_error);
    }
$sql = "SELECT * from users_test";

$result = mysqli_query($dbhandle,$sql);
while ($usermail = mysqli_fetch_assoc($result))
{
  $user[]=$usermail;
}
mysqli_close($dbhandle);
for ($a=0;$a<count($user);$a++){
    $qu=array("firstName"=>"","lastName"=>"","email"=>$user[$a]['email'],"phone"=>'+'.$user[$a]['mobile'],"designation"=>"","eidNumber"=>$user[$a]['eid'],"type"=>"companyAdmin","reviewed"=>"false");
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
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI2NDQ4YzA3ZDMwMzg2MzM4MDM2MmVlMzAiLCJpYXQiOjE2ODkxNjY0MTMsImV4cCI6MTcyMDcwMjQxM30.RwM4KG51BeblTTUFpTILh0UpB8z4NgrrS5pbKQyJNXU'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    //echo $response;
    $resp=json_decode($response);
    //var_dump($resp);
    echo $resp->result->_id;
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
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI2NDRmNDI1MWY4MGExOThkNzVkZjhhZmMiLCJpYXQiOjE2ODkxNzMwMTYsImV4cCI6MTcyMDcwOTAxNn0.bQOM-kDbgFiFkt_RF_1nyuZFPsIzpWRZS7PAM3gK1QQ'
    ),
    ));

    $responseComp = curl_exec($curl);

    curl_close($curl);
    echo $responseComp;

    // patch user by userid
    $comp=array("name"=>$user[$a]['shopname'],"companyType"=>"shop");
    $postdataComp=json_encode($comp);

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://172.16.1.219:3000/api/v1/user/{{userId}}',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PATCH',
    CURLOPT_POSTFIELDS => array('company' => $id),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI2NDRmNDI1MWY4MGExOThkNzVkZjhhZmMiLCJpYXQiOjE2ODkxNzMwMTYsImV4cCI6MTcyMDcwOTAxNn0.bQOM-kDbgFiFkt_RF_1nyuZFPsIzpWRZS7PAM3gK1QQ'
    ),
    ));

    $responsePatch = curl_exec($curl);

    curl_close($curl);
    echo $responsePatch;



}

?>