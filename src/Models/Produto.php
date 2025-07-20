<?php

namespace App\Models;

use App\Core\Model;
use PDO;
use PDOException;
    
class Produto extends Model{

    protected function getTableName(): string
    {
    return 'ingressos';
    }

    public function inserir(array $dados){

        try{
            $stmt = $this->pdo->prepare("INSERT INTO ingressos (nome, descricao, preco, quantidade, data_evento, reservado, data_reserva, id_usuario) 
            VALUES (:nome, :descricao, :preco, :quantidade, :data_evento, :reservado, :data_reserva, :id_usuario)");
            
            return $stmt->execute([
            ':nome' => $dados['nome'],
            ':descricao' => $dados['descricao'],
            ':preco' => $dados['preco'],
            ':quantidade' => $dados['quantidade'],
            ':data_evento' => $dados['data_evento'],
            ':reservado' => $dados['reservado'] ?? null,
            ':data_reserva' => $dados['data_reserva'] ?? null,
            ':id_usuario' => $dados['id_usuario'] 
            ]);
            
        } catch (PDOException $e) {
            die("Erro ao cadastrar produto. Por favor, tente novamente. " . $e->getMessage());
            
        }
    }

    public function mostrarEvento(int $id_usuario){

        try{
            
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tabela} WHERE id_usuario = :id_usuario ORDER BY id DESC");
            $stmt->execute([':id_usuario' => $id_usuario]);
            return $stmt->fetchAll();

        } catch (PDOException $e){
        die("Erro ao executar tarefa: " . $e->getMessage());
        }
    }

    public function deletarEvento(int $id){
        try{
            $stmt = $this->pdo->prepare("DELETE FROM {$this->tabela} WHERE id = :id");
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e){
            die("Erro ao deletar o o Evento: " . $e->getMessage());
        }
    }
}