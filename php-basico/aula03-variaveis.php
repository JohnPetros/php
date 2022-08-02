<?php
// VARIÁVEIS
$cor = "azul";
$cor = "vermelho";
$COR = "verde";

// Não pode iniciar uma variável com números

echo $COR;


$x = 10;
$y = 5;

function teste() {
    global $x, $y, $z;
    $z = $x + $y;
    echo "<br>O valor de x dentro da função: $x";
}

teste();
echo "<br>O valor de x fora da função: $x";
echo "<br>O valor de z fora da função: $z";