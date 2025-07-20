<?php
// Inclui as classes necessárias
require_once __DIR__ . '/vendor/autoload.php';

use App\Database;

try {
    echo "Conectando ao banco de dados...\n";
    $pdo = Database::conectar();
    echo "Conexão bem-sucedida!\n";

    // SQL para criar a tabela de usuários (dependência para ingressos)
    $sqlUsuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        senha TEXT NOT NULL
    );";

    // SQL para criar a tabela de ingressos
    $sqlIngressos = "CREATE TABLE IF NOT EXISTS ingressos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        descricao TEXT,
        preco REAL NOT NULL,
        quantidade INTEGER NOT NULL,
        reservado INTEGER DEFAULT 0,
        data_reserva INTEGER,
        id_usuario INTEGER NOT NULL,
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    );";

    // Executa os comandos SQL
    $pdo->exec($sqlUsuarios);
    echo "Tabela 'usuarios' verificada/criada com sucesso!\n";

    $pdo->exec($sqlIngressos);
    echo "Tabela 'ingressos' verificada/criada com sucesso!\n";



    echo "\nSetup do banco de dados concluído!\n";

} catch (\PDOException $e) {
    die("Erro ao configurar o banco de dados: " . $e->getMessage());
}