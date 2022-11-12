<?php

class Pessoa1
{
    public $idade;

    public function __clone()
    {
        echo "Clonagem de objeto <br>";
    }
}

$pessoa1 = new Pessoa1();
$pessoa1->idade = 25;

$pessoa2 = clone $pessoa1;
$pessoa2->idade = 35;

echo $pessoa2->idade;
