<?php

require_once __DIR__ . '/../../vendor/autoload.php';
session_start();
use App\Models\Produto;

if (isset($_SESSION['usuario_id'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $caminhoImagemParaSalvar = null;
        if (isset($_FILES['banner_imagem']) && $_FILES['banner_imagem']['error'] === UPLOAD_ERR_OK) {
            
            $caminhoTemporario = $_FILES['banner_imagem']['tmp_name'];
            $nomeUnico = uniqid() . '-' . basename($_FILES['banner_imagem']['name']);
            $diretorioUpload = __DIR__ . '/../uploads/banners/';

            if (!is_dir($diretorioUpload)) {
                mkdir($diretorioUpload, 0777, true);
            }

            $caminhoFinalNoServidor = $diretorioUpload . $nomeUnico;

            if (move_uploaded_file($caminhoTemporario, $caminhoFinalNoServidor)) {
                $caminhoImagemParaSalvar = '/Public/uploads/banners/' . $nomeUnico;
            }
        }


        $produtoModel = new Produto();
        
        $_POST['caminho_imagem'] = $caminhoImagemParaSalvar;
        $_POST['id_usuario'] = $_SESSION['usuario_id'];

        if ($produtoModel->inserir($_POST)) {
            header("Location: /Public/index.php"); 
            exit();
        } else {
            echo "<script>alert('Ocorreu um erro ao criar o produto');
            window.location.href = '/views/criar_produto_form.php';
            </script>";        
        }
    }

} else {
    die("Acesso negado (sem sessão).");
}