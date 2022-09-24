<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: dodgerblue;
        }

        .tela-login {
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }

        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        button {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: deepskyblue;
        }
    </style>
</head>

<body>
    <a href="../home.php">Voltar</a>
    <form action="test-login.php" method="POST" class="tela-login">
        <h1>Login</h1>
        <input type="text" name="email" placeholder="email">
        <br><br>
        <input type="password" name="password" placeholder="senha">
        <br><br>
        <button type="submit" name="submit" value="enviar">Enviar</button>
    </form>
</body>

</html>