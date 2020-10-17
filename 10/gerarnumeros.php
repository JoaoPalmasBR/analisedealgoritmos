<?php
    $quantidade = $_GET['q'];
    $cont = 1;
    $l = [];
    while($cont <= $quantidade){
        $num = random_int(1,$quantidade*2);
        while (!in_array($num, $l)) { 
            array_push($l,$num);
            print_r("$cont - $num <br>");
            $cont = $cont + 1;
        }
    }
    //print_r($l);
    //print_r(count($l));
    //foreach($l as $item){
    //    fwrite($arq,"$item\n");
    //}
    $arq = fopen("$quantidade.txt","w");
    foreach($l as $item){
        fwrite($arq,"$item\n");
    }
    fclose($arq);