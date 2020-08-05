<?php
include "functions.php";

$a = 9; //1..9
$n = 1000; //1..1000

$file = fopen("otvet.txt","w");
fputs($file,"$a^($n) = ".stringPower($a,$n));
fclose($file);