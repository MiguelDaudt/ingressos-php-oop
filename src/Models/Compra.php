<?php

namespace App\Models;

use App\Core\Model;
use PDO;
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

        public function mostrarEventoComprado(int $id_cliente){
        
        try{
        $sql = "SELECT 
                    ingressos.caminho_imagem,
                    ingressos.nome,
                    ingressos.tipo_evento, 
                    ingressos.descricao, 
                    ingressos.preco,
                    ingressos.endereco,
                    ingressos.data_evento, 
                    compras.data_compra,
                    compras.id as id_compra 
                FROM {$this->tabela}
                INNER JOIN ingressos ON compras.id_ingresso = ingressos.id
                WHERE compras.id_cliente = :id_cliente
                ORDER BY compras.data_compra DESC";   

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id_cliente' => $id_cliente]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e){
        die("Erro ao executar tarefa: " . $e->getMessage());
        return [];
        }

    }
}