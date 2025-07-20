<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao seu Dashboard, <?=htmlspecialchars($dadosUsuarios['nome'])?></h1>
    <p>Este é um conteúdo exclusivo para usuários logados.</p>
    <br>
    <style>
        .botao {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 0;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
    </style>
    <a href="logout.php" class="botao">Sair (Logout)</a><br><br>
    <a href="/Public/produtos/listar_produto.php" class="botao">Mostrar meus Evento</a>
    <a href="/views/criar_produto.html" class="botao">Criar Evento</a>
</body>
</html>