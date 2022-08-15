<?php
/*JSON - "JavaScript Object Notation"

JSON é basicamente um formato leve de
troca de informações/dados entre sistemas.

Basicamente consiste em transformar dados
como um objeto ou uma matriz em texto e o
contrário também, transformar um texto em
um objeto ou uma matriz.

É a forma mais utilizada atualmente para
trocar dados entre sistemas.

Embora tenha Javascript no nome, 
por que originalmente foi feito pensando em
aplicações Javascript, o JSON é um padrão
de transmissão de dados aceito em praticamente
TODAS as liguagens atuais, não só Javascript.
Isso inclui o PHP.

Trocando em miúdos, de uma forma fácil de
entender: Podemos dizer que JSON é uma 
espécie de padrão, um conversor para 
transmitir dados.

Como funciona?

Toda informação enviada ou recebida entre
aplicações SEMPRE precisa ser um texto.

Por isso, todo objeto ou matriz que vai
ser enviado primeiro tem que ser transformado
em texto.

Quem faz esse trabalho? O JSON.

Uma vez que este texto chegou no seu sistema
você vai precisar "transformar" este texto em
um objeto ou uma matriz.

Quem faz esse trabalho? O JSON.

No PHP essas funções de conversão são:

json_encode() 
Converte array/obj em texto, uma string JSON;

json_decode()
Converte um texto JSON em um objeto ou matriz.

*/

$texto = '
{
    "cep": "01001-000",
    "logradouro": "Praça da Sé",
    "complemento": "lado ímpar",
    "bairro": "Sé",
    "localidade": "São Paulo",
    "uf": "SP",
    "ibge": "3550308",
    "gia": "1004",
    "ddd": "11",
    "siafi": "7107"
}
';

// $dados = json_decode($texto, true);

// $dados['professor'] = "dimitri";
// var_dump($dados);

// $json = json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// echo "<pre>$texto</pre>";

// echo $dados -> cep;

//RECEBE O TEXTO VINDO DO POST
$hndl = fopen("php://input", "r");
$dados = fread($hndl, 1024);

//CONVERTE O TEXTO EM ARRAY ASSOCIATIVO
$dados = json_decode($texto, true);

//ADICIONA O VALOR PROFESSOR
// $dados['professor'] = "Lindo";

//CONVERTE O ARRAY EM TEXTO
$json = json_encode($dados);

//DEVOLVE O TEXTO
echo $json;