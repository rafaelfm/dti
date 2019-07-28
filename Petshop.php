<?php
require_once('Utils.php');
class Petshop {

    private $petshops = '';

    private $data;
    private $cachorrosGrandes;
    private $cachorrosPequenos;
    private $erros = [];
    private $fds;
    private $melhorPreco;

    function __construct($data, $cachorrosPequenos, $cachorrosGrandes) {
        $this->cachorrosGrandes = $cachorrosGrandes;
        $this->cachorrosPequenos = $cachorrosPequenos;
        $this->data = $data;
        $this->validaParametros();
        $this->petshops = Utils::lerArquivo();
        $this->fds = Utils::getFds($this->data);
    }

    public function getFds() {
        return $this->fds;
    }

    

    private function calculaPreco($petshop) {
        if ($this->fds) {
            if (!empty($petshop->taxa_fds)) {
                // Transforma porcentagem em valor
                $petshop->taxa_fds = floatval($petshop->taxa_fds)/100;
                $petshop->caes_grandes_fds = $petshop->caes_grandes_uteis + ($petshop->caes_grandes_uteis * $petshop->taxa_fds);
                $petshop->caes_pequenos_fds = $petshop->caes_pequenos_uteis + ($petshop->caes_pequenos_uteis * $petshop->taxa_fds);
            }
            return $this->cachorrosPequenos * $petshop->caes_pequenos_fds + $this->cachorrosGrandes * $petshop->caes_grandes_fds;
        } else {
            return $this->cachorrosPequenos * $petshop->caes_pequenos_uteis + $this->cachorrosGrandes * $petshop->caes_grandes_uteis;
        }
    }

    public function getMelhorPreco() {
        foreach ($this->petshops as $petshop) {
            $petshop->preco = $this->calculaPreco($petshop, $this->fds);
            if (empty($this->melhorPreco)) {
                $this->melhorPreco = $petshop;
            } else if ($petshop->preco < $this->melhorPreco->preco || ($petshop->preco == $this->melhorPreco->preco) && $petshop->distancia < $this->melhorPreco->distancia) {
                $this->melhorPreco = $petshop;
            }
        }
        $this->melhorPreco->preco = "R$".number_format($this->melhorPreco->preco, 2, ',', '.');
        return $this->melhorPreco;
    }

    private function validaParametros() {
        if (!DateTime::createFromFormat('d/m/Y', $this->data)) {
            $erros[] = "A data informada não está no padrão DIA/MÊS/ANO ou é inválida.";
        }
        if (!is_numeric($this->cachorrosGrandes) || $this->cachorrosGrandes < 0) {
            $erros[] = "A quantidedade de cachorros grandes informada deve ser numérica, maior ou igual a 0(zero).";
        }
        if (!is_numeric($this->cachorrosPequenos) || $this->cachorrosPequenos < 0) {
            $erros[] = "A quantidedade de cachorros pequenos informada deve ser numérica, maior ou igual a 0(zero).";
        }
        if (!empty($erros)) {
            throw new Exception(implode(PHP_EOL , $erros));
        }
    }
}