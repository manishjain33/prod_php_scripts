<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
// $dbhandle = mysqli_connect($hostname, $username, $password) ;
// $selected = mysqli_select_db($dbhandle,'dubai') ;
// if($dbhandle->connect_errno > 0){
//   die('Unable to connect to database' . $dbhandle->connect_error);
// }
// $trackers = "select * from imei_st3";
// $trackers_result = mysqli_query($dbhandle, $trackers);
// while ($trackersRow = mysqli_fetch_assoc($trackers_result))
//   { 
//     $trackersData[]=$trackersRow;
//   }
$trackersData[]=array("867730058904347-ST1660135267883", "867730058792049-ST1670408496628", "864200050852517-ST1664295183799", "863940059822042-ST1664643905624", "867730058791173-ST1670502878494", "867730058968912-ST1661360184813", "867730058899844-ST1672048765419", "864593056461568-ST1675854057534", "863940058158729-ST1653374264606", "866907053334928-ST1654698567908", "867730058983853-ST1654344779894", "864593056243958-ST1665077038689", "863940058175038-ST1663679577509", "864200050775841-ST1672854634871", "867604055817416-ST1658238864086", "860186050128418-ST1665646681973", "867604055760517-ST1660650569238", "867730058859012-ST1666081023294", "863940058142418-ST1650131963462", "863940058387237-ST1676119809483", "860186050126982-ST1665844345951", "867730058970421-ST1663245731824", "867730053305227-ST1666199595471", "864200050710855-ST1654344753243", "863940059713514-ST1673858379054");
//for ($b=0;$b<=1;$b++){
for ($b=0;$b<=count($trackersData[0]);$b++){
    $result  = $session->execute("SELECT * FROM trackers_by_imei where imei ='".$trackersData[0][$b]."' ");
    foreach ($result as $row) {
        $imei= $row['imei'];
        $tid= $row['trackerid'];
        $org= $row['orgid'];
        $st=explode("-",$imei);
        //print_r($st[1]);
        $simserial=$row["sim_serial"]."-".$st[1];
        $simnumber=$row["sim_number"]."-".$st[1];
        $result_imei= $session->execute("update trackers_by_imei set sim_serial='".$simserial."' , sim_number='".$simnumber."' where (imei='".$row["imei"]."')");
        $result_tid= $session->execute("update trackers_by_trackerid set sim_serial='".$simserial."' , sim_number='".$simnumber."' where (trackerid =".$row["trackerid"]." );");
        foreach ($row['userid'] as $followed) {
            echo "imei - ".$imei." trackerid - ". $tid . " org - " . $org." userid - ". $followed . " simserial - ".$simserial."<br><br>";
            $result_tid= $session->execute("update trackers_by_userid set sim_serial ='".$simserial."', sim_number='".$simnumber."' where (orgid =".$org.") and (userid =".$followed.") and (trackerid=".$tid.")");
        }
    }
}
//print_r($st)
//UPDATE "earthone"."trackers_by_userid" SET "sim_number" = '971564076295-ST1671015399455' WHERE ("orgid" = e99f7860-35e7-11e8-8562-3fa9eb090547) AND ("trackerid" = fb0de730-35e7-11e8-b7c2-d5d197cd5ddc) AND ("userid" = ea0b0b70-35e7-11e8-8db2-0c33bef12861);

?>