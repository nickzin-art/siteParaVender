<?php
 
require_once "../src/config/config.php";
require_once '../src/models/User.php';
require_once '../src/utils/Session.php';

/*
Session::requireLogin();

requireLogin();
*/
 
try {
    $userModel = new User($pdo);
    $usuario = $userModel->findById($_SESSION["user_id"]);
 
    if (!$usuario) {
        //session_destroy();
        header("Location: login.php");
        exit();
    }
 
    //Buscar histórico de login
    $loginHistory = $userModel->getLoginHistory($_SESSION["user_id"], 5);
    } catch(PDOException $e) {
       
    error_log("Erro ao carregar usuário: " . $e->getMessage(), 3, "../logs/errors.log");
    die("Erro ao carregar dados");
    }
 
$csrf_token = Security::generateCSRFToken();
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="dashboard-header">
                <div>
                    <h1>Bem-vindo de volta!</h1>
                </div>
                <div class="user-info">
                    <span>Olá, <strong><?php echo htmlspecialchars($usuario["nome"]) ?></strong></span>
                </div>
            </div>
            <?php
            $success = Session::getFlash("success");
            $error = Session::getFlash("error");
           
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
 
            <div class="info-card">
                <h3>Informações da Conta</h3>
                <div class="info-list">
                    <p><strong>ID: </strong>#<?php echo $usuario["id"]; ?></p>
                    <p><strong>Nome: </strong><?php echo htmlspecialchars($usuario["nome"]); ?></p>
                    <p><strong>Email: </strong><?php echo htmlspecialchars($usuario["email"]); ?></p>
                    <p><strong>Data de Cadastro: </strong><?php echo date("d/m/Y H:i", strtotime($usuario["data_cadastro"])); ?></p>
                    <p><strong>Último Login: </strong><?php echo $usuario["ultimo_login"] ? date("d/m/Y H:i", strtotime($usuario["ultimo_login"])) : "Primeiro acesso"; ?></p>
                </div>
            </div>
            <div class="info-card">
                <h3>Segurança</h3>
                <div class="security-status">
                    <p>☑️ Sessão segura ativada</p>
                    <p>☑️ Autenticação validada</p>
                    <p>☑️ Conexão criptografada</p>
                    <p>Sessão iniciada: <?php echo date("H:i:s"); ?></p>
                </div>
            </div>
            <div class="info-card">
                <h3>Atualizar Perfil</h3>
                <form action="../src/controllers/UserController.php?action=update_profile" method="POST" class="form">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                    <div class="form-group">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" required value="<?php echo htmlspecialchars($usuario["nome"]); ?>" minlength="2" maxlength="100">
                </div>
                    <button type="submit" class="btn btn-secondary"> Atualizar Nome</button>
                </form>
            </div>
            <?php if (!empty($loginHistory)): ?>
                <div class="info-card">
                    <h3>Histórico de Acessos</h3>
                    <div class="history-list">
                        <?php foreach ($loginHistory as $log): ?>
                            <div class="history-item <?php echo $log['sucesso'] ? 'success' : 'error'; ?>">
                                <span class="action"><?php echo $log["acao"]; ?></span>
                                <span class="date"><?php echo date("d/m/Y H:i", strtotime($log["data_acesso"])); ?></span>
                                <span class="ip"><?php echo $log["ip_address"]; ?></span>
                                <span class="status"><?php echo $log["sucesso"] ? "☑️" : "❌"; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif ?>
        </div>
        <div class="actions">
            <a href="./telas/index.php" class="btn btn-secondary">Página Inicial</a>
            <a href="logout.php" class="btn btn-danger">Sair do Sistema</a>
            <a href="adm.php">Painel Administrativo</a>
        </div>
    </div>
</body>
</html>
 