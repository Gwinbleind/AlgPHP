<?php

use app\modules\MyStack;

include '../modules/MyStack.php';
include '../modules/MyStackElement.php';


$close = [
	'(' => ')',
	'[' => ']',
	'{' => '}',
	'"' => '"',
	"'" => "'"
];
$open = array_keys($close);
$input = <<<INPUT
"(")
INPUT;

$s = new MyStack();
//$s = new SplStack();
try {
	while (!empty($input)) {
		$char = $input[0];
		if (in_array($char,$open)) {
			$s->push($char);
		} elseif (in_array($char, $close)) {
			if ($s->isEmpty()) {
				throw new RuntimeException('Miss open bracket', 0);
			}
			if ($close[$s->top()] == $char) {
				$s->pop();
			} else throw new RuntimeException('Brackets Mismatch',1);
		}
		$input = substr_replace($input,'',0,1);
	}
	if (!$s->isEmpty()) {
		throw new RuntimeException('Miss close bracket',2);
	}
	echo 'true';
}
catch (RuntimeException $e) {
	echo 'false: ' . $e->getMessage();
}
