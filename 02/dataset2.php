<?php
    $arquivo = file_get_contents($_GET['arq']);
    $nome = str_replace(".csv",".txt", $_GET['arq']);
    $arquivo = explode("\n", $arquivo);
    $quantidade = count($arquivo);
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
    $resultado = fopen("respostas/resposta-$nome", "w");
    fwrite($resultado, $linha1."\n");
    fwrite($resultado, $linha2."\n");
    fclose($resultado);

    $grafico = fopen("grafico/$nome", "w");
    fwrite($grafico, $quantidade."\n");
    fwrite($grafico, $linha2."\n");
    fclose($grafico);

echo "<script>window.location.assign('./');</script>";
