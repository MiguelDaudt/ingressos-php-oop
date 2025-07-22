<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use App\Dashboard;
if(isset($_SESSION['usuario_id'])){
    
    $verificador = new Dashboard();
    $dadosUsuarios = $verificador->verificarDadosUsuario($_SESSION['usuario_id']);

if ($dadosUsuarios) {
        require_once __DIR__ . '/../../views/dashboard_view.php';
    } else {
        die("Erro: Usuário da sessão não encontrado no banco de dados. Por favor, faça o logout e login novamente.");
    }

    } else{
    die("Acesso negado! Sessao nao encontrada");
}