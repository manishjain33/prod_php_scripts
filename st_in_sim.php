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
$trackersData[]=array("863069057426778-ST1653552515559", "356173060778078-ST1650256976199", "863069057978695-ST1675056830302", "863069058743064-ST1675169060718", "863069058742934-ST1675168797032", "863069058742892-ST1675065505134", "863069058760076-ST1656355158694", "866907050779833-ST1657020731602", "866907051407475-ST1673028875029", "866907050749851-ST1673941071829", "863069058049215-ST1668671070127", "866907050762755-ST1659534250779", "863069057980154-ST1652948919895", "863069058803801-ST1668502740302", "866907056583908-ST1675865913691", "866907052382032-ST1656257391305", "866907051356045-ST1656009504234", "863069058040073-ST1674103658230", "863069057917586-ST1675063782228", "866907057517384-ST1659534682749", "866907057646894-ST1665329071489", "860186050019542-ST1656012307420", "863069058046138-ST1650210421547", "354018119384356-ST1659534312697", "863069058003469-ST1655465713277", "866907058070102-ST1664476550608", "863069058056384-ST1650210573824", "863069058039638-ST1675065356065", "866907052415956-ST1674110776077", "863069057989445-ST1650306487106", "863069058056574-ST1650210547191", "866907056582967-ST1663755632378", "863069058689754-ST1672115982014", "863069057993199-ST1674647431607", "860186050011903-ST1647930600347", "866907052413191-ST1661845239445", "863069057972169-ST1669708342619", "860186052137987-ST1671777399706", "863540060259687-ST1672724175498", "863069057909898-ST1675166505782", "863069058017584-ST1674020591227", "863069058729287-ST1654108592466", "863069058704637-ST1650306218371", "860186050031877-ST1660310041749", "863069058777050-ST1659293971988", "863069058743213-ST1674042678167", "860186050101530-ST1662725606272", "860186052137821-ST1650343821755", "352625690115082-ST1655929261764", "863069058741951-ST1675866220480", "863069058756710-ST1675065402346", "866907058098129-ST1661859365677", "863069058674814-ST1653629567525", "863069058037103-ST1650210278005", "867604053217270-ST1659938189601", "863069058674780-ST1664476513308", "866907057498163-ST1665820943156", "866907050766723-ST1652261103549", "352093082418723-ST1650255673264", "356173062493205-ST1626254220246", "866907051481033-ST1656744099092", "860186050150685-ST1657609656016", "863069057952526-ST1650211178055", "863069058707226-ST1663656478522", "866907056705378-ST1667973161582", "866907051442811-ST1655890489972", "866907051441045-ST1675867340217", "863069058045726-ST1659417231134", "863069058050833-ST1675324142884", "866907057646779-ST1665476161528", "863069058056368-ST1650210598352", "866907056621864-ST1671515178883", "866907051475787-ST1675065630974", "863069057913668-ST1673854215065", "866907058869743-ST1660562209000", "866907055139488-ST1659534539680", "866907053330766-ST1660626728138", "866907055162555-ST1676105209565", "866907051455888-ST1650002324700", "863069057948847-ST1650624206781", "863069058692642-ST1674110720826", "863069057948730-ST1668588140962", "866907056749889-ST1673351113755", "863069057965395-ST1658909656547", "863069058694218-ST1655893737791", "860186050156807-ST1676105258125", "863069058014441-ST1672116076060", "866907052455192-ST1674646231224", "356307049001109-ST1659534401796", "863069058773426-ST1672036061905", "866907051360583-ST1652851911337", "866907059086727-ST1675867784055", "866907056751588-ST1676105128640", "860186052184807-ST1652298207353", "860186052142011-ST1652244838069", "866907059322247-ST1660562209000", "866907057582545-ST1665410186468", "863069058021826-ST1674110686100", "863069058804387-ST1652245032110", "860186050036389-ST1664272726756", "866907050819365-ST1656690950758", "860186051771745-ST1674647328484", "863069058749798-ST1655465585060", "863069057985211-ST1674110957982", "354018119290348-ST1652951932783", "863069057904360-ST1650617885654", "863069058011124-ST1672116041229", "866907057582768-ST1668779218683", "860186051684153-ST1674647824842", "863069057388820-ST1659347548998", "863069058054611-ST1650211044616", "866907051476132-ST1660310154644", "356173062442806-ST1655924557765", "863069058734758-ST1662131218702", "866907051489929-ST1659533971761", "354018119290991-ST1655924590809", "863069057950694-ST1652891805596", "354018119377780-ST1657563569769", "860186050097845-ST1664172151383", "866907055162274-ST1659938126307", "866907050788131-ST1650211330187", "863069058010464-ST1669053888379", "863069057987068-ST1655465796673", "863069058749822-ST1664476473576", "863069058679334-ST1654195075570", "866907056598948-ST1654194975581", "866907056759110-ST1668774177085", "863069057444227-ST1653717884963", "866907057681925-ST1667892038131", "866907050780088-ST1655892284005", "860186051772818-ST1656009779162", "860186051881361-ST1660818018471", "866907051461936-ST1669054178736", "863069058816977-ST1650889024383", "866770056710990-ST1672141453695", "863069058020000-ST1660380024285", "866907050819365-ST1660388705662", "866907056637878-ST1659348052364", "863069058012288-ST1672039409236", "863069058040818-ST1669054228475", "863069057926470-ST1652706197905", "863069057996838-ST1668774228104", "863069058698581-ST1655465951789", "860186052184575-ST1654073601243", "863069058704256-ST1665476084861", "863069058744948-ST1650306379122", "866907053440573-ST1674446066390", "863069058749590-ST1655465303189", "863069057964463-ST1672728477677", "863069058023269-ST1668520115016", "863069058674962-ST1656259019605", "866907050750347-ST1668520485514", "863069058743031-ST1668166591470", "866907058090852-ST1661859336167", "863069058021875-ST1674103804089", "866907057687476-ST1666687646225", "863069058803777-ST1674127125010", "866907056751232-ST1672115951634", "863069058773392-ST1672141235564", "866907057657248-ST1675867562829", "866907056721334-ST1663829579870", "863069058025611-ST1659007461778", "860186051703128-ST1675867269036", "863069058675159-ST1650956230129", "863069058063091-ST1650343989014", "863069058012148-ST1673859287313", "863069058780645-ST1659534742159", "863069058033078-ST1655890057201", "863069058749509-ST1662724735797", "354018113066546-ST1673029147782", "863069058002000-ST1650433550184", "868324028601768-ST1650210939547", "863069058759680-ST1673585390773", "863069058041725-ST1673584975920", "863069058756017-ST1664192261747", "866907050797710-ST1657090279274", "866907051448693-ST1668679060689", "860186051684294-ST1656691269678", "863069058034357-ST1650211068139", "860186050161179-ST1663907659290", "860186051801005-ST1666942599528", "863069057435472-ST1668520961707", "866907058093724-ST1660310123046", "860186050117882-ST1664272687104", "863069058801151-ST1650535874360", "866907052413514-ST1665719572329", "866907056660847-ST1668405315022", "863069058018178-ST1663755795741", "863069058688533-ST1656244390013", "863069058733099-ST1668520439793", "866907050780054-ST1656258965068", "866907057456864-ST1669059268267", "863069058741860-ST1652705989183", "863069057435506-ST1668503337474", "860186051772289-ST1666981508399", "863069058746257-ST1656008866374", "863069058054983-ST1650210912201", "860186052179492-ST1650211360152", "860186050062153-ST1663911813865", "865733027935246-ST1659532354349", "863069057941982-ST1665133695671", "863069057404668-ST1659418068853", "352093081989302-ST1652952033642", "354018119357436-ST1655373315068", "863069057975675-ST1659534510971", "866907051409349-ST1648801423727", "866907056713380-ST1656010050588", "860186050036512-ST1664866733069", "863069058803728-ST1659534567908", "866907057634833-ST1664266613641", "866907051359965-ST1664866848442", "863069058689309-ST1666870729489", "860186050117965-ST1669300632272", "866907058464685-ST1668059860895", "863069057427198-ST1654063435255", "863069058730194-ST1650210691281", "860186051817613-ST1660310309513", "860186050067301-ST1674027754277", "863069058744633-ST1650306585454", "863069057430036-ST1652792056586", "866907055244940-ST1659938090591", "866907051471661-ST1669054069748", "866907050822203-ST1662725030925", "863069058037202-ST1650343886207", "863069058813560-ST1650561139687", "863069058743072-ST1650696524170", "863069058046302-ST1655466246769", "863069058756918-ST1675065732864", "352625693586768-ST1655925530696", "860186050095690-ST1663911850048", "866907057681628-ST1660747428713", "863069058012247-ST1655465356270", "860186050129739-ST1664868467147", "356173060647208-ST1658998005256", "863069057965296-ST1666964646726");

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