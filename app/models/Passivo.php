<?php

namespace App\Models;

use App\Connection\connection;
use PDO;

class Passivo extends Connection
{
    public static function findAll()
    {
        $sql = 'SELECT * FROM empresas INNER JOIN funcionarios ON empresas.id_empresa = funcionarios.id_empresa ORDER BY empresas.id_empresa';
        $stmt = Connection::prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhuma empresa encontrada!");
        }
    }
}
