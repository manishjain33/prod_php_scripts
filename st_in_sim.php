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
$trackersData[]=array("863069058635698-ST1675523942660", "863069058615230-ST1675440237711", "863069058642856-ST1675441395995", "866770056717599-ST1664453101727", "866770056751945-ST1674712080967", "860641857231232-ST1675420885825", "866907053311048-ST1672205157217", "863069058684200-ST1673260998236", "860641857212386-ST1675322822929", "860641857158968-ST1675253933984", "860641857218325-ST1675323012446", "863069058642564-ST1675254839017", "866907059038330-ST1668769506071", "866770056689202-ST1666157851370", "866907059037712-ST1668769305327", "825366456856525-ST1675350627666", "866907059037712-ST1674902597098", "866770056747513-ST1666094269717", "866907056588246-ST1662636047709", "867604055751094-ST1647583256721", "866770056648232-ST1661153401746", "863069058615240-ST1675254839017", "860641857258585-ST1675437631782", "860641857258222-ST1675322915171", "863069058763682-ST1674197944302", "860641857215211-ST1675512859498", "860641857213986-ST1675421462908", "863069058640006-ST1657181779931", "866907056596108-ST1673249980954", "866770056746580-ST1658324854956", "860641857258233-ST1675522362084", "860641857215286-ST1675513604491", "863069058648254-ST1658226822174", "860186050079520-ST1668518365171", "866907051461159-ST1674654096671", "860186051690317-ST1669790857197", "866907050760155-ST1663249166289", "866907059373448-ST1673432213846", "866907051478856-ST1669802993838", "866770056704019-ST1668086209082", "863069057972607-ST1659708208853", "860641857231222-ST1674738005137", "866770056748867-ST1668518461652", "863069058778276-ST1672916938432", "863069058613520-ST1675440060274", "863069058611125-ST1663577410827", "866907059038330-ST1673094775172", "860640057188353-ST1654855867635", "860641857217568-ST1675516436166", "860641857256384-ST1675521934257", "860641857232869-ST1675521052014", "860641857215245-ST1675419130401", "860641857258214-ST1675522188757", "863069058640563-ST1675441012540", "866907053304233-ST1671695529671", "860641857258637-ST1673330604000", "862785046122290-ST1671518242478");

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