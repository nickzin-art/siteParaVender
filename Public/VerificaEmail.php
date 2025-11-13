<?php
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/models/User.php';

$userModel = new User($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    $usuario = $userModel->RecoverByEmail($email);

    if ($usuario) {
        header("Location: TrocarSenha.php?email=" . urlencode($email));
        exit();
    } else {
        echo "<p style='color:red;'>E-mail não encontrado.</p>";
    }
}
?>
