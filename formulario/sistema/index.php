<?php
session_start();
// print_r($_SESSION);
if (!isset($_SESSION['email'])) {
    header('location: ../login');
} else {
    $logado = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Sistema / On</title>
    <style>
        body {
            background: dodgerblue;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">SISTEMA ACESSADO</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"></button>
            <span class="navbar-toggler-icon"></span>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav><br>
    <?php
    echo "<h1>Bem vindo <strong>$logado</strong></h1>"
    ?>
</body>

</html>