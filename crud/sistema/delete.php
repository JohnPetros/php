<?php

if (!empty($_GET['id'])) {

    include_once('../db/config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id = $id";

    $result = $connect->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM usuarios WHERE id = $id";
        $result = $connect->query($sqlDelete);
    }
}

header('location: index.php');
