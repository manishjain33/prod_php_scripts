<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'user') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
$simQuery = "select * from orgid";
$simQuery_result = mysqli_query($dbhandle, $simQuery);
while ($simRow = mysqli_fetch_assoc($simQuery_result))
{
  $simData[]=$simRow;
}
//UPDATE "earthone"."organizations" SET "owner_phone" = '9715500129451' WHERE ("id" = 13190140-5271-11eb-b1f5-daa009512d8f);
for ($i=0;$i<=count($simData);$i++){
    $update  = $session->execute("UPDATE organizations SET owner_phone = '".$simData[$i]['owner_phone']."' WHERE (id = '".$simData[$i]['orgid']."')");
    echo "Status updated <br>";
}
?>