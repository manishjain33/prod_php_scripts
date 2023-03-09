<?php
$orgid=array("9300dc40-3ab9-11eb-bc9c-4d00e1ee45a3","44f77c80-31e2-11e8-9e90-47d2520e3837","44f88df0-31e2-11e8-b098-bb33dba75ca9","450d0050-31e2-11e8-bacd-8d6241e24256","dd397950-7f51-11e8-858b-1797aa986749","44f95140-31e2-11e8-b253-bb31df2847a4","44f8dc10-31e2-11e8-a740-9106b159ec2c","450c3d00-31e2-11e8-afd7-8f906de722b9","450cb230-31e2-11e8-a190-2664f969a6c5","a294ba10-428d-11eb-9ea8-5a0f2c7c29f7","45123070-31e2-11e8-ab9c-c3677576d30f","92f1c110-3ab9-11eb-b2b5-31f38d742cac","0c079240-69d7-11eb-9aa4-8e30b30b51d7","450d4e70-31e2-11e8-bae6-4913ab8cd7f8","4511bb40-31e2-11e8-8f23-b34172634971","84721f60-6972-11e8-a0c7-d4a66870dc6e","44f72e60-31e2-11e8-a2f8-2f2c74231a99","45120960-31e2-11e8-975c-f4cbe0bcbcd3","44f61cf0-31e2-11e8-8b94-79a91bcab4fc","251d6570-86dd-11eb-9b9f-f08b74096b2f","92d05660-3ab9-11eb-9e10-89ac7af95705");
//print_r($orgid);
$cluster = Cassandra::cluster()
->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
->withPort(9042)
->withCredentials("earthone", "XuWxgzpZ2rz")
->build();
$session = $cluster->connect('earthone');
for($i=0;$i<count($orgid);$i++){
    $result  = $session->execute("SELECT * FROM vehicles_by_vehicleid where orgid=".$orgid[$i]);
    foreach ($result as $row) {
        echo($row['category'].' / '.$row['chasis_number'].' / '.$row['insurance_renewal'].' / '.$row['purchase_date'].' / '.$row['registration_expiry'].' / '.$row['updated_at']);
        echo "<br>";
    }
}
?>