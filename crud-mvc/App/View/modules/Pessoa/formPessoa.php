<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label,
        input {
            display: block;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>Cadastro de Pessoa</legend>
        <form method="post" action="/pessoa/form/save">
            <input type="hidden" name="id" value="<?= $model->id ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $model->nome ?>" />

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="<?= $model->cpf ?>" />

            <label for="data_nascimento">Data de nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="<?= $model->data_nascimento ?>" />

            <button type="submit">Salvar</button>
        </form>
    </fieldset>
</body>

</html>