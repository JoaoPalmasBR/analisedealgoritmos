<?php
    $arquivo = file_get_contents($_GET['arq']);
    $nome = str_replace(".csv",".txt", $_GET['arq']);
    $arquivo = explode("\n", $arquivo);

    $horainicio = new DateTime();
    $n = $arquivo[0]; //Numero Procurado
    $t = $arquivo[1]; //Quantidade D
    array_shift($arquivo);
    array_shift($arquivo);

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
    $horafinal = new DateTime();
    $interval = $horainicio->diff($horafinal);
    $linha3 = $interval->f;

    //SAIDA
    $resultado = fopen("respostas/resposta-".$_GET['arq'], "w");
    fwrite($resultado, $linha1."\n");
    fwrite($resultado, $linha2."\n");
    fwrite($resultado, $linha3."\n");
    fclose($resultado);
