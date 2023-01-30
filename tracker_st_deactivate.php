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
$trackers = "select * from imei_org9";
$trackers_result = mysqli_query($dbhandle, $trackers);
while ($trackersRow = mysqli_fetch_assoc($trackers_result))
  {
    $trackersData[]=$trackersRow;
  }
//for ($a=0;$a<=1;$a++){
for ($a=0;$a<=count($trackersData);$a++){
    $imei= $trackersData[$a]['imei'];
    $treackerid= $trackersData[$a]['tid'];
    $organization= $trackersData[$a]['orgid'];
    $sim= $trackersData[$a]['sim'];
    $st=explode("-",$sim);
    //print_r($st);
    $newImei=$imei."-".$st[1];
    $postArray=array("oldImei"=>"$imei","newImei"=>"$newImei");
    $postQuery=json_encode($postArray);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://172.16.1.28:8888/api/vendor/trackers/replace',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS =>$postQuery,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Cookie: SERVERID=europa'
    ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    echo "IMEI replace - " .$response;
    echo "IMEI error - ".$err;
    echo "<br>";
    $result  = $session->execute("SELECT * FROM trackers_by_imei where imei='".$newImei."'");
    foreach ($result as $row) {
        $imei= $row['imei'];
        $tid= $row['trackerid'];
        $org= $row['orgid'];
        //print_r($st[1]);
        $result_imei= $session->execute("update trackers_by_imei set is_deleted=1 where (imei='".$row["imei"]."')");
        $result_tid= $session->execute("update trackers_by_trackerid set is_deleted=1 where (trackerid =".$row["trackerid"]." );");
        foreach ($row['userid'] as $followed) {
            echo "imei - ".$imei." trackerid - ". $tid . " org - " . $org." userid - ". $followed . " simnumber - ".$simnumber."<br>";
            $result_tid= $session->execute("update trackers_by_userid set is_deleted=1 where (orgid =".$org.") and (userid =".$followed.") and (trackerid=".$tid.")");
        }
    }
    $vehicel=$session->execute("select * from vehicles_by_vehicleid where trackerid=".$treackerid." ALLOW FILTERING");    
    foreach($vehicel as $vrow){
        $chassisST=$vrow['chasis_number']."-".$st[1];
        $plateST=$vrow['plate_number']."-".$st[1];
        $foaid=$vrow['foa_id'];
        $vorg= $vrow['orgid'];
        echo "update vehicles_by_vehicleid set is_deleted=1, chassis='".$chassisST."', plate_number='".$plateST."' where (catagory='rental_car') and (foa_id=".$foaid.") and (orgid=".$vorg.")";
        $vehicleUpdate=$session->execute("update vehicles_by_vehicleid set is_deleted=1, chasis_number='".$chassisST."', plate_number='".$plateST."' where (category='rental_car') and (foa_id=".$foaid.") and (orgid=".$vorg.")");
        echo "<br> vehicle updated <br><br>";
    }
}
?>