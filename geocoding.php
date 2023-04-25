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
$postraw=array("coords"=>[array("trackerid"=>"23bfbe40-f6f1-11e8-8593-db6ca2a126d5","lat"=>"24.50086021423340","lng"=>"54.39120864868164")]);
echo json_encode($postraw);
?>