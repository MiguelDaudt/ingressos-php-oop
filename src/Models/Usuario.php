<?php

namespace App\Models;

use App\Core\Model;
use PDOException;

class Usuario extends Model 
{
    protected function getTableName(): string
    {
        return 'usuarios';
    }

    public function criar(array $dados): bool
    {
        if (empty($dados['nome']) || empty($dados['email']) || empty($dados['senha'])) {
            return false;
        }

        try {
            $colunas = 'nome, email, senha';
            $placeholders = ':nome, :email, :senha';
            
            $params = [
                ':nome' => $dados['nome'],
                ':email' => $dados['email'],
                ':senha' => $dados['senha']
            ];

            if (!empty($dados['papel'])) {
                $colunas .= ', papel';
                $placeholders .= ', :papel';
                $params[':papel'] = $dados['papel'];
            }
            
            $sql = "INSERT INTO usuarios ($colunas) VALUES ($placeholders)";
            
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { 
                die("Erro ao cadastrar: O e-mail informado já está em uso.");
            }
            die("Erro de banco de dados ao criar usuário: " . $e->getMessage());
        }
    }
}