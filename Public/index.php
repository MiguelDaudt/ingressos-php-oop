<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use App\Models\Produto;

$mostrar = new Produto();
$ingressosDisponiveis = $mostrar->mostrarEventoDisponivel();

require_once __DIR__ . '/../views/index.html';
require_once __DIR__ . '/../views/Compras/vitrine_compras_views.php';

if(isset($_SESSION['usuario_id'])){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once __DIR__ . '/Clientes/meus_ingressos.php';
    }
}