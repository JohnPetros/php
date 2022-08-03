<?php
/* 
SWITCH

A declaração switch é similar a uma série de declarações IF na mesma expressão. Em muitos casos, se deseja comparar as mesmas variáveis (ou expressões), com diferentes valores, e executar pedaços diferentes de código dependendo de qual valor ela é igual. Esta é exatamente a serventia da declaração switch.

*/

$cor = "roxo";

switch ($cor) {
    case "vermelho":
        echo "A cor é vermelho";
        break;
    case "azul":
        echo "A cor é azul";
        break;
    case "rosa":
        echo "A cor é rosa";
        break;
    case "vermelho":
        echo "A cor é vermelho";
        break;
    default:
    echo "A cor $cor não é conhecida";
}
