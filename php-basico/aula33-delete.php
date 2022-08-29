<?php
require('database/conexao.php');

// COMANDO PARA DELETAR
// $sql = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
// $sql->execute(array(4));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletando Dados</title>
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

        .sucesso {
            color: #0c0;
        }

        .erro {
            color: #c00;
        }

        .oculto {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Aula Deletando Dados</h1>
    <form id="form-salva" method="post">
        <input type="text" name="nome" placeholder="Digite seu nome" require>
        <input type="email" name="email" placeholder="Digite seu email" require>
        <button type="submit" name="salvar">Salvar</button>
    </form>
    <br>

    <form id="form-atualiza" class="oculto" id="form-atualiza" method="post">
        <input type="number" hidden id="id_editado" name="id_editado" placeholder="ID" require>
        <input type="text" id="nome_editado" name="nome_editado" placeholder="Editar nome" require>
        <input type="email" id="email_editado" name="email_editado" placeholder="Editar email" require>
        <button type="submit" value="atualizar" name="atualizar">Atualizar</button>
        <button type="submit" name="cancelar" id="cancelar">Cancelar</button>
    </form>

    <form id="form-deleta" class="oculto" id="form-deleta" method="post">
        <input type="number" hidden id="id_deleta" name="id_deleta" placeholder="ID" require>
        <input type="text" hidden id="nome_deleta" name="nome_deleta" require>
        <input type="email" hidden id="email_deleta" name="email_deleta" require>
        <strong>Tem certeza que quer deletar o cliente <span id="cliente"></span>?</strong>
        <button type="submit" value="atualizar" name="deletar">Confirmar</button>
        <button type="submit" name="cancelar" id="cancelar_delete">Cancelar</button>
    </form>
</body>

</html>

<?php

// PROCESSO DE DELEÇÃO
if (
    isset($_POST['deletar']) &&
    isset($_POST['id_deleta']) &&
    isset($_POST['nome_deleta']) &&
    isset($_POST['email_deleta'])
) {
    $id = limparPost($_POST['id_deleta']);
    $nome = limparPost($_POST['nome_deleta']);
    $email = limparPost($_POST['email_deleta']);

    // COMANDO PARA DELETAR
    $sql = $pdo->prepare("DELETE FROM clientes WHERE id = ? AND nome = ? AND email = ?");
    $sql->execute(array($id, $nome, $email));

    echo "<br>Cliente $nome deletado com sucesso!<br>";

}

// PROCESSO DE ATUALIZAÇÃO
if (
    isset($_POST['atualizar']) &&
    isset($_POST['id_editado']) &&
    isset($_POST['nome_editado']) &&
    isset($_POST['email_editado'])
) {
    $id = limparPost($_POST['id_editado']);
    $nome = limparPost($_POST['nome_editado']);
    $email = limparPost($_POST['email_editado']);

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

    $sql = $pdo->prepare("UPDATE clientes SET nome = ?, email = ? WHERE id = ?");
    $sql->execute(array($nome, $email, $id));

    echo "<p>Atualizado " . $sql->rowCount() . " registros!</p>";
}


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

    echo "<p class='sucesso'>Cliente inserido com sucesso!</p>";
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
                <th colspan='2'>Ações</th>
            </tr>
            ";
    foreach ($dados as $dado) {
        echo " 
            <tr>
                <td>" . $dado['id'] . "</td>
                <td>" . $dado['nome'] . "</td>
                <td>" . $dado['email'] . "</td>
                <td><a href='#' class='btn-atualizar' 
                data-id='" . $dado['id'] . "' 
                data-nome='" . $dado['nome'] . "' 
                data-email='" . $dado['email'] . "'
                >Atualizar
                </a></td>
                <td><a href='#' class='btn-deletar' 
                data-id='" . $dado['id'] . "' 
                data-nome='" . $dado['nome'] . "' 
                data-email='" . $dado['email'] . "'
                >Deletar
                </a></td>
            </tr>
            ";
    }
    echo "</table>";
} else {
    echo "<p class='erro'>Nenhum cliente encontrado</p>";
}
?>
</table>

<script>
    const linksAtualiza = document.querySelectorAll('.btn-atualizar')
    linksAtualiza.forEach(link => link.addEventListener("click", event => {
        const id = event.target.dataset.id;
        const nome = event.target.dataset.nome;
        const email = event.target.dataset.email;

        document.getElementById('form-salva').classList.add('oculto');
        document.getElementById('form-atualiza').classList.remove('oculto');
        document.getElementById('form-deleta').classList.add('oculto');

        document.getElementById('id_editado').value = id;
        document.getElementById('nome_editado').value = nome;
        document.getElementById('email_editado').value = email;

        // alert(`ID é: ${id} | nome é: ${nome} | email é: ${email}`)
    }))

    const linksDeleta = document.querySelectorAll('.btn-deletar')
    linksDeleta.forEach(link => link.addEventListener("click", event => {
        const id = event.target.dataset.id;
        const nome = event.target.dataset.nome;
        const email = event.target.dataset.email;

        document.getElementById('id_deleta').value = id;
        document.getElementById('nome_deleta').value = nome;
        document.getElementById('email_deleta').value = email;
        document.getElementById('cliente').textContent = nome;

        document.getElementById('form-salva').classList.add('oculto');
        document.getElementById('form-atualiza').classList.add('oculto');
        document.getElementById('form-deleta').classList.remove('oculto');

    }))

    document.getElementById('cancelar')
        .addEventListener('click', () => {
            document.getElementById('form-salva').classList.remove('oculto');
            document.getElementById('form-atualiza').classList.add('oculto');
            document.getElementById('form-deleta').classList.add('oculto');
        })

    document.getElementById('cancelar_delete')
        .addEventListener('click', () => {
            document.getElementById('form-salva').classList.remove('oculto');
            document.getElementById('form-atualiza').classList.add('oculto');
            document.getElementById('form-deleta').classList.add('oculto');
        })
</script>

</body>

</html>