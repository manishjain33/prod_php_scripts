<?php
include('connProd.php') ;
$sim[]=array("971831100498322", "971831100444974", "971831100418158", "971831100498732", "971831100455943", "971831000672446", "971831100645892", "971831100736385", "971831000698196", "971831100608738", "971831100788389", "971831100709200", "971831100735602", "971831100717451", "971831100623140", "971831100735050", "971831100757200", "971831100769792", "971831000669419", "971831100752999", "971831007197313", "971831007119525", "971831007107672", "971831007181646", "971831007166924", "971831100777913", "971831007159358", "971831007107040", "971831007187640", "971831007162214", "971831007124475", "971831007108561", "971831007189186", "971831007177597", "971831007155975", "971831007160626", "971831007144786", "971831007135648", "971831007114271", "971831007170915", "971831100735143", "971831007159762", "971831007173559", "971831007195142", "971831100786113", "971831007126402", "971831007111219", "971831007172116", "971831007144664", "971831007160066", "971831007110158", "971831007177232", "971831007132188", "971831007150828", "971831007192343", "971831007170948", "971831007156217", "971831007137272", "971831007108753", "971831007143473", "971831100767176", "971831007124379", "971831007172036", "971831007128007", "971831007121555", "971831007149833", "971831007174841", "971831007166356", "971831007184185", "971831007191950", "971831007173447", "971831007143344", "971831007124566", "971831007186495", "971831100734648", "971831007147981", "971831007148440", "971831007113600", "971831007118827", "971831007161759", "971831007179326", "971831007100354", "971831007145414", "971831007147162", "971831100754335", "971831100697717", "971831100735961", "971831100616226", "971831100624525", "971831100733804", "971831100765914", "971831100798969");
for ($i=0;$i<=(count($sim[0])-1);$i++){
    $result  = $session->execute("SELECT * FROM trackers_by_imei where sim_number='".$sim[0][$i]."' ALLOW FILTERING");
    foreach ($result as $row) {
        echo $sim[0][$i]." - ".$row['imei']." , ";
    }
    echo "<br>";
}

?>