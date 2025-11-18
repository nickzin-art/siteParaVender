<?php

require_once '../src/config/config.php';

if (isLoggedIn()) {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>Sistema Seguro</h1>
                <p>Versão Produção</p>
            </div>
            <?php
            $success = Session::getFlash('success');

            $error = Session::getFlash('error');

            if ($success): ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <div class="actions">
                <a href="cadastro.php" class="btn btn-primary">Cadastrar</a>
                <a href="login.php" class="btn btn-secondary">Login</a>
            </div>
            <div class="security-info">
                <h3>Sistema em modo de produção</h3>
                <ul>
                    <li>Senhas criptografadas</li>
                    <li>Proteção CSRF em todos os formulários</li>
                    <li>Sessões seguras com httPonly</li>
                    <li>Validações de entrada no servidor</li>
                    <li>Logs de auditoria de acesso</li>
                </ul>
            </div>

            <div class="demo-info">
                <p><strong>Usuário de demonstração: </strong></p>
                <p>Email: exemplo@email.com</p>
                <p>12345678</p>
            </div>
            <div class="links">
                <a href="login.php">Já tem conta? Faça login</a>
                <a href="cadastro.php">Não tem conta? Cadastre-se</a>
                <a href="./telas/index.php" class="btn btn-secondary">Voltar</a>
            </div>

        </div>
    </div>
    
</body>
</html>