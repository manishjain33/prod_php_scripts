<?php
include('connProd.php') ;
$simArray=array("971831100498322", "971831100444974", "971831100418158", "971831100498732", "971831100455943", "971831000672446", "971831100645892", "971831100736385", "971831000698196", "971831100608738", "971831100788389", "971831100709200", "971831100735602", "971831100717451", "971831100623140", "971831100735050", "971831100757200", "971831100769792", "971831000669419", "971831100752999", "971831007197313", "971831007119525", "971831007107672", "971831007181646", "971831007166924", "971831100777913", "971831007159358", "971831007107040", "971831007187640", "971831007162214", "971831007124475", "971831007108561", "971831007189186", "971831007177597", "971831007155975", "971831007160626", "971831007144786", "971831007135648", "971831007114271", "971831007170915", "971831100735143", "971831007159762", "971831007173559", "971831007195142", "971831100786113", "971831007126402", "971831007111219", "971831007172116", "971831007144664", "971831007160066", "971831007110158", "971831007177232", "971831007132188", "971831007150828", "971831007192343", "971831007170948", "971831007156217", "971831007137272", "971831007108753", "971831007143473", "971831100767176", "971831007124379", "971831007172036", "971831007128007", "971831007121555", "971831007149833", "971831007174841", "971831007166356", "971831007184185", "971831007191950", "971831007173447", "971831007143344", "971831007124566", "971831007186495", "971831100734648", "971831007147981", "971831007148440", "971831007113600", "971831007118827", "971831007161759", "971831007179326", "971831007100354", "971831007145414", "971831007147162", "971831100754335", "971831100697717", "971831100735961", "971831100616226", "971831100624525", "971831100733804", "971831100765914", "971831100798969");
$imeiArray=array("863940058753800", "863940059771009", "860186050143607", "863940058200836", "864351055091674", "864351053555910", "863257069014175", "863940058716609", "864145065005819", "864145065056754", "861059067509012", "861059067504351", "863940058781066", "864351053291086", "864145065056796", "863257068993098", "863257067817652", "863257067889537", "869084061854620", "863257067767410", "861059067498075", "861059067498299", "861059067502843", "861059067504831", "861059067503999", "863940058751739", "861059067503965", "861059067504609", "861059067497101", "861059067509079", "863257067890329", "861059067497689", "863257067890196", "861059067503502", "861059067497135", "861059067498513", "861059067504088", "861059067499685", "861059067498380", "861059067478887", "861059067504336", "861059067504021", "861059067505986", "861059067490635", "861059067510275", "861059067509608", "861059067484588", "861059067498687", "861059067497036", "861059067468532", "861059067456503", "861059067499115", "861059067499057", "861059067498455", "861059067504849", "861059067498851", "861059067498570", "861059067498240", "861059067472302", "861059067497655", "861059067498448", "861059067499677", "861059067499065", "861059067497549", "861059067510291", "861059067497473", "861059067478879", "861059067497051", "861059067504708", "861059067509269", "861059067504823", "861059067509293", "861059067504856", "861059067503932", "861059067504070", "861059067504583", "861059067478853", "861059067499693", "861059067464259", "861059067504005", "861059067499198", "861059067515373", "861059067498505", "861059067457212", "863257068973967", "864145064963414", "864145065035212", "864145064929613", "864145065188334", "864145065029462", "861059067499701", "861059067504013");
for ($b=0;$b<=1;$b++){
//for ($b=0;$b<=count($imeiArray);$b++){
    $simdata  = $session->execute("SELECT * FROM sim_cards where msisdn ='".$simArray[$b]."' ALLOW FILTERING ");
    foreach($simdata as $simrow){
        $iccid=$simrow['iccid'];
    }
    $result  = $session->execute("SELECT * FROM trackers_by_imei where imei ='".$imeiArray[$b]."' ");
    foreach ($result as $row){
        $imei=$imeiArray[$b]['imei'];
        $orgid=$row['orgid'];
        $tid=$row['trackerid'];
        $result_imei= $session->execute("update trackers_by_imei set sim_serial='".$iccid."',sim_number='".$simArray[$b]."' where (imei='".$imei."')");
        $result_tid= $session->execute("update trackers_by_trackerid set sim_serial='".$iccid."',sim_number='".$simArray[$b]."' where (trackerid =".$tid." );");
        foreach ($row['userid'] as $followed) {
            echo "imei - ".$imei." trackerid - ". $tid . " org - " . $orgid." userid - ". $followed . " iccid - ".$iccid." sim - ".$simArray[$b]."<br><br>";
            $result_uid= $session->execute("update trackers_by_userid set sim_serial ='".$iccid."',sim_number='".$simArray[$b]."' where (orgid =".$orgid.") and (userid =".$followed.") and (trackerid=".$tid.")");
        }
    }
}
?>