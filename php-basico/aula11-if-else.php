<?php
/*
 
IF ELSE ELSEIF

if (condição) {
    o que acontece se condição for verdadeira
} else {
    o que acontece se condição for falso
}

if (condição) {
    o que acontece se condição for verdadeira
} elseif {
     o que acontece se a primeira condição for falso e essa for verdadeira
} else {
    o que acontece se todas as condições forem falso
}

*/

$hora = 20;

if ($hora >= 12) {
    echo "Boa dia!";
} elseif ($hora < 18) {
    echo "Bom tade!";
} else {
    echo "Boa noite!";
}