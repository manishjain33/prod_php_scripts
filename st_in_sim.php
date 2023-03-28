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
$trackersData[]=array("866907053408109-ST1655985202454", "866907052375036-ST1656397987318", "866907052441291-ST1668664582389", "863069057955123-ST1650615077465", "863069057999055-ST1664775613654", "866907053420260-ST1670310873340", "863069058059727-ST1669275836884", "866907053340401-ST1652872805679", "863069057987225-ST1675861719813", "863069057911936-ST1672812745189", "866907052414421-ST1674034015150", "866907053428065-ST1656914153310", "866907051428125-ST1656913972518", "864593053769856-ST1663589706583", "866907051436706-ST1675231403102", "863069058811697-ST1675854167966", "863069058004129-ST1664187941634", "860186052126345-ST1673521745673", "866907053378732-ST1674462121164", "866907053442405-ST1656913838878", "863069057391220-ST1675861608316", "863069057915176-ST1672812745189", "866907051359775-ST1674627028641", "863069057908536-ST1669027918933");
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