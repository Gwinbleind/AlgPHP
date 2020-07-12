<?php
$number = $_POST['number'];

$dividers = new SplQueue();
$q = new SplQueue();

//Наше число нечетное, можем начинать с 3 и шагать через 2
while ($number > 1) {
	while (true) {
		$first = $q->isEmpty() ? 3 : $q->top(); //в следующий раз начинаем с последнего делителя
		for ($i = $first; $i*$i < $number; $i+=2) {
			if ($number % $i == 0) {
				$number /= $i;
				$q->push($i);
				break 2;
			}
		}
		$q->push($number);
		break 2;
	}
}
$s = '';
foreach ($q as $item) {
	$s .= $item . ' ';
}
?>
<p>Простые делители числа: <?=$s?></p>
<h3>Результат</h3>
<?=$q->top()?>