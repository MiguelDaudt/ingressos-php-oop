<?php

namespace App\Core;

use App\Database;
use PDO;

abstract class Model{

    protected PDO $pdo;
    protected string $tabela;

    public function __construct()
    {
        $this->pdo = Database::conectar();
        $this->tabela = $this->getTableName();
    }

    abstract protected function getTableName(): string;

    public function procurar(int $id){
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tabela} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    
    public function mostrar(){
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tabela}");
        return $stmt->fetchAll();
    }

    public function deletar(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->tabela} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

}