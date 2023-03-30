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
$trackersData[]=array("864200050829820-ST1665868735797", "860186050068341-ST1675848704718", "864200050822759-ST1643813907520", "863069057421480-ST1659953810364", "860186050109103-ST1669449803158", "864200050814764-ST1655106099737", "863940058298764-ST1674049963626", "863940058364665-ST1657979786497", "867730053290676-ST1659953798643", "864351053293264-ST1671882176913", "860186050109190-ST1670494329514", "860186050560081-ST1671882508005", "867730058856349-ST1639395732269", "864200050768044-ST1672820843448", "864351055090692-ST1663757522555", "867730058927884-ST1639054578014", "867730056582319-ST1662377862223", "867730058915061-ST1659953765374", "864200050893156-ST1673325992940", "867730058951892-ST1632215087282", "864200050814236-ST1673349086738", "863940058378095-ST1671875806171", "863069057430093-ST1671882517797", "863940058330971-ST1652791248618", "864200050788976-ST1642767547582", "867730058857495-ST1628684812");
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