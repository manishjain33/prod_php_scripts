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
$trackersData[]=array("866907052471769-ST1655729392359", "863069057395213-ST1666219793550", "863940058395552-ST1673710925859", "863940059722580-ST1672482831810", "867730058876529-ST1656504747371", "863069057931215-ST1668498858429", "863940058404552-ST1656833821200", "860186050176292-ST1660230962423", "863940058404552-ST1670483449182", "863069057426232-ST1647856222692", "863069057413180-ST1654442713719", "860186050174461-ST1660131789447", "860640057274450-ST1656353081932", "864351053283166-ST1660597439243", "867730058858832-ST1666258565656", "863940059722895-ST1660743520838", "863940058728521-ST1675602800734", "863940058256168-ST1670066667522", "863940058408354-ST1653139494436", "860156050029046-ST1676190322476", "863940058140164-ST1670418281277", "860517041837883-ST1648386398058", "863069058053407-ST1656942985643", "863069057439532-ST1667821649599", "867604055719737-ST1671442427896", "864351055089710-ST1666881941973", "864351055089926-ST1653562142439", "864351053331056-ST1663856896701", "867604053472636-ST1664289074966");
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