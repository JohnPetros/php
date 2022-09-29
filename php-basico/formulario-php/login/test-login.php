<?php
session_start();

// print_r($_REQUEST);

if (
    isset($_POST['submit']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password'])
) {
    include_once('../db/config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    print_r('<br>');
    print_r('Email: ' . $email);
    print_r('<br>');
    print_r('Senha: ' . $password);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
    $result = $connect->query($sql);

    print_r($sql);
    print_r($result);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('location: index.php');
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $email;
        header('location: ../sistema/index.php');
    }

} else {
    header('location: index.php');
}
