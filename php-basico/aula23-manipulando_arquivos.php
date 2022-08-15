<?php
/* MANIPULAÇÃO DE ARQUIVOS */
// fopen() -> Abrir / Criar
// fwrite() -> Escrever no arquivo
// fclose() -> Fechar o arquivo
// feof() -> Durante leitura de um arquivo avisa que chegou no final
// fgets() -> Pega cada linha de um arquivo até o máximo de 1024b
// file_put_contents() -> Cria / Sobrescreve um arquivo
// file_get_contents() -> Pega todo o conteúdo de uma string
// unlike() -> Deleta um arquivo
// copy() -> Copia um arquivo

$pasta = "arquivos/";

if (!is_dir($pasta)) {
    mkdir($pasta, 0755);
}

$nome_arquivo = date('y-m-d-H-i-s').".txt";
echo $nome_arquivo . "<br>";

$arquivo = fopen($pasta.$nome_arquivo, 'a+');
fwrite($arquivo, 'Linha 1 injetada pelo PHP' . PHP_EOL);
fwrite($arquivo, 'Linha 2 injetada pelo PHP' . PHP_EOL);
fwrite($arquivo, 'Linha 3 injetada pelo PHP' . PHP_EOL);
fclose($arquivo);

$caminhoArquivo = $pasta.$nome_arquivo;

if (file_exists($caminhoArquivo) && is_file($caminhoArquivo)) {
    $abrirArquivo = fopen($caminhoArquivo, 'r');

    // while(!feof($abrirArquivo)) {
    //     echo fgets($abrirArquivo) . "<br>";
    // }
    
    // fclose($abrirArquivo);

    echo file_get_contents($caminhoArquivo) . "<br>";
}

if (is_dir($pasta)) {
    foreach(scandir($pasta) as $arquivo) {
        $caminho = $pasta.$arquivo;
        if (is_file($caminho)) {
            unlink($caminho);
        }
    }

    rmdir($pasta);
}

copy('teste.txt', 'teste2.txt');

$arquivoHTML = "teste.html";
$titulo = "<h1>João Pedro</h1>";
file_put_contents($arquivoHTML, '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>'
    .$titulo.
'</body>
</html>
');