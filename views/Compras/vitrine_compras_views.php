<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/style.css">
    <title>Vitrine de Eventos</title>
</head>
<body>
    <h1>Eventos Disponíveis</h1>
    
    <hr>

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
            <p>Descrição: <?= htmlspecialchars($ingresso['descricao']) ?></p>
            <p><strong>Preço:</strong> R$ <?= htmlspecialchars($ingresso['preco']) ?></p>
            <p><strong>Disponíveis:</strong> <?= htmlspecialchars($ingresso['quantidade']) ?></p>
            
            <a href="/public/reservar.php?id=<?= $ingresso['id'] ?>" class="botao">Comprar Ingresso</a>
        </div>
        <hr>
    <?php endforeach; ?>

    <a href="/public/clientes/meus_ingressos.php" class="botao">Ver Meus Ingressos</a>
    <br>
    <a href="/public/logout.php" class="botao">Sair</a>

</body>
</html>