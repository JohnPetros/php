<?php
class Login_
{
    public static $user;

    public static function verificaLogin()
    {
        echo "O usuário " . self::$user . " está logado!";
    }

    public function sairSistema()
    {
        echo "O usuário deslogou";
    }
}

Login_::$user = "admin";
Login_::verificaLogin();

echo "<br>";

$login = new Login_();
$login->sairSistema();
