<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Ingressos</title>
    <link rel="stylesheet" href="/Public/css/style.css">
</head>
<body>
    <h1>Meus Ingressos Cadastrados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Categoria</th>
                <th>Endereco</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Data do Evento</th>
                <th>Data do Fim do Evento</th>
                <th>Acoes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listar as $produto): ?>
                <tr>
                    <td><?= htmlspecialchars($produto['id']) ?></td>
                    <td><?= htmlspecialchars($produto['nome']) ?></td>
                    <td><?= htmlspecialchars($produto['descricao']) ?></td>
                    <td><?= htmlspecialchars($produto['tipo_evento']) ?></td>
                    <td><?= htmlspecialchars($produto['endereco']) ?></td>
                    <td><?= htmlspecialchars($produto['quantidade']) ?></td>
                    <td><?= htmlspecialchars($produto['preco']) ?></td>
                    <td><?= htmlspecialchars($produto['data_evento']) ?></td>
                    <td><?= htmlspecialchars($produto['data_evento_fim']) ?></td>
                    <td>
                        <a href="/Public/produtos/excluir_produto.php?id=<?= $produto['id'] ?>">Deletar</a>
                        <a href="/Public/produtos/editar_produto.php?id=<?= $produto['id'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <br><br>
        <a href="/Public/Usuarios/dashboard.php" class="botao">Voltar</a>
        <a href="/views/criar_produto.html" class="botao">Criar Evento</a>
</body>
</html>