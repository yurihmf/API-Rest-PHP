<?php

namespace App\Models;

use App\Connection\connection;

class Employee extends Connection
{
    private $nome;
    private $email;
    private $id_empresa;

    public function insert($obj)
    {
        $sql = "INSERT INTO funcionarios(nome, id_empresa, email) VALUES (:nome, :id_empresa, :email)";
        $query = Connection::prepare($sql);
        $query->bindValue(':nome', $obj['nome']);
        $query->bindValue(':id_empresa', $obj['id_empresa']);
        $query->bindValue(':email', $obj['email']);
        return $query->execute();
    }

    public function update($obj, $id = null)
    {
        $sql = "UPDATE funcionarios SET id_funcionario = :id, nome = :nome, id_empresa = :id_empresa, email = :email WHERE id = :id";
        $query = Connection::prepare($sql);
        $query->bindValue(':id', $obj['id']);
        $query->bindValue(':nome', $obj['nome']);
        $query->bindValue(':id_empresa', $obj['id_empresa']);
        $query->bindValue(':email', $obj['email']);
        return $query->execute();
    }

    public function delete($id = null)
    {
        $sql = "DELETE FROM funcionarios WHERE id_funcionario = :id";
        $query = Connection::prepare($sql);
        $query->bindValue(':id', $id);
        return $query->execute();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM funcionarios WHERE id_funcionario = :id";
        $query = Connection::prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM funcionarios";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
