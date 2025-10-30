<?php
require 'verifica_login.php';
require 'conexao.php';

$id = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

$stmt = $conn->prepare("SELECT * FROM tarefas WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ii", $id, $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Tarefa não encontrada!");
}

$tarefa = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $update = $conn->prepare("UPDATE tarefas SET titulo = ?, descricao = ? WHERE id = ? AND usuario_id = ?");
    $update->bind_param("ssii", $titulo, $descricao, $id, $usuario_id);
    $update->execute();

    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Tarefa</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Editar Tarefa</h2>
    <form method="post">
        <input type="text" name="titulo" value="<?= htmlspecialchars($tarefa['titulo']) ?>" required><br>
        <textarea name="descricao"><?= htmlspecialchars($tarefa['descricao']) ?></textarea><br>
        <button type="submit">Salvar Alterações</button>
    </form>
</div>
</body>
</html>
