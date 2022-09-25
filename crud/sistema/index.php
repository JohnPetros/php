<?php

session_start();
include_once('../db/config.php');

// print_r($_SESSION);
if (!isset($_SESSION['email'])) {
    header('location: ../login');
} else {
    $logado = $_SESSION['email'];
}

if (!empty($_GET['search'])) {
    $data = $_GET['search'];

    $sql = "SELECT * FROM usuarios
            WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}


$result = $connect->query($sql);

print_r($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
    <title>Sistema / On</title>
    <style>
        body {
            background: dodgerblue;
            color: white;
            text-align: center;
        }

        .table {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
            font-size: 14px;
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
    <br>
    <div class="box-search d-flex justify-content-center">
        <input type="search" id="search" class="form-control w-25" placeholder="pesquisar">
        <button onclick="searchData()" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <div class="m-5  table-bg">
        <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereco</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($userData = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $userData['id'] . "</td>";
                    echo "<td>" . $userData['nome'] . "</td>";
                    echo "<td>" . $userData['email'] . "</td>";
                    echo "<td>" . $userData['senha'] . "</td>";
                    echo "<td>" . $userData['telefone'] . "</td>";
                    echo "<td>" . $userData['sexo'] . "</td>";
                    echo "<td>" . $userData['data_nasc'] . "</td>";
                    echo "<td>" . $userData['cidade'] . "</td>";
                    echo "<td>" . $userData['estado'] . "</td>";
                    echo "<td>" . $userData['endereco'] . "</td>";
                    echo "<td>
                        <a href='edit.php?id=" . $userData['id'] . "' class='fa-solid fa-square-pen display-6'></a>
                        <a href='delete.php?id=" . $userData['id'] . "' class='fa-solid fa-trash-can display-6' style='color: #DC3545'></a>
                    </td>";
                    echo "<tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    const search = document.getElementById('search');

    function searchData() {
        location = `index.php?search=${search.value}`;
    }

    search.addEventListener('keydown', event => {
        if (event.key === 'Enter') {
            searchData();
        }
    })
</script>

</html>