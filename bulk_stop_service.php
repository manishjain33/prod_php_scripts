<?php
include('connProd.php') ;
$rawdata = file_get_contents("php://input");
$data=json_decode($rawdata);
print_r($data);