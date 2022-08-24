<?php
require('./database/conexao.php');

// INSERIR UM DADO NO BANCO (MODO SIMPLES - NÃO SEGURO)
// $sql = $pdo -> prepare("INSERT INTO clientes VALUES (null, 'Joao', 'joaopedro@gmail.com', '18/09/2022')");
// $sql -> execute();

// MODO CORRETO - ANTI SQL INJECTION

// $nome = "Humberto";
// $email = "email@provedor.com";
// $data = date('d-m-y');
// $sql = $pdo -> prepare("INSERT INTO clientes VALUES (null, ?, ?, ?)");
// $sql -> execute(array($nome, $email, $data));
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo Dados</title>
</head>

<body>
    <h1>Aula Inserindo Dados</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Digite seu nome" require>
        <input type="email" name="email" placeholder="Digite seu email" require>
        <button type="submit" name="salvar">Salvar</button>
    </form>
    <br>
</body>

</html>

<?php
if (isset($_POST['nome']) && isset($_POST['email'])) {
    $nome = limparPost($_POST['nome']);
    $email = limparPost($_POST['email']);
    $data = date('d-m-y');

    // VALIDAÇÕES DE CAMPO VAZIO
    if ($nome == "" || $nome == null) {
        echo "Nome não pode ser vazio";
        exit();
    }
    if ($email == "" || $email == null) {
        echo "Nome não pode ser vazio";
        exit();
    }
    // VALIDAÇÕES DE NOME E EMAIL

    // VERIFICAR SE NOME ESTÁ CORRETO
    if(!preg_match("/^[a-zA-Z-']*$/", $nome)) {
        echo "Somente permitido letras e espaços em branco para o nome";
        exit();
    }

    // VERIFICAR SE É UM EMAIL VÁLIDO
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Formato de email inválido!";
        exit();
    }

    $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?)");
    $sql->execute(array($nome, $email, $data));

    echo "Cliente inserido com sucesso!";
}