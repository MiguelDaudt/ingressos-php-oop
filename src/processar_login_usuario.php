<?php

namespace App\Models;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\Models\ProcessarCadastro;
use PDOException;

class LoginUsuarios{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    public function autenticarUsuario(){
        if ($_SERVER['REQUEST_METHOD'] !== "POST"){
            die("Voce nao tem permissao");

        }

            $nome = $_POST['nome'] ?? null;
            $email = $_POST['email'] ?? null;
            $senha = $_POST['senha'] ?? null;

        if(empty($email)||empty($senha)||empty($nome)){
            die("Todos os campos devem ser preenchidos");
        }

        try{
            $stmt = $this->pdo->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = :email AND nome = :nome");
            $stmt->execute([':email' => $email, ':nome' => $nome]);
            $usuario = $stmt->fetch();

            if($usuario && password_verify($senha, $usuario['senha'])){

                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_email'] = $usuario['email'];
                $_SESSION['usuario_nome'] = $usuario['nome'];

                header('Location: ../../Public/dashboard.php');
            }
            else{
                die("E-mail ou Senha incorretos");
            }
        } catch(PDOException $e){
            die("Erro ao buscar usuario: " . $e->getMessage());
        }
    }
}

$verificar = new LoginUsuarios();
$verificar->autenticarUsuario();