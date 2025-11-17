<?php
require_once "../src/config/config.php";
require_once '../src/utils/Session.php';
require_once '../src/models/User.php';

Session::requireLevel('admin');

$userModel = new User($pdo);
$usuarios = $userModel->getAll();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Painel do Administrador</h1>
            <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_nome']); ?> (<?php echo $_SESSION['user_nivel']; ?>)</p>

            <h3>Usuários cadastrados</h3>
            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nível</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?php echo $u['id']; ?></td>
                        <td><?php echo htmlspecialchars($u['nome']); ?></td>
                        <td><?php echo htmlspecialchars($u['email']); ?></td>
                        <td><?php echo $u['nivel']; ?></td>
                        <td><?php echo $u['ativo'] ? 'Ativo' : 'Desativado'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="actions">
                <a href="dashboard.php" class="btn btn-secondary">Voltar</a>
                <a href="logout.php" class="btn btn-danger">Sair</a>
                <a href="index.php" class="btn btn-primary">Início</a>
                <a href="./telas/pastaAdm/editaProduto.php" class="btn btn-primary">editar produtos</a>
            </div>
        </div>
    </div>
</body>
</html>
