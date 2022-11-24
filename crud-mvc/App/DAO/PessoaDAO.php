<?php

namespace App\DAO;

use App\Model\PessoaModel;
use \PDO;

/*
As classes DAO (Data Access Object) são responsáveis por executar os comandos SQL junto ao banco de dados
*/

class PessoaDao extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
        * Método que recebe um model e extrai os dados do model para realizar o insert
        * Na tabela correspondente ao modal. Note o tipo do parâmetro declarado.
    */
    public function create(PessoaModel $model)
    {
        // Trecho de código SQL com marcadores ? para substituição posteior no prepare
        $sql = "INSERT INTO pessoa (nome, cpf, data_nascimento) VALUES (?, ?, ?)";

        // Declaração da variável stmt que conterá a montagem da consulta. Observe que estamos acessando o método prepare dentro da propriedade que guarda a conexão com MySQL, via operador seta "->". Isso significa que o prepare "está dentro" da propriedade $conexao e recebe nossa string sql com os devidos marcadores.
        $stmt = $this->conexao->prepare($sql);

        // Nesta etapa, os bindValue são responsáveis por receber o valor e trocá-lo para uma determinada posição, ou seja, o valor que está em 3, será trocado pelo terceiro marcador ?
        // No que o bindValue está recebendo o model que veio via parâmetro e acessamos por meio da seta qual dado do model queremos pegar para a posição em questão.
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nascimento);

        // Ao fim, com todo o SQL já montado, executamos a consulta.
        $stmt->execute();
    }


    public function update(PessoaModel $model)
    {

        $sql = "UPDATE pessoa SET nome=?, cpf=?,data_nascimento=? WHERE id=?";


        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nascimento);
        $stmt->bindValue(4, $model->id);

        if (!$stmt->execute()) print_r($stmt->errorInfo());
    }

    public function read()
    {
        $sql = "SELECT * FROM pessoa";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        // Retorna um array com as linhas retornada da consulta. Observe que o array em questão se trata de um array de objetos. Os objetos são do tipos stdClass e foram criados automaticamente pelo método fetchALL do PDO.
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once "Model/PessoaModel.php";

        $sql = "SELECT * FROM pessoa WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\PessoaModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
