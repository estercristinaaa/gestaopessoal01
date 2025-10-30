<?php
require 'verifica_login.php';
require 'conexao.php';

$id = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

$stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ii", $id, $usuario_id);
$stmt->execute();

header('Location: dashboard.php');
exit;
?>
