<?php
include('connProd.php') ;
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4";  
// $dbhandle = mysqli_connect($hostname, $username, $password) ;
// $selected = mysqli_select_db($dbhandle,'dubai') ;
// if($dbhandle->connect_errno > 0){
// die('Unable to connect to database' . $dbhandle->connect_error);
// }
// $iccidQuery = "select iccid from sim_details_etisalat6";
// $iccidQuery_result = mysqli_query($dbhandle, $iccidQuery);
// while ($iccidRow = mysqli_fetch_assoc($iccidQuery_result))
// {
//     $iccid[]=$iccidRow;
// }
$iccid[]=array("8997112212754002033", "8997112212753984793", "8997112212754008015", "8997112212753982314", "8997112212760353934", "8997112212750830510", "8997112212750896719", "8997112212753980479", "8997112212753989499", "8997112212761255594", "8997112212750882700", "8997112212753978869", "8997112212755267346", "8997112212753987712", "8997112212753975854", "8997112212753977239", "8997112212761257081", "8997112212750839692", "8997112212754004419", "8997112212748098403", "8997112212753987053", "8997112212754002728", "8997112212748099651", "8997112212754000311", "8997112212753996553", "8997112212750841207", "8997112212753984791", "8997112212753983914", "8997112212754003251", "8997112212753996579", "8997112212753979953", "8997112212754002716", "8997112212754008810", "8997112212753997662", "8997112212753997673", "8997112212753996565", "8997112212753977011", "8997112212754001048", "8997112212755265221", "8997112212760331450", "8997112212753988823", "8997112212750841898", "8997112212753978336", "8997112212748107541", "8997112212753980462", "8997112212753979976", "8997112212750895880", "8997112212753976603", "8997112212753976596", "8997112212755267359", "8997112212754005056", "8997112212753976607", "8997112212753999664", "8997112212753976995", "8997112212753987724", "8997112212753984787", "8997112212754004416", "8997112212750841912", "8997112212753996570", "8997112212753989495", "8997112212753989486", "8997112212761269719", "8997112212750887944", "8997112212754007997", "8997112212754004418", "8997112212760592408", "8997112212753988829", "8997112212753976582", "8997112212754004392", "8997112212761269833", "8997112212754005075", "8997112212748099648", "8997112212753977258", "8997112212754002698", "8997112212748098750", "8997112212753987735", "8997112212753984786", "8997112212753989481", "8997112212753989472", "8997112212754005060", "8997112212753996581", "8997112212761256927", "8997112212753988804", "8997112212761273137", "8997112212760330780", "8997112212753988812", "8997112212753999399", "8997112212755264793", "8997112212753996539", "8997112212753989504", "8997112212753989494", "8997112212753996583", "8997112212753999691", "8997112212755268867", "8997112212755265222", "8997112212753989478", "8997112212753988793", "8997112212753988827", "8997112212754003283", "8997112212753977008", "8997112212754000318", "8997112212755270698", "8997112212761273152", "8997112212754000336", "8997112212754004432", "8997112212754004428", "8997112212753996571", "8997112212753996557", "8997112212754004405", "8997112212753976604", "8997112212754000327", "8997112212761254970", "8997112212760353916", "8997112212753987723", "8997112212753976609", "8997112212748095088", "8997112212753977897", "8997112212753988809", "8997112212750896753", "8997112212761273147", "8997112212753976581", "8997112212753982905", "8997112212754002056", "8997112212748105739", "8997112212761256930", "8997112212754008786", "8997112212753976589", "8997112212753998236", "8997112212753999662", "8997112212755269547", "8997112212753977027", "8997112212753999408", "8997112212753983904", "8997112212755267347", "8997112212748104058", "8997112212755264791", "8997112212750891114", "8997112212753989462", "8997112212753988800", "8997112212754000359", "8997112212754003275", "8997112212754007088", "8997112212754011125", "8997112212753988811", "8997112212761256937", "8997112212753997642", "8997112212754003280", "8997112212761269837", "8997112212753989473", "8997112212753988794", "8997112212754007079", "8997112212753997665", "8997112212753988813", "8997112212755267975", "8997112212753996577", "8997112212750889174", "8997112212753977277", "8997112212753984794", "8997112212753979937", "8997112212750896248", "8997112212748107518", "8997112212754001057", "8997112212755268884", "8997112212754003259", "8997112212753999709", "8997112212760353882", "8997112212753984788", "8997112212754004422", "8997112212761256912", "8997112212755266882", "8997112212753987727", "8997112212755264797", "8997112212753984789", "8997112212750894606", "8997112212753977015", "8997112212748106837", "8997112212754004429", "8997112212753996584", "8997112212754001061", "8997112212754001056", "8997112212754005041", "8997112212754007076", "8997112212750883488", "8997112212753987729", "8997112212754000325", "8997112212753988795", "8997112212753988806", "8997112212753996542", "8997112212753997666", "8997112212753985514", "8997112212753997680", "8997112212753996566", "8997112212753976992", "8997112212761273135", "8997112212754003282", "8997112212754005043", "8997112212753997682", "8997112212753976583", "8997112212761257041", "8997112212753976996", "8997112212753987725", "8997112212754003253", "8997112212753988826", "8997112212755264341", "8997112212755271639", "8997112212754001064", "8997112212753983913", "8997112212753999689", "8997112212753977018", "8997112212761256967", "8997112212754000314", "8997112212755265225", "8997112212754004433", "8997112212754002687", "8997112212750896240", "8997112212754004388", "8997112212753983890", "8997112212753983894", "8997112212748095092", "8997112212753976591", "8997112212755272427", "8997112212754000338", "8997112212753977247", "8997112212753999391", "8997112212761255617", "8997112212755267383", "8997112212754000342", "8997112212754003284", "8997112212754003267", "8997112212750895873", "8997112212754005050", "8997112212748102556", "8997112212750895879", "8997112212748104894", "8997112212753988828", "8997112212753988810", "8997112212750895878", "8997112212748094658", "8997112212753997670", "8997112212753981108", "8997112212753988825", "8997112212755271638", "8997112212754003243", "8997112212748099326", "8997112212753977002", "8997112212754007081", "8997112212753977275", "8997112212753999661", "8997112212753984796", "8997112212754004393", "8997112212753996562", "8997112212760330811", "8997112212753987734", "8997112212754003242", "8997112212753996574", "8997112212753997672", "8997112212754000337", "8997112212753977003", "8997112212754008823", "8997112212753976993", "8997112212753976586", "8997112212753976608", "8997112212753977014", "8997112212750833681", "8997112212753975841", "8997112212748098383", "8997112212753979959", "8997112212755272483", "8997112212753984815", "8997112212750882692", "8997112212754008795", "8997112212754004402", "8997112212754000358", "8997112212753977019", "8997112212754000317", "8997112212761273061", "8997112212753997667", "8997112212754005082", "8997112212754001051", "8997112212753987752", "8997112212753988803", "8997112212753997657", "8997112212753977022", "8997112212753976595", "8997112212753988790", "8997112212753989490", "8997112212753996551", "8997112212754003240", "8997112212748099657", "8997112212753987755", "8997112212748096898", "8997112212753999687", "8997112212754011133", "8997112212753987749", "8997112212754004396", "8997112212753976598", "8997112212753984795", "8997112212754007064", "8997112212760331717", "8997112212754005038", "8997112212754005068", "8997112212754005080", "8997112212753976605", "8997112212754001037", "8997112212753987714", "8997112212753998247", "8997112212753984811", "8997112212754006341", "8997112212750890370", "8997112212754003252", "8997112212760330960", "8997112212754005049", "8997112212753977030", "8997112212754005057", "8997112212753996585", "8997112212753988801", "8997112212753977017", "8997112212755268872", "8997112212753999663", "8997112212754001041", "8997112212750841186", "8997112212754003268", "8997112212753999400", "8997112212753977020", "8997112212761269729", "8997112212753979970", "8997112212750891385", "8997112212750838276", "8997112212753999393", "8997112212754007077", "8997112212754005069", "8997112212753976585", "8997112212750884631", "8997112212754004413", "8997112212753976580", "8997112212753989466", "8997112212753987717", "8997112212753984814", "8997112212753988824", "8997112212753984809", "8997112212754004424", "8997112212753987733", "8997112212748108095", "8997112212753996576", "8997112212753977280", "8997112212753988815", "8997112212753988830", "8997112212753975820", "8997112212753989501", "8997112212753977010", "8997112212754003265", "8997112212750894149", "8997112212753988833", "8997112212753984807", "8997112212754008817", "8997112212761269838", "8997112212748099622", "8997112212754008796", "8997112212754004390", "8997112212754007074", "8997112212754008818", "8997112212753999362", "8997112212753979951", "8997112212753977025", "8997112212753977236", "8997112212753996578", "8997112212754004434", "8997112212753982323", "8997112212748094674", "8997112212753976590", "8997112212754005058", "8997112212750839709", "8997112212750831885", "8997112212753997653", "8997112212754005036", "8997112212753988798", "8997112212753982315", "8997112212753984800", "8997112212753989500", "8997112212753996569", "8997112212754005073", "8997112212753996549", "8997112212753996582", "8997112212750887914", "8997112212755271637", "8997112212754004404", "8997112212754001054", "8997112212753996560", "8997112212754008807", "8997112212753984806", "8997112212754003256", "8997112212753996555", "8997112212753999405", "8997112212754004391", "8997112212750895896", "8997112212753977282", "8997112212753977032", "8997112212754005044", "8997112212754000348", "8997112212754003244", "8997112212753987741", "8997112212753997671", "8997112212753997639", "8997112212754003237", "8997112212754004427", "8997112212754005064", "8997112212750882684", "8997112212753977021", "8997112212754005085", "8997112212753996564", "8997112212753977029", "8997112212753996540", "8997112212753989475", "8997112212753988814", "8997112212748102711", "8997112212753989476", "8997112212755264790", "8997112212753976599", "8997112212755267371", "8997112212753977238", "8997112212753976587", "8997112212753999708", "8997112212754004423", "8997112212753978892", "8997112212753976588", "8997112212748104054", "8997112212753989477", "8997112212753976606", "8997112212753989488", "8997112212753976602", "8997112212754004426", "8997112212760353907", "8997112212753997649", "8997112212753999684", "8997112212754003255", "8997112212754005042", "8997112212754004431", "8997112212753988820", "8997112212753987758", "8997112212753976600", "8997112212754003245", "8997112212753997678", "8997112212753983910", "8997112212753976597", "8997112212750895222", "8997112212754004411", "8997112212753987740", "8997112212753988789", "8997112212748101243", "8997112212753985495", "8997112212753997677", "8997112212753989480", "8997112212754003285", "8997112212754003260", "8997112212753984812", "8997112212754001670", "8997112212753999361", "8997112212754003279", "8997112212753987730", "8997112212753988807", "8997112212753977001", "8997112212754002057", "8997112212753997659", "8997112212753996545", "8997112212754004417", "8997112212753996552", "8997112212753984804", "8997112212753999699", "8997112212753987720", "8997112212753987754", "8997112212750894636", "8997112212753989492", "8997112212753983918", "8997112212754001686", "8997112212755270702", "8997112212754005059", "8997112212755265223", "8997112212753987739", "8997112212753977000", "8997112212754004408", "8997112212753976584", "8997112212753997674", "8997112212753996561", "8997112212753977252", "8997112212753977034", "8997112212753976990", "8997112212754003271", "8997112212761255616", "8997112212748096919", "8997112212753988788", "8997112212750890374", "8997112212753999366", "8997112212753983916", "8997112212761256923", "8997112212755269536", "8997112212760592437", "8997112212753999364", "8997112212754004395", "8997112212753989484", "8997112212753988834", "8997112212750842742", "8997112212753982924", "8997112212753977245", "8997112212754004406", "8997112212753989489", "8997112212753997664", "8997112212753979946", "8997112212753987059", "8997112212754005070", "8997112212754004403", "8997112212748099293", "8997112212753987757", "8997112212753988786", "8997112212760353904", "8997112212755269544", "8997112212753989470", "8997112212753976592", "8997112212753999390", "8997112212754004398", "8997112212753987722", "8997112212753987732", "8997112212754001668", "8997112212753987731", "8997112212753984805", "8997112212754000356", "8997112212753997660", "8997112212753983906", "8997112212754007092", "8997112212753976593", "8997112212753977285", "8997112212755270705", "8997112212761256931", "8997112212753977237", "8997112212753988791", "8997112212753984810");
for ($i=0;$i<=count($iccid[0]);$i++){
    $update  = $session->execute("UPDATE sim_cards SET status ='active' WHERE (iccid = '".$iccid[0][$i]."')");
    echo "Status updated <br>";
}
?>