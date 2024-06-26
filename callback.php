<?php
for ($i = 0; $i < 1000; $i++) {
$test=$_POST;
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($myfile, json_encode($test));
fclose($myfile);
}
?>