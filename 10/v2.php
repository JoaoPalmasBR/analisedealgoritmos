<?php
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
$time_start = microtime_float();
$q = $_GET['q'];
$l = file("$q.txt"); #input
$a = 0;
while($a < count($l)) {
    $l[$a] = intval ($l[$a]);
    $a=$a+1;
}
$comparacoes = 0;
$trocas = 0;
$tempodeexecucao = 0;
$cpu = 0;
$memoria = 0;

print_r("Lista L Original:<br>");
    print_r($l);
print_r("<hr>");
usleep(100);
$j = 0;
//algoritmo
$n = count($l);
while($j < $n) {
    $comparacoes++;
    $i = $n;
    while($i < $j+1) {
        $comparacoes++;
        if($l[$i] < $l[$i-1]){
            $comparacoes++;
            $aux = $l[$i];
            $l[$i] = $l[$i-1];
            $l[$i-1] = $aux;
            $trocas++;
        }
        $i=$i+1;
    }
    $j=$j+1;
}
//algoritmo
$time_end = microtime_float();
$time = $time_end - $time_start;
$tempodeexecucao = $time;
print_r("Lista L Ordenada:<br>");
    print_r($l);
print_r("<hr>");

$memoria = memory_get_usage(true);
if ($memoria < 1024)
    echo $memoria." bytes";
elseif ($memoria < 1048576)
    echo round($memoria/1024,2)." kilobytes";
else
    echo round($memoria/1048576,2)." megabytes de memoria ($memoria) <br>";
print_r("$trocas Trocas realizadas<br>");
print_r("$comparacoes Comparacoes feitas<br>");
print_r("$tempodeexecucao s foram gastos na execucao<br>");

