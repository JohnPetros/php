<?php
/* $_GET */
if (isset($_GET['nome'])&&isset($_GET['idade'])){
    $nome = $_GET['nome'];
    $idade = $_GET['idade'];
    echo "<h1>O nome é $nome e a idade $idade</h1>";
};
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     
    </style>
</head>

<body>
  
    <form method="post" action="aula19-recebe_post.php">
        <input type="text" name="nome" placeholder="Digite seu nome"><br>
        <input type="text" name="idade" placeholder="Digite sua idade aqui"><br>
        <hr><button type="submit">Enviar</button>
    </form>

  


</body>
</html>