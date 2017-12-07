<?php
namespace App\Controllers;
use \App\Models\Medic;
use \App\Models\City;
use \App\Models\State;
class MedicsController
{ /** * Listagem de usuários */
  public function index()
  {
    $medics = Medic::selectAll();

    \App\View::make('medicos/index', [ 'medics' => $medics,
  ]);
}


/**
* Exibe o formulário de criação de usuário
*/
public function create()
{
    $estados = State::selectAll();

  \App\View::make('medicos/create', ['estados' => $estados]);
}



public function store()
{

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
  $trabalho = isset($_POST['trabalho']) ? $_POST['trabalho'] : null;
  $especialidade = isset($_POST['especialidade']) ? $_POST['especialidade'] : null;
  $crm = isset($_POST['crm']) ? $_POST['crm'] : null;


  if (Medic::save($name, $gender, $endereco, $bairro, $idcidade, $idestado, $cep, $complemento, $cpf,
  $rg, $birthdate, $naturalidade, $nacionalidade, $email, $celular, $telefone, $trabalho, $especialidade, $crm))
  {
    header('Location: /medicos');
    exit;
  }
}



/**
* Exibe o formulário de edição de usuário
*/
public function edit($id)
{
  $medic = Medic::selectAll($id)[0];
    $estados = State::selectAll();


    \App\View::make('medicos/edit',[
    'medic' => $medic, 'estados' => $estados
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
  $trabalho = isset($_POST['trabalho']) ? $_POST['trabalho'] : null;
  $especialidade = isset($_POST['especialidade']) ? $_POST['especialidade'] : null;
  $crm = isset($_POST['crm']) ? $_POST['crm'] : null;

  if (Medic::update($id, $name, $gender, $endereco, $bairro, $idcidade, $idestado, $cep,
  $complemento, $cpf, $rg, $birthdate, $naturalidade, $nacionalidade, $email, $celular,
  $telefone, $trabalho, $especialidade,  $crm))
  {
    header('Location: /medicos');
    exit;
  }
}


/**
* Remove um usuário
*/
public function remove($id)
{
  if (Medic::remove($id))
  {
    header('Location: /medicos');
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
