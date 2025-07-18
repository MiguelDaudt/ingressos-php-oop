<?php

namespace App;


class Dashboard{

    public function verificarSession(){

        session_start();

        if (!isset($_SESSION['usuario_id'])) {
            header('Location: processar_login_usuario.php');
            exit();
        }
    
            return [
            'id' => $_SESSION['usuario_id'],
            'email' => $_SESSION['usuario_email'],
            'nome' => $_SESSION['usuario_nome']
            ];    
        }    
}