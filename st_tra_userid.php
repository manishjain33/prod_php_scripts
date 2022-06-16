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
$orgQuery = "select * from tid1";
$orgQuery_result = mysqli_query($dbhandle, $orgQuery);
while ($orgRow = mysqli_fetch_assoc($orgQuery_result))
{
  $trackers[]=$orgRow;
}
//for($i=0;$i<=count($trackers);$i++){
for($i=0;$i<=25;$i++){
    $result  = $session->execute("SELECT * FROM trackers_by_trackerid WHERE (trackerid =".$trackers[$i]['tid']." );");
    foreach ($result as $row) {
        $data[]=json_decode($row['userid']);
        echo"<br>";
        echo "count - ".count($row['userid']);
        echo"<br>";
    }
}
var_dump($data);
?>