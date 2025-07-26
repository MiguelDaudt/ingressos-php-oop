<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use App\Models\Produto;
use App\Dashboard;
if(isset($_SESSION['usuario_id'])){

    $mostrar = new Produto();
    $ingressosDisponiveis = $mostrar->mostrarEventoDisponivel();
    
    $verificador = new Dashboard();
    $dadosUsuarios = $verificador->verificarDadosUsuario($_SESSION['usuario_id']);

if ($dadosUsuarios) {
        require_once __DIR__ . '/../../views/Clientes/dashboard_cliente_view.php';
    } else {
        die("Erro: Usuário da sessão não encontrado no banco de dados. Por favor, faça o logout e login novamente.");
    }
    } else{
    die("Acesso negado! Sessao nao encontrada");
}


