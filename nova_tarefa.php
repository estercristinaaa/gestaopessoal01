<?php
require 'verifica_login.php';
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $usuario_id = $_SESSION['usuario_id'];

    $stmt = $conn->prepare("INSERT INTO tarefas (titulo, descricao, status, usuario_id) VALUES (?, ?, 'Pendente', ?)");
    $stmt->bind_param("ssi", $titulo, $descricao, $usuario_id);
    $stmt->execute();

    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Nova Tarefa</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Nova Tarefa</h2>
    <form method="post">
        <input type="text" name="titulo" placeholder="Título" required><br>
        <textarea name="descricao" placeholder="Descrição"></textarea><br>
        <button type="submit">Salvar</button>
    </form>
</div>
</body>
</html>
