<?php
/* MANIPULANDO DATAS E HORA - date() */

// DATA COMPLETA
echo date('d/m/y');
echo "<br>";

// HORA
echo date("H:i:s");

// PADRÃO BRASILEIRO DE DATAS
// dia/mês/ano

// PADRÃO AMERICANO DE DATAS
// ano/mês/dia
// 2022/08/13

// CALCULAR DIAS ENTRE DATAS
$hoje = date('Y-m-d');
$vencimento = '2022-10-15';

$diferenca = strtotime($vencimento) - strtotime($hoje);

$dias = floor($diferenca) / (60*60*24);

// CONVERÇÃO PARA PADRÃO BR
$venc = explode('-', $vencimento);
$venc_formatado = $venc[2] . "/" . $venc[1] . "/" . $venc[0];

$data_hoje = explode('-', $hoje);
$hoje_formatado = $data_hoje[2] . "/" . $data_hoje[1] . "/" . $data_hoje[0];

echo "<br>Vencimento: $venc_formatado";
echo "<br>Hoje: $hoje_formatado";
echo "<br>A diferença entre as datas é $dias dias";

echo "<br><br>";

// COMPARAR DUAS DATAS MAIOR OU MENOR
$data1 = date('Y-m-d');
$data2 = "2022-05-20";

if (strtotime($data1) > strtotime($data2)) {
    echo "Vencido! <br>";
} elseif(strtotime($data2) == strtotime($data1)) {
    echo "Vence hoje! <br>";
} else {
    echo "Tudo tranquilo! <br>";
}