<?php

spl_autoload_register(function ($nome_da_classe) {
     // echo "Tentou dar include de: $nome_da_classe <hr>";

     $arquivo = BASEDIR . $nome_da_classe . '.php';

     if (file_exists($arquivo)) {
          include $arquivo;
     } else {
          exit("Arquino não encontrado. Arquivo: " . $arquivo);
     }
});
