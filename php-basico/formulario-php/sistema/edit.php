<?php

if (!empty($_GET['id'])) {

    include_once('../db/config.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id = $id";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($userData = mysqli_fetch_assoc($result)) {
            $name = $userData['nome'];
            $email = $userData['email'];
            $password = $userData['senha'];
            $telephone = $userData['telefone'];
            $birthday = $userData['data_nasc'];
            $gender = $userData['sexo'];
            $city = $userData['cidade'];
            $state = $userData['estado'];
            $address = $userData['endereco'];
        }
    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulário de Clientes</title>
    <link rel="stylesheet" href="../cadastro/style.css?v=<?php echo time() ?>">
</head>

<body>
    <a href="index.php">Voltar</a>
    <div class="box">
        <form action="save_edit.php" method="POST">
            <fieldset>
                <legend><strong>Formulário de Clientes</strong></legend>
                <br />
                <div class="inputBox">
                    <input type="text" name="name" id="name" class="inputUser" value="<?php echo $name ?>" required />
                    <label for="name" class="labelInput">Nome Completo</label>
                </div>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required />
                    <label for="email" class="labelInput">Email</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="password" id="password" class="inputUser" value="<?php echo $password ?>" required />
                    <label for="password" class="labelInput">Senha</label>
                </div>
                <div class="inputBox">
                    <input type="tel" name="telephone" id="telephone" class="inputUser" value="<?php echo $telephone ?>" required />
                    <label for="telephone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <br>
                <input type="radio" id="female" name="gender" value="feminino" <?php echo $gender == 'feminino' ? 'checked' : '' ?> required>
                <label for="female">Feminino</label><br>
                <input type="radio" id="male" name="gender" value="masculino" <?php echo $gender == 'masculino' ? 'checked' : '' ?> required>
                <label for="male">Masculino</label><br>
                <input type="radio" id="other" name="gender" <?php echo $gender == 'outro' ? 'checked' : '' ?> value="outro" required>
                <label for="other">Outro</label>
                <br><br>
                <label for="birthday"><strong>Data de Nascimento</strong></label>
                <input type="date" id="birthday" name="birthday" id="birthday" value="<?php echo $birthday ?>" required />
                <div class="inputBox">
                    <input type="text" name="city" id="city" class="inputUser" value="<?php echo $city ?>" required />
                    <label for="city" class="labelInput">Cidade</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="state" id="state" class="inputUser" value="<?php echo $state ?>" required />
                    <label for="state" class="labelInput">Estado</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="address" id="address" class="inputUser" value="<?php echo $address ?>" required />
                    <label for="address" class="labelInput">Endereço</label>
                </div>
                <input type="text" hidden name="id" value="<?php echo $id ?>">
                <button type="submit" name="update" id="update">Enviar</button>
            </fieldset>
        </form>
    </div>
</body>

</html>