<?php
$test=$_POST;
print_r( $test );
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($myfile, json_encode($test));
fclose($myfile);
?>