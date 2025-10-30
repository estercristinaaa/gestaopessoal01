<?php
require 'verifica_login.php';
require 'conexao.php';

$id = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

// Busca status atual
$stmt = $conn->prepare("SELECT status FROM tarefas WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ii", $id, $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Tarefa não encontrada!");
}

$tarefa = $result->fetch_assoc();
$novo_status = match ($tarefa['status']) {
    'Pendente' => 'Em Andamento',
    'Em Andamento' => 'Concluída',
    default => 'Pendente',
};

$update = $conn->prepare("UPDATE tarefas SET status = ? WHERE id = ? AND usuario_id = ?");
$update->bind_param("sii", $novo_status, $id, $usuario_id);
$update->execute();

header('Location: dashboard.php');
exit;
?>
