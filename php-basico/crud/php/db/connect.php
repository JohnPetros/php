<?php
// Conexão com banco de dados
$severname = "localhost";
$username = "root";
$password = "";
$db_name = "crud";

$connect = mysqli_connect($severname, $username, $password, $db_name);
mysqli_set_charset($connect, "UTF-8");

// if (mysqli_connect_error()) {
//     echo "Erro na conexão: " . mysqli_connect_error();
// } else {
//     echo "Conexão bem sucedida!";
// }
