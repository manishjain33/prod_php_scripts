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
$trackersData[]=array("866907050512390-ST1649704392877", "863069057919657-ST1670425796085", "860517044693580-ST1659537127697", "860186051864011-ST1670835359333", "863069057924392-ST1670836355740", "860186051854533-ST1670836355740", "863069058030603-ST1670836355740", "867604055720974-ST1656916314892", "864200050787994-ST1660983533601", "864200050711697-ST1667291569611", "864200050894519-ST1664521580214", "866907050550546-ST1675932496388", "863069058714479-ST1671113515381", "864200050769984-ST1664521580214", "863069058792590-ST1668087135082", "864200050752923-ST1652346062000", "863069058026841-ST1671120675990", "867730058911820-ST1664619748338", "860640051469585-ST1656916314892", "866907057449174-ST1667919456744", "863069058677155-ST1667469689722", "863069058744823-ST1674105872154", "866907052364857-ST1669020265665", "867730058901954-ST1605336988952", "860186052150725-ST1671453629800", "864200050747816-ST1664521580214", "863069058689382-ST1670836355740", "867730058901681-ST1660555840700", "860186051679633-ST1670836355740", "860186050580014-ST1665674797198", "860186050114145-ST1675334711963", "863069058767154-ST1670836355740", "863069057944663-ST1667469387329", "863069058725335-ST1664782404783", "863069058022188-ST1670836355740", "860186051869929-ST1670836355740", "864200050748079-ST1662101048264", "863069058701393-ST1670836355740", "863069058028144-ST1670836355740", "860186051875736-ST1670836355740", "866907052449419-ST1673685238891", "866907059074350-ST1665999109192", "860186051726863-ST1670836355740", "860186051863856-ST1670836355740", "860186052098627-ST1666685376916", "864200050753632-ST1659518246072", "860186051869119-ST1670836355740", "866907058534743-ST1670488075918", "866907058038372-ST1672816930703", "866907053357041-ST1656660529886", "867730058860226-ST1658311128652", "863069058716334-ST1667641100724", "864200050828152-ST1664521580214", "863069058667446-ST1675754493128", "866907052650292-ST1675936889283", "864200050797464-ST1662101048264", "866907058115907-ST1659540725903", "866907053337548-ST1663495482838", "860186051864581-ST1670836355740", "860186051867816-ST1669714797145", "860186052189541-ST1668087135082", "867604055739792-ST1660645009587", "860186051705164-ST1675067416352", "860186051713580-ST1669193291105", "863069058722985-ST1674565664647", "864200050822783-ST1657102890580", "863069058666885-ST1672487579425", "863069058730285-ST1667808192244", "863069058679870-ST1674105872154", "864200050897496-ST1666033808884", "863069058718504-ST1671021432405", "863069057904253-ST1666601954175", "863069058716276-ST1657111914857", "866907057655192-ST1660562209000", "860640050767542-ST1656916314892", "863069058676322-ST1664032473754", "863069058022881-ST1670948219403", "860186051744155-ST1670836355740", "864200050703652-ST1664521580214", "864200050703421-ST1664521580214", "868963049203961-ST1656916314892", "860186051864466-ST1667379500208", "860186051647804-ST1674105872154", "860186051864490-ST1666024442235", "863069058021818-ST1659512577311", "866907059242775-ST1670416877381", "864200050894261-ST1664521580214", "864200050756767-ST1675088942134", "860517041882632-ST1656916314892", "863069058794876-ST1675932625435", "863069058054041-ST1672732241600", "860186052167968-ST1671012438230", "863069058710907-ST1670836355740", "860640051452912-ST1656916314892", "864200050718924-ST1673436486476", "860186051852974-ST1661503882668", "860186051650865-ST1672326178382", "860186051863914-ST1669460229391", "863069058798282-ST1674105872154", "863069058024465-ST1667381508584", "863069057994882-ST1671469709129", "867730058859327-ST1605336988952", "866907056664609-ST1668863315803", "863069058008740-ST1670836355740", "866907056749566-ST1659540725903", "866907059019520-ST1672297539412", "866907056706533-ST1670688509544", "860186050015383-ST1666703979597", "860517041883226-ST1605336988952", "864200050753541-ST1665038679084", "863069058681124-ST1668005382759", "863069058719049-ST1671021432405", "867730058916002-ST1673429543059", "864200050829598-ST1673363120388", "863069058711129-ST1674105872154", "863069058003550-ST1664782546796", "864200050706630-ST1664521580214", "867730058862131-ST1656916314892", "866907051444726-ST1675867265821", "867604055816509-ST1656916314892", "864200050748186-ST1662101048264", "863940059359255-ST1582527375000", "866907052363115-ST1660824474622", "863069058002362-ST1670836355740", "860186052175607-ST1668087135082", "863069058062937-ST1671021432405", "867730058856521-ST1656916314892", "868963049204001-ST1656916314892", "864200050886549-ST1664521580214", "867730058912324-ST1671460923979", "867604055736947-ST1656916314892", "860186051876221-ST1670836355740", "864200050891465-ST1605336988952", "860186051864979-ST1670836355740", "860517041847999-ST1605336988952", "866907058138974-ST1659525034000", "863069057908890-ST1671713673637", "860517041882202-ST1605336988952", "860186051866529-ST1670835359333", "860186051666135-ST1656316900898", "863069058725483-ST1670836355740", "863069057988256-ST1670836355740", "864200050760942-ST1664521580214", "863069058713497-ST1671021546039", "864200050829713-ST1668423686931", "867730058901467-ST1605336988952", "863069058673808-ST1657799906678", "866907052362752-ST1674471085073", "860186051855084-ST1670836355740", "860186052180425-ST1669818922518", "863069058734188-ST1670836355740", "860640050033788-ST1656916314892", "867730058911961-ST1656916314892", "863540060130599-ST1670604574740", "863069058458200-ST1660562209000", "860186051863930-ST1670836355740", "863069058030652-ST1670836355740", "866907057451923-ST1670484574962", "860517041882707-ST1605336988952", "860186050091624-ST1666788642320", "860186051672828-ST1674467224023", "866907058020271-ST1664461716357", "863069058029365-ST1670836355740", "860186050540422-ST1675937937876", "860640050755471-ST1656916314892", "864200050874057-ST1664521580214", "860186050534896-ST1667379500208", "863069057901515-ST1671021432405", "863069057986581-ST1663937789734", "863069057962210-ST1667547824629", "864200050787309-ST1659950794197", "863069058729600-ST1673262204721", "863069058779399-ST1676297331097", "866907052377289-ST1672054694107", "863069057989684-ST1667324617016", "864200050764365-ST1664521580214", "860640050763848-ST1656916314892", "867730058984018-ST1656916314892", "864200050843508-ST1667291937040", "860186051686463-ST1666024442235", "860186051754410-ST1670836355740", "866907050741403-ST1668067425708", "863069057919483-ST1671713673637", "864200050702589-ST1666706159665", "864200050794115-ST1657102890580", "864200050886895-ST1667291749193", "863069057909054-ST1674116716906");
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