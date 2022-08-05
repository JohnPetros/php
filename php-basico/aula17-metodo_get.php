<?php
/* $_GET */

if (isset($_GET['nome'])) {
    $nome = htmlspecialchars($_GET['nome']);
} else {
    $nome = "Mundo!";
}

if (isset($_GET['cor'])) {
    $cor = htmlspecialchars($_GET['cor']);
} else {
    $cor = "white";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?php echo $cor ?>;
        }
    </style>
</head>

<body <?php if ($nome == "Gustavo") {
            echo "style='background:red; color:white'";
        } ?>>
    <h1><?php echo $nome ?></h1>

    <a href="aula17-metodo_get.php?nome=Pedro&cor=green" style="color: black;">Ir para Pedro</a>
    <a href="aula17-metodo_get.php?nome=Matheus&cor=yellow" style="color: black;">Ir para Matheus</a>
    <a href="aula17-metodo_get.php?nome=Lucas&cor=purple" style="color: black;">Ir para Lucas</a>
</body>

</html>