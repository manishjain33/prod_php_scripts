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
$trackersData[]=array("860186050051396-ST1661252503516","860186050060462-ST1666955616704","860186050069372-ST1667201177377","860186050073598-ST1637153845917","860186050086384-ST1662105811901","860186050086384-ST1668519704282","860186050088869-ST1649669276687","860186050103957-ST1656153613799","860186050121603-ST1666762275872","860186050128855-ST1654166741812","860186050130224-ST1656414181446","860186050130729-ST1670498832269","860186050141171-ST1647601404634","860186050143268-ST1669037662343","860186050144142-ST1652084559588","860186050144589-ST1662105811901","860186050145586-ST1659959884964","860186050148622-ST1656414181446","860186050156179-ST1664526189293","860186050156443-ST1664429988987","860186050157383-ST1675343359487","860186050163761-ST1639285962643","860186050166582-ST1666863986891","860186050180484-ST1658748876930","860186050524244-ST1649663934190","860186050534995-ST1659964319216","860186050541552-ST1665483084281","860186050546437-ST1675343359487","860186051777031-ST1673012212926","860536045243286-ST1675343359487","860640057238331-ST1671100515528","860640057256150-ST1646212539783","860640057758304-ST1644497251152","860640057767479-ST1644497251152","862462033693861-ST1662704976495","862549040177183-ST1632991931003","862549040189501-ST1647077050794","862549040364195-ST1675854258613","862549043245813-ST1663319007222","863069057924400-ST1650357280414","863069057925647-ST1663752690937","863069057928500-ST1670498832269","863069057978919-ST1650527078286","863069057982457-ST1666784854883","863069057987399-ST1671606578375","863069057999980-ST1668847771145","863069058018145-ST1645683085122","863069058018749-ST1652276502194","863069058018871-ST1650357280414","863069058021263-ST1643098102422","863069058031262-ST1675343359487","863069058031494-ST1665065004748","863069058033664-ST1675240137233","863069058042400-ST1656152640202","863069058042772-ST1650348509875","863069058043390-ST1658748876930","863069058047045-ST1668669063055","863069058694770-ST1659959884964","863069058699696-ST1658324130775","863069058702581-ST1676265668102","863069058703027-ST1676265668102","863069058705436-ST1674813763358","863069058712887-ST1675343359487","863069058722035-ST1667373762149","863069058723215-ST1667373762149","863069058735151-ST1665065004748","863069058773343-ST1671606578375","863069058784860-ST1663752690937","863069058784860-ST1666779648587","863069058792756-ST1671606578375","863069058799223-ST1669209211446","863069058806010-ST1669273662120","863069058807208-ST1662704976495","863069058808198-ST1669273662120","863069058808438-ST1653542787701","863069058812828-ST1645017401837","863540060219764-ST1675240137233","863540060222594-ST1675240137233","863540061082393-ST1673592059306","863940058181804-ST1663319007222","863940058321004-ST1675343359487","863940058376610-ST1670244177403","863940058387575-ST1664200057124","863940058416416-ST1669037662343","863940058416630-ST1667897187722","863940058656938-ST1675161760251","863940059123268-ST1672751591926","863940059792070-ST1664526189293","864200050733865-ST1667201177377","864200050782680-ST1669273662120","864200050783894-ST1644847491247","864200050821934-ST1661433359825","864200057660640-ST1673012156603","864593053701743-ST1676265668102","864593056232472-ST1668519704282","864593056253882-ST1659959002873","864593056262834-ST1659358797548","864593056268336-ST1670244177403","864593056278335-ST1675343359487","865733024138695-ST1657778952342","865733025322041-ST1652084559588","866191038058491-ST1650963643611","866770056650345-ST1668669063055","866770056658132-ST1645511987949","866770056678585-ST1670411303231","866770056693642-ST1645694397551","866770056697338-ST1659959884964","866770056730709-ST1652968825232","866770056753826-ST1671606578375","866770056773667-ST1656412267175","866770056776777-ST1668519704282","866770056776959-ST1656153289721","866770056790380-ST1664526189293","866770056790380-ST1667201177377","866770056799597-ST1645515868451","866770056800700-ST1671606578375","866770056821490-ST1675498436473","866770056821706-ST1659959884964","866907050782530-ST1665065004748","866907051411766-ST1665483084281","866907051465176-ST1668519704282","866907053321336-ST1676112962810","866907053357827-ST1675343359487","866907058075622-ST1675070542009","866907058149245-ST1668519704282","866907059402981-ST1671005457451","867481033347398-ST1658748876930","867481037094707-ST1649137163871","867604053180395-ST1659959884964","867604053186244-ST1646814938009","867604053186426-ST1666777533341","867604056866602-ST1644847491247","867604056881742-ST1654836966723","867604058747552-ST1671606578375","867604058751372-ST1663240301350","867604058780694-ST1642837545687","867604058817306-ST1659959884964","867604058817439-ST1652968825232","867730053296988-ST1663752690937","867730056549102-ST1664526189293","867730056549771-ST1641274277545","867730056633930-ST1669273662120","867730056652435-ST1669273662120","867730056674009-ST1636619205443","867730056684826-ST1669273662120","867730058802954-ST1632906452159","867730058807714-ST1675853649706","867730058851183-ST1665483084281","867730058852900-ST1635750288835","867730058858618-ST1669382105310","867730058901863-ST1663752690937","867730058902903-ST1632055403405","867730058910427-ST1638093779432","867730058912886-ST1652084559588","867730058952783-ST1642837545687","867730058984646-ST1644497251152","868324021770123-ST1656754347612","868963040900888-ST1675854258613","868963043316736-ST1649137163871","869867036807354-ST1641890181259","869867036808709-ST1642837545687","869867036874412-ST1656754347612");
echo count($trackersData[0])."<br>";
print_r($trackersData);
die();
//for ($b=0;$b<=1;$b++){
for ($b=0;$b<=count($trackersData);$b++){
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