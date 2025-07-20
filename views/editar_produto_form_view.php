<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Ingresso</title>
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
    <h1>Atualizando Evento: <?= htmlspecialchars($eventoAtual['nome']) ?></h1>

    <form method="POST" action="/public/produtos/editar_produto.php?id=<?= htmlspecialchars($eventoAtual['id']) ?>">
        
        <div>
            <label for="nome">Nome do Evento:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($eventoAtual['nome']) ?>">
        </div>
        
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"><?= htmlspecialchars($eventoAtual['descricao']) ?></textarea>
        </div>

        <div>
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="<?= htmlspecialchars($eventoAtual['preco']) ?>">
        </div>

        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="<?= htmlspecialchars($eventoAtual['quantidade']) ?>">
        </div>

        <div>
            <label for="data_evento">Data do Evento:</label>
            <input type="datetime-local" id="data_evento" name="data_evento" value="<?= htmlspecialchars($eventoAtual['data_evento']) ?>">
        </div>
        <div>
            <label for="data_evento">Data do Fim do Evento:</label>
            <input type="datetime-local" id="data_evento_fim" name="data_evento_fim" value="<?= htmlspecialchars($eventoAtual['data_evento_fim']) ?>">
        </div>

        <button type="submit" class="botao">Salvar Alterações</button>
    </form>

    <a href="/public/produtos/listar_produto.php" class="botao">Cancelar e Voltar</a>

</body>
</html>