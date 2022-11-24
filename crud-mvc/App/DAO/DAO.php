<?php

namespace App\DAO;

use \PDO;

abstract class DAO
{
    /*
        * Atributo (ou Propriedade) da classe destinado a armazenar o link (vínculo aberto) de conexão com o banco de dados.
    */
    protected $conexao;

    /*
        * Método construtor, sempre chamado na classe quando a classe é instanciada;
        * Exemplo de instanciar classe (criar o objeto a partir da classe):
        * $dao = New PessoaDAO();
        * Neste caso, assim que é instanciado, abre-se uma conexão com MySQL (banco de dados)
        * A conexão é aberta via PDO (PHP Data Object) que é um recurso da linguagem que permite acesso a diversos SGDBs.
    */

    public function __construct()
    {
        // DSN (Data Source Name) onde o servidor MySQL será encontrado
        // (host) em qual porta o MySQL está operando e qual o nome do banco de dados pretentido
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

        // Criando a conexão e armazenando na propriedade definada para tal
        $this->conexao = new \PDO($dsn, $_ENV['db']['user'], $_ENV['db']['password']);
    }
}
