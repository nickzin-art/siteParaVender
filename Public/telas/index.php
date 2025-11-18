<?php
$produtos = json_decode(file_get_contents("./data/produtos.json"), true);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amagone Store</title>
    <link rel="stylesheet" href="./css/style2.css?v=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- NAV ORIGINAL MANTIDO -->
<header class="header">
    <div class="container">
        <div class="logo">
            <div class="logo-icon">⚡</div>
            <h1>Amagone <span>Store</span></h1>
        </div>
        
        <nav class="navbar">
            <a href="index.php" class="nav-link active">
                <i class="fas fa-home"></i> Início
            </a>
            <a href="produtos.php" class="nav-link">
                <i class="fas fa-shopping-bag"></i> Produtos
            </a>
            <a href="carrinho.php" class="nav-link cart-link">
                <i class="fas fa-shopping-cart"></i> Carrinho
                <span class="cart-count">0</span>
            </a>
            <a href="../login.php" class="nav-link login-btn">
                <i class="fas fa-user"></i> Minha Conta
            </a>
        </nav>

        <button class="mobile-menu">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>

<section class="featured-products" id="products">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">🎯 Produtos em Destaque</h2>
            <p>Os produtos cadastrados pelo administrador</p>
        </div>

        <div class="products-grid">

            <?php if (empty($produtos)): ?>
                <p style="text-align:center; opacity:0.6;">Nenhum produto cadastrado ainda.</p>
            <?php endif; ?>

            <?php foreach ($produtos as $p): ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="<?= $p["imagem"] ?>" alt="<?= $p['nome'] ?>">
                    <span class="product-badge new">🆕 NOVO</span>
                </div>

                <div class="product-info">
                    <span class="product-category">Produto</span>
                    <h3><?= $p["nome"] ?></h3>

                    <div class="product-price">
                        <span class="current-price">R$ <?= $p["preco"] ?></span>
                    </div>

                    <div class="product-actions">
                        <button class="btn btn-cart">
                            <i class="fas fa-cart-plus"></i> Adicionar
                        </button>
                        <button class="btn btn-buy">
                            <i class="fas fa-bolt"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

</body>
</html>
