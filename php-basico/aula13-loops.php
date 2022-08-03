<?php
/* 
LOOPS (Laços de repetição)

Usado quando você deseja que o mesmo bloco de código seja executado repetidamente um determinado número de vezes.
Em vez de adicionar várias linhas de código quase iguais em um script, podemos usar loops.

PRINCIPAIS LOOPS NO PHP

while -> repete enquanto condição for true

do...while -> executa um bloco, e depois repete o loop desde que a condição seja verdadeira

for -> repete um determinado número de vezes

foreach -> Executa algo para cada item dentro de uma matriz

*/

// WHILE
$num1 = 1;

while ($num1 <= 100){
    echo "O número é: $num1 <br>";
    $num1+=10;
}

// DO...WHILE
$num2 = 1;

do {
    echo "O numero é: $num2 <br>";
    $num2++;
} while ($num1 <= 5);


// FOR
for ($num3 = 0; $num3 <= 10; $num3++){
    echo "O número é: $num3 <br>";
}


// FOREACH
$colors = ["azul", "amarelo", "verde", "vermelho"];

foreach ($colors as $color){
    echo "A coe é $color <br>";
}
