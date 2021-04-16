<?php
namespace App\Models;

use App\Connection\connection;
use PDO;

class Company extends Connection
{
    private static $table = 'empresas';

    public static function select($id_empresa)
    {
        $sql = 'SELECT * FROM ' . self::$table . ' WHERE id_empresa = :id_empresa';
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':id_empresa', $id_empresa);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhuma empresa encontrada!");
        }
    }

    public static function selectAll()
    {
        $sql = 'SELECT * FROM ' . self::$table;
        $stmt = Connection::prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhuma empresa encontrada!");
        }
    }

    public static function insert($data)
    {
        $sql = 'INSERT INTO ' . self::$table . ' (nome_empresa, cnpj, site) VALUES (:nm, :cn, :st)';
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':nm', $data['nome_empresa']);
        $stmt->bindValue(':cn', $data['cnpj']);
        $stmt->bindValue(':st', $data['site']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Empresa cadastrada com sucesso!';
        } else {
            throw new \Exception("Falha ao cadastrar empresa.");
        }
    }

    public static function update($id_empresa, $data)
    {
        $sql = 'UPDATE ' . self::$table . ' SET nome_empresa = :nm, cnpj = :cn, site = :st WHERE id_empresa = :id';
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':id', $id_empresa);
        $stmt->bindValue(':nm', $data['nome_empresa']);
        $stmt->bindValue(':cn', $data['cnpj']);
        $stmt->bindValue(':st', $data['site']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Empresa atualizada com sucesso!';
        } else {
            throw new \Exception("Falha ao atualizar empresa.");
        }
    }

    public static function delete($id)
    {
        $sql = 'DELETE FROM ' . self::$table . ' WHERE id_empresa = :id';
        $stmt = Connection::prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Empresa excluída com sucesso!';
        } else {
            throw new \Exception("Falha ao excluir empresa.");
        }

    }

}
