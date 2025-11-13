<?php

require_once '../config/config.php';
require_once '../models/User.php';
require_once '../utils/Security.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';

    if ($action === 'register') {
        handleRegister($pdo);
    } elseif ($action === 'login') {
        handleLogin($pdo);
    }
}
 
function handleRegister($pdo) {
    //Verificar CSRF Token
    if(!Security::verifyCSRFToken($_POST['csrf_token'] ?? '')) {
        Session::setFlash('error', "Token de segurança inválido.");
        header('Location: ../../public/cadastro.php');
        exit();
    }

    $nome = Security::sanitizeInput($_POST['nome'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';

    //Validações
    $errors = [];


    if(!Security::validateName($nome)) {
        $errors[] = "Nome deve ter entre 2 e 100 caracteres.";
    }

    if(!Security::validateEmail($email)) {
        $errors[] = "E-mail inválido.";
    }

    if(!Security::validatePassword($senha)) {
        $errors[] = "Senha deve ter pelo menos 8 caracteres, Letras Maiusculas e minusculas e numeros de 0 a 9";
    }

    if($senha !== $confirmar_senha) {
        $errors[] = "Senhas não coincidem.";
    }

    if(empty($errors)) {
        try {
            $userModel = new User($pdo);

            //Verificar se o e-mail já existe
            if($userModel->emailExists($email)) {
                $errors[] = "Este e-mail já está cadastrado.";
            } else {
                //Hash da senha
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

                //Inserir usuário
                if($userModel->create($nome, $email, $senha_hash)) {
                    Session::setFlash('sucess', "Cadastro realizado com sucesso! Faça o login.");

                    header('Location: ../../public/login.php');
                    exit();
                } else {
                    $errors[] = "Erro ao criar conta. Tente novamente";
                }
            }
        } catch (PDOExeption $e) {
            error_log("Erro no cadastro: " . $e->getMessage());
            $errors[] = "Erro no sistema. Tente novamente";

        }

        if(!empty($errors)) {
            Session::setFlash('error', implode('<br>', $errors));
            header('Location: ../../public/cadastro.php');
            exit();
        }

    }

}

function handleLogin($pdo) {
    // Verificar CSRF Token
    if (!Security::verifyCSRFToken($_POST['csrf_token'] ?? '')) {
        Session::setFlash('error', "Token de segurança inválido.");
        header('Location: ../../public/login.php');
        exit();
    }

    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    $errors = [];

    if (!Security::validateEmail($email)) {
        $errors[] = "E-mail inválido.";
    }

    if (empty($senha)) {
        $errors[] = "Senha é obrigatória.";
    }

    if (empty($errors)) {
        try {
            $userModel = new User($pdo);
            $usuario = $userModel->findByEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha_hash'])) {
                if ($usuario['ativo'] == 1) {
                
                    Session::setUser($usuario);

                    $_SESSION['user_nivel'] = $usuario['nivel'] ?? 'user';

                    
                    $userModel->updateLastLogin($usuario['id']);
                    Security::logAccess($pdo, $usuario['id'], 'login', true);

                    if ($_SESSION['user_nivel'] === 'admin') {
                        header('Location: ../../Public/adm.php');
                    } else {
                        header('Location: ../../Public/dashboard.php');
                    }
                    exit();
                } else {
                    $errors[] = "Conta desativada.";
                }
            } else {
                $errors[] = "E-mail ou senha incorretos.";
                if ($usuario) {
                    Security::logAccess($pdo, $usuario['id'], 'login_failed', false);
                }
            }
        } catch (PDOException $e) {
            error_log("Erro no login: " . $e->getMessage());
            $errors[] = "Erro no sistema. Tente novamente.";
        }
    }

    if (!empty($errors)) {
        Session::setFlash('error', implode('<br>', $errors));
        header('Location: ../../Public/login.php');
        exit();
    }
}
