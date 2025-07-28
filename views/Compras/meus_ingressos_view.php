<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/style.css">
    <title>Meus Ingressos</title>
</head>
<body>
     <header class="barra-superior">

    <div class="logo">
        <img src="/Public/imagens/logo-Photoroom.png" alt="Logo XAP Cultura">
    </div>

    <nav class="navegacao-principal">
        <a href="/Public/index.php">Home</a>
    </nav>

    <div class="area-usuario">
        <?php if (isset($_SESSION['usuario_id'])): ?>
            
            <span class="bem-vindo">
                BEM VINDO(A), <?= strtoupper(htmlspecialchars($_SESSION['usuario_nome'])) ?>
            </span>
            <p class="bem-vindo">|</p>
            <a href="/Public/logout.php">
                Logout
            </a>

        <?php else: ?>

            <div class="autenticacao">
                <a href="/views/Clientes/cadastro_cliente.html">CADASTRO</a>
                <span>|</span>
                <a href="/views/Clientes/login_cliente.html">LOGIN</a>
            </div>

        <?php endif; ?>
    </div>

</header>


    <?php if (empty($meus_ingressos)): ?>

        <p>Você ainda não comprou nenhum ingresso.</p>
        <a href="/Public/index.php">Ver eventos disponíveis</a>

    <?php else: ?>

    <main class="conteudo-principal">
    <section class="vitrine-ingressos">
        <h2>Meus Ingressos Comprados</h2>
        
        <div class="grid-ingressos">

            <?php foreach ($meus_ingressos as $ingresso): ?>
                <article class="card-ingresso">
                    <div class="card-imagem">
                        <?php if (!empty($ingresso['caminho_imagem'])): ?>
                            <img src="<?= htmlspecialchars($ingresso['caminho_imagem']) ?>" class="imagem-quadrada">
                        <?php endif; ?>
                    </div>
                    <div class="card-info">
                        <h3><?= htmlspecialchars($ingresso['nome']) ?></h3>
                        <p class="local">Categoria: <?= htmlspecialchars($ingresso['tipo_evento']) ?></p>
                        <p class="local"><?= htmlspecialchars($ingresso['descricao']) ?></p>
                        <p class="preco">R$ <?= htmlspecialchars($ingresso['preco']) ?></p>
                        <p class="local">Endereco: <?= htmlspecialchars($ingresso['endereco']) ?></p>
                        <p class="local">Dia do Evento: <?= date('d/m/Y H:i', strtotime($ingresso['data_evento'])) ?></p>
                        <p><em>Comprado em: <?= date('d/m/Y H:i', strtotime($ingresso['data_compra'])) ?></em></p>


                    </div>
                </article>
            <?php endforeach; ?>

        </div> </section>
</main>

    <?php endif; ?>
    
</body>
</html>