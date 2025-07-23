<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use App\Models\Produto;

if(!isset($_SESSION['usuario_id'])){
    die("Acesso negado");
}

$mostrar = new Produto();
$ingressosDisponiveis = $mostrar->mostrarEventoDisponivel();

require_once __DIR__ . '/../../views/vitrine_compras_views.php';
