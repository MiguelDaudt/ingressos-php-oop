<?php

session_start();

if(!isset($_SESSION['usuario_id'])){
        echo "<script>alert('Voce precisa estar logado como \'Vendedor\' para poder criar um evento');
        window.location.href = '/Public/index.php';
        </script>";
} elseif($_SESSION['usuario_papel'] == 'cliente'){
        echo "<script>alert('Voce precisa estar logado como \'Vendedor\' para poder criar um evento');
        window.location.href = '/Public/index.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Evento - XAP Cultura</title>
    <link rel="stylesheet" href="/Public/css/style.css">
</head>
<body class="fundo-pagina-forms">

    <div class="form-container">
        <h1>Cadastrar Novo Evento</h1>
        
        <form action="/Public/produtos/criar_produto.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="nome">Nome do Evento:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco">
            </div>

            <div class="form-group">
                <label for="tipo_evento">Tipo de Evento:</label>
                <select id="tipo_evento" name="tipo_evento">
                    <option value="show">Show</option>
                    <option value="teatro">Teatro</option>
                    <option value="comedia">Comédia</option>
                    <option value="danca">Dança</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="preco">Preço (ex: 25.50):</label>
                <input type="number" id="preco" name="preco" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade de Ingressos:</label>
                <input type="number" id="quantidade" name="quantidade" required>
            </div>

            <div class="form-group">
                <label for="data_evento">Data de Início do Evento:</label>
                <input type="datetime-local" id="data_evento" name="data_evento">
            </div>

            <div class="form-group">
                <label for="data_evento_fim">Data de Fim do Evento:</label>
                <input type="datetime-local" id="data_evento_fim" name="data_evento_fim">
            </div>

            <div class="form-group">
                <label for="banner_imagem">Banner do Evento (Imagem):</label>
                <input type="file" id="banner_imagem" name="banner_imagem">
            </div>

            <div class="form-actions">
                <button type="submit" class="botao-forms">Cadastrar Evento</button>
                <a href="/Public/index.php" class="botao-forms-link">Sair</a>
            </div>
        </form>
    </div>

</body>
</html>