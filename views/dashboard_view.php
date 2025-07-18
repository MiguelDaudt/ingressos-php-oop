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
    <a href="logout.php">Sair (Logout)</a>
</body>
</html>