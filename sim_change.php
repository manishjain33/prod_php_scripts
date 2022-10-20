<?php
include('connProd.php') ;
$imei=$_GET["imei"];
$simno=$_GET["simno"];
$iccid=$_GET["iccid"];
$vendor=$_GET["vendor"];

$result  = $session->execute("SELECT * FROM trackers_by_imei where imei='".$imei."'");
foreach ($result as $row) {
    $tid= $row['trackerid'];
    $orgid= $row['orgid'];
}
$aq=array("email"=>$vendor,"password"=>"Ql1Z48ENk%8ER7Q9h7ChxP65BPT%");
$query=json_encode($aq);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://172.16.1.28:8888/api/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $query,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    ),
));
$token = curl_exec($curl);
$err = curl_error($curl);

$token = json_decode($token);
$token=$token->token;
//print_r($token);
curl_close($curl);
$cxurl = curl_init();
$password="12345";
$postQ=array("simProvider"=> "etisalat","simSerial"=>$iccid,"trackerid"=> $tid,"simNumber"=>$simno);
$postFields=json_encode($postQ);
curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://172.16.1.28:8888/api/organization/'.$orgid.'/trackers/'.$tid,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_POSTFIELDS =>$postFields,
    CURLOPT_HTTPHEADER => array(
    'Authorization: Basic '. base64_encode("$token:$password"),
    'Content-Type: application/json',
    ),
));

$response = curl_exec($curl);
$err= curl_error($curl);
curl_close($curl);
echo $response;
$rep=json_decode($response);
if($rep->error_code!="unauthorized_access"){
    $update  = $session->execute("UPDATE sim_cards SET status = 'active' WHERE (iccid = '".$iccid."')");
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://restapi4.jasper.ae/rws/api/v1/devices/'.$iccid,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "status": "ACTIVATED"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic RU1jb2RlOjQ2YjFmYzQzLTFkNGMtNDg4NS1hZmI1LTRlNzYzZDFkOWUzNA==',
            'Content-Type: application/json',
            'Cookie: JSESSIONID=E2F56995FF38010A0DF3FCF34D5FB210; BIGipServer~Control_Center~POOL_POD4_RWS=!o/UypoTKTj6QWfZMDTqO4P+EVERACo/imLSyfq4eWtH+kiyNO7sSVZPrUsgMy+aszRRNhtpYHURjtFmC5B4gb2tk4b/LhpbaBHg0w013Jw+lwg=='
        ),
        ));
    
        $response = curl_exec($curl);
        echo $response;
        curl_close($curl);
}else {
    echo $rep->error_code;
}
?>