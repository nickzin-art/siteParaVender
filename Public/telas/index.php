<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amagone Store - Tecnologia & Inovação</title>
    <link rel="stylesheet" href="./css/style2.css?v=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <div class="logo-icon">⚡</div>
                <h1>Amagone <span>Store</span></h1>
            </div>
            
            <nav class="navbar">
                <a href="index.html" class="nav-link active">
                    <i class="fas fa-home"></i> Início
                </a>
                <a href="produtos.html" class="nav-link">
                    <i class="fas fa-shopping-bag"></i> Produtos
                </a>
                <a href="carrinho.html" class="nav-link cart-link">
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <span class="hero-badge">🔥 Oferta Especial</span>
                    <h1>Tecnologia que <span>Inspira</span></h1>
                    <p>Descubra os melhores produtos tech com até 50% OFF. Frete grátis para todo Brasil!</p>
                    <div class="hero-actions">
                        <a href="produtos.html" class="btn btn-primary">
                            <i class="fas fa-bolt"></i> Comprar Agora
                        </a>
                        <a href="#products" class="btn btn-secondary">
                            <i class="fas fa-eye"></i> Ver Produtos
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat">
                            <strong>10K+</strong>
                            <span>Clientes Satisfeitos</span>
                        </div>
                        <div class="stat">
                            <strong>5K+</strong>
                            <span>Produtos Vendidos</span>
                        </div>
                        <div class="stat">
                            <strong>4.9</strong>
                            <span>Avaliação Média</span>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                 
                </div>
            </div>
        </div>
    </section>

    <!-- Produtos em Destaque -->
    <section class="featured-products" id="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">🎯 Produtos em Destaque</h2>
                <p>Os mais vendidos da semana</p>
            </div>
            <div class="products-grid">
                
                <!-- Produto 1 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="iPhone 15 Pro">
                        <div class="product-overlay">
                            <button class="btn-wishlist">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="btn-quickview">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <span class="product-badge hot">🔥 HOT</span>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Smartphone</span>
                        <h3>iPhone 15 Pro Max</h3>
                        <p class="product-description">Titanium, Câmera 48MP, Chip A17 Pro, 256GB</p>
                        <div class="product-price">
                            <span class="current-price">R$ 7.499</span>
                            <span class="original-price">R$ 8.999</span>
                            <span class="discount">-17%</span>
                        </div>
                        <div class="product-features">
                            <span><i class="fas fa-battery-full"></i> 24h bateria</span>
                            <span><i class="fas fa-camera"></i> 48MP</span>
                        </div>
                        <div class="product-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="rating-count">(2.4k)</span>
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

                <!-- Produto 2 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Fone Sony WH-1000XM4">
                        <div class="product-overlay">
                            <button class="btn-wishlist">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="btn-quickview">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <span class="product-badge bestseller">🏆 TOP</span>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Áudio</span>
                        <h3>Sony WH-1000XM4</h3>
                        <p class="product-description">Cancelamento de ruído, 30h bateria, Toque sensível</p>
                        <div class="product-price">
                            <span class="current-price">R$ 1.799</span>
                            <span class="original-price">R$ 2.299</span>
                            <span class="discount">-22%</span>
                        </div>
                        <div class="product-features">
                            <span><i class="fas fa-headphones"></i> ANC</span>
                            <span><i class="fas fa-clock"></i> 30h</span>
                        </div>
                        <div class="product-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="rating-count">(3.1k)</span>
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

                <!-- Produto 3 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Apple Watch Series 9">
                        <div class="product-overlay">
                            <button class="btn-wishlist">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="btn-quickview">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <span class="product-badge new">🆕 NOVO</span>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Smartwatch</span>
                        <h3>Apple Watch Series 9</h3>
                        <p class="product-description">Tela Always-On, GPS, Monitor de saúde, 45mm</p>
                        <div class="product-price">
                            <span class="current-price">R$ 3.299</span>
                            <span class="original-price">R$ 3.999</span>
                            <span class="discount">-18%</span>
                        </div>
                        <div class="product-features">
                            <span><i class="fas fa-heartbeat"></i> Saúde</span>
                            <span><i class="fas fa-satellite-dish"></i> GPS</span>
                        </div>
                        <div class="product-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="rating-count">(1.8k)</span>
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

                <!-- Produto 4 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="MacBook Pro M2">
                        <div class="product-overlay">
                            <button class="btn-wishlist">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="btn-quickview">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <span class="product-badge deal">💎 PREMIUM</span>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Notebook</span>
                        <h3>MacBook Pro 16" M2</h3>
                        <p class="product-description">Chip M2 Pro, 16GB, 1TB SSD, Tela Liquid Retina XDR</p>
                        <div class="product-price">
                            <span class="current-price">R$ 18.999</span>
                            <span class="original-price">R$ 22.999</span>
                            <span class="discount">-17%</span>
                        </div>
                        <div class="product-features">
                            <span><i class="fas fa-microchip"></i> M2 Pro</span>
                            <span><i class="fas fa-hdd"></i> 1TB</span>
                        </div>
                        <div class="product-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="rating-count">(892)</span>
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-cart">