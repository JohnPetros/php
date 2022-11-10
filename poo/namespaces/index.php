<?php

require "classes/produto.php";
require "models/produto.php";

use models\Produto as productModel;

$produto = new ProductModel();
$produto->mostrarMaisDetalhes();

echo "<hr>";

$produto = new \classes\Produto();
$produto->mostrarMaisDetalhes();
