<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../login.php");
    exit;
}
?>

<h2>Minha Conta</h2>

<p><strong>Usuário:</strong> <?php echo $_SESSION['usuario']; ?></p>

<p><strong>Tipo de Conta:</strong>
<?php
    if ($_SESSION['admin'] === true) {
        echo "Administrador";
    } else {
        echo "Usuário Comum";
    }
?>
</p>

<a href="logout.php">Sair</a>
