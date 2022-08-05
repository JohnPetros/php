<?php

if (isset($_POST['nome']) && isset($_POST['idade'])) {
    $nome = limpaPost($_POST['nome']);
    $idade = limpaPost($_POST['idade']);
    echo "<h2>Nome: $nome <br>Idade: $idade";
}

function limpaPost($valor) {
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}
