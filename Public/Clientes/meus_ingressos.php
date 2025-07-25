<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use App\Models\Compra;
use App\Models\Produto;

if(!isset($_SESSION['usuario_id'])){
    die("Acesso negado");
}


$id_cliente = $_SESSION['usuario_id'];

$mostarCompra = new Compra();
$meus_ingressos = $mostarCompra->mostrarEventoComprado($id_cliente);


require_once __DIR__ . '/../../views/meus_ingressos_view.php';
