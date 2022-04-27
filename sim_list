<?php
$username = "dps";
$password = "dps";
$hostname = "172.16.1.4"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,"dubai") ;
if($dbhandle_license->connect_errno > 0)
    {
        die('Unable to connect to database' . $dbhandle_license->connect_error);
    }
$sql = "SELECT * from tid1";
$result = mysqli_query($dbhandle,$sql);
while ($trackerid = mysqli_fetch_assoc($result))
{
  $tidData[]=$trackerid;
}
    print_r($tidData);
?>