<?php

class Pessoa {
    public $nome;
    public $idade;

    public function Falar() {
        echo "$this->nome de $this->idade anos acabou de falar";
    }
}

$joao = new Pessoa();
$joao->nome = "João Pedro Carvalho dos Santos";
$joao->idade = 20;
$joao->Falar();
echo "<hr>";
var_dump($joao);
echo "<hr>";
echo $joao->nome;