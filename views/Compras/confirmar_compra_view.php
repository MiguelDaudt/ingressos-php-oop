<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra - XAP Cultura</title>
    <link rel="stylesheet" href="/Public/css/style.css">
</head>
<body class="fundo-pagina-forms">

    <div class="form-container">
        <h1>Finalize sua Compra</h1>
        
        <div class="info-compra">
            <p><strong>Você está comprando:</strong> <?= htmlspecialchars($produto['nome']) ?></p>
            <p><strong>Preço:</strong> R$ <?= htmlspecialchars($produto['preco']) ?></p>
        </div>

        <p class="timer-aviso">
            Você tem <span id="timer">02:00</span> para confirmar a compra antes que a reserva expire.
        </p>

        <form action="/public/finalizar_compra.php" method="POST" class="form-actions">
            
            <input type="hidden" name="id_ingresso" value="<?= htmlspecialchars($produto['id']) ?>">
            
            <button type="submit" class="botao-forms">Confirmar e Comprar Agora</button>
            <a href="/Public/index.php" class="botao-forms-link">Cancelar e Voltar</a>
        </form>
    </div>

    <script>
        let tempoRestante = 120; // 2 minutos em segundos
        const timerElemento = document.getElementById('timer');

        const intervalo = setInterval(() => {
            tempoRestante--;
            let minutos = Math.floor(tempoRestante / 60);
            let segundos = tempoRestante % 60;

            minutos = minutos < 10 ? '0' + minutos : minutos;
            segundos = segundos < 10 ? '0' + segundos : segundos;

            timerElemento.textContent = `${minutos}:${segundos}`;

            if (tempoRestante <= 0) {
                clearInterval(intervalo);
                alert("Seu tempo de reserva expirou! O ingresso foi liberado.");
                window.location.href = '/Public/index.php';
            }
        }, 1000);
    </script>

</body>
</html>