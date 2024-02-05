<?php
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'boxdrop') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
$trackers = "select * from enrolled_data";
$trackers_result = mysqli_query($dbhandle, $trackers);
while ($trackersRow = mysqli_fetch_assoc($trackers_result))
  {
    $trackersData[]=$trackersRow;
  }
  $sleep=10;
//for ($a=0;$a<=1;$a++){
for ($a=0;$a<=count($trackersData);$a++){
    $msg="BoxDrop Notice: From 7th Feb 2024, BoxDrop services will be subject to charges. For top-up instructions, please visit: https://boxdrop.ae/doc/BDpay_v1.pdf .";
    $msg=urlencode($msg);
    //$url="http://mshastra.com/sendurl.aspx?user=20093058&pwd=Emsira$058&senderid=SIRAPROMO&mobileno=971552254640&msgtext=".$msg."&priority=High&CountryCode=971";
    $url="http://mshastra.com/sendurl.aspx?user=20093058&pwd=Emsira$058&senderid=SIRAPROMO&mobileno=".$trackersData[$a]->phone."&msgtext=".$msg."&priority=High&CountryCode=971";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);
    echo $curl_scraped_page."<br>";
}
?>