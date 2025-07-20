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
    try{

    $excluir = new Produto();
    $evento = $excluir->procurar($id_produto);

    if(!$evento || $evento['id_usuario'] !== $_SESSION['usuario_id']){
        die("Voce nao tem permissao para deletar esse evento");
    }

    if($excluir->deletarEvento($id_produto)){
        header("Location: /Public/produtos/listar_produto.php");
        exit();
    }
    else{
        die("Erro ao deletar Evento");
    }
    
    } catch(PDOException $e){
        die("Erro ao encontrar o Evento no banco de dados" . $e->getMessage());
    }


