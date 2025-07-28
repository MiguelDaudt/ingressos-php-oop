<?php

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

use App\Models\Produto;

if(!isset($_SESSION['usuario_id']) || $_SESSION['usuario_papel'] !== 'cliente'){
        echo "<script>alert('Voce precisa estar logado como Cliente para acessar');
        window.location.href = '/Public/index.php';
        </script>";}

$id_ingressos = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(!$id_ingressos){
        echo "<script>alert('ID do ingresso nao encontrado');
        window.location.href = '/Public/index.php';
        </script>";
    }

$ingresso = new Produto();
$produto = $ingresso->procurar($id_ingressos);

if(!$produto){
    die("Ingresso reservado nao encontrado");
}

if ($produto['id_usuario_reserva'] !== $_SESSION['usuario_id']) {
        echo "<script>alert('Esta reserva nao pertence a voce ou ja expirou');
        window.location.href = '/Public/index.php';
        </script>";
    }

require_once __DIR__ . '/../views/Compras/confirmar_compra_view.php';

