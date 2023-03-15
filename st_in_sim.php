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
$trackersData[]=array("867604051235894-ST1658232624087", "860640051494385-ST1658563590862", "863540060239648-ST1671041713482", "867604055719510-ST1658563499397", "863069058807711-ST1661261998687", "867730058877824-ST1665648673107", "863069058684870-ST1664795835732", "867604053506698-ST1659787438537", "354018112549760-ST1660391943873", "864200050728097-ST1661262035158", "864200050816470-ST1645102283113", "860186050164538-ST1661260888658", "867604055744156-ST1655641339087", "860186050153950-ST1641881032000", "860186050042600-ST1643623744000", "867730058908314-ST1664613685246", "867730058828637-ST1661262078904", "866770056736615-ST1655117979910", "863069058802258-ST1672138465783", "867730058922851-ST1627827533562", "860640051494260-ST1653562004999", "860640050756875-ST1655990018262", "867604055719786-ST1657193239984", "860186050533260-ST1667903890510", "863069058789323-ST1661338336747", "860186051817621-ST1645106434550", "866907059164599-ST1671041753532", "002093088945310-ST1642146733000", "860186051686539-ST1645105341887", "866770056660062-ST1661260924018", "860640057183826-ST1655640209985", "864200050831891-ST1661581981118", "860640050741059-ST1530355013000", "863069058682320-ST1642149750040", "860640051540898-ST1655639614674", "867604055729488-ST1658236940473", "867730058850375-ST1671194174543", "860186052189160-ST1673465536172", "860186050571252-ST1662555585963", "863069058046187-ST1645106937913", "863540060048957-ST1671041637022", "860640057236434-ST1640735658660", "860640050741170-ST1651131008188", "860640057696090-ST1658563615652", "866770056721146-ST1668023067493", "866770056759047-ST1647434852229", "867604055719661-ST1657610087902", "867604055729306-ST1629288536302");
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