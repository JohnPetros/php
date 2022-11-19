<?php

require_once "Pessoa.php";
require_once "Aluno.php";
require_once "Professor.php";
require_once "Funcionario.php";

$p1 = new Pessoa();
$p2 = new Aluno();
$p3 = new Professor();
$p4 = new Funcionario();

$p1->setNome("Pedro");
$p2->setNome("Maria");
$p3->setNome("Cládio");
$p4->setNome("Fabiana");

$p2->setCurso("Informática");
$p3->setSalario(2500.75);
$p4->setSetor("Estoque");

$p1->setSexo("M");
$p3->setSexo("F");

// $p1->receberAumento(550.20);
// $p2->mudarTrabalho();
// $p4->cancelarTrabalho();

print_r($p1);
echo "<hr>";
print_r($p2);
echo "<hr>";
print_r($p3);
echo "<hr>";
print_r($p4);


