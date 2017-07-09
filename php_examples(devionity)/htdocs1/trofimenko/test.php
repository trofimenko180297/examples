<?php
$begin = 12;
$end = 10;
$step = 12;
$rez = 0;

for($i=$begin; $i<=$end; $i=$i+$step)
{
    $rez = $rez + $i;
}
echo $rez;
?>