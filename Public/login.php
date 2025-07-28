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
            echo "<script>alert('Voce precisa preencher todos os campos');
            window.location.href = '/Public/index.php';
            </script>";
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
                    header('Location: ../../Public/index.php');
                    exit();
                }
                else{
                    header('Location: ../../Public/index.php');
                    exit();
                }
            } else {
                    echo "<script>alert('Voce nao tem conta cadastrada desse tipo para esse Email');
                    window.location.href = '/views/Clientes/login_cliente.html';
                    </script>";            
                }
            } else {
                        echo "<script>alert('Email ou Senha incorretos');
                        window.location.href = '/views/Clientes/login_cliente.html';
                        </script>";
                }

