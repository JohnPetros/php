<?php
$erroNome = '';
$erroEmail = '';
$erroSenha = '';
$erroRepeteSenha = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // VERIFICAR SE ESTÁ VAZIO O POST NOME
  if (empty($_POST['nome'])) {
    $erroNome = "Por favor, preencha um nome";
  } else {
    // PEGAR O VALOR VINDO DO POST E LIMPAR
    $nome = LimpaPost($_POST['nome']);

    // VERIFICAR SE TEM SOMENTE LETRAS
    if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
      $erroNome = "Apenas aceitamos letras e espaços!";
    }
  }

  // VERIFICAR SE ESTÁ VAZIO O POST EMAIL
  if (empty($_POST['email'])) {
    $erroEmail = "Por favor, preencha um e-mail!";
  } else {
    // PEGAR O VALOR VINDO DO POST E LIMPAR
    $email = LimpaPost($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erroEmail = "E-mail inválido";
    }
  }

  // VERIFICAR SE ESTÁ VAZIO O POST SENHA
  if (empty($_POST['senha'])) {
    $erroSenha = "Por favor, informe uma senha!";
  } else {
    // PEGAR O VALOR VINDO DO POST E LIMPAR
    $senha = LimpaPost($_POST['senha']);
    if (strlen($senha) < 6) {
      $erroSenha = "A senha precisa ter no mínimo 6 dígitos!";
    }
  }

  // VERIFICAR SE ESTÁ VAZIO O POST REPETE-SENHA
  if (empty($_POST['repete_senha'])) {
    $erroRepeteSenha = "Por favor, repita a senha!";
  } else {
    // PEGAR O VALOR VINDO DO POST E LIMPAR
    $repete_senha = LimpaPost($_POST['repete_senha']);
    if ($repete_senha != $senha) {
      $erroRepeteSenha = "As senhas não estão iguais!";
    }
  }

  if (($erroNome=='') && ($erroEmail=='') && ($erroSenha=='') && ($erroRepeteSenha=='')) {
    header('Location: obrigado.php');
  }
}
function limpaPost($valor)
{
  $valor = trim($valor);
  $valor = stripslashes($valor);
  $valor = htmlspecialchars($valor);
  return $valor;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validação de Formulário</title>
  <link href="css/estilo.css" rel="stylesheet">
</head>

<body>
  <main>
    <h1><span>AULA PHP</span><br>Validação de Formulário</h1>

    <form method="post">

      <!-- NOME COMPLETO -->
      <label> Nome Completo </label>
      <input type="text" name="nome" <?php if(empty($_POST["nome"])) echo "class='invalido'";  ?> placeholder="Digite seu nome" require <?php if(!empty($_POST["nome"])) echo "value='".$_POST["nome"]."'"?>>
      <br><span class="erro"><?php echo $erroNome; ?></span>

      <!-- EMAIL -->
      <label> E-mail </label>
      <input type="email" name="email" <?php if(empty($_POST["email"])) { echo "class='invalido'"; } ?> placeholder="email@provedor.com" require <?php if(!empty($_POST["email"])) echo "value='".$_POST["email"]."'"?>>
      <br><span class="erro"><?php echo $erroEmail; ?></span>

      <!-- SENHA -->
      <label> Senha </label>
      <input type="password" name="senha" <?php if(empty($_POST["senha"])) { echo "class='invalido'"; } ?> placeholder="Digite uma senha" require <?php if(!empty($_POST["senha"])) echo "value='".$_POST["senha"]."'"?>>
      <br><span class="erro"><?php echo $erroSenha; ?></span>

      <!-- REPETE SENHA -->
      <label> Repete Senha </label>
      <input type="password" name="repete_senha" <?php if(empty($_POST["repete_senha"])) { echo "class='invalido'"; } ?> placeholder="Repita a senha" require <?php if(!empty($_POST["repete_senha"])) echo "value='".$_POST["repete_senha"]."'"?>>
      <br><span class="erro"><?php echo $erroRepeteSenha; ?></span>

      <button type="submit"> Enviar Formulário </button>

    </form>
  </main>
</body>

</html>