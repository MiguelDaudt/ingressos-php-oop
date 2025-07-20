<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Ingressos</title>
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
    <h1>Meus Ingressos Cadastrados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Excluir</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listar as $produto): ?>
                <tr>
                    <td><?= htmlspecialchars($produto['id']) ?></td>
                    <td><?= htmlspecialchars($produto['nome']) ?></td>
                    <td><?= htmlspecialchars($produto['descricao']) ?></td>
                    <td><?= htmlspecialchars($produto['quantidade']) ?></td>
                    <td>R$ <?= htmlspecialchars($produto['preco']) ?></td>
                    <td>
                        <a href="/Public/produtos/excluir_produto.php?id=<?= $produto['id'] ?>">Deletar</a>
                    </td>
                    <td>
                        <a href="/Public/produtos/editar_produto.php?id=<?= $produto['id'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <br><br>
        <a href="/Public/dashboard.php" class="botao">Voltar</a>
</body>
</html>