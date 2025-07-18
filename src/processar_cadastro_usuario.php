<?php

namespace App\Models;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use PDOException;

class ProcessarCadastro
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    /**
     * Garante que a tabela de usuários exista antes de qualquer operação.
     */
    private function garantirTabelaUsuarios()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        nome TEXT NOT NULL,
                        email TEXT UNIQUE NOT NULL,
                        senha TEXT NOT NULL
                    )";
            $this->pdo->exec($sql);
        } catch (PDOException $e) {

            die("Erro fatal: Não foi possível verificar/criar a tabela de usuários. " . $e->getMessage());
        }
    }

    /**
     * Processa a requisição de cadastro de um novo usuário.
     */
    public function cadastrarUsuario()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            die("Acesso negado.");
        }

        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if (empty($nome) || empty($email) || empty($senha)) {
            die("Erro: Você deve preencher todos os campos do formulário.");
        }
        
        $senhaHashed = password_hash($senha, PASSWORD_DEFAULT);

        $this->garantirTabelaUsuarios();

        try {
            
            $stmt = $this->pdo->prepare(
                "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)"
            );

            // Executa a inserção com os dados.
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senhaHashed
            ]);

            header('Location: /../views/login_usuarios.html');
            exit();
            

        } catch (PDOException $e) {
            // Trata erros específicos, como e-mail duplicado.
            if ($e->getCode() == 23000 || str_contains($e->getMessage(), 'UNIQUE constraint failed')) {
                die("Erro ao cadastrar: O e-mail informado já está em uso.");
            } else {
                // Para outros erros, mostra uma mensagem genérica.
                die("Erro ao cadastrar usuário. Por favor, tente novamente. " . $e->getMessage());
            }
        }
    }
}

// Execução do script
$processador = new ProcessarCadastro();
$processador->cadastrarUsuario();


