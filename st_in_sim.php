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
$trackersData[]=array("864351053537041-ST1669271645873", "863069057388127-ST1672997181236", "864351053551042-ST1662570517279", "864593056270647-ST1664516351812", "867604055755590-ST1672919822628", "867604056945117-ST1655377625703", "863069058019168-ST1645085632837", "863069057942915-ST1669271453947", "867604055768569-ST1669263549450", "863069057436819-ST1648794718327", "863940058403604-ST1661958528195", "864593056308504-ST1662571974149", "864200050764696-ST1675425437439", "863940059704182-ST1664516351812", "864593056322844-ST1669191446975", "863940059763782-ST1664804090331", "860536049401286-ST1654240403561", "863940058169429-ST1674296726714", "866770056785273-ST1675425314300", "867730058859319-ST1655375806362", "863940059882988-ST1662571992348", "864200050707257-ST1632825936960", "864200050755884-ST1655711235648", "864200050827121-ST1634213031500", "863069058031304-ST1663056207261", "860536049396874-ST1656674300677", "863069058783169-ST1650956184122", "867604053420098-ST1629885674986", "863940058313928-ST1675400725609", "864351052005370-ST1647153977415", "864593056253601-ST1675401173946", "864351053561801-ST1661953891500", "867604055774807-ST1655368397875", "863069058666083-ST1669807692714", "867604055794110-ST1644493883921", "863940058173694-ST1664624160826", "864593056484834-ST1661954282741", "863069058749764-ST1675414034877", "864200050875484-ST1634040266724", "864351051928093-ST1646629105741", "864593056282915-ST1655378591695", "867604050697318-ST1635253460425", "864593056271256-ST1667213619045", "864593056279440-ST1662572013413", "860536049237326-ST1648794862217", "863069057960487-ST1667040514627", "864593056241481-ST1655376987821", "863940058261226-ST1664804090331", "864351051995506-ST1669190528844", "864593056356875-ST1667291488108", "867730058940507-ST1665550290720", "867035048482077-ST1662975790815", "864593056480717-ST1669264747870", "863069057428907-ST1655368517174", "860517041811011-ST1663056157273", "867604053487527-ST1637068218316", "864593056258493-ST1661958230446", "863069058753576-ST1647147608128", "864351053567543-ST1648205550206", "860186050091152-ST1654235126448", "864593056339616-ST1672902537643", "863940058274104-ST1662571053185", "860640057771869-ST1655375937448", "863940059754310-ST1675400892280", "860186050053715-ST1648204600853", "864351051946012-ST1669271823627", "863940058175491-ST1645101967738", "864593056434268-ST1661424949279", "864593056299745-ST1664516246844", "863940059878978-ST1661425155219", "867730058924212-ST1664804090331", "867604055794151-ST1675418695811", "864200050711929-ST1664804090331", "867604055809728-ST1664804090331", "864200050816181-ST1644493779414", "860536049331178-ST1643896909292", "863940059703804-ST1672919927229", "864351053561827-ST1646629216754", "863940058355671-ST1661953767967", "864351053511046-ST1672044810332", "863940058208888-ST1654231189277", "860186050082896-ST1667028346910", "864351053584936-ST1645102006788", "867604055723374-ST1667363557707", "860536049397542-ST1655376003155", "867604055749015-ST1675400995418", "867604055749585-ST1647153014480", "867604055803226-ST1648807258390", "864200050707430-ST1675425673697", "867604055730668-ST1665401657694", "867730058986484-ST1655375880132", "860186051739981-ST1643105970616", "867604053488145-ST1647153176957", "864351053335875-ST1669271743020", "866770056759955-ST1675425236770", "864593056277725-ST1667309169257", "864593056507063-ST1655288751898", "864593056307191-ST1661424868859", "864593056384968-ST1646909572955", "863069057942568-ST1668147716636", "860186050050364-ST1670307315913", "864351053413292-ST1645104076802", "863940058356281-ST1664624160826", "863940058657514-ST1667364292145", "864593056249039-ST1664804090331", "867604055731609-ST1663056265075", "864593056269698-ST1655378472686", "864593056258949-ST1675400837025", "863940059852502-ST1662570966561", "863069058755472-ST1647154139319", "860536049331012-ST1663055951762", "863940059860620-ST1664516351812", "863069057942998-ST1668424177280", "864351053383313-ST1664624160826", "864351052018167-ST1645102103842", "863940058139497-ST1647147675176", "863069057447535-ST1662374910502", "867730058939608-ST1665552655119", "864593056241317-ST1675401087497", "867035042866101-ST1675419144474", "863940058304885-ST1669275476421", "867035042885440-ST1648795344270", "864593056270159-ST1655378015486", "863940059866205-ST1664365754217", "867604055730742-ST1658554287869", "867604055813274-ST1648807699989", "866770056789648-ST1670215157678", "864593056254534-ST1655378535482", "863940058782023-ST1664804090331", "863069058035446-ST1663318204730", "866770056786784-ST1672056614437", "864593056322737-ST1662570921503", "864351052004951-ST1650951458634", "860536047493764-ST1664631059755", "867604053488525-ST1648795156398", "860640057276562-ST1647149830093", "860640057266712-ST1662559959423", "864200050706523-ST1634213031500", "863069057918915-ST1675422776125", "864200050706549-ST1632825953162", "864593056483752-ST1675400795583", "867604055790951-ST1667281732076", "860640057235006-ST1655367494590", "867604055793682-ST1655377499884", "864593056497281-ST1648029506212", "864593056367971-ST1669191164734", "867035042843894-ST1658554287869", "864593056307639-ST1664367040553", "860186050050992-ST1662570485412", "864593056497570-ST1675422676901", "864593056346058-ST1675414678055", "864200050707018-ST1675418633736", "863940059882913-ST1667291234324", "864593056216186-ST1664516351812", "867604055773932-ST1665660450788", "867730058792288-ST1674622131527", "864593056508574-ST1675401105791", "864593056504755-ST1675401008790", "863940058377626-ST1672903755239", "867604055731161-ST1648795210793", "864351053561678-ST1645102080447", "863940058151765-ST1647154062417", "863069058775546-ST1655381224354", "864593056261729-ST1664631059755", "863940058405120-ST1653925227686", "860640057750327-ST1665401289609", "863940059870280-ST1661953267527", "864593056282055-ST1669263469648", "863940058323240-ST1650948213158", "867604055807953-ST1655369261964", "867604055809868-ST1663056359484");
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