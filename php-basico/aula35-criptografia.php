<?php
$senha = "123456";

$novasenha = base64_encode($senha);

echo "B64: " . $novasenha . "<br>";
echo "Md5: " . md5($senha) . "<br>";
echo "Sha1: " . sha1($senha) . "<br>";

echo "<hr>";
echo "Sua senha é: " . base64_decode($novasenha);
