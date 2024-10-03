<?php
include('connProd.php') ;
$simnum=$_GET['sno'];
$session = $cluster->connect('earthone');
$result  = $session->execute("SELECT * FROM sim_cards WHERE (msisdn ='". $simnum."') ALLOW FILTERING;");
foreach ($result as $row) {
    $update  = $session->execute("UPDATE sim_cards SET status ='retired' WHERE (iccid = '".$row['iccid']."')");
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://restapi4.jasper.ae/rws/api/v1/devices/'.$row['iccid'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "status": "RETIRED"
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
    echo "Status updated";
}
?>