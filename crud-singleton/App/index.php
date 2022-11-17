<?php
require_once "vendor/autoload.php";

$produto = new \App\Model\Produto();
$produto->setId(8);
$produto->setNome("Notebook DELL");
$produto->setDescricao("4gb");

$produtoDao = new \App\Model\ProdutoDao();
$produtoDao->update($produto);
$produtoDao->create($produto);
$produtoDao->read($produto);
$produtoDao->delete(4);

foreach ($produtoDao->read() as $produto) {
    echo $produto["nome"] . "<br>" . $produto["descricao"] . "<hr>";
}

var_dump($produto);
