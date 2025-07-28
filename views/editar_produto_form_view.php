<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Evento - XAP Cultura</title>
    <link rel="stylesheet" href="/Public/css/style.css">
</head>
<body class="fundo-pagina-forms">

    <div class="form-container">
        <h1>Atualizando: <?= htmlspecialchars($eventoAtual['nome']) ?></h1>
        
        <form action="/Public/produtos/editar_produto.php?id=<?= htmlspecialchars($eventoAtual['id']) ?>" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="nome">Nome do Evento:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($eventoAtual['nome']) ?>" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="3"><?= htmlspecialchars($eventoAtual['descricao']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($eventoAtual['endereco']) ?>">
            </div>

            <div class="form-group">
                <label for="tipo_evento">Tipo de Evento:</label>
                <select id="tipo_evento" name="tipo_evento">
                    <option value="show" <?= ($eventoAtual['tipo_evento'] ?? '') == 'show' ? 'selected' : '' ?>>Show</option>
                    <option value="teatro" <?= ($eventoAtual['tipo_evento'] ?? '') == 'teatro' ? 'selected' : '' ?>>Teatro</option>
                    <option value="comedia" <?= ($eventoAtual['tipo_evento'] ?? '') == 'comedia' ? 'selected' : '' ?>>Comédia</option>
                    <option value="danca" <?= ($eventoAtual['tipo_evento'] ?? '') == 'danca' ? 'selected' : '' ?>>Dança</option>
                    <option value="outro" <?= ($eventoAtual['tipo_evento'] ?? '') == 'outro' ? 'selected' : '' ?>>Outro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" value="<?= htmlspecialchars($eventoAtual['preco']) ?>" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade de Ingressos:</label>
                <input type="number" id="quantidade" name="quantidade" value="<?= htmlspecialchars($eventoAtual['quantidade']) ?>" required>
            </div>

            <div class="form-group">
                <label for="data_evento">Data de Início do Evento:</label>
                <input type="datetime-local" id="data_evento" name="data_evento" value="<?= !empty($eventoAtual['data_evento']) ? date('Y-m-d\TH:i', strtotime($eventoAtual['data_evento'])) : '' ?>">
            </div>

            <div class="form-group">
                <label for="data_evento_fim">Data de Fim do Evento:</label>
                <input type="datetime-local" id="data_evento_fim" name="data_evento_fim" value="<?= !empty($eventoAtual['data_evento_fim']) ? date('Y-m-d\TH:i', strtotime($eventoAtual['data_evento_fim'])) : '' ?>">
            </div>

            <div class="form-group">
                <label for="banner_imagem">Trocar Banner (opcional):</label>
                
                <?php if (!empty($eventoAtual['caminho_imagem'])): ?>
                    <img src="<?= htmlspecialchars($eventoAtual['caminho_imagem']) ?>" alt="Banner Atual" style="max-width: 100px; display: block; margin-bottom: 10px;">
                <?php endif; ?>

                <input type="file" id="banner_imagem" name="banner_imagem">
                
                <input type="hidden" name="caminho_imagem_antiga" value="<?= htmlspecialchars($eventoAtual['caminho_imagem']) ?>">
            </div>

            <div class="form-actions">
                <button type="submit" class="botao-forms">Salvar Alterações</button>
                <a href="/Public/produtos/listar_produto.php" class="botao-forms-link">Cancelar e Voltar</a>
            </div>
        </form>
    </div>

</body>
</html>