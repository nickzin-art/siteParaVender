<?php

require_once '../src/config/config.php';

if (isLoggedIn()) {
    header('Location: dashboard.php');
    exit();
}

$csrf_token = Security::generateCSRFToken();

?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Login</h1>

            <?php
            $success = Session::getFlash('success');
            $error = Session::getFlash('error');

            if ($success): ?>
                <div class="alert alert-success">
                    <?php echo $success; ?>
                </div>

            <?php endif;

            if ($error): ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="../src/controllers/AuthController.php?action=login" method="POST" class="form">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required value="<?php echo $_POST['email'] ?? ''; ?>" placeholder="seu@email.com">

                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required minlength="8" autocomplete="new-password" placeholder="Sua senha">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Entrar</button>

            </form>

            <div class="demo-credentials">
                <p><strong>E-mail: exemplo@email.com</strong></p>
                <p>12345678</p>
            </div>
            <div class="links">
                <a href="index.php">Voltar para Home</a>
                <a href="cadastro.php">Não tem conta? Cadastre-se</a>
                <a href="recuperacaodesenha.html">Esqueceu a Senha</a>
                <a href="./telas/index.html">Voltar</a>
            </div>
        </div>
    </div>
    
</body>
</html>