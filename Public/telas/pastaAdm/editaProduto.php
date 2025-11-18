<?php
$arquivo = "../data/produtos.json";
$produtos = json_decode(file_get_contents($arquivo), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoProduto = [
        "nome" => $_POST['produto'],
        "preco" => $_POST['price'],
        "imagem" => $_POST['image']
    ];

    $produtos[] = $novoProduto;

    file_put_contents($arquivo, json_encode($produtos, JSON_PRETTY_PRINT));

    header("Location: editaProduto.php?ok=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

<div class="card">

    <h2>Adicionar Produto</h2>

    <?php if(isset($_GET["ok"])): ?>
        <p class="sucesso">Produto adicionado com sucesso!</p>
    <?php endif; ?>

    <form action="" method="POST">
        <h3>Nome</h3>
        <input type="text" name="produto" required>

        <h3>Preço</h3>
        <input type="text" name="price" required>

        <h3>Imagem URL</h3>
        <input type="text" name="image" id="image" oninput="preview()" required>

        <img id="preview-img" src="" class="preview">

        <input type="submit" value="Adicionar">
    </form>

    <a href="../index.php">Pagina Inicial</a>

</div>

<script>
function preview() {
    document.getElementById("preview-img").src =
        document.getElementById("image").value;
}
</script>

</body>
</html>
