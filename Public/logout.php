<?php
session_start(); // Inicia a sessão para poder acessá-la

session_unset(); // Remove todas as variáveis da sessão

session_destroy(); // Destrói a sessão em si

// Redireciona para a página de login
header('Location: /views/login_usuarios.html'); // Ajuste o caminho se necessário
exit();
?>