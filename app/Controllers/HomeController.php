<?php
namespace App\Controllers;
use \App\Models\User;
class HomeController {
  /** * Listagem de usuários */
  public function index()
  {
    session_start();

    if((!empty ($_SESSION['email'])) && (!empty ($_SESSION['password'])))
    {
      $users = User::select();
      \App\View::make('clients/index', [ 'users' => $user,
      ]);
     }
    else{
    \App\View::make('Auth/login');
    }
  }
}
