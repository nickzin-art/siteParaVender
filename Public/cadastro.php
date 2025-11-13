<?php

require_once '../src/config/config.php';

if(isLoggedIn() ) {
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Cadastro de Usuário</h1>
            <?php
            $sucess = Session::getFlash('sucess');
            $error = Session::getFlash('error');

            if ($sucess): ?>
                <div class="alert alert-sucess">
                    <?php echo $sucess; ?>
                </div>
            <?php endif;

            if ($error): ?>
                <div class="alert alert-error">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>

            <form action="../src/controllers/AuthController.php?action=register" method="POST" class="form">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>">

                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome" required value="<?php echo $_POST['nome'] ?? ''; ?> " minlength="2" maxlength="100" placeholder="Seu nome completo">

                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required value="<?php echo $_POST['email'] ?? ''; ?>" placeholder="seu@email.com">

                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required minlength="8" autocomplete="new-password" placeholder="Sua senha">
                </div>

                <div class="form-group">
                    <label for="confirmar_senha">Senha:</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" required minlength="8" autocomplete="new-password" placeholder="Digite a senha novamente">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>

            <div class="links">
                <a href="index.php">Voltar para Home</a>
                <a href="login.php">Já tem conta? Faça login</a>
            </div>


        </div>
    </div>
    
</body>
</html>