<?php
include('connProd.php') ;
$iccid[]=array("8997112212748099213", "8997112212748104139", "8997112212750830247", "8997112212750830893", "8997112212748106580", "8997112212748102446", "8997112212748102452", "8997112212748094723", "8997112212748105449", "8997112212750833747", "8997112212750833895", "8997112212750835479", "8997112212750836159", "8997112212750836684", "8997112212750894729", "8997112212753980770", "8997112212753996502", "8997112212754001014", "8997112212754001028");
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