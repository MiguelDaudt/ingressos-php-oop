<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Database;

try {
    echo "Conectando ao banco de dados...\n";
    $pdo = Database::conectar();
    echo "Conexão bem-sucedida!\n";

    $sql = "
        CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            senha TEXT NOT NULL,
            papel TEXT NOT NULL DEFAULT 'cliente'
        );

        CREATE TABLE IF NOT EXISTS ingressos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            descricao TEXT,
            preco REAL NOT NULL,
            quantidade INTEGER NOT NULL,
            reservado INTEGER DEFAULT 0,
            data_reserva INTEGER,
            id_usuario INTEGER NOT NULL,
            caminho_imagem TEXT,
            endereco TEXT,
            tipo_evento TEXT,
            data_evento TEXT,
            data_evento_fim TEXT,
            status TEXT DEFAULT 'disponivel',
            quantidade_reservada INTEGER DEFAULT 0,
            id_usuario_reserva INTEGER,
            FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
        );

        CREATE TABLE IF NOT EXISTS compras (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            id_cliente INTEGER NOT NULL,
            id_ingresso INTEGER NOT NULL,
            data_compra DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_cliente) REFERENCES usuarios(id),
            FOREIGN KEY (id_ingresso) REFERENCES ingressos(id)
        );
    ";

    $pdo->exec($sql);
    echo "Banco de dados e todas as tabelas foram criados/verificados com sucesso!\n";

} catch (\PDOException $e) {
    die("Erro ao configurar o banco de dados: " . $e->getMessage());
}