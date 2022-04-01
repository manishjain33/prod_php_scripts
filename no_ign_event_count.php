<?php
$cluster = Cassandra::cluster()
              ->withContactPoints('ec2-13-233-195-46.ap-south-1.compute.amazonaws.com')
              //->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
              ->withPort(9042)
              ->withCredentials("earthone", "XuWxgzpZ2rz")
              ->build();
$session = $cluster->connect('earthone');
$options = array('page_size' => 100);
$future  = $session->executeAsync("SELECT * FROM vehicles_by_vehicleid",$options);
$result = $future->get();

while(true){
  echo "entries in page: " . $result->count() . "<br><br>\n\n";
  foreach ($result as $row) {
    if($row['trackerid']!=''){
      $eventcount=$session->execute("select count(*) from events_data where trackerid=".$row['trackerid']." and event_id=4 and year_month=202203");
      foreach ($eventcount as $rows){
        if($rows['count']==0 && $row['is_deleted']==0 && $row['category']!= 'cashbox' && $row['category']!= 'cash_in_transit'){
          //$finalarr=array("chassis"=>$row['chasis_number'],"updatedat"=>$row['updated_at'],"trackerid"=>$row['trackerid'],"count"=>$rows['count']);
          echo $row['chasis_number'] ." - ".$row['updated_at'] ." - ".$row['trackerid'] ." count - ".$rows['count']. "<br> \n";
        }
      }
    }
  }
  if ($result->isLastPage()){ break; }
  $result=$result->nextPage();
}
?>  