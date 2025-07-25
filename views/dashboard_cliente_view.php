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
    <a href="/Public/logout.php" class="botao">Sair (Logout)</a><br><br>
    <a href="/Public/Clientes/vitrine_compras.php" class="botao">Vitrine Ingressos</a>
    <a href="/Public/Clientes/meus_ingressos.php" class="botao">Meus Ingressos</a>
</body>
</html>