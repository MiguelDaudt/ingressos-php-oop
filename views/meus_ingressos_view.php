<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Ingressos</title>
</head>
<body>
    <h1>Meus Ingressos Comprados</h1>
    <p>Olá, <?= htmlspecialchars($_SESSION['usuario_nome']) ?>! Aqui estão os ingressos que você adquiriu.</p>
    <hr>

    <?php if (empty($meus_ingressos)): ?>

        <p>Você ainda não comprou nenhum ingresso.</p>
        <a href="/public/vitrine.php">Ver eventos disponíveis</a>

    <?php else: ?>

        <?php foreach ($meus_ingressos as $ingresso): ?>
            <div>
                <h3><?= htmlspecialchars($ingresso['nome']) ?></h3>
                <p><strong>Descrição:</strong> <?= htmlspecialchars($ingresso['descricao']) ?></p>
                <p><strong>Data do Evento:</strong> <?= htmlspecialchars($ingresso['data_evento']) ?></p>
                <p><em>Comprado em: <?= htmlspecialchars($ingresso['data_compra']) ?></em></p>
                </div>
            <hr>
        <?php endforeach; ?>

    <?php endif; ?>
    
    <br>
    <a href="/Public/Clientes/dashboard_cliente.php">Voltar para o Dashboard</a>
</body>
</html>