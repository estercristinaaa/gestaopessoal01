<?php
require 'verifica_login.php';
require 'conexao.php';

$id_usuario = $_SESSION['usuario_id'];
$stmt = $conn->prepare("SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY data_criacao DESC");
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Minhas Tarefas</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Olá, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
    <a href="nova_tarefa.php">+ Nova Tarefa</a>
    <a href="logout.php">Sair</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php while ($tarefa = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
            <td><?= htmlspecialchars($tarefa['descricao']) ?></td>
            <td><?= htmlspecialchars($tarefa['status']) ?></td>
            <td>
                <a href="editar_tarefa.php?id=<?= $tarefa['id'] ?>">Editar</a> |
                <a href="excluir_tarefa.php?id=<?= $tarefa['id'] ?>" onclick="return confirm('Excluir tarefa?')">Excluir</a> |
                <a href="mudar_status.php?id=<?= $tarefa['id'] ?>">Alterar Status</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
