<?php
// Conexão com o arquivo de banco de dados
require_once 'database/conexao2.php';

// Botão enviar
if (isset($_POST['btn-entrar'])) {
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if (empty($login) or empty($senha)) {
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
    } else {
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);
            print_r($sql);

            if (mysqli_num_rows($resultado) == 1) {
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                session_start();
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('location: aula34-login-home.php');
            } else {
                $erros[] = "<li> Usuário e senha não conferem </li>";
            };
        } else {
            $erros[] = "<li> Usuário inexistente </li>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo $erro;
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="login">login</label>
        <input type="text" name="login" id="login">
        <label for="senha">senha:</label>
        <input type="password" name="senha" id="senha">
        <button type="submit" name="btn-entrar">Entrar</button>
    </form>
</body>

</html>