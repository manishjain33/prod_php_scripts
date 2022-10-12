<?php
include('connProd.php') ;
$options = array('page_size' => 100);
$future  = $session->executeAsync("SELECT * FROM trackers_by_imei",$options);
$result = $future->get();

while(true){
  //echo "entries in page: " . $result->count() . "<br><br>\n\n";
  foreach ($result as $row) {
    if($row['trackerid']!=''&& $row['is_deleted']==0 && $row['sim_serial']!=''){
      //print_r($row['sim_serial']);
      //echo "<br> select * from sim_cards where iccid=".$row['sim_serial'];
      $simstatus=$session->execute("select * from sim_cards where iccid='".$row['sim_serial']."'");
      foreach ($simstatus as $rows){
        // echo "\n";
        // print_r($row['sim_serial']);
        // echo" - ";
        // print_r($rows['status']);
        $sim_array[]=$rows;
      }
    }
  }
  if ($result->isLastPage()){ break; }
  $result=$result->nextPage();
}
echo "<br>".count($sim_array)."<br>";
//print_r($sim_array[0]);
$totsim=$session->execute("select * from sim_cards");
foreach ($totsim as $simrows){
  $totsimarr[]=$simrows;
}
//echo "<br>";
//print_r($totsim[0]);
for ($i=0;$i<=count($totsimarr);$i++){
  $msisdn=$totsim[$i]['msisdn'];
  //echo $msisdn."<br>/n";
  if(array_search($msisdn,$sim_array)){
    echo "sim Found /n";
  }
}
?>