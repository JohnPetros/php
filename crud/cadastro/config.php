<?php

$dbhost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'formulario';

$connect = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);


if ($connect->connect_errno) {
    echo "Erro";
} else {
    echo "Conexão efetuada com sucesso";
}


