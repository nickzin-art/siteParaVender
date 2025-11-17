<?php
// lógica de adicionar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameProduct  = $_POST['produto'];
    $priceProduct = $_POST['price'];
    $imageProduct = $_POST['image'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .card {
            background: white;
            padding: 20px;
            width: 380px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            border-radius: 12px;
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 10px;
            background: #ddd;
        }

        h3 {
            margin: 12px 0 5px;
            font-weight: 600;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #4e54c8;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: #3b3fc1;
        }

        .preview {
            margin-top: 20px;
            padding: 15px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>

</head>
<body>

<div>

    <!-- FORMULÁRIO -->
    <div class="card">
        <h2>Adicionar Produto</h2>

        <img id="preview-img" src="<?php echo $imageProduct ?? ''; ?>" alt="Prévia da imagem">

        <form action="" method="POST">
            <h3>Nome</h3>
            <input type="text" name="produto" id="product" required>

            <h3>Preço</h3>
            <input type="text" name="price" id="price" required>

            <h3>Imagem URL</h3>
            <input type="text" name="image" id="image" oninput="preview()" required>

            <input type="submit" value="Adicionar">
        </form>
    </div>

    <!-- PRÉVIA DO RESULTADO -->
    <?php if (!empty($nameProduct)): ?>
    <div class="preview">
        <h3>Produto Adicionado:</h3>
        <p><strong>Nome:</strong> <?php echo $nameProduct; ?></p>
        <p><strong>Preço:</strong> <?php echo $priceProduct; ?></p>
        <img src="<?php echo $imageProduct; ?>" width="100%">
    </div>
    <?php endif; ?>

</div>

<script>
function preview() {
    const url = document.getElementById("image").value;
    document.getElementById("preview-img").src = url;
}
</script>

</body>
</html>
