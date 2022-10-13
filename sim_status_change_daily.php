<?php
include('connProd.php') ;
$options = array('page_size' => 100);
$future  = $session->executeAsync("SELECT * FROM trackers_by_imei",$options);
$result = $future->get();

while(true){
  //echo "entries in page: " . $result->count() . "<br><br>\n\n";
  foreach ($result as $row) {
    if($row['trackerid']!=''&& $row['is_deleted']==0 && $row['sim_serial']!=''){
      $sim_array[]=$row['sim_serial'];
    }
  }
  if ($result->isLastPage()){ break; }
  $result=$result->nextPage();
}

//echo "<br>".count($sim_array)."<br>";
//print_r($sim_array[0]);
$totsim=$session->execute("select * from sim_cards");
foreach ($totsim as $simrows){
  $totsimarr[]=$simrows;
}
 for ($i=0;$i<=count($totsimarr);$i++){
   $iccid=$totsimarr[$i]['iccid'];
  echo "MSISDN ".$msisdn."<br> /n";
  $searchresult=array_search($msisdn,$sim_array);
  echo $searchresult."<br> /n";
  if($searchresult!== false){
    echo "sim Found /n <br>";
  }else{
    echo "sim not found /n <br>";
  }
}
print_r ($sim_array);
?>