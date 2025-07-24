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

try{
    $ingressos = new Produto();
    $id_cliente = $_SESSION['usuario_id'];

    $ingressos->liberarReserva($id_ingressos);

    if($ingressos->reservar($id_ingressos, $id_cliente)){
        header('Location: /public/confirmar_compra.php?id=' . $id_ingressos);
        exit();    
    } else {
        die("Esse ingresso nao esta mais disponivel :( ");
    }
} catch (PDOException $e){
    die("Nao foi possivel reservar o ingresso: " . $e->getMessage());
}