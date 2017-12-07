<?php
namespace App\Controllers;
use \App\Models\Client;
use \App\Models\State;
class ClientsController
{ /** * Listagem de usuários */
  public function index()
  {
    $clients = Client::selectAll();
    \App\View::make('clients/index', [ 'clients' => $clients,
  ]);
}


/**
* Exibe o formulário de criação de usuário
*/
public function create()
{
    $estados = State::selectAll();
  \App\View::make('clients/create', [ 'estados' => $estados]);
}


/**
* Processa o formulário de criação de usuário
*/
public function store()
{
  // pega os dados do formuário
  $name = isset($_POST['name']) ? $_POST['name'] : null;
  $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
  $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
  $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
  $idcidade = isset($_POST['idcidade']) ? $_POST['idcidade'] : null;
  $idestado = isset($_POST['idestado']) ? $_POST['idestado'] : null;
  $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
  $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
  $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
  $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
  $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
  $naturalidade = isset($_POST['naturalidade']) ? $_POST['naturalidade'] : null;
  $nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $celular = isset($_POST['celular']) ? $_POST['celular'] : null;
  $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
  $nomePai = isset($_POST['nomePai']) ? $_POST['nomePai'] : null;
  $nomeMae = isset($_POST['nomeMae']) ? $_POST['nomeMae'] : null;
  $tipoSanguineo = isset($_POST['tipoSanguineo']) ? $_POST['tipoSanguineo'] : null;

  if (Client::save($name, $gender, $endereco, $bairro, $idcidade, $idestado, $cep, $complemento, $cpf,
  $rg, $birthdate, $naturalidade, $nacionalidade, $email, $celular, $telefone, $nomePai, $nomeMae, $tipoSanguineo))
  {
    header('Location: /clients');
    exit;
  }
}



/**
* Exibe o formulário de edição de usuário
*/
public function edit($id)
{
  $client = Client::selectAll($id)[0];
    $estados = State::selectAll();

  \App\View::make('clients/edit',[
    'client' => $client, 'estados' => $estados
  ]);
}


/**
* Processa o formulário de edição de usuário
*/
public function update()
{
  // pega os dados do formuário
  $id = $_POST['id'];
  $name = isset($_POST['name']) ? $_POST['name'] : null;
  $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
  $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
  $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
  $idcidade = isset($_POST['idcidade']) ? $_POST['idcidade'] : null;
  $idestado = isset($_POST['idestado']) ? $_POST['idestado'] : null;
  $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
  $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
  $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
  $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
  $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
  $naturalidade = isset($_POST['naturalidade']) ? $_POST['naturalidade'] : null;
  $nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $celular = isset($_POST['celular']) ? $_POST['celular'] : null;
  $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
  $nomePai = isset($_POST['nomePai']) ? $_POST['nomePai'] : null;
  $nomeMae = isset($_POST['nomeMae']) ? $_POST['nomeMae'] : null;
  $tipoSanguineo = isset($_POST['tipoSanguineo']) ? $_POST['tipoSanguineo'] : null;

  if (Client::update($id, $name, $gender, $endereco, $bairro, $idcidade, $idestado, $cep,
  $complemento, $cpf, $rg, $birthdate, $naturalidade, $nacionalidade, $email, $celular,
  $telefone, $nomePai, $nomeMae,  $tipoSanguineo))
  {
    header('Location: /clients');
    exit;
  }
}


/**
* Remove um usuário
*/
public function remove($id)
{
  if (Client::remove($id))
  {
    header('Location: /clients');
    exit;
  }
}
    public function states($id){
        $cidades = City::selectAll();
        foreach ($cidades as $cidade ) {
            if ($cidade['estado'] == $id['id'] ) {
                echo "<option value=" .$cidade[id] . ">" . $cidade['nome'] . "</option>";
            }
        }
    }


}
