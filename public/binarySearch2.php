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