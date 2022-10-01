<?php
$senha = "123456";

$options = [
    'cost' => 10,
];

$senhaSegura = password_hash($senha, PASSWORD_DEFAULT, $options);
echo $senhaSegura;


$senha_db = '$2y$10$T/aaBM7IHOKuVeWAqv.R.enfoxqxoqxRb8vAiEax937ZoaxFc/a8a';

if(password_verify($senha, $senha_db)) {
    echo "<br> senha válida";
} else {
    echo "<br> senha inválida";
}