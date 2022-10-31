<?php

class Login
{
    private $email;
    private $senha;
    private $nome;

    public function __construct($email, $senha, $nome) {
        $this->nome = $nome;
        $this->setEmail($email);
        $this->setSenha($senha);
    }

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

    public function getNome()
    {
        return $this->nome;
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

$logar = new Login("teste@teste.com", "123456", "João Pedro");
$logar->Logar();
echo "<br>";
echo $logar->getEmail();
echo $logar->getSenha();
