<?php

include '../../connection.php';

class Employee extends Connection
{
    private $nome;
    private $email;
    private $id_empresa;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getid_empresa()
    {
        return $this->id_empresa;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setid_empresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }

    public function insert($obj)
    {
        $sql = "INSERT INTO funcionarios(nome, id_empresa, email) VALUES (:nome, :id_empresa, :email)";
        $query = Connection::prepare($sql);
        $query->bindValue(':nome', $obj->nome);
        $query->bindValue(':id_empresa', $obj->id_empresa);
        $query->bindValue(':email', $obj->email);
        return $query->execute();
    }

    public function update($obj, $id = null)
    {
        $sql = "UPDATE funcionarios SET id_funcionario = :id, nome = :nome, id_empresa = :id_empresa, email = :email WHERE id = :id";
        $query = Connection::prepare($sql);
        $query->bindValue(':id', $obj->id);
        $query->bindValue(':nome', $obj->nome);
        $query->bindValue(':id_empresa', $obj->id_empresa);
        $query->bindValue(':email', $obj->email);
        return $query->execute();
    }

    public function delete($obj, $id = null)
    {
        $sql = "DELETE FROM funcionarios WHERE id_funcionario = :id";
        $query = Connection::prepare($sql);
        $query->bindValue(':id', $obj->id);
        return $query->execute();
    }

    public function find($id)
    {

    }

    public function findAll()
    {
        $sql = "SELECT * FROM funcionarios";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
