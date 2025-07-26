<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Vitrine de Eventos</title>
</head>
<body>
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
    <h1>Eventos Disponíveis</h1>
    <hr>

    <?php foreach ($ingressosDisponiveis as $ingresso): ?>
        <div>
            <h3><?= htmlspecialchars($ingresso['nome']) ?></h3>
            <p><?= htmlspecialchars($ingresso['descricao']) ?></p>
            <p><strong>Preço:</strong> R$ <?= htmlspecialchars($ingresso['preco']) ?></p>
            <p><strong>Disponíveis:</strong> <?= htmlspecialchars($ingresso['quantidade']) ?></p>
            
            <a href="/Public/reservar.php?id=<?= $ingresso['id'] ?>" class="botao">Comprar Ingresso</a>
        </div>
        <hr>
    <?php endforeach; ?>
    </body>
</html>