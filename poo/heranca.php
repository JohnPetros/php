<?php
/* Herança é um recurso que permite que classes compartilhem atributos e métodos a fim de raproveitar códigos ou comportamentos generalizados*/

class Veiculo
{
    public $modelo;
    public $cor;
    public $ano;

    public function andar()
    {
        echo "Andou";
    }

    public function parar()
    {
        echo "Parou";
    }
}

class Carro extends Veiculo
{
    public function ligarLimpador()
    {
        echo "Limpando...";
    }
}

class Moto extends Veiculo
{
    public function darGrau()
    {
        echo "Dando grau...";
    }
}

$carro = new Carro();
$carro->modelo = "Gol";
$carro->cor = "Vermelho";
$carro->ano = 2018;
$carro->andar();
echo "<br>";
$carro->ligarLimpador();
echo "<br>";
print_r($carro);

echo "<hr>";

$moto = new Moto();
$moto->modelo = "Honda Biz";
$moto->cor = "Azul";
$moto->ano = 2017;
$moto->parar();
echo "<br>";
$moto->darGrau();
echo "<br>";
print_r($moto);
