<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Produto;

$mostrar = new Produto();
$ingressosDisponiveis = $mostrar->mostrarEventoDisponivel();

require_once __DIR__ . '/../../views/vitrine_compras_views.php';
