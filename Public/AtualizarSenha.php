<?php
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/models/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $novaSenha = $_POST["senha"];

    $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

    $userModel = new User($pdo);

    $sql = "UPDATE usuarios SET senha_hash = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$senhaHash, $email]);

    echo "<p>Senha atualizada com sucesso!</p>";
    header('Location: login.php');
}
?>
