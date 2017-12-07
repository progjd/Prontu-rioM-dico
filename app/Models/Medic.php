<?php
 namespace App\Models;
  use App\DB;
   class Medic { /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
      public static function selectAll($id = null) { $where = '';
         if (!empty($id)) { $where = 'WHERE id = :id'; }
      $sql = sprintf("SELECT id, name, gender, endereco, bairro, idcidade, idestado, cep, complemento, cpf, rg,
        birthdate, naturalidade, nacionalidade, email, telefone, celular, trabalho, especialidade, crm FROM medics %s ORDER BY name ASC", $where);
      $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $medics = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $medics;
    }


    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save($name, $gender, $endereco, $bairro, $idcidade,
    $idestado, $cep, $complemento, $cpf, $rg, $birthdate, $naturalidade, $nacionalidade,
    $email, $celular, $telefone, $trabalho, $especialidade, $crm)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($name) || empty($gender) || empty($endereco) || empty($bairro)
        || empty($idcidade) || empty($idestado) || empty($cep) || empty($complemento) ||
        empty($cpf) || empty($rg) || empty($birthdate) || empty($naturalidade) ||  empty($nacionalidade) || empty($email)
         || empty($celular) || empty($telefone) || empty($trabalho) || empty($especialidade) || empty($crm))
        {
            echo "Volte e preencha todos os campos";
            return false;
        }


        $isoDate = dateConvert($birthdate);

        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO medics (name, gender, endereco, bairro, idcidade, idestado, cep, complemento, cpf,
          rg, birthdate, naturalidade, nacionalidade, email, celular, telefone, trabalho, especialidade,
          crm) VALUES(:name, :gender, :endereco, :bairro, :idcidade, :idestado, :cep,  :complemento,
             :cpf, :rg, :birthdate, :naturalidade, :nacionalidade, :email, :celular, :telefone,
             :trabalho, :especialidade, :crm)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':idestado', $idestado);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':birthdate', $isoDate);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':trabalho', $trabalho);
        $stmt->bindParam(':especialidade', $especialidade);
        $stmt->bindParam(':crm', $crm);

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
    public static function update($name, $gender, $endereco, $bairro, $idcidade, $idestado, $cep,
    $complemento, $cpf, $rg, $birthdate, $naturalidade, $nacionalidade, $email, $celular,
    $telefone, $trabalho, $especialidade, $crm)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($name) || empty($gender) || empty($endereco) || empty($bairro) ||
        empty($idcidade) || empty($idestado) || empty($cep) || empty($complemento) || empty($cpf)
        || empty($rg) || empty($birthdate) || empty($naturalidade) ||  empty($nacionalidade)
            || empty($email) || empty($celular) || empty($telefone) ||
           empty($trabalho) || empty($especialidade) || empty($crm))
        {
            echo "Volte e preencha todos os campos";
            return false;
        }


        $isoDate = dateConvert($birthdate);

        // insere no banco
        $DB = new DB;
        $sql = "UPDATE medics SET name = :name, gender = :gender, endereco = :endereco,
        bairro = :bairro, idcidade = :idcidade, idestado = :idestado, cep = :cep,
        complemento = :complemento, cpf = :cpf, rg = :rg, birthdate = :birthdate,
        naturalidade = :naturalidade, nacionalidade = :nacionalidade, email = :email,
        telefone = :telefone, celular = :celular, trabalho = :trabalho, especialidade = :especialidade, crm = :crm WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':idestado', $idestado);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':birthdate', $isoDate);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':trabalho', $trabalho);
        $stmt->bindParam(':especialidade', $especialidade);
        $stmt->bindParam(':crm', $crm);
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
        $sql = "DELETE FROM medics WHERE id = :id";
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
