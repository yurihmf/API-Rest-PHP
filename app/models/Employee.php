<?php

namespace App\Models;

use App\Connection\connection;
use PDO;

class Employee extends Connection
{
    private $nome;
    private $email;
    private $id_empresa;
    private static $table = 'funcionarios';

    public function insert($obj)
    {
        $sql = "INSERT INTO " . self::$table . "(nome, id_empresa, email) VALUES (:nome, :id_empresa, :email)";
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':nome', $obj['nome']);
        $stmt->bindValue(':id_empresa', $obj['id_empresa']);
        $stmt->bindValue(':email', $obj['email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Funcionário cadastrado com sucesso!';
        } else {
            throw new \Exception("Falha ao cadastrar funcionário.");
        }
    }

    public function update($obj, $id = null)
    {
        $sql = "UPDATE " . self::$table . " SET id_funcionario = :id, nome = :nome, id_empresa = :id_empresa, email = :email WHERE id_funcionario = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $obj['nome']);
        $stmt->bindValue(':id_empresa', $obj['id_empresa']);
        $stmt->bindValue(':email', $obj['email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Funcionário atualizado com sucesso!';
        } else {
            throw new \Exception("Falha ao atualizar funcionário.");
        }
    }

    public function delete($id = null)
    {
        $sql = "DELETE FROM " . self::$table . " WHERE id_funcionario = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Funcionário deletado com sucesso!';
        } else {
            throw new \Exception("Falha ao deletar funcionário.");
        }
    }

    public function find($id)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE id_funcionario = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum funcionário encontrado!");
        }
    }

    public function findAll()
    {
        $sql = "SELECT * FROM " . self::$table;
        $stmt = Connection::prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum funcionário encontrado!");
        }
    }
}
