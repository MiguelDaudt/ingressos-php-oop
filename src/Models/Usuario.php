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
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");

            return $stmt->execute([
                ':nome' => $dados['nome'],
                ':email' => $dados['email'],
                ':senha' => $dados['senha']
            ]);

        } catch (PDOException $e) {

            if ($e->getCode() == 23000) { 
                 die("Erro ao cadastrar: O e-mail informado já está em uso.");
            }

            die("Erro de banco de dados ao criar usuário: " . $e->getMessage());
            return false;
        }
    }

}