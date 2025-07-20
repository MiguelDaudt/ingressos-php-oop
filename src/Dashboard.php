<?php

namespace App;

use App\Core\Model;


class Dashboard extends Model{

    protected function getTableName(): string
    {
        return 'usuario';
    }

    public function verificarDadosUsuario($idDoUsuario){
    
            $stmt = $this->pdo->prepare("SELECT id, nome, email FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $idDoUsuario]);
            return $stmt->fetch();
        }    
}