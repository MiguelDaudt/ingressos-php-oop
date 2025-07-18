<?php 

namespace App\Models;

use App\Database;
use App\Core\Model;
use PDOException;

class Produto extends Model{
    
    protected function getTableName(): string
    {
        return 'ingressos';
    }

    
    private function garantirTabelaIngressos()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS ingressos(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nome TEXT NOT NULL,
                    descricao TEXT,
                    preco REAL NOT NULL,
                    quantidade INTEGER NOT NULL,
                    reservado INTEGER DEFAULT 0,
                    data_reserva INTEGER,
                    id_usuario INTEGER NOT NULL,
                    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
                    )";
            $this->pdo->exec($sql);
        } catch (PDOException $e) {

            die("Erro fatal: Não foi possível verificar/criar a tabela de usuários. " . $e->getMessage());
        }
    }

    public function inserir(string $nome, string $descricao, float $preco, int $quantidade, int $reservado, int $data_reserva, int $id_usuario){
        if ($_SERVER["REQUEST_METHOD"] !== "POST"){
                die("Erro ao resgatar informacoes");
        }

            $nome = $_POST['nome'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $preco = $_POST['preco'] ?? null;
            $quantidade = $_POST['quantidade'] ?? null;
            $reservado = $_POST['reservado'] ?? null;
            $data_reserva = $_POST['data_reserva'] ?? null;
            $id_usuario = $_POST['id_usuario'] ?? null;

        try{
        $stmt = $this->pdo->prepare("INSERT INTO ingressos (nome, descricao, preco, quantidade, reservado, data_reserva, id_usuario) VALUES (:nome, :descricao, :preco, :quantidade, :reservado, :data_reserva, :id_usuario)");
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':quantidade' => $quantidade,
            ':reservado' => $reservado,
            ':data_reserva' => $data_reserva,
            ':id_usuario' => $id_usuario
            ]);
        } catch (PDOException $e) {
            die("Erro ao cadastrar produto. Por favor, tente novamente. " . $e->getMessage());
        }
    }

}