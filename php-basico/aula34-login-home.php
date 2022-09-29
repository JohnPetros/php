<?php
// Conexão com o arquivo de banco de dados
require_once 'database/conexao2.php';

// Sessão
session_start();

// Verificação
if (!isset($_SESSION['logado'])) {
    header('location: aula34-login.php');
}

// Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Home</title>
</head>

<body>
    <h1>Olá <?php echo $dados['nome'] ?></h1>
    <a href="aula34-logout.php">Sair</a>
</body>

</html>