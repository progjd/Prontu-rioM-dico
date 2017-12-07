<?php
 // inclui o autoloader do Composer
 require '../vendor/autoload.php';
 // inclui o arquivo de inicialização
 require '../init.php'; // instancia o Slim, habilitando os erros (útil para debug, em desenvolvimento)
  $app = new \Slim\App([ 'settings' => [
        'displayErrorDetails' => true
    ]
]);

// página inicial
// listagem de usuários

$app->get('/', function ()

{
    $LoginController = new \App\Controllers\LoginController;
    $LoginController->login();
});




$app->get('/login', function ()

{
    $LoginController = new \App\Controllers\LoginController;
    $LoginController->login();
});


$app->post('/login', function ()
{
    $LoginController = new \App\Controllers\LoginController;
    $LoginController->logar();
});



$app->get('/logout', function ()
{
    $LoginController = new \App\Controllers\LoginController;
    $LoginController->logout();
});


// adição de usuário
// exibe o formulário de cadastro
$app->get('/clients', function (){
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->index();
});

$app->get('/add', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->create();
});

// processa o formulário de cadastro
$app->post('/add', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->store();
});

$app->get('/add/clients', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->create();
});

// processa o formulário de cadastro
$app->post('/add/clients', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->store();
});


$app->get('/medicos', function (){
    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->index();
});

$app->get('/add/medicos', function ()
{
    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->create();
});

// processa o formulário de cadastro
$app->post('/add/medicos', function ()
{
    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->store();
});



$app->get('/agendamentos', function (){
    $AgendamentsController = new \App\Controllers\AgendamentsController;
    $AgendamentsController->index();
});

$app->get('/add/agendamentos', function ()
{
    $AgendamentsController = new \App\Controllers\AgendamentsController;
    $AgendamentsController->create();
});

// processa o formulário de cadastro
$app->post('/add/agendamentos', function ()
{
    $AgendamentsController = new \App\Controllers\AgendamentsController;
    $AgendamentsController->store();
});


// edição de usuário
// exibe o formulário de edição
$app->get('/edit/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->edit($id);
});

$app->get('/edit/medicos/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->edit($id);
});

// processa o formulário de edição
$app->post('/edit', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->update();
});


$app->post('/edit/medicos', function ()
{
    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->update();
});



// remove um usuário
$app->get('/remove/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->remove($id);
});

$app->get('/remove/medicos/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->remove($id);
});
$app->get('/estados', function($request){
    $id = $request->getAttribute('id');
    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->states($_GET);
});
$app->get('/estados/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $MedicsController = new \App\Controllers\MedicsController;
    $MedicsController->states($id);
});
$app->run();
