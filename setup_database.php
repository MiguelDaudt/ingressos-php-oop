<?php
// Inclui as classes necessárias
require_once __DIR__ . '/vendor/autoload.php';

use App\Database;

try {
    echo "Conectando ao banco de dados...\n";
    $pdo = Database::conectar();
    echo "Conexão bem-sucedida!\n";

    // SQL para criar a tabela de usuários (dependência para ingressos)
    $sqlUsuarios = ("CREATE TABLE usuarios (
	id	INTEGER,
	nome	TEXT NOT NULL,
	email	TEXT NOT NULL UNIQUE,
	senha	TEXT NOT NULL,
	papel	TEXT NOT NULL DEFAULT 'cliente',
	PRIMARY KEY(id)"
    );

    // SQL para criar a tabela de ingressos
    $sqlIngressos = ("CREATE TABLE ingressos (
	id	INTEGER,
	nome	TEXT NOT NULL,
	descricao	TEXT,
	preco	REAL NOT NULL,
	quantidade	INTEGER NOT NULL,
	quantidade_reservada	INTEGER DEFAULT 0,
	data_reserva	INTEGER,
	id_usuario	NUMERIC NOT NULL,
	data_evento	TEXT,
	data_evento_fim	TEXT,
	id_usuario_reserva	INTEGER, caminho_imagem TEXT, endereco TEXT, tipo_evento TEXT,
	PRIMARY KEY(id AUTOINCREMENT),
	FOREIGN KEY(id_usuario) REFERENCES usuarios(id)
    ");

	//sql para criar a tabela de compras
	$sqlCompras = ("CREATE TABLE compras (
	id	INTEGER,
	id_cliente	INTEGER NOT NULL,
	id_ingresso	INTEGER NOT NULL,
	data_compra	DATETIME DEFAULT CURRENT_TIMESTAMP,
	quantidade	INTEGER NOT NULL DEFAULT 1,
	PRIMARY KEY(id AUTOINCREMENT),
	FOREIGN KEY(id_cliente) REFERENCES usuarios(id),
	FOREIGN KEY(id_ingresso) REFERENCES ingressos(id)
	");

	$pdo->exec($sqlCompras);
    echo "Tabela 'compras' verificada/criada com sucesso!\n";

    $pdo->exec($sqlUsuarios);
    echo "Tabela 'usuarios' verificada/criada com sucesso!\n";

    $pdo->exec($sqlIngressos);
    echo "Tabela 'ingressos' verificada/criada com sucesso!\n";



    echo "\nSetup do banco de dados concluído!\n";

} catch (\PDOException $e) {
    die("Erro ao configurar o banco de dados: " . $e->getMessage());
}
