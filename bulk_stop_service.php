<?php
include('connProd.php') ;
$rawdata = file_get_contents("php://input");
$data=json_decode($rawdata);
print_r($data->chassis[0]) ;
echo "with out r";
echo $data->chassis[0];