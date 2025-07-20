<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Ingressos</title>
</head>
<body>
    <h1>Meus Ingressos Cadastrados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listar as $produto): ?>
                <tr>
                    <td><?= htmlspecialchars($produto['id']) ?></td>
                    <td><?= htmlspecialchars($produto['nome']) ?></td>
                    <td>R$ <?= htmlspecialchars($produto['preco']) ?></td>
                    <td>
                        <a href="/produtos/detalhes.php?id=<?= $produto['id'] ?>">Ver Detalhes</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>