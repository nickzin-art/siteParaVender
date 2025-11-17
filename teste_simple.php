<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "siteParavender";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    echo "✅ Conexão com banco OK!";
    
    // Testa se a tabela existe
    $result = $pdo->query("SELECT * FROM usuarios LIMIT 1");
    echo "<br>✅ Tabela usuarios existe!";
    
} catch (PDOException $e) {
    echo "❌ Erro: " . $e->getMessage();
}
?>