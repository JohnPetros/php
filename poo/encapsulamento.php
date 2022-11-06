<?php
interface Controlador
{
    // Métodos abstrados
    public function ligar();
    public function desligar();
    public function abrirMenu();
    public function fecharMenu();
    public function menosVolume();
    public function maisVolume();
    public function ligarMudo();
    public function desligarMudo();
    public function play();
    public function pause();
}

class ControleRemoto implements Controlador
{
    // Atributos
    private $volume;
    private $ligado;
    private $tocando;

    // Métodos especiais
    function __construct()
    {
        $this->volume = 50;
        $this->ligado = 50;
        $this->tocando = 50;
    }

    function getVolume()
    {
        return $this->volume;
    }

    function setVolume($volume)
    {
        $this->volume = $volume;
    }

    function getLigado()
    {
        return $this->ligado;
    }

    function setLigado($ligado)
    {
        $this->ligado = $ligado;
    }

    function getTocando()
    {
        return $this->tocando;
    }

    function setTocando($tocando)
    {
        $this->tocando = $tocando;
    }

    public function ligar()
    {
        $this->setLigado(true);
    }

    public function desligar()
    {
        $this->setLigado(false);
    }

    public function abrirMenu()
    {
        echo "------ MENU --------";
        echo "<br>Está ligado?: " . $this->getLigado() ? "SIM" : "NÃO";
        echo "<br>Está TOCANDO?: " . $this->getTocando() ? "SIM" : "NÃO";
        echo "<br>vOLUME: " . $this->getVolume();
        for ($i = 0; $i <= $this->getVolume(); $i += 10) {
            echo "|";
        }
        echo "<br>";
    }

    public function fecharMenu()
    {
        echo "<br>Fechando menu...";
    }

    public function menosVolume()
    {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() + 5);
        }
    }

    public function maisVolume()
    {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() - 5);
        }  else {
            echo "<p>ERRO! Não posso aumentar o volume</p>";
        }
    }

    public function ligarMudo()
    {
        if ($this->getLigado() && $this->getVolume() > 0) {
            $this->setVolume(0);
        } else {
            echo "<p>ERRO! Não posso diminuir o volume</p>";
        }
    }

    public function desligarMudo()
    {
        if ($this->getLigado() && $this->getVolume() === 0) {
            $this->setVolume(50);
        }
    }

    public function play()
    {
        if ($this->getLigado() && !$this->getTocando()) {
            $this->setTocando(true);
        }
    }

    public function pause()
    {
        if ($this->getLigado() && $this->getTocando()) {
            $this->setTocando(false);
        }
    }
}

$controle = new ControleRemoto();
$controle->ligar();
// $controle->setVolume(20);
$controle->maisVolume();
$controle->abrirMenu();
