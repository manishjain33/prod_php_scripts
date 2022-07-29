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
$simQuery = "select imei,sim_no,ICCID from sim_gred";
$simQuery_result = mysqli_query($dbhandle, $simQuery);
while ($simRow = mysqli_fetch_assoc($simQuery_result))
{
  $simData[]=$simRow;
}
//for ($i=0;$i<=count($simData);$i++){
for ($i=0;$i<=3;$i++){
    $result  = $session->execute("SELECT * FROM trackers_by_imei where imei='".$simData[$i]["imei"]."'");
    foreach ($result as $row) {
        $tid= $row['trackerid'];
        $orgid= $row['orgid'];
    }
    $userName="jishi@gredenza.com";
    $aq=array("email"=>$userName,"password"=>"Ql1Z48ENk%8ER7Q9h7ChxP65BPT%");
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
    //$_SESSION[$userName]=$token;
    curl_close($curl);

    //print_r($_SESSION);
    //die();
    echo "start time - ".date('h:i:s') . "<br>";
    $curl = curl_init();
    $sleep=0;
    $password="12345";
    $postQ=array("simProvider"=> "etisalat","simSerial"=>$simData[$i]["ICCID"],"trackerid"=> $tid,"simNumber"=>$simData[$i]["sim_no"]);
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
    echo $a." -- ";
    $rep=json_decode($response);
    if($rep->error_code!="unauthorized_access"){
        $update  = $session->execute("UPDATE sim_cards SET status = 'active' WHERE (iccid = '".$simData[$i]["ICCID"]."')");
        echo "Status updated <br>";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://restapi4.jasper.ae/rws/api/v1/devices/'.$simData[$i]["ICCID"],
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
          echo $response."<br>";
    }
    print_r($tid);
    echo "<br>";
    if($sleep==10){
        sleep(2);
        $sleep=0;
    }
    $sleep++;
}
?>