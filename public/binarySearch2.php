<?php
function binarySearch (array $array, int $start, int $end, int $search): int {
	$middle = (int)(floor(($start + $end) / 2));
	if (!(key_exists($middle,$array)) || ($start >= $end && $array[$middle] != $search)) {
		return -1;
	} elseif ($array[$middle] == $search) {
		return $middle;
	} elseif ($array[$middle] > $search) {
		return binarySearch($array,$start,$middle-1,$search);
	} else {
		return binarySearch($array,$middle+1,$end,$search);
	}
}

$array = [1,2,3,4,5,6];
$search = 1;
$start = 0;
$end = count($array)-1;
echo binarySearch($array,$start,$end,$search);