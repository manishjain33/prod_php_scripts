<?php
$MONGO_NAME = 'root';
$MONGO_PASSWORD = '';
$MONGO_HOST = 'localhost';
$MONGO_PORT = 27029;
$MONGO_DB = 'securepathlicenses';
$client = new MongoClient("mongodb://$MONGO_HOST:$MONGO_PORT");
$db=$client->$MONGO_DB;
MongoCursor::$timeout = -1;
$col1 = 'users';
$collection1 = $db->$col1;

$col2 = 'vehicleStatus';
$collection2 = $db->$col2;

$userFind = array('email'=>'accounts@waytracksystems.com');
$cursor = $collection1->find($userFind);
// iterate cursor to display title of documents
foreach ($cursor as $document) {
  $userdata[]= $document;
}

print_r($userdata);
print count($userdata);
//die();
?>
