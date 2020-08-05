<?php
function createNumber(int $digits): string {
	if ($digits > 0) {
		$result = '';
		for ($i = 0; $i < $digits; $i++) {
			if ($i == 0) $result .= rand(1,9);
			else $result .= rand(0,9);
		}
		return $result;
	} else return '0';
}
function createFile1(int $n, int $m) {
	$file = fopen("chisla.txt","w");
	fputs($file,createNumber($n));
	fputs($file,"\r\n");
	fputs($file,createNumber($m));
	fclose($file);
}
function getDigit(string $number, int $index): int {
	if ($index >= 0 && $index < strlen($number)) {
		return (int) $number[$index];
	} else {
		return 0;
	}
}
function stringSum(string $num1, string $num2): string {
	$end1 = strlen($num1)-1;
	$end2 = strlen($num2)-1;
	$x = 0;
	$result = '';
	for ($i = 0; $i <= max($end1,$end2); $i++) {
		$x = getDigit($num1,$end1-$i) + getDigit($num2,$end2-$i) + $x;
		$y = $x % 10;
		$x = (int) floor($x / 10);
		$result = $y.$result;
	}
	if ($x <> 0) {
		$result = $x.$result;
	}
	return $result;
}
function stringMultiplicationByDigit(string $num1, int $num2): string {
	$end1 = strlen($num1)-1;
	$x = 0;
	$result = '';
	for ($i = 0; $i <= $end1; $i++) {
		$x = getDigit($num1,$end1-$i) * $num2 + $x;
		$y = $x % 10;
		$x = (int) floor($x / 10);
		$result = $y.$result;
	}
	if ($x <> 0) {
		$result = $x.$result;
	}
	return $result;
}
function stringPower(int $a, int $n): string {
	if ($a == 1) return 1;
	elseif ($n == 1) return $a;
	else {
		$result = "$a";
		for ($i = 1; $i < $n; $i++) {
			$result = stringMultiplicationByDigit($result,$a);
		}
		return $result;
	}
}
function stringMultiplication(string $num1, string $num2): string {
	$end1 = strlen($num1)-1;
	$result = '0';
	$queue = new SplQueue();
	for ($i = 0; $i <= $end1; $i++) {
		$queue->push(stringMultiplicationByDigit($num2,getDigit($num1,$end1-$i)));
	}
	$zeroes = 0;
	foreach ($queue as $value) {
		for ($i = 0; $i < $zeroes; $i++) {
			$value .= '0';
		}
		$zeroes++;
		$result = stringSum($result,$value);
	}
	return $result;
}