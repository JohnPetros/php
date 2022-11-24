<?php
namespace App\Model;

use App\DAO\PessoaDao;

// A camada model é responsável por transportar os dados da Controller até a DAO e vice-versa. Também atribuido a model a validação dos dados da View e controle de acesso aos métodos da DAO.
class PessoaModel extends Model
{
    // Declaração das propriedade conforme campos da tabela no banco de dados.
    public $id, $nome, $cpf, $data_nascimento;

    // Declaração do método save que chamará a DAO para gravar no banco de dados o model preenchido.
    public function save()
    {

        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new PessoaDAO();

        if (empty($this->id)) {
            // Chamando o método create que recebe o próprio objeto model já preenchido.
            $dao->create($this);
        } else {
            $dao->update($this);
        }
    }

    // Método que encapsula a chamada da DAO e que abastecerá a propriedade rows;
    // Esse método é importante, pois como a model é "vista" na View, a propriedade $rows será acessada, possibilitando a listagem dos registros vindos do banco de dados.
    public function getAllRows()
    {

        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new PessoaDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL via chamada DAO.
        $this->rows = $dao->read();
    }

    // Devolve uma View contendo um formmulário para o usuário.

    public static function getById(int $id)
    {
        $dao = new PessoaDAO();

        $obj =  $dao->selectById($id);

        return $obj ? $obj : new PessoaModel();
    }

    public static function delete(int $id)
    {
        $dao = new PessoaDAO();

        $dao->delete($id);
    }
}
