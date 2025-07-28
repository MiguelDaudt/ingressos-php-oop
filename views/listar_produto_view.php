<?php

if(!isset($_SESSION['usuario_id']) || $_SESSION['usuario_papel'] !== 'vendedor'){
        echo "<script>alert('Voce precisa estar logado como \'Vendedor\' para poder ter acesso');
        window.location.href = '/Public/index.php';
        </script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meus Ingressos</title>
    <link rel="stylesheet" href="/Public/css/style.css">
</head>
<body>
    <h1>Meus Ingressos Cadastrados</h1>
    
    <table class="tabela-dados">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Endereço</th>
                <th>Qtd.</th>
                <th>Preço</th>
                <th>Início do Evento</th>
                <th>Fim do Evento</th>
                <th>Ações</th>
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
                    <td>R$ <?= htmlspecialchars($produto['preco']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($produto['data_evento'])) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($produto['data_evento_fim'])) ?></td>
                    <td>
                        <a href="/Public/produtos/excluir_produto.php?id=<?= $produto['id'] ?>" class="acao-btn deletar-btn">Deletar</a>
                        <a href="/Public/produtos/editar_produto.php?id=<?= $produto['id'] ?>" class="acao-btn editar-btn">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        
    <br><br>
    <a href="/Public/index.php" class="botao">Voltar</a>
</html>