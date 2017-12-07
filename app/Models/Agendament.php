<?php
namespace App\Models;
use App\DB;
class Agendament {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function selectAll() {


     $sql = sprintf("SELECT agendament.id, agendament.data, agendament.hora, agendament.idclient, agendament.idmedico, clients.name, medicos.name FROM  agendamento %s
     INNER JOIN clients ON agendament.idclient = clients.idclient
     INNER JOIN medics ON agendament.idmedico = medicos.idmedico ORDER BY id DESC ");
     $DB = new DB; $stmt = $DB->prepare($sql);
        if (!empty($where))
        {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        }

        $stmt->execute();
        $agendamento = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $agendamento;
    }
    public static function select($id = null) {
    $email = $_SESSION['login'];
    $where = ''; if (!empty($id)) { $where = 'WHERE agendamento.id = :id'; }

        $data = date('d/m/Y');

        $sql = sprintf("SELECT agendament.id, agendament.data, agendament.hora, agendament.idclient, agendament.idmedico, clients.name, medicos.name FROM  agendamento %s
     INNER JOIN clients ON agendament.idclient = clients.idclient
     INNER JOIN medics ON agendament.idmedico = medicos.idmedic AND '$email' = medicos.email ORDER BY id DESC ");
     $DB = new DB; $stmt = $DB->prepare($sql);
        if (!empty($where))
        {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        }

        $stmt->execute();
        $agendamento = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $agendamento;
    }
    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save( $id, $data, $hora, $idclient, $idmedico)
    {
        // validação (bem simples, só pra evitar dados vazios)

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO agendamento
        (data, hora, idclient, idmedico)
         VALUES(:data, :hora, :idclient, :idmedico)";
          $stmt = $DB->prepare($sql);
          $stmt->bindParam(':data', $data);
          $stmt->bindParam(':hora', $hora);
          $stmt->bindParam(':idclient', $idclient);
          $stmt->bindParam(':idmedico', $idmedico);
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
    /**
     * Altera no banco de dados um usuário
     */
    public static function update($id, $data, $hora, $idclient, $idmedico)
    {
        // validação (bem simples, só pra evitar dados vazios)

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "UPDATE agendamento SET data = :data,hora = :hora ,idclient = :idclient
         idmedico = :idmedico WHERE id = :id";
          $stmt = $DB->prepare($sql);
          $stmt->bindParam(':data', $data);
          $stmt->bindParam(':hora', $hora);
          $stmt->bindParam(':idclient', $idclient);
          $stmt->bindParam(':idmedico', $idmedico);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
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
    public static function remove($id)
    {
        // valida o ID
        if (empty($id))
        {
            echo "ID não informado";
            exit;
        }
        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM agendamento WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao remover";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}
