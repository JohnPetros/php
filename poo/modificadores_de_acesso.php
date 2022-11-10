<?php
/* 
public - fará com que não haja ocultação nenhuma, toda propriedade ou método declarado com public serão acessíveis por todos que quiserem acessá-los

protected - visibilidade protected faz com que todos os herdeiros vejam as propriedades ou métodos protegidos como se fossem métodos

private - ao contrário do public, esse modificador faz com que qualquer método ou propriedade  seja visível só e somente só pela classe que a declarou
*/

class Veiculo
{
    private $modelo;
    public $cor;
    public $ano;

    private function andar()
    {
        echo "Andou";
    }

    public function parar()
    {
        echo "Parou";
    }

    public function andou() {
        $this->andar();
    }

    public function setModelo($m)
    {
        $this->modelo = $m;
    }

    public function getModelo()
    {
        return $this->modelo;
    }
}

class Carro extends Veiculo
{
    public function ligarLimpador()
    {
        echo "Limpando...";
    }
} 

$veiculo = new Veiculo();
$veiculo->andou();
echo "<br>";
$veiculo->setModelo("HILUX");
echo $veiculo->getModelo();
echo "<br>";
print_r($veiculo);