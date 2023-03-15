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
$trackersData[]=array("863514050406525-ST1675933504082", "866907050821106-ST1670246651695", "863514050302260-ST1675942733211", "863069058813172-ST1668076722688", "860186050019300-ST1652276668005", "860186051714661-ST1674558913771", "863069057946551-ST1642503152111", "863514050268495-ST1675757023347", "863069057430275-ST1669725310633", "868963040957390-ST1670741143835", "866770056751952-ST1669802514418", "860186052193099-ST1670310655029", "866770056639900-ST1662966979088", "866907051470999-ST1667379945845", "863514050293399-ST1673868893463", "860186051873509-ST1672839726588", "860186051828503-ST1660461886954", "863069057992845-ST1660732892591", "867604055735428-ST1650445114288", "867604055721451-ST1659424697581", "866907051502093-ST1651941602747", "867604055736301-ST1659080947801", "863069057946650-ST1653916440191", "867604055817432-ST1660647227097", "867604055818125-ST1652337987170", "860186052188535-ST1657018231401", "867604058773525-ST1653561130723", "868963040928574-ST1673007888439", "863069058003300-ST1652275933395", "860517044738914-ST1673011343577", "866907057624455-ST1670310688405", "867604055791629-ST1652000218132", "860517044737858-ST1673010555137", "867604055721626-ST1655108943343", "866770056754626-ST1650618141025", "863514050380423-ST1673009822173", "860186052175155-ST1660207466991", "867604055736087-ST1652337578199", "866907050803999-ST1657190716906", "860186050073700-ST1672834635468", "863514050399134-ST1673010888970", "866907051463775-ST1672767038712", "860186050024849-ST1664774017577", "860536049353300-ST1652276708371", "868963040957201-ST1673010211466", "860536049395320-ST1647856490574", "866770056792063-ST1664522487012", "860186050166822-ST1671625008337", "860186051647648-ST1670738529819");
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