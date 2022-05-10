<?php
$cluster = Cassandra::cluster()
              //->withContactPoints('ec2-13-233-195-46.ap-south-1.compute.amazonaws.com')
              ->withContactPoints('172.16.1.28,172.16.1.182,172.16.1.181,172.16.1.25,172.16.1.185')
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
    if($row['trackerid']!=''&& $row['is_deleted']==0 && $row['category']!= 'cashbox' && $row['category']!= 'cash_in_transit'){
      $eventcount=$session->execute("select count(*) from events_data where trackerid=".$row['trackerid']." and event_id=4 and year_month=202204");
      foreach ($eventcount as $rows){
        if($rows['count']==0){
          //$finalarr=array("chassis"=>$row['chasis_number'],"updatedat"=>$row['updated_at'],"trackerid"=>$row['trackerid'],"count"=>$rows['count']);
          $Orgresult  = $session->execute("SELECT * FROM organizations where id=".$row['orgid']);
          foreach ($Orgresult as $rowOrg) {
              //echo $row['name']. " / ".$row['vendorid']." / ";
              $vendorID=$rowOrg['vendorid'];
              $orgName=$rowOrg['name'];
          }
          $vendQuery  = $session->execute("SELECT * FROM users_by_userid where userid=".$vendorID);
          foreach ($vendQuery as $venrow){
              $vendor= $venrow['company'];
          }
          $trackerQuery  = $session->execute("SELECT * FROM trackers_by_trackerid where trackerid=".$row['trackerid']);
          foreach ($trackerQuery as $trackrow){
              $imei= $trackrow['imei'];
          }
          echo $vendor ." - ".$orgName ." - ".$row['chasis_number'] ." - ".$row['updated_at'] ." - ".$row['trackerid']." - ".$row['imei'] ." - ".$rows['count']. "<br> \n";
        }
      }
    }
  }
  if ($result->isLastPage()){ break; }
  $result=$result->nextPage();
}
?>  