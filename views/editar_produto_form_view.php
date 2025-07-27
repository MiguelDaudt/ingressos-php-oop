<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Ingresso</title>
    <link rel="stylesheet" href="/Public/css/style.css">
</head>
<body>
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
            <label for="endereco">Endereco do evento:</label>
            <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($eventoAtual['endereco']) ?>">
        </div>

        <div>
            <label for="tipo_evento">Tipo de Evento:</label>
                <select id="tipo_evento" name="tipo_evento">
                    <option value="show">Show</option>
                    <option value="teatro">Teatro</option>
                    <option value="comedia">Comédia</option>
                    <option value="danca">Dança</option>
                    <option value="outro">Outro</option>
                </select><br><br>
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