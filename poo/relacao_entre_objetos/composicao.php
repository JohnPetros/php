<?php
// Composição
// Na composição, uma classe cria a instância de outra classe dentro de si própria, sendo assim, quando ela for destruída, a o outra classe também será

class Pessoa_ {
    public function atribuiNome($nome) {
        return "O nome da pessoa é " . $nome;
    }
}

class Exibe {
    public $pessoa;
    public $nome;

    function __construct($nome) {
        $this->pessoa = new Pessoa_();
        $this->nome = $nome;
    }

    public function exibeNome() {
        echo $this->pessoa->atribuiNome($this->nome);
    }
}

$exibe = new Exibe("João");
$exibe->exibeNome();