<?php
function binarySearch (array $array, int $start, int $end)
{
	$middle = floor(($start - $end) / 2);
	$middle = $middle < $array;
	if (!(key_exists($middle,$array)) || ($start >= $end && $array[$middle] != $search)) {
		return 'Элемент отсутствует';
	} elseif ($array[$middle] == $search) {
		return $middle;
	} elseif ($array[$middle] > $search) {
		return binarySearch($array,$start,$middle-1);
	} else {
		return binarySearch($array,$middle+1,$end);
	}
}

$array = [1,2,3,4,5,6];
$search = 1;
$start = 0;
$end = count($array)-1;
echo binarySearch($array,$start,$search);