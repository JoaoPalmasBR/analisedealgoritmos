<?php
    $arquivo = file_get_contents($_GET['arq']);
    $nome = str_replace(".csv",".txt", $_GET['arq']);
    $arquivo = explode("\n", $arquivo);
    $maior = null;
    $horainicio = new DateTime();

    foreach ($arquivo as $numero){
        if($numero>$maior){
            $maior=$numero;
        }
    }
    $horafinal = new DateTime();
    $linha1 = $maior;
    $interval = $horainicio->diff($horafinal);
    $linha2 = $interval->f;

    //SAIDA
    $resultado = fopen("respostas/resposta-".$_GET['arq'], "w");
    fwrite($resultado, $linha1."\n");
    fwrite($resultado, $linha2."\n");
    fclose($resultado);
