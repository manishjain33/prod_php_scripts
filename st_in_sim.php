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
$trackersData[]=array("863069058707937-ST1671194630587", "860186050142005-ST1666934090120", "863940058326805-ST1669036541628", "863069057994353-ST1671198651085", "863940058323877-ST1675081080818", "864593056222705-ST1674130651766", "863069057910540-ST1670496992967", "860186050545348-ST1670496952259", "864200050733220-ST1666188625230", "864200050790949-ST1665755466792", "864593056462970-ST1674130672979", "866770056809263-ST1664792845018", "864200050827246-ST1666100066993", "864200050874560-ST1666271537030", "863069057966187-ST1673426292154", "863069057997703-ST1671891639473", "864593056246555-ST1653310697000", "860186050524426-ST1670497008786", "867730058970744-ST1673943787532", "863069058776528-ST1671194680013", "863069058730756-ST1641563959769", "863940058327134-ST1640096234540", "860186051698856-ST1670496756908", "863069058709883-ST1671025906475", "863069057900905-ST1671780333324", "863069058697724-ST1673437089032", "864593056490914-ST1654081532386", "867730058939004-ST1660653012742", "863069057403397-ST1671718310860", "864200050808295-ST1666188644585", "864475048386816-ST1673953712485", "860186050577457-ST1670497147860", "863069058017550-ST1671780265223", "863069058008559-ST1671780300062", "867730058833165-ST1644657704083", "864593056229890-ST1675768393374", "864351052028919-ST1669721540530", "864351052021625-ST1672734252477", "867730058901800-ST1672299502244");
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