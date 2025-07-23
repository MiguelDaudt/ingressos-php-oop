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
            $stmt = $this->pdo->prepare("INSERT INTO ingressos (nome, descricao, preco, quantidade, data_evento, data_evento_fim, reservado, data_reserva, id_usuario) 
            VALUES (:nome, :descricao, :preco, :quantidade, :data_evento, :data_evento_fim, :reservado, :data_reserva, :id_usuario)");
            
            return $stmt->execute([
            ':nome' => $dados['nome'],
            ':descricao' => $dados['descricao'],
            ':preco' => $dados['preco'],
            ':quantidade' => $dados['quantidade'],
            ':data_evento' => $dados['data_evento'],
            ':data_evento_fim' => $dados['data_evento_fim'],
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

    public function editarProduto(int $id, array $dados){
        try{
            
            $stmt = $this->pdo->prepare("UPDATE ingressos SET
            nome = :nome,
            descricao = :descricao,
            preco = :preco,
            quantidade = :quantidade,
            data_evento = :data_evento
            WHERE id = :id ");

            return $stmt->execute([
                ':nome' => $dados['nome'],
                ':descricao' => $dados['descricao'],
                ':preco' => $dados['preco'],
                ':quantidade' => $dados['quantidade'],
                ':data_evento' => $dados['data_evento'],
                ':id' => $id
            ]);
        } catch(PDOException $e){
            die("Erro ao editar o arquivo: " . $e->getMessage());
        }
    }
    public function mostrarEventoDisponivel(){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tabela} WHERE quantidade > 0 ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e){
            die("Erro ao buscar mostrar eventos: " . $e->getMessage());
        }
    }

    public function reservar(int $id_ingresso, int $id_cliente) : bool{

        $this->liberarReserva($id_ingresso);

        $sql = "UPDATE {$this->tabela} SET 
        quantidade_reservada = quantidade_reservada + 1,
        data_reserva = :tempo_agora,
        id_usuario_reserva = :id_cliente
        WHERE id = :id_ingresso AND (quantidade - quantidade_reservada) > 0";

        $stmt = $this->pdo->prepare($sql);
        $sucesso = $stmt->execute([
            ':tempo_agora' => time(),
            ':id_cliente' => $id_cliente,
            ':id_ingresso' => $id_ingresso
        ]);

        return $stmt->rowCount() > 0;
    }

    public function confirmarCompra(int $id_ingresso): bool{
    
        $sql = "UPDATE {$this->tabela} SET 
                quantidade = quantidade - 1,
                quantidade_reservada = quantidade_reservada - 1,
                data_reserva = NULL,
                id_usuario_reserva = NULL
                WHERE id = :id_ingresso";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id_ingresso' => $id_ingresso]);
    }


    public function liberarReserva(int $id_ingresso): void{
    
        $tempo_expiracao = time() - 120;

        $sql = "UPDATE {$this->tabela} SET 
                    quantidade_reservada = quantidade_reservada - 1,
                    data_reserva = NULL,
                    id_usuario_reserva = NULL
                WHERE id = :id_ingresso AND data_reserva < :tempo_expiracao";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_ingresso' => $id_ingresso,
            ':tempo_expiracao' => $tempo_expiracao
        ]);
    }

}