<?php
require('database/conexao.php');


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo Dados</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
    </style>
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
    if (!preg_match("/^[a-zA-Z-']*$/", $nome)) {
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

// SELECIONAR DADOS DA TABELA
$sql = $pdo->prepare("SELECT * FROM clientes");
$sql->execute();
$dados = $sql->fetchAll();

// EXEMPLOS COM FILTRAGEM
// $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = ?");
// $email = 'john@teste.com';
// $sql->execute(array($email));
// $dados = $sql->fetchAll();

// echo "<pre>";
// print_r($dados);
// echo "</pre>";

if (count($dados) > 0) {
    echo "<br>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            ";
    foreach ($dados as $dado) {
        echo " 
            <tr>
                <td>" . $dado['id'] . "</td>
                <td>" . $dado['nome'] . "</td>
                <td>" . $dado['email'] . "</td>
            </tr>
            ";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum cliente encontrado</p>";
}
?>


</table>
</body>

</html>