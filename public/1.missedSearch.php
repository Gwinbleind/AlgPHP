<?php
function missedSearch (array &$myArray, int $start, int $end) {
	$middle = (int)(floor(($start + $end) / 2));
	if (!(key_exists($middle,$myArray)) || ($start >= $end)) {
		return $start + 1;
	} elseif ($middle+1 != $myArray[$middle]) {
		return missedSearch($myArray,$start,$middle);
	} else {
		return missedSearch($myArray,$middle+1,$end);
	}
}
$myArray = [];
echo "[".count($myArray)."]: ";
foreach ($myArray as $value) {
	echo $value.' ';
}
echo PHP_EOL;
echo 'missed: '.missedSearch($myArray,0,count($myArray)-1);