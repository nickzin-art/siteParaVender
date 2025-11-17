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
    <title>Login — Sistema</title>
    <link rel="stylesheet" href="./assets/style.css?v=1">
</head>
<body>

    <div class="container">
        <div class="card animate">

            <div class="header">
                <h1>Bem-vindo</h1>
                <p>Entre na sua conta para continuar</p>
            </div>

            <?php
            $success = Session::getFlash('success');
            $error = Session::getFlash('error');
            ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="../src/controllers/AuthController.php?action=login" method="POST" class="form">

                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        required 
                        value="<?php echo $_POST['email'] ?? ''; ?>" 
                        placeholder="seu@email.com">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input 
                        type="password" 
                        name="senha" 
                        id="senha" 
                        required 
                        minlength="8" 
                        placeholder="Sua senha">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Entrar
                </button>
            </form>

            <!-- Credenciais de demonstração -->
            <div class="demo-info">
                <p><strong>E-mail:</strong> exemplo@email.com</p>
                <p><strong>Senha:</strong> 12345678</p>
            </div>



        </div>
    </div>

</body>
</html>
