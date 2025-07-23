<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Usuario;

        if ($_SERVER['REQUEST_METHOD'] !== "POST"){
            die("Voce nao tem permissao");

        }
            $email = $_POST['email'] ?? null;
            $senha = $_POST['senha'] ?? null;
            $papel_esperado = $_POST['papel_esperado'] ?? null;

        if(empty($email)||empty($senha)){
            die("Todos os campos devem ser preenchidos");
        }

        $usuarioM = new Usuario();
        $usuario = $usuarioM->login($email, $senha);

        if($usuario){

                $papelDoUsuarioNoBanco = trim($usuario['papel']);
                $papelEsperadoDoForm = trim($papel_esperado);

        if($papelDoUsuarioNoBanco === $papelEsperadoDoForm){
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_email'] = $usuario['email'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_papel'] = $usuario['papel'];
            

                if($usuario['papel'] === 'vendedor'){
                    header('Location: ../../Public/Usuarios/dashboard.php');
                    exit();
                }
                else{
                    header('Location: ../../Public/Clientes/dashboard_cliente.php');
                    exit();
                }
            } else {
                die("Voce nao tem uma conta desse tipo cadastrada para esse e-mail");
            }
            } else {
                die("E-mail ou Senha incorretos");
                }

