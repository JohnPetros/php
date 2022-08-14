<?php
/* MANIPULAÇÃO DE PASTAS (DIRETÓRIOS) */

$pasta = "nova-pasta";
$pastaDupla = "renomeado/imagem";

// COMANDO PARA CRIAR PASTA
if (!is_dir($pastaDupla)) {
    mkdir($pastaDupla, 0755, true);
} else {
    rename($pastaDupla, "movido/imagem/");
    // rmdir($pastaDupla);
}
