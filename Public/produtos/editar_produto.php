<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Produto;

session_start();

if(!isset($_SESSION['usuario_id'])){
    die("Acesso negado");
}

$id_produto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(!$id_produto){
        die("Erro ID do produto invalido");
    }
        $evento = new Produto();

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if($evento->editarProduto($id_produto, $_POST)){
                header("Location: /Public/produtos/listar_produto.php");
                exit();
        } else{
            die("Ocorreu um erro ao Editar o Evento");
        }
}

$eventoAtual = $evento->procurar($id_produto);

if (!$eventoAtual) {
    die("Produto não encontrado.");
}

if ($eventoAtual['id_usuario'] !== $_SESSION['usuario_id']) {
    die("Você não tem permissão para editar este produto.");
}

require_once __DIR__ . '/../../views/editar_produto_form_view.php';






