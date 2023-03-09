<?php
MongoCursor::$timeout = -1;
$MONGO_NAME = 'root';
$MONGO_PASSWORD = '';
$MONGO_HOST = '172.16.1.7';
$MONGO_PORT = 27029;
$MONGO_DB = 'securepathlicenses';
$client = new MongoClient("mongodb://$MONGO_HOST:$MONGO_PORT");
$db=$client->$MONGO_DB;

$col1 = 'licenseConsumed';
$collection1 = $db->$col1;

$col2 = 'users';
$collection2 = $db->$col2;
$userFind = array('email'=>'jishi@gredenza.com');
$cursor = $collection2->find($userFind);
// iterate cursor to display title of documents
foreach ($cursor as $document) {
  $userdata[]= $document;
}
print_r($userdata[0]['_id']);
?>