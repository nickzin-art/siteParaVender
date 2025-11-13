<?php

// Configurações de ambiente 
define("ENVIRONMENT", "production");

// Configurações do banco
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "sistema_login_prod";
$charset = "utf8mb4";

// Incluir utilitários
require_once __DIR__ . "/../utils/Security.php";
require_once __DIR__ . "/../utils/Session.php";


// Iniciar sessão segura
Session::start();

// Conexão PDO com tratamento de erros
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=$charset", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    error_log("Erro de conexão: " . $e->getMessage());
    die("Erro no sistema. Tente novamente mais tarde.");
}

// Verificar se o usuário está logado
function isLoggedIn() {
    return isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]);
}

// redirecionar se não estiver logado
function requireLogin() {
    if (!isLoggedIn()) {
        $_SESSION['error'] = 'Por favor, faça login para acessar esta página.';
        header('Location: ../public/login.php');
        exit();
    }
}

// Função para debug (Apenas para desenvolvimento)
function debug($data) {
    if (ENVIRONMENT === "development") {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


?>