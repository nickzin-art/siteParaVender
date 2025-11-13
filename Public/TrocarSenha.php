<?php
$email = $_GET["email"] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
</head>
<body>
    <h1>Redefinir Senha</h1>
    <form method="post" action="AtualizarSenha.php">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

        <label for="senha">Nova senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Atualizar senha</button>
    </form>
</body>
</html>
