<?php
include('connProd.php') ;
$options = array('page_size' => 100);
$future  = $session->executeAsync("SELECT * FROM trackers_by_imei",$options);
$result = $future->get();

while(true){
  foreach ($result as $row) {
    if($row['trackerid']!=''&& $row['is_deleted']==0 && $row['sim_serial']!=''){
      $sim_array[]=$row['sim_serial'];
    }
  }
  if ($result->isLastPage()){ break; }
  $result=$result->nextPage();
}
$totsim=$session->execute("select * from sim_cards");
foreach ($totsim as $simrows){
  $totsimarr[]=$simrows;
}
 for ($i=0;$i<=count($totsimarr);$i++){
   $iccid=$totsimarr[$i]['iccid'];
  $searchresult=array_search($iccid,$sim_array);
  if($searchresult!== false){
    $simfound[]=$iccid;
  }else if ($totsimarr[$i]['status']!="inactive"){
    $update  = $session->execute("UPDATE sim_cards SET status ='inactive' WHERE (iccid = '".$totsimarr[$i]['iccid']."')");
    echo " - updated <br> /n";
  }
}
?>