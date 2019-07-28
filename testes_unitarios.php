<?php
require_once('Utils.php');
require_once('Petshop.php');
$status = "";


$data = "2019-01-01";
$fds = false;
$caesPequenos = null;
$caesGrandes = "cavalo";
try {
    Utils::lerArquivo();
    $status = "SUCESSO";
} catch (Exception $e) {
    $status = "FALSE";
}

echo "LER ARQUIVO JSON : ".$status.PHP_EOL;


$data = "2019-01-01";
$fds = false;
$caesPequenos = null;
$caesGrandes = "cavalo";
try {
    $petshop = new Petshop($data,$caesPequenos,$caesGrandes); 
    $status = "FALSE";
} catch (Exception $e) {
    $erros[] = "A data informada não está no padrão DIA/MÊS/ANO ou é inválida.";
    $erros[] = "A quantidedade de cachorros grandes informada deve ser numérica, maior ou igual a 0(zero).";
    $erros[] = "A quantidedade de cachorros pequenos informada deve ser numérica, maior ou igual a 0(zero).";
    if(implode(PHP_EOL , $erros) == $e->getMessage()){
        $status = "SUCESSO";
    } else {
        $status = "FALSE";
    }
}

echo "INPUT DE DADOS: ".$status.PHP_EOL;


$data = "28/07/2019";
$fds = true;
$caesPequenos = 1;
$caesGrandes = 1;
$petshopEsperado = "Meu Canino Feliz";
$precoEsperado = "R$72,00";

$petshop = new Petshop($data,$caesPequenos,$caesGrandes);
$melhorPreco = $petshop->getMelhorPreco();
if($melhorPreco->nome == $petshopEsperado && $melhorPreco->preco == $precoEsperado && $petshop->getFds() == $fds){
    $status = "SUCESSO";
} else {
    $status = "FALSE";
}

echo "CASO 1: ".$status.PHP_EOL;


$data = "28/07/2019";
$fds = true;
$caesPequenos = 1;
$caesGrandes = 2;
$petshopEsperado = "ChowChawgas";
$precoEsperado = "R$120,00";
$petshop = new Petshop($data,$caesPequenos,$caesGrandes);
$melhorPreco = $petshop->getMelhorPreco();
if($melhorPreco->nome == $petshopEsperado && $melhorPreco->preco == $precoEsperado && $petshop->getFds() == $fds){
    $status = "SUCESSO";
} else{
    $status = "FALSE";
}

echo "CASO 2: ".$status.PHP_EOL;


$data = "29/07/2019";
$fds = false;
$caesPequenos = 2;
$caesGrandes = 1;
$petshopEsperado = "Vai Rex";
$precoEsperado = "R$80,00";
$petshop = new Petshop($data,$caesPequenos,$caesGrandes); 
$melhorPreco = $petshop->getMelhorPreco();
if($melhorPreco->nome == $petshopEsperado && $melhorPreco->preco == $precoEsperado && $petshop->getFds() == $fds){
    $status = "SUCESSO";
} else{
    $status = "FALSE";
}

echo "CASO 3: ".$status.PHP_EOL;