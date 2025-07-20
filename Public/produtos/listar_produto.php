<?php

    require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use App\Models\Produto;

if(isset($_SESSION['usuario_id'])){
    

$mostrarEvento = new Produto();
$listar = $mostrarEvento->mostrarEvento($_SESSION['usuario_id']);

require_once __DIR__ . '/../../views/listar_produto.php';

}
else{
    die("Acesso negado!");
}