<?php
namespace App\Controllers;
use \App\Models\Agendament;
use \App\Models\Client;
use \App\Models\Medic;
class AgendamentsController {
  /** * Listagem de usuários */
  public function index()
  {
    session_start();
    if((!empty ($_SESSION['email'])) && (!empty ($_SESSION['password'])))
    {
    $agendamentos = Agendament::selectAll();

    \App\View::make('agendamentos/index', [ 'agendamentos' => $agendamentos,
        ]);
    }
    else{
        \App\View::make('login/login');
      }
    }
    /**
     * Exibe o formulário de criação de usuário
     */
    public function create()
    {
        session_start();
        if((!empty ($_SESSION['email'])) && (!empty ($_SESSION['password'])))
        {
        $medicos = Medic::selectAll();
        $pacientes = Client::selectAll();

        \App\View::make('agendamentos/create',[
            'medicos' => $medicos, 'pacientes' => $pacientes
        ]);
         }
          else{
            \App\View::make('login/login');
        }
    }
    /**
     * Processa o formulário de criação de usuário
     */
    public function store()
    {
        session_start();
        $medicos = Medic::selectAll();
        $pacientes = Client::selectAll();
        $dados = $_POST;
        // pega os dados do formuário
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
        $idclient = isset($_POST['idclient']) ? $_POST['idclient'] : null;
        $idmedico = isset($_POST['idmedico']) ? $_POST['idmedico'] : null;

        if(empty($_POST['data']) == true && empty($_POST['hora']) == true && empty($_POST['idclient']) == true && empty($_POST['idmedico']) == true  ){
            $data_error = "Selecione a data do agendamento";
            $hora_error = "Selecione a hora do agendamento";
            $medico_error = "Selecione o médico do paciente";
            $paciente_error = "Selecione o paciente";
            \App\View::make('agendamentos/create', ['paciente_error' => $paciente_error ,'medico_error' => $medico_error ,'data_error' => $data_error ,'hora_error' => $hora_error ,'dados' => $dados]);
        }
        elseif(empty($_POST['data']) == true && empty($_POST['idclient']) == true && empty($_POST['idmedico']) == true  ){
            $data_error = "Selecione a data do agendamento";
            $medico_error = "Selecione o médico do paciente";
            $paciente_error = "Selecione o paciente";
            \App\View::make('agendamentos/create', ['paciente_error' => $paciente_error ,
            'medico_error' => $medico_error ,'data_error' => $data_error,'dados' => $dados, 'medicos' => $medicos, 'paciente' => $paciente]);
        }
        elseif(empty($_POST['idclient']) == true && empty($_POST['idmedico']) == true  ){

            $medico_error = "Selecione o médico do paciente";
            $paciente_error = "Selecione o paciente";
            \App\View::make('agendamentos/create', ['paciente_error' => $paciente_error ,
            'medico_error' => $medico_error ,'dados' => $dados, 'medico' => $idmedico, 'paciente' => $paciente]);
        }
        elseif(empty($_POST['data']) == true){
            $data_error = "Selecione a data do agendamento";
            \App\View::make('agendamentos/create', ['data_error' => $data_error,'dados' => $dados,  'medico' => $medico, 'paciente' => $paciente]);
        }
        elseif(empty($_POST['hora']) == true){
            $hora_error = "Selecione a hora do agendamento";
            \App\View::make('agendamentos/create', ['hora_error' => $hora_error,'dados' => $dados,  'medico' => $medico, 'paciente' => $paciente]);
        }
        elseif(empty($_POST['idclient']) == true){
            $paciente_error = "Selecione o paciente";
            \App\View::make('agendamentos/create', ['paciente_error' => $paciente_error,'dados' => $dados,  'medico' => $medico, 'paciente' => $paciente]);
        }
        elseif(empty($_POST['idmedico']) == true){
            $medico_error = "Selecione o médico do paciente";
            \App\View::make('agendamentos/create', ['medico_error' => $medico_error,'dados' => $dados,  'medico' => $medico, 'paciente' => $paciente]);
        }
        if (Agendament::save($data, $hora, $idclient, $idmedico))
        {
            session_start();
            $sucessMsg = "Agendamento adicionado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /agendamentos');
            exit;
        }

    }
    /**
     * Exibe o formulário de edição de usuário
     */
    public function edit($id)
    {
        session_start();
        if((!empty ($_SESSION['email'])) && (!empty ($_SESSION['password']))){

        $agendamentos = Agendament::select($id)[0];

        $medics = Medic::selectAll();
        $clients = Client::selectAll();
        \App\View::make('agendamentos/edit',[
            'medics' => $medics, 'clients' => $clients,'agendamentos' => $agendamentos
        ]);

        }
        else{
            \App\View::make('login/login');
        }
    }
    /**
     * Processa o formulário de edição de usuário
     */
    public function update()
    {
        // pega os dados do formuário
        $id = $_POST['id'];
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
        $idclient = isset($_POST['idclient']) ? $_POST['idclient'] : null;
        $idmedico = isset($_POST['idmedico']) ? $_POST['idmedico'] : null;

        if (Medic::update($id, $data, $hora, $idclient, $idmedico))
        {
            session_start();
            $sucessMsg = "Agendamento editado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /agendamentos');
            exit;


        }

    }
    /**
     * Remove um usuário
     */
    public function remove($id)
    {
        if (Agendament::remove($id))
        {
            session_start();
            $sucessMsg = "Agendamento removido com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /agendamentos');
            exit;
        }
    }
}
