<?php
session_start();

// Se o usuário já estiver logado, redireciona para o dashboard
if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Tarefas Gestão pessoal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo básico — pode ficar em style.css */
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 350px;
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            margin: 10px;
            transition: 0.3s;
        }

        a:hover {
            background: #0056b3;
        }

        footer {
            margin-top: 30px;
            color: #777;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Meu Gestor de tarefas</h1>
        <p>Organize suas tarefas e aumente sua produtividade!</p>

        <a href="login.php">Entrar</a>
        <a href="cadastrar.php">Cadastrar-se</a>

        <footer>
            <p>SENAI MG</p>
        </footer>
    </div>
</body>
</html>
