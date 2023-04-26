<?php
// $username = "dps";
// $password = "dps123";
// $hostname = "172.16.1.4"; 

// //connection to the database
// $dbhandle = mysqli_connect($hostname, $username, $password) ;
// $selected = mysqli_select_db($dbhandle,"dubai") ;
// if($dbhandle->connect_errno > 0)
//     {
//         die('Unable to connect to database' . $dbhandle->connect_error);
//     }
// $sql = "select * from citv";
// $result = mysqli_query($dbhandle,$sql);
// while ($trackerid = mysqli_fetch_assoc($result))
// {
//   $tidData[]=$trackerid;
// }
// //echo count($tidData);
//$postraw=array("coords"=>[array("trackerid"=>"23bfbe40-f6f1-11e8-8593-db6ca2a126d5","lat"=>"24.50086021423340","lng"=>"54.39120864868164")]);
//echo json_encode($postraw);

$servername= "172.16.1.4";
$username="dps";
$password="dps123";
$dbname="dubai";
$conn = new mysqli($servername, $username, $password,$dbname);

$sql1 = "select tid,latitude,longitude from citv";
$result1 = $conn->query($sql1);

$i=0;
$j=0;
$j1=0;
$A1=array();
$A2=array();
$A3=array();
$A4=array();
$A5=array();

$count1=0;
$count2=0;

if ($result1->num_rows > 0)

{
	while ( $row1 = $result1 -> fetch_assoc())
	{
	
		
			$A1[$j]=$row1["tid"];
			$A2[$j]=$row1["latitude"];
			$A3[$j]=$row1["longitude"];
			
			

	//	echo $row1."<br>";
		$j=$j+1;
	}
$count1=$j;
		

}

for ($i=0;$i<1;$i++)

{

$tid=$A1[$i];
$lat=$A2[$i];
$long=$A3[$i];
//$as[]=array("trackerid"=> $tid,"lat"=> $lat,"lng"=>$long);

//$postraw=array("coords"=>$as);
//$postjson= json_encode($postraw);
//echo $postjson."<br>";
//http://172.16.1.136/nom/reverse.php?format=json&lat=25.30506&lon=55.44334&zoom=18

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://172.16.1.136/nom/reverse.php?format=json&lat='.$lat.'&lon='.$long.'&accept-language=en',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET'
  
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$data = json_encode($response);
var_dump($response);
echo "\n <br>";
//echo $data->display_name;
//die();
//$location=$data->address;



//$update = "update citv set location='$location' where tid='$tid' and latitude='$lat' and longitude ='$long'";
//$conn->query($update);

}
?>