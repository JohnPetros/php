<?php 
session_start();
$_SESSION['nome'] = "João";
$_SESSION['profissão'] = "Estudante";

session_unset();
session_destroy();

/* SESSIONS (SESSÕES)

Uma sessão é basicamente uma forma de armazenar variáveis e compartilhar elas entre todas as páginas do seu site, enquanto o navegador estiver aberto ou até o usuário ficar inativo.

Parecido com o conceito de cookies, mas ela não cria um arquivo. A sessão fica ativa durante o uso.

Fechat o navegador ou destruir a sessão, ela se encerra.

SINTAXE

// iniciar sessão
session_start()

// criar/modificar variável de sessão
$_SESSION['nome'] = "João";
$_SESSION['profissão'] = "Estudante";

// remover todas as variáveis de sessão
session_unset(); ou $_SESSION = array();

// destruir a sessão
session_destroy();
*/

