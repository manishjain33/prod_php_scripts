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
$trackersData[]=array("863069058777948-ST1655879309604", "866770056719678-ST1668512841690", "860186050156690-ST1658323418405", "866907050795052-ST1673355893711", "864145064954173-ST1675686648207", "863069057424393-ST1675686238574", "860186050164348-ST1673355342995", "860186050566401-ST1655879916567", "863069057994585-ST1662623708945", "866770056791784-ST1669014919070", "866907050758605-ST1673355893711", "860186051743520-ST1671631178054", "867730058861679-ST1658472694360", "866770056775886-ST1659087426700", "860186050164587-ST1668513110758", "866907051438223-ST1663241154658", "860186050141650-ST1664262233946", "866770056691448-ST1668512517525", "864351052025279-ST1673356270018", "863069058048290-ST1663855081978", "863069057945348-ST1672820658459", "860186051866578-ST1666356602436", "864145065059675-ST1675686678117", "860186051877203-ST1651754976484", "866770056811681-ST1659087455641", "869084061838524-ST1675686117673", "863069057429616-ST1673355438279", "860186051762009-ST1673355559093", "866907051449287-ST1668513423728", "860186051795710-ST1668756741320", "866907051369287-ST1666693583732", "864475040009473-ST1652769505694", "863069057403983-ST1673355467316", "866770056775662-ST1655726543648", "866907051442647-ST1670333528641", "864351055074910-ST1675681851422", "864351055080354-ST1675686339912", "860186050028311-ST1650883068310", "863069057387723-ST1668513247063", "866907051470176-ST1658400455967", "864145065058560-ST1675686545856", "864826052709584-ST1673854050361", "864145065114686-ST1530355013000", "860186051873608-ST1659087606309", "860186051832588-ST1668756871232", "867730056674090-ST1674711615363", "864826052649137-ST1672836823797", "860186050098264-ST1663935215186", "866770056690044-ST1659087338252", "863069057931819-ST1658322045059", "863069058778169-ST1667218964704", "860186051750939-ST1666356602436", "866770056680854-ST1666356602436", "866770056662365-ST1669015023310", "866907050758902-ST1670333098142", "860186050095294-ST1650442322271", "860186050565981-ST1658323443013", "863069057406903-ST1652106981284", "866770056772396-ST1655017829722", "866907050738516-ST1667218964704", "866770056741680-ST1655108857131", "864826052603431-ST1672837881907", "860186050136700-ST1650443617793", "864351053420156-ST1668515026085", "860186050556725-ST1655108464409", "866770056708143-ST1650882965584", "866770056690846-ST1659087394732", "869084061826602-ST1675686006148", "864351053582484-ST1673356360528", "866770056629208-ST1668512472515", "860186050129820-ST1652179956195", "860186051822001-ST1669015357175", "863069058710865-ST1655794677522");
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