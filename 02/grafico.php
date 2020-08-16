<?php
//[
//    [100, 0.00010300000000002],
//    [1000, 0.00024200000000008],
//    [10000, 0.002569],
//    [100000, 0.029884],
//    [1000000, 0.191978]
$arquivospraler = [
    'dataset-2-a.txt',
    'dataset-2-b.txt',
    'dataset-2-c.txt',
    'dataset-2-d.txt',
    'dataset-2-e.txt'];
$string = [];
$quant=0;
//print_r($quant);
$coun = count($arquivospraler);
echo "<script>sessionStorage.setItem('qtd',$coun);</script>";
foreach ($arquivospraler as $arquivo){
    $conteudo = file ("./grafico/$arquivo");
    $conteudo = str_replace("\n", "", $conteudo);
    array_push($string, $conteudo);
//    print_r($arquivo['key']);
    $conteudo = json_encode($conteudo);
    echo "<script>sessionStorage.setItem('i$quant','$conteudo');</script>";
    $quant++;
}
$result = json_encode($string);
echo "<script>window.location.assign('./');</script>";
