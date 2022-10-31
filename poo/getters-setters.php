<?php

class Login
{
    private $email;
    private $senha;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->email = $_email . "<br>";
    }

    public function getSenha()
    {
        return $this->senha . "<br>";
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function Logar()
    {
        if ($this->email == "teste@teste.com" && $this->senha == "123456") {
            echo "Logado com sucesso";
        } else {
            echo "Dados inválidos";
        }
    }
}

$logar = new Login();
$logar->setEmail("teste/()@teste.com");
$logar->setSenha("123456");
$logar->Logar();
echo "<br>";
echo $logar->getEmail();
echo $logar->getSenha();
