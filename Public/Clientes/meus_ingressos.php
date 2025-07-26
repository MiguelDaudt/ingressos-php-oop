<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use App\Models\Compra;
use App\Models\Produto;

if(!isset($_SESSION['usuario_id'])){
echo "<script>alert('Voce precisa estar logado para poder visualizar seus ingressos');
window.location.href = '/Public/index.php';
</script>";
}


$id_cliente = $_SESSION['usuario_id'];

$mostarCompra = new Compra();
$meus_ingressos = $mostarCompra->mostrarEventoComprado($id_cliente);


require_once __DIR__ . '/../../views/meus_ingressos_view.php';
