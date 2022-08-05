<?php
/* FUNÇÕES functions() */

function escreverMensagem($nome){
    echo "Olá, tudo bom $nome? <br>";
}

function soma(int $valor1, int $valor2){
    return $valor1 + $valor2 . '<hr>';
}

function fazerCafe($tipo = "cappuccino"){
    return "Fazendo uma xícara de: $tipo <hr>";
}

// CALL OU CHAMAR FUNÇÃO
escreverMensagem("João Pedro");
escreverMensagem("Maria");
escreverMensagem("Lucas");
escreverMensagem("Kaio");

echo soma(10, "30 anos");
echo fazerCafe();
