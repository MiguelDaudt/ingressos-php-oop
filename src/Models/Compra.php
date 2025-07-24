<?php

namespace App\Models;

use App\Core\Model;
use PDOException;

class Compra extends Model
{

    protected function getTableName(): string
    {
        return 'compras';
    }

    public function registrarCompra(int $id_cliente, int $id_ingresso): bool
    {
        try {
            $stmt = $this->pdo->prepare(
                "INSERT INTO {$this->tabela} (id_cliente, id_ingresso) VALUES (:id_cliente, :id_ingresso)"
            );

            return $stmt->execute([
                ':id_cliente' => $id_cliente,
                ':id_ingresso' => $id_ingresso
            ]);
        } catch (PDOException $e) {
            error_log("Erro ao registrar compra: " . $e->getMessage());
            return false;
        }
    }
}