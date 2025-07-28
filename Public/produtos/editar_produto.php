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

    $caminhoImagemParaSalvar = $_POST['caminho_imagem_antiga'];

    if (isset($_FILES['banner_imagem']) && $_FILES['banner_imagem']['error'] === UPLOAD_ERR_OK) {
    
        $caminhoTemporario = $_FILES['banner_imagem']['tmp_name'];
        $nomeUnico = uniqid() . '-' . basename($_FILES['banner_imagem']['name']);
        $diretorioUpload = __DIR__ . '/../uploads/banners/';

        if (!is_dir($diretorioUpload)) {
            mkdir($diretorioUpload, 0777, true);
        }

        $caminhoFinalNoServidor = $diretorioUpload . $nomeUnico;

        if (move_uploaded_file($caminhoTemporario, $caminhoFinalNoServidor)) {
            $caminhoImagemParaSalvar = '/public/uploads/banners/' . $nomeUnico;
        }
    }

    $_POST['caminho_imagem'] = $caminhoImagemParaSalvar;

    if($evento->editarProduto($id_produto, $_POST)){
        header("Location: /Public/produtos/listar_produto.php");
        exit();
    } else {
        echo "<script>alert('Ocorreu um erro ao editar o Evento');
        window.location.href = '/views/Clientes/cadastro_cliente.html';
        </script>";    }
}

$eventoAtual = $evento->procurar($id_produto);

if (!$eventoAtual) {
    die("Produto não encontrado.");
}

if ($eventoAtual['id_usuario'] !== $_SESSION['usuario_id']) {
    die("Você não tem permissão para editar este produto.");
}

require_once __DIR__ . '/../../views/editar_produto_form_view.php';