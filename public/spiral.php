<?php
$x = $_POST['x'];
$y = $_POST['y'];
$a = [];

if ($x>0 && $y>0) {
	for ($i = 0; $i<$y; $i++) {
		for ($j = 0; $j<$x; $j++) {
			$a[$i][$j] = 0;
		}
	}
	$min = (int)ceil(min($x,$y)/2);
	$start = 0;
	for ($i = 0; $i<$min; $i++) {
		// --
		// **
		for ($j = 0; $j<($x-2*$i); $j++) {
			$a[$i][$j+$i] = $start+1+$j;
		}
		$start += $x-2*$i;
		// *|
		// *|
		for ($j = 0; $j<($y-2*$i-1); $j++) {
			$a[$j+1+$i][$x-$i-1] = $start+1+$j;
		}
		$start += $y-1-2*$i;
		// **
		// --
		if (!(($i == $min-1) && ($y % 2 != 0))) {
			for ($j = 0; $j<($x-2*$i-1); $j++) {
				$a[$y-1-$i][$x-$i-2-$j] = $start+1+$j;
			}
			$start += $x-1-2*$i;
		}
		// |*
		// |*
		if (!(($i == $min-1) && ($x % 2 != 0))) {
			for ($j = 0; $j<($y-2*$i-2); $j++) {
				$a[$y-2-$i-$j][$i] = $start+1+$j;
			}
			$start += $y-2-2*$i;
		}
	}
	foreach ($a as $line) {
		foreach ($line as $item) {
			echo str_pad((string)$item,strlen((string)($x*$y)),'0',STR_PAD_LEFT).'  ';
		}
		echo '<br>';
	}
} else {
	echo 'Ошибка!';
}
