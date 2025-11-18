<?php
session_start();

$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];

if ($usuario === "admin" && $senha === "1234") {
    $_SESSION['logado']  = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['admin']   = true;       
} else {
    $_SESSION['logado']  = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['admin']   = false;
}

header("Location: index.php");
exit;
?>
