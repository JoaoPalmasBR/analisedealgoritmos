<?php
//    print_r($_GET);
    $arquivo = file_get_contents($_GET['arq']);
    $nome = str_replace(".csv",".txt", $_GET['arq']);
    $arquivo = explode("\n", $arquivo);
    print_r($arquivo);echo "<br>";
    $n = $arquivo[0]; //Numero Procurado
    $t = $arquivo[1]; //Quantidade D
    array_shift($arquivo);
    print_r($arquivo);echo "<br>";
    array_shift($arquivo);
    print_r($arquivo);
    echo "<br>N $n";
    echo "<br>T $t";
//    echo "<br>Novo nome $nome";
$linha1 = null;
$linha2 = null;
$linha3 = null;
if (in_array($n, $arquivo)) {
    $linha1 = 1;
} else {
    $linha1 = 0;
}
if ($a = array_search($n, $arquivo)){
    $linha2 = $a;
} else {
    $linha2 = -1;
}
    //SAIDA
    $resultado = fopen("respostas/resposta-".$_GET['arq'], "w");
    fwrite($resultado, $linha1."\n");
    fwrite($resultado, $linha2."\n");
    fwrite($resultado, $linha3."\n");
    fclose($resultado);
