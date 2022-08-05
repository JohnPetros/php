<?php
/* ARRAYS (Matrizes) */

$carros = array("Fusca", "Uno", "Gol");
$carros = ["Fusca", "Uno", "Gol"];

$carros[1] = "Ferrari";

echo $carros[1] . "<br> a quantidade de elementos na matriz é: ". count($carros) . "<hr>"; 

$qtd = count($carros);

for ($i = 0; $i < $qtd; $i++){
    echo $carros[$i] . "<br>";
}

echo "<hr>";

foreach ($carros as $carro){
    echo $carro . "<br>";
}

echo "<hr>";

$idade = array("João" => "30", "Maria" => "15", "Pedro" => "20");

$idade["João"] = "50";
echo $idade["Maria"];
echo "<br>" . $idade["João"] . "<br>";

foreach ($idade as $chave => $valor) {
    echo "O nome é $chave e sua idade é $valor <br>";
}

echo "<hr>";

$carros = array("Fusca", "Uno", "Gol", "Fusion", "Prisma", "Brasilia");
sort($carros);
foreach ($carros as $carro) {
    echo $carro . "<br>";
}

echo "<hr>";

$numeros = array(10, 15, 3, 8, 200, 7);
rsort($numeros);
foreach ($numeros as $numero) {
    echo $numero . "<br>";
}

echo "<hr>";

$idades = array("Yuri" => 30, "Maria" => 15, "Pedro" => 20);
asort($idade);
foreach ($idades as $idade) {
    echo $idade . "<br>";
}
foreach ($idades as $pessoa => $idade) {
    echo $pessoa . "<br>";
}
echo "<hr>";

arsort($idades);
foreach ($idades as $pessoa => $idade) {
    echo $idade . "<br>";
}
echo "<hr>";


ksort($idades);
foreach ($idades as $pessoa => $idade) {
    echo $pessoa . "<br>";
}
echo "<hr>";
