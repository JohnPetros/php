<?php

namespace App\Controller;

use App\Model\PessoaModel;

/*
* Classes Controller são responsáveis por processar as requisições do usuário. Isso significa que toda vez que um usuário chama uma rota, um método (função) de uma classe Controller é chamado.
* O método poderá retornar uma View (fazendo um include), acessar uma model para buscar algo no banco de dados, redirecionar o usuário de rota, ou mesmo, chamar outra Controller.
*/

class PessoaController extends Controller
{
    public static function index()
    {
        include_once "Model/PessoaModel.php";

        $model = new PessoaModel();
        $model->getAllRows();

        parent::render("Pessoa/ListaPessoa", $model);

    }

    public static function form()
    {
        $model = new PessoaModel();

        if (isset($_GET["id"]))
            $model = $model->getById((int) $_GET["id"]);
        
        parent::render("Pessoa/FormPesso", $model);

        //include_once "View/modules/FormPesso.php";

    }

    public static function save()
    {
        include "Model/PessoaModel.php";

        $model = new PessoaModel();

        $model->id = $_POST["id"];
        $model->nome = $_POST["nome"];
        $model->cpf = $_POST["cpf"];
        $model->data_nascimento = $_POST["data_nascimento"];

        $model->save();

        header("Location: /pessoa");
    }

    public static function delete()
    {
        include "Model/PessoaModel.php";

        $model = new PessoaModel();

        $model->delete((int) $_GET["id"]);

        header("Location: /pessoa");
    }
}
