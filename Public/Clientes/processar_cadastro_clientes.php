<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Usuario;

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acesso negado.");
}

$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

if (empty($nome) || empty($email) || empty($senha)) {
        echo "<script>alert('Voce precisa preencher todos os campos');
        window.location.href = '/views/Clientes/cadastro_cliente.html';
        </script>";
    }

$dadosCliente = [
    'nome' => $nome,
    'email' => $email,
    'senha' => password_hash($senha, PASSWORD_DEFAULT) ,
    'papel' => 'cliente'
];

$usuarioModel = new Usuario();
if ($usuarioModel->criar($dadosCliente)) {

    header('Location: /views/Clientes/login_cliente.html'); 
    exit();

}