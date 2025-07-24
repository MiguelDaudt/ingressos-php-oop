<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirme sua Compra</title>
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

    <h1>Finalize sua Compra</h1>
    <p>Você está comprando: <strong><?= htmlspecialchars($produto['nome']) ?></strong></p>
    <p>Preço: R$ <?= htmlspecialchars($produto['preco']) ?></p>
    <hr>

    <p style="color: red; font-weight: bold;">
        Você tem <span id="timer">02:00</span> para confirmar a compra antes que a reserva expire.
    </p>

    <form action="/Public/finalizar_compra.php" method="POST">
        
        <input type="hidden" name="id_ingresso" value="<?= htmlspecialchars($produto['id']) ?>">
        
        <button type="submit" class="botao">Confirmar e Comprar Agora</button>
    </form>
    <br>
    <a href="/Public/Clientes/vitrine_compras.php" class="botao">Cancelar e voltar para a vitrine</a>

    <script>
        let tempoRestante = 120; 
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
                window.location.href = '/Public/Clientes/vitrine_compras.php';
            }
        }, 1000);
    </script>

</body>
</html>