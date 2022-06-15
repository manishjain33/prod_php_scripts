<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,'gredenza') ;
if($dbhandle->connect_errno > 0){
  die('Unable to connect to database' . $dbhandle->connect_error);
}
$orgQuery = "select * from ";
$orgQuery_result = mysqli_query($dbhandle, $orgQuery);
while ($orgRow = mysqli_fetch_assoc($orgQuery_result))
{
  $chassData[]=$orgRow;
}
$result  = $session->execute("SELECT * FROM users_by_userid WHERE (user_type = 'vendor') ALLOW FILTERING;");
foreach ($result as $row) {
    echo $row['company'];
}

?>