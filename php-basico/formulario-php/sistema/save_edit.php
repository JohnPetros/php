<?php

include_once('../db/config.php');

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];

    $sql = "UPDATE usuarios
            SET nome = '$name', email = '$email', senha = '$password',
             telefone = '$telephone', data_nasc = '$birthday',
             sexo = '$gender', cidade = '$city',
             estado = '$state', endereco = '$address'
             WHERE id = '$id'";

    $result = $connect->query($sql);

}
print_r($sql);

header('location: index.php');
