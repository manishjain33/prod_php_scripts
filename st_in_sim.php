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
$trackersData[]=array("866907057459017-ST1675082473470", "860186051742472-ST1659114170381", "867604055802582-ST1659450743188", "863069058685646-ST1674115372557", "866907057565151-ST1675876596275", "860517041888787-ST1667541918953", "866770056758585-ST1667227860780", "860517041811433-ST1661589279595", "860517041811615-ST1659113737567", "860517041807134-ST1656930415197", "867604055811211-ST1660046393757", "866770056699615-ST1674115278022", "866770056734685-ST1668879549620", "860640057298244-ST1671086303077", "860186050038351-ST1670397018849", "866907056766909-ST1667891396500", "860517041808736-ST1657107062777", "867604053423985-ST1666016733183", "866907058139626-ST1671697006727", "867604055772421-ST1660046410232", "860517041842420-ST1668659327230", "860640057236459-ST1659450602279", "866907053441795-ST1660816608477", "860186052307382-ST1659113758054", "866770056734750-ST1672410280194", "867604055786835-ST1658584852055", "866770056800106-ST1668879694903", "866907056802522-ST1676037567245", "866770056758791-ST1667227884591", "867604055805999-ST1660046376230", "860517041894223-ST1656406761457", "860640057235808-ST1659450657826", "866907057678103-ST1672411000290", "860517041807282-ST1656930487578");

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