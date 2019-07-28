<?php
require_once('Petshop.php');
try {
    $petshot = (new Petshop($argv[1],$argv[2],$argv[3]))->getMelhorPreco();
    echo $petshot->nome ." ". $petshot->preco;
} catch (Exception $e) {
	echo nl2br($e->getMessage());
}