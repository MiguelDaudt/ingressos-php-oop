<?php

require_once __DIR__ . '/../../vendor/autoload.php';
session_start();
use App\Models\Produto;

// Garante que o usuário está logado
if (isset($_SESSION['usuario_id'])) {

    // Garante que o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // --- Bloco de upload que agora sabemos que funciona ---
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
        // --- Fim do bloco de upload ---


        // Prepara os dados para o banco de dados
        $produtoModel = new Produto();
        
        // Adiciona os dados que não vêm do formulário
        $_POST['caminho_imagem'] = $caminhoImagemParaSalvar;
        $_POST['id_usuario'] = $_SESSION['usuario_id'];

        // Tenta inserir no banco
        if ($produtoModel->inserir($_POST)) {
            // Sucesso: Redireciona para a lista de produtos do vendedor
            header("Location: /Public/Usuarios/dashboard.php"); // Verifique se o nome do seu arquivo de listagem é este
            exit();
        } else {
            // Falha
            die("Ocorreu um erro ao salvar os dados do produto no banco de dados.");
        }
    }

} else {
    die("Acesso negado (sem sessão).");
}