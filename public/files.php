<?php
$startDir = empty($_GET['dir']) ? '/' : $_GET['dir'];

$f = new DirectoryIterator($startDir);

foreach ($f as $item):?>
<a href="/files.php?dir=<?=$startDir.$item.'/'?>"><?=$item?></a><br>
<?endforeach;?>