<?php
include "functions.php";

createFile1(1001,1002);
$file = fopen("chisla.txt","r+");
$num1 = trim(fgets($file));
$num2 = trim(fgets($file));
$result = stringSum($num1,$num2);
fputs($file,"\r\n");
fputs($file,$result);
fclose($file);