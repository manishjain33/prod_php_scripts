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
for($a=0;$a<=count($sim_array);$a++){
//for($a=0;$a<=1;$a++){
    echo "Iccid - ";
    print_r($sim_array[$a]);
    $update  = $session->execute("UPDATE sim_cards SET status ='active' WHERE (iccid = '".$sim_array[$a]."')");
    echo " - updated <br> \n";
}
?>