<?php
/* SUPERGLOBAIS

Algumas variáveis predefinidas no PHP são "superglobais", o que significa que elas são sempre acessíveis, independentemente do escopo - e você pode acessá-las a partir de qualquer função, classe ou arquivo sem ter que fazer nada de especial.

Basta invocar essas variáveis. São elas:

$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION

*/

// $GLOBALS
$a = 10;
$b = 20;

function soma(){
    $GLOBALS['c'] = $GLOBALS['a'] + $GLOBALS['b'];
    global $a, $b, $c;
    $c + $a + $b;
}

soma();
echo $c;

// $_SERVER
echo $_SERVER['PHP_SELF'];
echo "<hr>";
echo $_SERVER["SERVER_NAME"];
echo "<hr>";
echo $_SERVER["HTTP_HOST"];
echo "<hr>";
echo $_SERVER["REMOTE_ADDR"];
echo "<hr>";
echo $_SERVER["HTTP_USER_AGENT"];

foreach ($_SERVER as $chave => $valor) {
    echo "<strong>$chave</strong> : $valor <br>";
}