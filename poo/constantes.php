<?php
class Pessoa
{
    const nome = "João";

    public function exibirNome()
    {
        echo self::nome;
    }
}

class Joao extends Pessoa
{
    const nome = "Pedro";

    public function exibirNome()
    {
        echo parent::nome;
    }
}

$pessoa = new Joao();
$pessoa->exibirNome();
