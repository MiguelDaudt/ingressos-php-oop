<?php

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

use App\Models\Produto;

if(!isset($_SESSION['usuario_id']) || $_SESSION['usuario_papel'] !== 'cliente'){
    die("Acesso somente para clientes logados");
}

$id_ingressos = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(!$id_ingressos){
    die("Id do ingresso nao encontrado");
}

$ingresso = new Produto();
$produto = $ingresso->procurar($id_ingressos);

if(!$produto){
    die("Ingresso reservado nao encontrado");
}

if ($produto['id_usuario_reserva'] !== $_SESSION['usuario_id']) {
    die("Esta reserva não pertence a você ou já expirou.");
}

require_once __DIR__ . '/../views/confirmar_compra_view.php';

