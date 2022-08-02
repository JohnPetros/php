<?php

/* MANIPULAÇÃO DE STRINGS */

$frase = "Programação em Linguagem PHP";

// strlen() - Retorna o tamanho de uma string.
echo strlen($frase);

echo "<hr>";

// str_word_count() - Retorna o número de palavras dentro de uma string.
echo str_word_count($frase);

echo "<hr>";

// strrev - Retorna a string revertida.
echo strrev($frase);

echo "<hr>";

// strpos() - Retorna a posição numérica da primeira ocorrência de string.
echo strpos($frase, "PHP");
echo "<hr>";
var_dump(strpos($frase, "Java"));

echo "<hr>";

// str_replace() - Retorna retorna uma string ou um array com os valores modificados / substituídos.
echo str_replace("Programação", "Desenvolvimento", $frase);

echo "<hr>";

$data = "25-08-2021";
$data_formatada = str_replace("-","/", $data);
echo $data_formatada;