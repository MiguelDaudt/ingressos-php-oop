<?php

/**
 * Script de linha de comando para verificar o conteúdo da tabela 'usuarios'.
 * Para usar: abra o terminal na raiz do projeto e execute: php Verificar_tabela.php
 */

// Como o arquivo está na raiz do projeto, o caminho para o autoloader é direto.
require_once __DIR__ . '/vendor/autoload.php';

// Importa a classe Database, que está no namespace 'App'
use App\Database;

// AVISO CORRIGIDO: A linha 'use PDOException;' foi removida pois não é necessária.
// PDOException é uma classe global do PHP e não precisa ser importada.

// Adiciona uma linha em branco no início para melhor visualização.
echo "\n";


try{
    $pdo = Database::conectar();
    echo "✅ Conexão com o banco de dados estabelecida com sucesso!\n\n";

    $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS ingressos(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    descricao TEXT,
    preco REAL NOT NULL,
    quantidade INTEGER NOT NULL,
    reservado INTEGER DEFAULT 0,
    data_reserva INTEGER,
    id_usuario INTEGER NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    )");

    $stmt->execute();

    if ($stmt){
        echo "tabela criada com sucesso";
    }

} catch(PDOException $e){
        echo "❌ ERRO: " . $e->getMessage() . "\n";

}

try {
    // 1. Conecta ao banco de dados
    $pdo = Database::conectar();
    echo "✅ Conexão com o banco de dados estabelecida com sucesso!\n\n";

    // 2. Prepara e executa a consulta
    $stmt = $pdo->query("SELECT id, nome, descricao, preco, data_evento FROM ingressos ORDER BY id ASC");
    
    // 3. Busca todos os resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 4. Verifica se encontrou resultados e os exibe
    if ($usuarios) {
        echo "🔎 Conteúdo da tabela 'usuarios':\n";
        echo "-------------------------------------\n";
        print_r($usuarios);
        echo "-------------------------------------\n";
    } else {
        echo "ℹ️ Tabela 'usuarios' está vazia. Nenhum usuário encontrado.\n";
    }

} catch (PDOException $e) { // A classe PDOException é encontrada globalmente pelo PHP
    // Trata erros, como a tabela não existir
    echo "❌ ERRO: " . $e->getMessage() . "\n";
    echo "   (Verifique se a tabela 'ingressos' já foi criada).\n";
}

// Adiciona uma linha em branco no final.
echo "\n";
