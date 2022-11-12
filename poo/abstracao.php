<?php

abstract class Banco
{
    protected $saldo;
    protected $limiteSaque;
    protected $juros;

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    abstract protected function Sacar($saldo);
    abstract protected function Depositar($deposito);
}

class Itau extends Banco
{
    public function Sacar($saldo)
    {
        $this->saldo -= $saldo;
        echo "<hr> Sacou: " . $saldo;
    }
    public function Depositar($deposito)
    {
        $this->saldo += $deposito;
        echo "<hr> Depositou: " . $deposito;
    }
}

class Bradesco extends Banco
{
    public function Sacar($saldo)
    {
        $this->saldo -= $saldo;
        echo "<hr> Sacou: " . $saldo;
    }
    public function Depositar($deposito)
    {
        $this->saldo += $deposito;
        echo "<hr> Depositou: " . $deposito;
    }
}

$itau = new Itau();
$bradesco = new Bradesco();

$itau->setSaldo(1000);
echo "<hr> Saldo: " . $itau->getSaldo();
$itau->Sacar(250);
echo "<hr> Saldo: " . $itau->getSaldo();
$itau->Depositar(900);
echo "<hr> Saldo: " . $itau->getSaldo();
