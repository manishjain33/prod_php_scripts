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
$trackersData[]=array("863940058642227-ST1676190860964", "864351053308807-ST1657006723108", "864351053323095-ST1676189631491", "863940058133938-ST1673530082170", "863940058767941-ST1671122548218", "866907053431267-ST1670926654906", "860517041808462-ST1657725984903", "866907055188105-ST1671122509650", "864351053533834-ST1663861770365", "864351053331031-ST1673426685006", "864200050759902-ST1666951929662", "863940059718919-ST1666214594338", "864351053288413-ST1669729408053", "864200050725390-ST1676290819844", "860186050175948-ST1666084937498", "863069058003279-ST1670328938225", "863940058158604-ST1670849350077", "867730058826110-ST1665588591677", "864593056509721-ST1675617233019", "864200050760751-ST1676190410586", "863940059750128-ST1666219187041", "864351053301547-ST1670328810433", "867730058790506-ST1676188324244", "867604055816558-ST1670844481224", "860640057220602-ST1663488544642", "864351053309300-ST1670932242464", "864351053542959-ST1673433651323", "864351053555647-ST1670577107757", "867604055736277-ST1676188545803", "860186050140561-ST1676194297149", "863069058031353-ST1668498316682", "863940058755532-ST1676191412187");
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