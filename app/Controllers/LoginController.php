<?php
namespace App\Controllers;

use \App\Models\User;
class LoginController{

  public function login()
  {
    \App\View::make('login/login');
  }


//

public function logar(){

  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $password = isset($_POST['password']) ? $_POST['password'] : null;

  if(User::select($email, $password)){
      header ("Location: /medicos");
      exit;

  }
  else{
      header ("Location: /");
      exit;
  }


}


public function logout(){
session_start();
unset($_SESSION['email']);
unset($_SESSION['password']);

session_destroy();
header ("Location: /login");
exit;

}
}


 ?>
