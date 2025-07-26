<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use App\Models\Produto;
use App\Models\Compra;
use App\Database;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso negado.");
}

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_papel'] !== 'cliente') {
    die("Acesso restrito a clientes.");
}

$id_ingressos = filter_input(INPUT_POST, 'id_ingresso', FILTER_VALIDATE_INT);
if (!$id_ingressos) {
    die("ID de ingresso inválido.");
}

$id_cliente = $_SESSION['usuario_id'];

$pdo = Database::conectar();

$ingresso = new Produto();
$compra = new Compra();

try {
    $pdo->beginTransaction();

    $produto = $ingresso->procurar($id_ingressos);
    
    if (!$produto || $produto['id_usuario_reserva'] !== $id_cliente || $produto['data_reserva'] < (time() - 120)) {
         throw new \Exception("Sua reserva expirou ou é inválida. Por favor, tente novamente desde a vitrine.");
    }

    $compra_confirmada = $ingresso->confirmarCompra($id_ingressos, $id_cliente);
    
    if (!$compra_confirmada) {
        throw new \Exception("Não foi possível dar baixa no estoque do ingresso.");
    }

    $compra_registrada = $compra->registrarCompra($id_cliente, $id_ingressos);
    
    if (!$compra_registrada) {
        throw new \Exception("Não foi possível registrar sua compra no seu histórico.");
    }

    $pdo->commit();

    echo "<script>alert('Compra finalizada com sucesso!!');
    window.location.href = '/Public/Clientes/dashboard_cliente.php';
    </script>";
    exit();


} catch (\Exception $e) {
    $pdo->rollBack();
    die("Erro ao finalizar a compra: " . $e->getMessage());
}