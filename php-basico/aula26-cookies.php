<?php
/* COOKIES (Biscoitos? 🍪)

Cookies são pequenos arquivos incorporados pelo servidor no computador do usuário. Servem para trocar dados entre o navegador do usuário e servidor da página que o criou.

Cookies têm prazo de validade.

O cookie ficará disponível pelo tempo que o desenvolvedor do site definir. Portanto, se o cookie estiver válido, ou seja, disponível, ele poderá ser acessado em seu código mesmo que o cliente feche o navegador ou desligue o computador.

Ex: Itens em um carrinho, usuário logado.

SINTAXE
- criar Cookie / Modificar / Deletar
setcookie(nome-chave, valor, validade);

- Pegar valor Cookie -
$_COOKIE['nomechave'] */

// CRIAR/MODIFICAR UM COOKIE DE NOME
setcookie('nome', 'João Pedro Carvalho', time() + (86400 * 30));
// DELETAR UM COOKIE
setcookie('nome', 'João Pedro Carvalho', time() -3600);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>
<body>
  <h1>Cookie 🍪</h1>  

  <?php if (isset($_COOKIE['nome'])) {
    $cookieNome = $_COOKIE['nome'];
    echo "O nome é $cookieNome";
  } else {
    echo "Não há nenhum cookie";
  }

  if (count($_COOKIE) > 0) {
    echo "Há cookies!";
  } else {
    echo "Não há cookies!";
  }
  ?>
</body>
</html>