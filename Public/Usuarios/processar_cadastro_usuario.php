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
        window.location.href = '/views/Usuarios/cadastro_usuario.html';
        </script>";
    }

$dadosUsuario = [
    'nome' => $nome,
    'email' => $email,
    'senha' => password_hash($senha, PASSWORD_DEFAULT) ,
    'papel' => 'vendedor'
];

$usuarioModel = new Usuario();
if ($usuarioModel->criar($dadosUsuario)) {

    header('Location: /views/Usuarios/login_usuarios.html'); 
    exit();

} else {
    echo "Ocorreu um erro que não foi capturado. Verifique a classe Usuario.";
}