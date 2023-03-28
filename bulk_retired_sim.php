<?php
include('connProd.php') ;
$iccid[]=array("8997112212750838633", "8997112212760196195", "8997112212750838590", "8997112212748106659", "8997112212750886407", "8997112212750882267", "8997112212750895315", "8997112212753988383", "8997112212750889871", "8997112212761273544", "8997112212748106664", "8997112212750886394", "8997112212753996606", "8997112212748095639", "8997112212753975687", "8997112212748106687", "8997112212748103292", "8997112212748095655", "8997112212748097914", "8997112212750840306", "8997112212760196198", "8997112212750889868", "8997112212748103268", "8997112212748097921", "8997112212748095628", "8997112212753975680", "8997112212750890975", "8997112212753986295", "8997112212750831043", "8997112212753988353", "8997112212750835929");
for ($i=0;$i<=count($iccid[0]);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='retired' WHERE (iccid = '".$iccid[0][$i]."')");
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://restapi4.jasper.ae/rws/api/v1/devices/'.$iccid[0][$i],
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
    echo "Status updated <br>";
}
?>