<?php

if (isset($_POST['submit'])) {
  // print_r($_POST['name']);
  // print_r($_POST['email']);
  // print_r($_POST['telephone']);

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $telephone = $_POST['telephone'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $address = $_POST['address'];

  echo $name, $email, $password, $telephone, $gender, $birthday, $city, $state, $address;

  include_once('config.php');

  $sql = "INSERT INTO usuarios (nome, email, senha, telefone, sexo, data_nasc, cidade, estado, endereco) VALUES ('$name', '$email', '$password', '$telephone', '$gender', '$birthday', '$city', '$state', '$address')";
  $result = mysqli_query($connect, $sql);

  print_r($result);

  header('location: ../login');

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulário de Clientes</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<a href="../home.php">Voltar</a>
  <div class="box">
    <form action="" method="POST">
      <fieldset>
        <legend><strong>Formulário de Clientes</strong></legend>
        <br />
        <div class="inputBox">
          <input type="text" name="name" id="name" class="inputUser" required />
          <label for="name" class="labelInput">Nome Completo</label>
        </div>
        <div class="inputBox">
          <input type="email" name="email" id="email" class="inputUser" required />
          <label for="email" class="labelInput">Email</label>
        </div>
        <div class="inputBox">
          <input type="password" name="password" id="password" class="inputUser" required />
          <label for="password" class="labelInput">Senha</label>
        </div>
        <div class="inputBox">
          <input type="tel" name="telephone" id="telephone" class="inputUser" required />
          <label for="telephone" class="labelInput">Telefone</label>
        </div>
        <p>Sexo:</p>
        <br>
        <input type="radio" id="female" name="gender" value="feminino" required>
        <label for="female">Feminino</label><br>
        <input type="radio" id="male" name="gender" value="masculino" required>
        <label for="male">Masculino</label><br>
        <input type="radio" id="other" name="gender" value="other" required>
        <label for="other">Outro</label>
        <br><br>
        <label for="birthday"><strong>Data de Nascimento</strong></label>
        <input type="date" id="birthday" name="birthday" id="birthday" required />
        <div class="inputBox">
          <input type="text" name="city" id="city" class="inputUser" required />
          <label for="city" class="labelInput">Cidade</label>
        </div>
        <div class="inputBox">
          <input type="text" name="state" id="state" class="inputUser" required />
          <label for="state" class="labelInput">Estado</label>
        </div>
        <div class="inputBox">
          <input type="text" name="address" id="address" class="inputUser" required />
          <label for="address" class="labelInput">Endereço</label>
        </div>
        <button type="submit" name="submit" id="submit">Enviar</button>
      </fieldset>
    </form>
  </div>
</body>

</html>