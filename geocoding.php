<?php
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,"dubai") ;
if($dbhandle->connect_errno > 0)
    {
        die('Unable to connect to database' . $dbhandle->connect_error);
    }
$sql = "select * from citv";
$result = mysqli_query($dbhandle,$sql);
while ($trackerid = mysqli_fetch_assoc($result))
{
  $tidData[]=$trackerid;
}
echo count($tidData);

?>