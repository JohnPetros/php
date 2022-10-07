<?php
// Expressões regulares (Regular Expressions - REGEX)
// Define um padrão a ser usado para procurar ou substituior palavras ou grupos de palavras.
// ^ início de expressão, $ final da expressão - /i - case sensitive
// [] conjunto de caracteres
// {} ocorrências - ?{0, 1} *{0, } +{1, }
// /^[a-z0-9.\-\_]+@[a-z09-\_]+\.(com|br|com.br|net)$/
// /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/

$string = "contato@gmail.com";
$padrao = "/^[a-z0-9.\-\_]+@[a-z09-\_]+\.(com|br|com.br|net)$/";

if (preg_match($padrao, $string)) {
    echo "Válido";
    echo "<hr>";
    echo $string;
} else {
    echo "Inválido";
    echo "<hr>";
}


