<?php

require 'binarySearch2.php';
function binaryLeftSideSearch(array &$array, int $start, int $end):int {
	$middle = (int)(floor(($start + $end) / 2));
	$search = $array[$end];
	$next = $middle-1;
	$isOn = key_exists($next,$array) && $array[$next] != $search;
	$isOut = $array[$middle] != $search;
	if (!(key_exists($middle,$array)) || ($start >= $end)) // && $array[$middle] == $search
		//Ошибка с краями
		return $start;
	elseif ($isOut)
		//За искомой границей
		return binaryLeftSideSearch($array,$middle+1,$end);
	elseif ($isOn)
		//На искомой границе
		return $middle;
	else
		//Внутри искомой границы
		return binaryLeftSideSearch($array,$start,$middle-1);
}
function binaryRightSideSearch(array &$array, int $start, int $end):int {
	$middle = (int)(floor(($start + $end) / 2));
	$search = $array[$start];
	$next = $middle+1;
	$isOn = !key_exists($next,$array) || $array[$next] != $search;
	$isOut = $array[$middle] != $search;
	if (!(key_exists($middle,$array)) || ($start >= $end)) // && $array[$middle] == $search
		//Ошибка с краями
		return $end;
	elseif ($isOut)
		//За искомой границей
		return binaryRightSideSearch($array,$start,$middle-1);
	elseif ($isOn)
		//На искомой границе
		return $middle;
	else
		//Внутри искомой границы
		return binaryRightSideSearch($array,$middle+1,$end);
}
function repeatSearch(array &$array, int $search): int {
	if ($array[0] == $search && $array[count($array)-1] == $search) return count($array);
	else {
		$index = binarySearch($array,0,count($array)-1,$search);
		if (!($index+1)) return 0;
		else {
			if ($array[$index] != $array[$index+1])
				$right = $index;
			else
				$right = binaryRightSideSearch($array,$index+1,count($array)-1);
			if ($array[$index] != $array[$index-1])
				$left = $index;
			else
				$left = binaryLeftSideSearch($array,0,$index-1);
			return $right-$left+1;
		}
	}
}

//$myArray = [1,1,1,1,2,3,3,3,3,5,5,6,6,6,7,9,10,10,10];
$myArray = [2,2,2,2];
echo "count ".repeatSearch($myArray,2);