<?php

require_once '../src/config/config.php';

if (isset($_SESSION['user_id'])) {
    try {
        Security::logAccess($pdo, $_SESSION['user_id'], 'logout', true);
    } catch (Excepition $e) {
        error_log("Erro ao registrar logout: " . $e->getMessage());
    }
}

Session::destroy();

Session::setFlash('sucess', 'Logout realizado com sucesso!');
header('Location: login.php');
exit();