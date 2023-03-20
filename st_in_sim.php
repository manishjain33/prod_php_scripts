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
$trackersData[]=array("867730058827050-ST1663304676623", "867604055753736-ST1643711733138", "867604055746250-ST1658227261967", "867604053440641-ST1654166092316", "867604055749189-ST1661764803602", "867604055755319-ST1642155008948", "867604055756432-ST1662371145235", "867604055757695-ST1655533888675", "867604053440245-ST1654502559201", "867604055795083-ST1643711644246", "867730058924360-ST1672227378813", "867604053440518-ST1658227362539", "867604055795133-ST1654166109048", "867604055744875-ST1642155751174", "867604055800719-ST1672297133512", "860640057696603-ST1642155816852", "867604055776612-ST1654166141706", "867730058896204-ST1672227255865", "867730058802806-ST1658221910226", "867730058916523-ST1658750839229", "867730058925532-ST1660648118323", "867730058801725-ST1642155647527", "867730058827068-ST1662371161211", "867730058827563-ST1656585235369", "866770056635585-ST1663153238981", "867604053440617-ST1643711594634", "867604051620541-ST1662707262230", "863069057964661-ST1672300675028", "867604055795604-ST1651833241541", "867604055795489-ST1642155909577", "867604051620251-ST1639304944852", "867604053440690-ST1656411471439", "867604055800198-ST1658126369903", "867730056584117-ST1651832925081", "863069058680654-ST1642155845535", "867604055776513-ST1659684082638", "866907058474072-ST1665551832344", "867730056584661-ST1663044515333", "867604055800115-ST1660648194771", "867604055800230-ST1658126053562", "867730058938071-ST1672227394212", "867730058803366-ST1658227411155", "867604055801147-ST1673844725565", "867730058924352-ST1673255526255", "867730058792395-ST1658126696702", "867604051561414-ST1651832998522", "867730058922893-ST1663051013177", "867604055815931-ST1654166166846", "867604055795828-ST1646224393230", "867604055800115-ST1650439572908", "867604051621424-ST1642155150335", "867730058885769-ST1663132167285", "867730058923008-ST1642152747409", "867604055800438-ST1639912005768", "867604056921068-ST1663066273100", "867730058852744-ST1646224289698", "867604055801170-ST1661764777589", "867604055758032-ST1642154665114", "867730053323899-ST1656922405900", "867604055779152-ST1651128515642", "867604055797352-ST1642155873860", "867730058828447-ST1651832073684", "867730056583861-ST1648814081623", "867604051620541-ST1660562209000");

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