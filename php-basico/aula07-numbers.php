<?php

/* MANIPULAÇÃO DE NÚMEROS */
$valor1 = "150" + 20;
var_dump($valor1);
$valor2 = 4 * 2.5;
echo '<hr>';
var_dump($valor2);
echo '<hr>';
$valor_convertido1 = (int) $valor2;
$valor_convertido2 = (float) $valor1;
var_dump($valor_convertido1);
var_dump($valor_convertido2);
echo '<hr>';
$valor3 = "150";
$valor_convertido3 = (int) $valor3;
var_dump($valor_convertido3);
echo '<hr>';

$valor4 = 100;
$valor5 = 5.75;
$valor6 = "texto";
$valor7 = "123";
$valor8 = false;
var_dump(is_int($valor4)); // Informa se a variável é do tipo inteiro
var_dump(is_string($valor5)); // Informa se a variável é do tipo inteiro
var_dump(is_float($valor6)); // Informa se a variável é do tipo float
var_dump(is_numeric($valor7)); // Informa se a variável é um número ou uma string numérica
var_dump(is_bool($valor8)); // Verifica se a variável é um boleano