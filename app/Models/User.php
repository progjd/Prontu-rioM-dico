<?php
namespace App\Models;
use App\DB;
class User {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function select($email, $password) {
    session_start();

    $sql = sprintf("SELECT * FROM login WHERE email = '$email' AND password = '$password'") or die("erro ao selecionar");
    $DB = new DB; $stmt = $DB->prepare($sql);

    $stmt->execute();
    $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (count($users) == 1){
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;

          return true;

        }

}
    public static function save($name ,$email, $password)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($name) || empty($email) || empty($password))
        {
            echo "Volte e preencha todos os campos";
            return false;
        }
        $password = md5($password);
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO users
        (name, email, password)
         VALUES(:nome,:email, :password, :role)";
          $stmt = $DB->prepare($sql);
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':password', $password);


        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}
