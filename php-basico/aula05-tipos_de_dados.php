<?php
/* 
TIPOS DE DADOS
String, [Palavras]
Integer, [Inteiro, sendo qualquer número não decimal]
Float, [Decimal]
Boolean, [Booleano - true e false (Verdadeiro e falso)]
Array, [Matriz]
Object, [Objeto]
NULL [Nulo]
*/

// STRING
$string = "João";

//INTEGER
$integer1 = 354;
$integer2 = -100;
$integer3 = $integer1 + $integer2;

echo $integer3. '<br>';

var_dump($string);
var_dump($integer1);

// FLOAT
$float = 3.5;

var_dump($float);

// BOOLEAN
$professor_bonitao = true;
var_dump($professor_bonitao);

// ARRAY (MATRIZES)
$carros = array("Fusca", "Brasilia", "Chevete");
var_dump($carros);

// OBJECT (OBJETO)
class Carro {
    public $cor;
    public $modelo;
    public function __construct($cor, $modelo){
        $this -> cor = $cor;
        $this -> modelo = $modelo;
    }
    public function mensagem(){
        return "O carro é $this->cor e o modelo é $this->modelo";
    }
}

$carro1 = new Carro("Branco", "Fusca");
$carro2 = new Carro("vermelho", "Ferrari");

echo $carro1 -> mensagem();
echo $carro2 -> mensagem();

// NULL (nulo)

$x = null;
var_dump($x);