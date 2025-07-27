<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao seu Dashboard, <?=htmlspecialchars($dadosUsuarios['nome'])?></h1>
    <p>Este é um conteúdo exclusivo para Usuários.</p>
    <br>
    <a href="/Public/logout.php" class="botao">Sair (Logout)</a>
    <a href="/Public/produtos/listar_produto.php" class="botao">Mostrar meus Evento</a>
    <a href="/views/criar_produto.html" class="botao">Criar Evento</a>
    <?php foreach ($ingressosDisponiveis as $ingresso): ?>
        <div>
            <?php if (!empty($ingresso['caminho_imagem'])): ?>
                <img 
                    src="<?= htmlspecialchars($ingresso['caminho_imagem']) ?>" 
                    alt="Banner para <?= htmlspecialchars($ingresso['nome']) ?>" 
                    class="imagem-quadrada">
            <?php endif; ?>
            <h3><?= htmlspecialchars($ingresso['nome']) ?></h3>
            <p>Categoria: <?= htmlspecialchars($ingresso['tipo_evento'])?></p>
            <p>Endereco: <?= htmlspecialchars($ingresso['endereco'])?></p>
            <p>Dercicao: <?= htmlspecialchars($ingresso['descricao']) ?></p>
            <p><strong>Preço:</strong> R$ <?= htmlspecialchars($ingresso['preco']) ?></p>
            <p><strong>Disponíveis:</strong> <?= htmlspecialchars($ingresso['quantidade']) ?></p>
            
            <a href="/Public/reservar.php?id=<?= $ingresso['id'] ?>" class="botao">Comprar Ingresso</a>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>