<?php
include('include/currentPage_header.php');
include('include/dbConnect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte du Restaurant - <?php echo $general_setting['Name'] ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
      
body {
    padding-top: 0 !important;
    margin-top: 0 !important;
}

.hero, .container, .nav-tabs {
    margin-top: 0 !important;
}

body > *:first-child {
    margin-top: 0 !important;
    padding-top: 0 !important;
}
        :root {
            --primary-color: #c0392b;
            --secondary-color: #e67e22;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --primary-dark: #1E5631;
            --primary-light: #4A785E;
            --accent-gold: #C6A664;
            --accent-light: #E8D9B0;
            --neutral-cream: #F8F7F5;
            --text-dark: #333333;
            --text-light: #777777;
        }
        
        /* Styles généraux */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--neutral-cream);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
            padding-top: 60px;
        }
        
        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(30, 86, 49, 0.7), rgba(30, 86, 49, 0.7)), 
                        url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
        }
        
        .logo {
            width: 120px;
            height: 120px;
            background-color: var(--primary-dark);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
            border: 3px solid var(--accent-gold);
            box-shadow: 0 0 30px rgba(198, 166, 100, 0.5);
        }
        
        .logo span {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        .hero .btn {
            background-color: var(--accent-gold);
            color: var(--primary-dark);
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            border: 2px solid var(--accent-gold);
        }
        
        .hero .btn:hover {
            background-color: transparent;
            color: white;
        }
        
        /* Navigation principale */
        .menu-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .nav-container {
            max-width: 1200px;
            margin: auto;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav-logo {
            display: flex;
            align-items: center;
        }
        
        .logo-mini {
            background-color: #FF6347;
            color: white;
            font-weight: bold;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }
        
        .logo-mini:hover {
            transform: rotate(360deg);
        }
        
        .restaurant-name {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #444;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-links a:hover {
            color: #FF6347;
        }
        
        /* Onglets de navigation */
        .nav-tabs {
            background: linear-gradient(135deg, #6cf39bff 0%, #004122ff 100%);
            padding: 15px 0;
            border-radius: 10px 10px 0 0;
            margin-bottom: 0;
        }
        
        .nav-tabs .nav-item {
            margin: 0 5px;
        }
        
        .nav-tabs .nav-link {
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        
        .nav-tabs .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-weight: 600;
        }
        
        .nav-tabs .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        /* Contenu des onglets */
        .tab-content {
            background-color: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 0 0 10px 10px;
            padding: 20px;
        }
        
        /* Menu Book */
        .menu-book {
            background: #fff;
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            animation: fadeIn 1.2s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px);}
            to { opacity: 1; transform: translateY(0);}
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary-dark);
            display: inline-block;
            padding-bottom: 15px;
        }
        
        .section-title h2:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background: var(--accent-gold);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Barre de recherche */
        #search-input {
            border-radius: 25px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        /* Filtres */
        .filters {
            margin: 20px 0;
        }
        
        .filter-btn {
            margin: 5px;
            border-radius: 20px;
            transition: all 0.3s;
        }
        
        .filter-btn.active, .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        /* Info section */
        .info-section {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .info-section h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .dietary-info {
            margin-top: 15px;
        }
        
        /* Menu items */
        .menu-item {
            transition: all 0.3s;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            position: relative;
        }
        
        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .menu-item .card-img-top {
            height: 180px;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .menu-item:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .menu-item .card-body {
            padding: 20px;
        }
        
        .menu-item .card-title {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }
        
        .menu-item .price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.2em;
        }
        
        .menu-item .description {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        
        /* Badges */
        .badge {
            font-weight: 500;
            padding: 5px 8px;
            margin-right: 5px;
        }
        
        .vegetarian {
            background-color: #4CAF50;
            color: white;
        }
        
        .vegan {
            background-color: rgba(139, 195, 74, 0.2);
            color: #558B2F;
        }
        
        .gluten-free {
            background-color: #2196F3;
            color: white;
        }
        
        .spicy {
            background-color: #f44336;
            color: white;
        }
        
        /* Items spéciaux */
        .special-item {
            border: 2px solid var(--secondary-color);
        }
        
        .special-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--secondary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 1;
        }
        
        .new-ribbon {
            position: absolute;
            top: 10px;
            left: -5px;
            background-color: #ff9f43;
            color: white;
            padding: 5px 15px;
            font-size: 0.8rem;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .new-ribbon:before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            border-left: 5px solid transparent;
            border-right: 5px solid #cc7f36;
            border-top: 5px solid transparent;
            border-bottom: 5px solid #cc7f36;
            z-index: -1;
        }
        
        /* Catégories de menu */
        .menu-category {
            color: #d4a373;
            padding-bottom: 8px;
            border-bottom: 2px solid #d4a373;
            margin: 30px 0 20px;
            font-size: 1.3em;
            display: flex;
            align-items: center;
        }
        
        .menu-category:before {
            content: '';
            display: inline-block;
            width: 15px;
            height: 15px;
            background-color: var(--accent-gold);
            margin-right: 15px;
            transform: rotate(45deg);
        }
        
        /* Menus combo */
        .combo-item {
            border: 2px dashed var(--primary-color);
            transition: all 0.3s;
        }
        
        .combo-item:hover {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }
        
        .combo-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 10px 0;
        }
        
        /* Options de portion */
        .portion-options .btn {
            border-radius: 20px !important;
        }
        
        /* Rating */
        .rating {
            margin-top: 5px;
        }
        
        /* Boutons */
        .add-to-cart-btn {
            background-color: var(--primary-color);
            border: none;
            border-radius: 50px;
            padding: 8px 15px;
            font-weight: 500;
            transition: all 0.3s;
            color: white;
        }
        
        .add-to-cart-btn:hover {
            background-color: #ff5252;
            transform: scale(1.05);
            color: white;
        }
        
        /* Carousel */
        .carousel-item img {
            height: 300px;
            object-fit: cover;
        }
        
        /* Texte suppléments */
        .supplements-text {
            margin: 20px 0;
            font-size: 0.9em;
            color: var(--secondary-color);
            text-align: center;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .nav-container {
                flex-direction: column;
            }
            
            .nav-links {
                margin-top: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .nav-links li {
                margin: 5px 10px;
            }
            
            .menu-book {
                padding: 20px;
            }
            
            .menu-item {
                margin-bottom: 20px;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
        .cart-item-img {
  width: 60px !important;
  height: 60px !important;
  object-fit: cover !important;
  border-radius: 8px;
}

    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="logo">
            <span>H</span>
        </div>
        <h1><?php echo $general_setting['Name'] ?></h1>
        <p>Une expérience gastronomique où la botanique rencontre l'art culinaire</p>
        <a href="#menu" class="btn">Découvrir notre menu</a>
    </section>
      <div class="container my-5">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-star-fill text-warning display-4"></i>
                                <h3 class="card-title">Qualité Premium</h3>
                                <p class="card-text">Des ingrédients frais et soigneusement sélectionnés pour une cuisine d'exception.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-truck text-primary display-4"></i>
                                <h3 class="card-title">Livraison Rapide</h3>
                                <p class="card-text">Service de livraison efficace pour vous servir en 30-45 minutes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-currency-exchange text-success display-4"></i>
                                <h3 class="card-title">Paiement Facile</h3>
                                <p class="card-text">Paiement en espèces à la livraison ou par carte bancaire.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Navigation Tabs -->
    <div class="container mt-4">
        <ul class="nav nav-tabs justify-content-center" id="menuTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="view-menu-tab" data-bs-toggle="tab" data-bs-target="#view-menu" type="button" role="tab">Voir le menu</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="order-tab" data-bs-toggle="tab" data-bs-target="#order" type="button" role="tab">Commander</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cart-tab" data-bs-toggle="tab" data-bs-target="#cart" type="button" role="tab">Panier <span class="badge bg-danger" id="cart-count">0</span></button>
            </li>
        </ul>

        <!-- Tab Contents -->
        <div class="tab-content p-3 border border-top-0 rounded-bottom" id="menuTabsContent">
            <!-- Onglet Voir le menu -->
            <div class="tab-pane fade show active" id="view-menu" role="tabpanel" aria-labelledby="view-menu-tab">
                <div class="menu-book">
                    <div class="section-title text-center mb-4">
                        <h2><i class="bi bi-journal"></i> Notre Carte</h2>
                    </div>
   <!-- Informations importantes -->
                    <div class="info-section mb-4 text-center">
                        <h3><i class="bi bi-info-circle-fill"></i> Informations importantes</h3>
                        <p>Nous utilisons dans notre restaurant des ingrédients frais et locaux pour préparer tous nos plats avec soin et passion. Nous vous garantissons une qualité optimale et une hygiène irréprochable pour tous vos repas.</p>
                        <div class="dietary-info mt-3">
                            <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span>
                            <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span>
                            <span class="badge bg-danger"><i class="bi bi-fire"></i> Épicé</span>
                            <span class="badge bg-primary"><i class="bi bi-star"></i> Nouveau</span>
                            <span class="badge bg-warning text-dark"><i class="bi bi-trophy"></i> Plus demandé</span>
                        </div>
                    </div>
                    

                 

                    <!-- Barre de recherche -->
                    <div class="d-flex justify-content-center my-4">
                        <div style="max-width: 500px; width: 100%;">
                            <input type="text" id="search-input" class="form-control shadow-sm ps-4" placeholder="🔍 Rechercher un plat..." />
                        </div>
                    </div>

                    <!-- Filtres interactifs -->
                    <div class="filters mb-4 text-center">
                        <button class="btn btn-sm btn-outline-secondary active filter-btn" data-filter="all">Tous</button>
                        <button class="btn btn-sm btn-outline-success filter-btn" data-filter="vegetarian">🥦 Végétarien</button>
                        <button class="btn btn-sm btn-outline-danger filter-btn" data-filter="spicy">🔥 Épicé</button>
                        <button class="btn btn-sm btn-outline-info filter-btn" data-filter="gluten-free">🌾 Sans gluten</button>
                        <button class="btn btn-sm btn-outline-primary filter-btn" data-filter="new">🆕 Nouveau</button>
                        <button class="btn btn-sm btn-outline-warning filter-btn" data-filter="popular">🥇 Plus demandé</button>
                    </div>
<nav class="menu-nav">
                        <div class="nav-container">
                            <div class="nav-logo">
                                <div class="logo-mini">H</div>
                                <span class="restaurant-name">Restaurant Gourmet</span>
                            </div>
                            <ul class="nav-links">
                                <li><a href="#entrees">🍲 Entrées</a></li>
                                <li><a href="#salades">🥗 Salades</a></li>
                                <li><a href="#plats">🍽️ Plats</a></li>
                                <li><a href="#sandwichs">🍔 Sandwichs</a></li>
                                <li><a href="#desserts">🍰 Desserts</a></li>
                                <li><a href="#boissons">🍹 Boissons</a></li>
                                <li><a href="#pizzas">🍕 Pizzas</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Section Menus Combo -->
                     
                    <section id="menus" class="mb-5"> 
  <h2>🍱 Menus Complets</h2>
  <div class="row">
    
    <!-- Menu Découverte -->
    <div class="col-md-4 mb-4">
      <div class="card combo-item h-100">
        <div class="card-body text-center">
          <h5 class="card-title">Menu Découverte</h5>
          <p class="text-muted">Entrée + Plat + Dessert</p>
          <div class="combo-price">2500 DA <small class="text-muted">(au lieu de 2900 DA)</small></div>
          <div class="rating mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
            <small class="text-muted">(42 avis)</small>
          </div>
          <button class="btn btn-warning mt-2 add-to-cart-btn" 
                  data-id="301" 
                  data-price="2500" 
                  data-name="Menu Découverte">
            Choisir ce menu
          </button>
        </div>
      </div>
    </div>

    <!-- Menu Gourmet -->
    <div class="col-md-4 mb-4">
      <div class="card combo-item h-100">
        <div class="card-body text-center">
          <h5 class="card-title">Menu Gourmet</h5>
          <p class="text-muted">Entrée + Plat + Dessert + Boisson</p>
          <div class="combo-price">3200 DA <small class="text-muted">(au lieu de 3700 DA)</small></div>
          <div class="rating mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <small class="text-muted">(28 avis)</small>
          </div>
          <button class="btn btn-warning mt-2 add-to-cart-btn" 
                  data-id="302" 
                  data-price="3200" 
                  data-name="Menu Gourmet">
            Choisir ce menu
          </button>
        </div>
      </div>
    </div>

    <!-- Menu Végétarien -->
    <div class="col-md-4 mb-4">
      <div class="card combo-item h-100">
        <div class="card-body text-center">
          <h5 class="card-title">Menu Végétarien</h5>
          <p class="text-muted">Salade + Plat Veggie + Dessert</p>
          <div class="combo-price">2200 DA <small class="text-muted">(au lieu de 2600 DA)</small></div>
          <div class="rating mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <small class="text-muted">(56 avis)</small>
          </div>
          <button class="btn btn-warning mt-2 add-to-cart-btn" 
                  data-id="303" 
                  data-price="2200" 
                  data-name="Menu Végétarien">
            Choisir ce menu
          </button>
        </div>
      </div>
    </div>

  </div>
</section>

                    <!-- Les Entrées -->
                    <section id="entrees">
        <h2>🍲 Les Entrées</h2>
        
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Crème de volaille.jpg" class="card-img-top" alt="Crème de volaille">
              <div class="card-body">
                <h5 class="card-title">Crème de volaille <span class="badge gluten-free">Sans gluten</span></h5>
                <p class="description">Délicieuse soupe crémeuse à base de poulet frais</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">500 DA</span>
                  <button class="btn btn-sm btn-warning add-to-cart-btn btn-warning" data-id="1">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Soupe de légumes.jpg
" class="card-img-top" alt="Hrira maison">
              <div class="card-body">
                <h5 class="card-title">Hrira maison <span class="badge vegetarian">Végétarien</span></h5>
                <p class="description">Harira traditionnelle avec lentilles, tomates et épices spéciales</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">300 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="2">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item special-item">
              <span class="special-badge">Le plus demandé</span>
              <img src="img\Bourek viande rouge.jpg" class="card-img-top" alt="Bourek viande rouge">
              <div class="card-body">
                <h5 class="card-title">Bourek viande rouge <span class="badge spicy">Épicé</span></h5>
                <p class="description">Brick croustillant farci à l'agneau épicé</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">250 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="3">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Hrira.jpg" class="card-img-top" alt="Soupe de légumes">
              <div class="card-body">
                <h5 class="card-title">Soupe de légumes <span class="badge vegetarian">Végétarien</span></h5>
                <p class="description">Soupe fraîche et saine aux légumes</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">300 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="4">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Gratin de poulet.jpg" class="card-img-top" alt="Gratin de poulet">
              <div class="card-body">
                <h5 class="card-title">Gratin de poulet</h5>
                <p class="description">Gratin de poulet avec sauce béchamel et fromage</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">500 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="5">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Hmiss.jpg
" class="card-img-top" alt="Hmiss">
              <div class="card-body">
                <h5 class="card-title">Hmiss <span class="badge vegetarian">Végétarien</span> <span class="badge spicy">Épicé</span></h5>
                <p class="description">Salade de poivrons et tomates grillés aux épices</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">200 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="6">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Omelettes.jpg" class="card-img-top" alt="Omelettes">
              <div class="card-body">
                <h5 class="card-title">Omelettes (Nature/Fromage/Légumes) avec frites</h5>
                <p class="description">Omelette avec différentes options accompagnée de frites</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">300-400 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="7">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Assiette frite
.jpg" class="card-img-top" alt="Assiette frite">
              <div class="card-body">
                <h5 class="card-title">Assiette frite</h5>
                <p class="description">Assiette de frites</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">200 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="8">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
                    <!-- Les Salades -->
                    <section id="salades" class="mb-5">
                        <h2>🥗 Les Salades</h2>
                        
                        <!-- Carrousel Salades -->
                        <div id="saladesCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="https://images.unsplash.com/photo-1574926054530-540288c8e678" class="d-block w-100" alt="Salades">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.unsplash.com/photo-1546793665-c74683f339c1" class="d-block w-100" alt="Salades">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#saladesCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#saladesCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100 special-item">
                                    <span class="special-badge"><i class="bi bi-star"></i> Nouveau</span>
                                    <img src="https://images.unsplash.com/photo-1574926054530-540288c8e678" class="card-img-top" alt="Tartare de saumon">
                                    <div class="card-body">
                                        <h5 class="card-title">Tartare de saumon</h5>
                                        <p class="description">Tartare de saumon frais avec épices</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">1200 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="9">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100">
                                    <img src="https://images.unsplash.com/photo-1607532941433-304659e8198a" class="card-img-top" alt="Salade de poulpe">
                                    <div class="card-body">
                                        <h5 class="card-title">Salade de poulpe</h5>
                                        <p class="description">Salade de poulpe avec olives et légumes</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">900 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="10">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100">
                                    <img src="https://images.unsplash.com/photo-1607532941433-304659e8198a" class="card-img-top" alt="Burrata à l'italienne">
                                    <div class="card-body">
                                        <h5 class="card-title">Burrata à l'italienne <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span></h5>
                                        <p class="description">Burrata italienne avec tomates et basilic</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">900 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="11">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Plats Principaux -->
                    <section id="plats" class="mb-5">
                        <h2>🍖 Plats Principaux</h2>
                        
                        <h3 class="menu-category">🥩 Viandes et Volailles</h3>
                        <div class="row">
  <!-- Exemple plat -->
  <div class="col-md-6 col-lg-4">
    <div class="card menu-item h-100">
      <img src="https://images.unsplash.com/photo-1558030006-450675393462" 
           class="card-img-top" alt="Médaillon de veau poêlée">
      <div class="card-body">
        <h5 class="card-title">Médaillon de veau poêlée</h5>
        <p class="description">Médaillons de veau avec sauce maison</p>

      <!-- Choix des portions -->
<div class="portion-options mt-3 mb-3" data-id="18">
  <button class="btn btn-outline-secondary btn-sm active" data-size="S" data-price="1900">S - 1900 DA</button>
  <button class="btn btn-outline-secondary btn-sm" data-size="M" data-price="2200">M - 2200 DA</button>
  <button class="btn btn-outline-secondary btn-sm" data-size="L" data-price="2500">L - 2500 DA</button>
</div>

<!-- Bouton panier -->
<button class="btn btn-sm btn-warning add-to-cart-btn w-100"
        data-id="18" data-size="S" data-price="1900">
  Ajouter au panier
</button>
  </div>
    </div>
  </div>
  <!-- Entrecôte de bœuf grillée -->
<div class="col-md-6 col-lg-4">
  <div class="card menu-item h-100">
    <img src="https://images.unsplash.com/photo-1558030006-450675393462" 
         class="card-img-top" alt="Entrecôte de bœuf grillée">
    <div class="card-body">
      <h5 class="card-title">Entrecôte de bœuf grillée</h5>
      <p class="description">Entrecôte de bœuf grillée</p>

      <!-- Choix des portions -->
      <div class="portion-options mt-3 mb-3" data-id="19">
        <button class="btn btn-outline-secondary btn-sm active" data-size="S" data-price="1800">S - 1800 DA</button>
        <button class="btn btn-outline-secondary btn-sm" data-size="M" data-price="2100">M - 2100 DA</button>
        <button class="btn btn-outline-secondary btn-sm" data-size="L" data-price="2400">L - 2400 DA</button>
      </div>

      <!-- Bouton panier -->
      <button class="btn btn-sm btn-warning add-to-cart-btn w-100"
              data-id="19" data-size="S" data-price="1800">
        Ajouter au panier
      </button>
    </div>
  </div>
</div>

  <!-- M'hamer d'agneau -->
  <div class="col-md-6 col-lg-4">
  <div class="card menu-item h-100">
    <img src="https://images.unsplash.com/photo-1603360946369-dc9bb6258143" 
         class="card-img-top" alt="M'hamer d'agneau">
    <div class="card-body">
      <h5 class="card-title">M'hamer d'agneau</h5>
      <p class="description">Agneau rôti aux épices</p>

      <!-- Choix des portions -->
      <div class="portion-options mt-4 mb-4" data-id="20">
        <button class="btn btn-outline-secondary btn-sm active" data-size="S" data-price="1800">S - 1800 DA</button>
        <button class="btn btn-outline-secondary btn-sm" data-size="M" data-price="2100">M - 2100 DA</button>
        <button class="btn btn-outline-secondary btn-sm" data-size="L" data-price="2400">L - 2400 DA</button>
      </div>

      <!-- Bouton panier -->
      <button class="btn btn-sm btn-warning add-to-cart-btn w-100"
              data-id="20" data-size="S" data-price="1800">
        Ajouter au panier
      </button>
 

<script>
document.addEventListener('DOMContentLoaded', function () {
  // Event delegation : fonctionne même s'il y a plusieurs plats
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.portion-options button');
    if (!btn) return;

    const options = btn.closest('.portion-options');
    const baseId  = options.dataset.id;            // ex: 18
    const size    = btn.dataset.size;              // S | M | L
    const price   = btn.dataset.price;             // 1900 | 2200 | 2500

    // 1) Activer visuellement la portion choisie
    options.querySelectorAll('button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // 2) Récupérer le bouton "Ajouter au panier" (robuste aux changements de DOM)
    const addBtn = (function findAddToCart(el) {
      // d'abord chercher dans les prochains éléments frères
      let sib = el.nextElementSibling;
      while (sib) {
        if (sib.classList && sib.classList.contains('add-to-cart-btn')) return sib;
        sib = sib.nextElementSibling;
      }
      // fallback : chercher dans le parent
      return el.parentElement.querySelector('.add-to-cart-btn');
    })(options);

    if (!addBtn) return;

    // 3) Mettre à jour size & price
    addBtn.dataset.size  = size;
    addBtn.dataset.price = price;

    // 4) (Optionnel) Changer l'ID selon la taille pour que S/M/L soient distincts dans le panier
    // --- Mode numérique: 18 -> 181 (S), 182 (M), 183 (L)
    const useNumericVariantId = true; // mets false si tu préfères "18_S" / "18_M" / "18_L"
    if (useNumericVariantId) {
      const sizeCode = { S: 1, M: 2, L: 3 };
      const numericId = (parseInt(baseId, 10) * 10 + (sizeCode[size] || 0)).toString();
      addBtn.dataset.id = numericId;
    } else {
      addBtn.dataset.id = baseId + '_' + size;
    }

    // 5) (Optionnel) Afficher l'info choisie sur le bouton
    // addBtn.textContent = `Ajouter au panier — ${size} (${price} DA)`;
    
  });
  
});
document.addEventListener('DOMContentLoaded', function () {
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.portion-options button');
    if (!btn) return;

    const options = btn.closest('.portion-options');
    const size    = btn.dataset.size;   // S | M | L
    const price   = btn.dataset.price;  // 1900 | 2100 | 2500

    // Activer visuellement la portion
    options.querySelectorAll('button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Récupérer le bouton "Ajouter au panier"
    const addBtn = options.parentElement.querySelector('.add-to-cart-btn');
    if (!addBtn) return;

    // ➝ Mettre à jour uniquement le texte du bouton
    addBtn.textContent = `Ajouter au panier — ${size} (${price} DA)`;
  });
});

</script>

      </div>
    </div>
  </div>
</div>

<script>
// Gestion du choix de portion
document.querySelectorAll('.portion-options .btn').forEach(btn => {
  btn.addEventListener('click', function () {
    let group = this.closest('.btn-group');
    let buttons = group.querySelectorAll('.btn');
    buttons.forEach(b => b.classList.remove('active')); // reset
    this.classList.add('active'); // mettre active

    // Récupérer infos
    let size = this.getAttribute('data-size');
    let price = this.getAttribute('data-price');
    let itemId = group.getAttribute('data-id');

    // Mettre à jour bouton "Ajouter au panier"
    let addBtn = group.closest('.card-body').querySelector('.add-to-cart-btn');
    addBtn.setAttribute('data-size', size);
    addBtn.setAttribute('data-price', price);

    // Optionnel : mettre à jour le texte du bouton
    addBtn.innerHTML = `Ajouter au panier (${price} DA - ${size})`;
  });
});
</script>

                        
         <h3 class="menu-category">🔥 Grillades</h3>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item special-item">
              <span class="special-badge">Le plus demandé</span>
              <img src="img\Brochettes mixte.jpg" class="card-img-top" alt="Brochettes mixte">
              <div class="card-body">
                <h5 class="card-title">Brochettes mixte</h5>
                <p class="description">Brochettes mélangées (viande et poulet)</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">2200 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="24">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Côte d'agneau grillée.jpg" class="card-img-top" alt="Côte d'agneau grillée">
              <div class="card-body">
                <h5 class="card-title">Côte d'agneau grillée</h5>
                <p class="description">Côtes d'agneau grillées</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1800 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="25">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Brochettes de viande hachée.jpg" class="card-img-top" alt="Brochettes de viande hachée">
              <div class="card-body">
                <h5 class="card-title">Brochettes de viande hachée</h5>
                <p class="description">Brochettes de viande hachée</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1600 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="26">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Brochettes de poulet.jpg" class="card-img-top" alt="Brochettes de poulet">
              <div class="card-body">
                <h5 class="card-title">Brochettes de poulet</h5>
                <p class="description">Brochettes de poulet</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1200 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="27">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1558030006-450675393462" class="card-img-top" alt="Méchoui pour 4">
              <div class="card-body">
                <h5 class="card-title">Méchoui pour 4 (réservation 24h)</h5>
                <p class="description">Agneau rôti entier pour 4 personnes</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">11000 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="28">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
                        </div>
                    </section>

                    <!-- Sandwichs et Burgers -->
        <section id="sandwichs">
        <h2>🍔 Sandwichs et Burgers</h2>
        
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Sandwich classique.jpg" class="card-img-top" alt="Sandwich classique">
              <div class="card-body">
                <h5 class="card-title">Sandwich classique</h5>
                <p class="description">Sandwich traditionnel avec options multiples</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">700 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="36">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Burger Le (R).jpg" class="card-img-top" alt="Burger Le (R)">
              <div class="card-body">
                <h5 class="card-title">Burger Le (R)</h5>
                <p class="description">Burger viande avec légumes et sauces</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">600 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="37">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Chicken burger.jpg" class="card-img-top" alt="Chicken burger">
              <div class="card-body">
                <h5 class="card-title">Chicken burger</h5>
                <p class="description">Burger poulet avec légumes et sauces</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">800 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="38">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Tacos au poulet.jpg" class="card-img-top" alt="Tacos au poulet">
              <div class="card-body">
                <h5 class="card-title">Tacos au poulet</h5>
                <p class="description">Tacos poulet avec légumes et sauces</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">800 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="39">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Croque monsieur.jpg" class="card-img-top" alt="Croque monsieur">
              <div class="card-body">
                <h5 class="card-title">Croque monsieur</h5>
                <p class="description">Sandwich au fromage et jambon grillé</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">500 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="40">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        <h3 class="menu-category">🍲 Tajines</h3>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Tajine langue de veau.jpg" class="card-img-top" alt="Tajine langue de veau">
              <div class="card-body">
                <h5 class="card-title">Tajine langue de veau</h5>
                <p class="description">Tajine de langue de veau aux légumes</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1600 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="29">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <h3 class="menu-category">🍝 Pâtes</h3>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Tagliatelle au saumon fumé.jpg" class="card-img-top" alt="Tagliatelle au saumon fumé">
              <div class="card-body">
                <h5 class="card-title">Tagliatelle au saumon fumé</h5>
                <p class="description">Tagliatelles au saumon fumé</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1400 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="30">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
<img src="img\Tagliatelle carbonara.jpg" class="card-img-top" alt="Tagliatelle carbonara">
              <div class="card-body">
                <h5 class="card-title">Tagliatelle carbonara</h5>
                <p class="description">Tagliatelles carbonara avec lardons</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1000 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="31">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Spaghetti bolognaise.jpg" class="card-img-top" alt="Spaghetti bolognaise">
              <div class="card-body">
                <h5 class="card-title">Spaghetti bolognaise</h5>
                <p class="description">Spaghetti à la bolognaise avec viande hachée</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1000 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="32">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Spaghetti au poulet.jpg" class="card-img-top" alt="Spaghetti au poulet">
              <div class="card-body">
                <h5 class="card-title">Spaghetti au poulet</h5>
                <p class="description">Spaghetti au poulet</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">900 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="33">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Penne à l'arrabbiata.jpg" class="card-img-top" alt="Penne à l'arrabbiata">
              <div class="card-body">
                <h5 class="card-title">Penne à l'arrabbiata <span class="badge spicy">Épicé</span></h5>
                <p class="description">Penne à la sauce arrabbiata piquante</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1000 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="34">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\penne.jpg" class="card-img-top" alt="Penne sauce fromage/rouge">
              <div class="card-body">
                <h5 class="card-title">Penne sauce fromage/rouge</h5>
                <p class="description">Penne avec sauce fromage ou sauce tomate</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">600-700 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="35">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

                    <!-- Desserts -->
                    <section id="desserts" class="mb-5">
     <h2>🍰 Desserts</h2>
  <div class="row">
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Tiramisu café.jpg" class="card-img-top" alt="Tiramisu café/caramel">
        <div class="card-body">
          <h5 class="card-title">Tiramisu café/caramel <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Tiramisu parfumé au café ou caramel</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">400 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="41">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307" class="card-img-top" alt="Crème brûlée">
        <div class="card-body">
          <h5 class="card-title">Crème brûlée <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Crème brûlée avec couche de sucre caramélisé</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">400 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="42">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1571115177098-24ec42ed204d" class="card-img-top" alt="Flan maison">
        <div class="card-body">
          <h5 class="card-title">Flan maison <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Flan pâtissier maison</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">300 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="43">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Assiette de fruits.jpg" class="card-img-top" alt="Assiette de fruits">
        <div class="card-body">
          <h5 class="card-title">Assiette de fruits <span class="badge vegetarian">Végétarien</span> <span class="badge gluten-free">Sans gluten</span></h5>
          <p class="description">Assortiment de fruits frais</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">700 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="44">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1576506295286-5cda18df43e7" class="card-img-top" alt="Glaces artisanales">
        <div class="card-body">
          <h5 class="card-title">Glaces artisanales <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Glace maison aux parfums variés</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">200 DA/boule</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="45">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Sorbets .jpg" class="card-img-top" alt="Sorbets">
        <div class="card-body">
          <h5 class="card-title">Sorbets <span class="badge vegetarian">Végétarien</span> <span class="badge gluten-free">Sans gluten</span></h5>
          <p class="description">Sorbet aux fruits frais</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">200 DA/boule</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="46">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

                    <!-- Boissons -->
                    <section id="boissons" class="mb-5">
                        <h2>🍹 Boissons</h2>
                        
                        <h3 class="menu-category">☕ Boissons chaudes</h3>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100">
        <img src="img\Café Nespresso.jpg" class="card-img-top" alt="Café Nespresso">
                                    <div class="card-body">
                                        <h5 class="card-title">Café Nespresso <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span></h5>
                                        <p class="description">Café Nespresso</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">200 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="47">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                             <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Café Nespresso.jpg" class="card-img-top" alt="Café Nespresso">
        <div class="card-body">
          <h5 class="card-title">Café espresso <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span> <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span></h5>
          <p class="description">Café espresso</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">100 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="64">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Thé à la menthe.jpg" class="card-img-top" alt="Thé à la menthe">
        <div class="card-body">
          <h5 class="card-title">Thé à la menthe <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span> <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span></h5>
          <p class="description">Thé à la menthe</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">120 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="65">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
       <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100">
        <img src="img\Thé infusion .jpg" class="card-img-top" alt="Thé infusion">
                                    <div class="card-body">
                                        <h5 class="card-title">Thé infusion <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span></h5>
                                        <p class="description">Infusion aux herbes</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">200 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="48">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Nespresso.jpg" class="card-img-top" alt="Nespresso/arômes">
        <div class="card-body">
          <h5 class="card-title">Nespresso/arômes <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span> <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span></h5>
          <p class="description">Nespresso aux différents arômes</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">150 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="66">Ajouter au panier</button>
          </div>
        </div>
      </div>
                    
   

                        </div>
                        
                        <h3 class="menu-category">🥤 Boissons fraîches</h3>
                       <div class="row">

  <!-- Eau minérale -->
<div class="row">

  <!-- Eau minérale -->
  <div class="col-md-6 col-lg-4">
    <div class="card menu-item h-100">
        <img src="img\Eau minérale .jpg" class="card-img-top" alt="Eau minérale">
      <div class="card-body">
        <h5 class="card-title">
          Eau minérale 
          <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span>
        </h5>
        <p class="description">Eau minérale (petit/grand)</p>

        <!-- Choix portions -->
        <div class="portion-options mt-3 mb-3" data-id="60">
          <button class="btn btn-outline-secondary btn-sm active" data-size="Petit" data-price="50">Petit - 50 DA</button>
          <button class="btn btn-outline-secondary btn-sm" data-size="Grand" data-price="100">Grand - 100 DA</button>
        </div>

        <!-- Bouton panier -->
        <button class="btn btn-sm btn-warning add-to-cart-btn w-100" 
                data-id="60" data-size="Petit" data-price="50">
          Ajouter au panier — Petit (50 DA)
        </button>
      </div>
    </div>
  </div>

  <!-- Sodas -->
  <div class="col-md-6 col-lg-4">
    <div class="card menu-item h-100">
        <img src="img\Sodas .jpg" class="card-img-top" alt="Sodas">
      <div class="card-body">
        <h5 class="card-title">
          Sodas <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span>
        </h5>
        <p class="description">Boissons gazeuses fraîches</p>

        <!-- Choix type de soda -->
        <div class="portion-options mt-3 mb-3" data-id="61">
          <button class="btn btn-outline-secondary btn-sm active" data-size="Coca" data-price="120">Coca - 120 DA</button>
          <button class="btn btn-outline-secondary btn-sm" data-size="Fanta" data-price="120">Fanta - 120 DA</button>
          <button class="btn btn-outline-secondary btn-sm" data-size="Sprite" data-price="120">Sprite - 120 DA</button>
          <button class="btn btn-outline-secondary btn-sm" data-size="Pepsi" data-price="120">Pepsi - 120 DA</button>
        </div>

        <!-- Bouton panier -->
        <button class="btn btn-sm btn-warning add-to-cart-btn w-100" 
                data-id="61" data-size="Coca" data-price="120">
          Ajouter au panier — Coca (120 DA)
        </button>
      </div>
    </div>
  </div>



                              
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Jus naturel pressé.jpg" class="card-img-top" alt="Jus naturel pressé">
        <div class="card-body">
          <h5 class="card-title">Jus naturel pressé <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span> <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span></h5>
          <p class="description">Jus de fruits frais pressé</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">250 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="62">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Limonade maison.jpg" class="card-img-top" alt="Limonade maison">
        <div class="card-body">
          <h5 class="card-title">Limonade maison <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span> <span class="badge bg-info"><i class="bi bi-basket"></i> Sans gluten</span></h5>
          <p class="description">Limonade maison</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">200 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="63">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
   <script>
document.addEventListener('DOMContentLoaded', function () {
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.portion-options button');
    if (!btn) return;

    const options = btn.closest('.portion-options');
    const size    = btn.dataset.size;   // Exemple: "Petit", "Grand", "Coca", "Fanta"
    const price   = btn.dataset.price;  // Exemple: 50, 100, 120

    // Activer visuellement le bouton sélectionné
    options.querySelectorAll('button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Récupérer le bouton "Ajouter au panier"
    const addBtn = options.parentElement.querySelector('.add-to-cart-btn');
    if (!addBtn) return;

    // Générer l'ID en fonction de la taille/type
    let newId = options.dataset.id; // ex: "60" pour Eau, "61" pour Sodas

    if (newId === "60") {
      // Eau minérale
      if (size === "Petit") newId = "60";
      if (size === "Grand") newId = "600";
    }

    if (newId === "61") {
      // Sodas
      if (size === "Coca")   newId = "61";
      if (size === "Fanta")  newId = "611";
      if (size === "Sprite") newId = "612";
      if (size === "Pepsi")  newId = "613";
    }

    // Mettre à jour dataset du bouton panier
    addBtn.dataset.id    = newId;
    addBtn.dataset.size  = size;
    addBtn.dataset.price = price;

    // Mettre à jour le texte du bouton
    addBtn.textContent = `Ajouter au panier — ${size} (${price} DA)`;
  });
});
</script>

    </div>
                        </div>
                    </section>

                    <!-- Pizzas -->
                    <section id="pizzas">
                        <h2>🍕 Pizzas</h2>
                        
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100">
                                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Margherita">
                                    <div class="card-body">
                                        <h5 class="card-title">Margherita <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span></h5>
                                        <p class="description">Pizza margherita avec fromage et tomate</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">500 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="49">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100">
                                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Anchois">
                                    <div class="card-body">
                                        <h5 class="card-title">Anchois</h5>
                                        <p class="description">Pizza aux anchois</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">800 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="50">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-lg-4">
                                <div class="card menu-item h-100">
                                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Végétarienne">
                                    <div class="card-body">
                                        <h5 class="card-title">Végétarienne <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span></h5>
                                        <p class="description">Pizza végétarienne</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">800 DA</span>
                                            <button class="btn btn-sm btn-warning add-to-cart-btn" data-id="51">Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Fermière">
        <div class="card-body">
          <h5 class="card-title">Fermière</h5>
          <p class="description">Pizza fermière avec lardons</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">800 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="52">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Buffalo">
        <div class="card-body">
          <h5 class="card-title">Buffalo <span class="badge bg-danger"><i class="bi bi-fire"></i> Épicé</span></h5>
          <p class="description">Pizza buffalo avec poulet épicé</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">800 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="53">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Thon">
        <div class="card-body">
          <h5 class="card-title">Thon</h5>
          <p class="description">Pizza au thon</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">800 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="54">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Milano">
        <div class="card-body">
          <h5 class="card-title">Milano</h5>
          <p class="description">Pizza milano avec viande</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">800 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="55">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Américaine">
        <div class="card-body">
          <h5 class="card-title">Américaine</h5>
          <p class="description">Pizza américaine avec viande</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">900 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="56">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Quatre Fromages">
        <div class="card-body">
          <h5 class="card-title">Quatre Fromages <span class="badge bg-success"><i class="bi bi-egg-fried"></i> Végétarien</span></h5>
          <p class="description">Pizza quatre fromages</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">1000 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="57">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Saumon">
        <div class="card-body">
          <h5 class="card-title">Saumon</h5>
          <p class="description">Pizza au saumon</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">1200 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="58">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Mixte">
        <div class="card-body">
          <h5 class="card-title">Mixte</h5>
          <p class="description">Pizza mixte</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">1200 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="59">Ajouter au panier</button>
          </div>
        </div>
      </div>    </div>

                        </div>
                  
    <!-- Section Suppléments (manuels) -->
    
<div class="mt-4 text-center">
  <hr class="mb-3">
   <small class="d-block text-muted mt-2">
    <i class="bi bi-plus-circle text-warning"></i> Suppléments disponibles
  </small>
  <div>
    <span class="badge bg-light text-dark border">
      🧀 Fromage (+150 DA)
    </span>
    <span class="badge bg-light text-dark border">
      🌶️ Sauce spéciale (+100 DA)
    </span>
    <span class="badge bg-light text-dark border">
      🍟 Frites en plus (+250 DA)
    </span>
  </div>
 
</div>

    </section>
                </div>
            </div><!-- Onglet Commander -->
     <section>        
<div class="tab-pane fade " id="order" role="tabpanel">
  <div class="container py-5">
    <div class="row g-4">
      <!-- Formulaire de commande -->
      <div class="col-lg-6">
        <div class="card border-0 shadow-lg rounded-4">
          <div class="card-body p-4">
            <h2 class="mb-4 text-gradient fw-bold text-center">
              🍽️ Commandez votre plat préféré
            </h2>
            <form id="order-form" novalidate>
              <!-- Nom complet -->
              <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nom complet <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="name" placeholder="Entrez votre nom complet" required>
                <div class="invalid-feedback">Veuillez entrer votre nom complet.</div>
              </div>

              <!-- Téléphone -->
              <div class="mb-3">
                <label for="phone" class="form-label fw-semibold">Téléphone <span class="text-danger">*</span></label>
                <input type="tel" class="form-control form-control-lg" id="phone" placeholder="05 00 00 00 00" inputmode="numeric" required>
                <div class="invalid-feedback">Numéro invalide (ex: 05 00 00 00 00).</div>
              </div>

              <!-- Adresse -->
              <div class="mb-3">
                <label for="address" class="form-label fw-semibold">Adresse de livraison <span class="text-danger">*</span></label>
                <textarea class="form-control form-control-lg" id="address" rows="3" placeholder="Ex: Rue des Oliviers, App 5, Alger" required></textarea>
                <div class="invalid-feedback">Veuillez entrer votre adresse de livraison.</div>
              </div>

              <!-- Instructions -->
              <div class="mb-3">
                <label for="notes" class="form-label fw-semibold">Instructions supplémentaires</label>
                <textarea class="form-control form-control-lg" id="notes" rows="2" placeholder="Sans oignon, sonner à l'interphone..."></textarea>
              </div>

              <!-- Mode de paiement -->
              <div class="mb-4">
                <label class="form-label fw-semibold d-block">Mode de paiement <span class="text-danger">*</span></label>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="payment" id="cash" value="Espèces" checked>
                  <label class="form-check-label" for="cash">
                    <i class="fas fa-money-bill-wave text-success me-2"></i>
                    Paiement à la livraison (espèces)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="payment" id="card" value="Carte bancaire">
                  <label class="form-check-label" for="card">
                    <i class="fas fa-credit-card text-primary me-2"></i>
                    Paiement par carte bancaire
                  </label>
                </div>
              </div>

              <!-- Détails carte -->
              <div id="card-details" class="p-4 border rounded bg-light shadow-sm d-none">
                <h6 class="mb-3 text-secondary">
                  <i class="fas fa-lock me-2"></i>Sécurisé - Informations confidentielles
                </h6>
                <div class="mb-3">
                  <label for="card-number" class="form-label">Numéro de carte</label>
                  <input type="text" class="form-control form-control-lg" id="card-number" placeholder="1111 2222 3333 4444" maxlength="19" autocomplete="off">
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="expiry" class="form-label">Expiration</label>
                    <input type="text" class="form-control form-control-lg" id="expiry" placeholder="MM/AA" maxlength="5" autocomplete="off">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="password" class="form-control form-control-lg" id="cvv" placeholder="123" maxlength="4" autocomplete="off">
                  </div>
                </div>
              </div>

              <!-- Bouton -->
              <button type="submit" class="btn btn-gradient btn-lg w-100 py-3 fw-bold shadow">
                <i class="fas fa-check-circle me-2"></i>Confirmer la commande
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Infos livraison -->
      <div class="col-lg-6">
        <div class="card shadow-lg border-0 h-100 rounded-4">
          <div class="card-body d-flex flex-column">
            <div>
              <h5 class="card-title text-center mb-4 text-primary">
                <i class="fas fa-truck me-2"></i>Informations de livraison
              </h5>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-shopping-basket text-success me-2"></i> <strong>Commande minimum :</strong> 1000 DA</li>
                <li class="mb-2"><i class="fas fa-shipping-fast text-info me-2"></i> <strong>Frais de livraison :</strong> 200 DA</li>
                <li class="mb-2"><i class="fas fa-clock text-warning me-2"></i> <strong>Délai estimé :</strong> 30 à 45 min</li>
                <li class="mb-2"><i class="fas fa-wallet text-primary me-2"></i> <strong>Paiement accepté :</strong> Espèces ou Carte</li>
              </ul>
              <hr>
              <h5 class="card-title text-center mb-3 text-secondary">
                <i class="fas fa-calendar-alt me-2"></i>Horaires d'ouverture
              </h5>
              <ul class="list-unstyled text-center">
                <li class="mb-1">🗓️ <strong>Dimanche à jeudi :</strong> 11h - 23h</li>
                <li>🗓️ <strong>Vendredi et samedi :</strong> 12h - 00h</li>
              </ul>
            </div>
            <div class="mt-auto pt-3 text-center">
              <p class="text-muted small mb-1">
                <i class="fas fa-shield-alt me-1"></i> Service sécurisé
              </p>
              <p class="text-muted small mb-0">
                <i class="fas fa-headset me-1"></i> Assistance 7j/7
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 🎫 Ticket Amélioré -->
<div id="ticket" class="container py-5 d-none">
  <div class="ticket-container fade-in">
    <!-- En-tête du ticket -->
    <div class="ticket-header">
      <div class="company-logo">
        <i class="fas fa-store"></i>
      </div>
      <h2 class="mb-2">🎫 Ticket </h2>
      <p class="mb-0">Votre partenaire de confiance</p>
      <div class="ticket-number">
        <i class="fas fa-receipt me-1"></i> Ticket #<span id="ticket-id">CA-2023-001</span>
      </div>
    </div>
    
    <!-- Corps du ticket -->
    <div class="ticket-body">
      <!-- Informations client -->
      <h5 class="text-gradient fw-bold mb-3">
        <i class="fas fa-user me-2"></i>Informations Client
      </h5>
      
      <div class="info-row">
        <div class="info-label">👤 Nom :</div>
        <div class="info-value" id="ticket-name"></div>
      </div>
      
      <div class="info-row">
        <div class="info-label">📞 Téléphone :</div>
        <div class="info-value" id="ticket-phone"></div>
      </div>
      
      <div class="info-row">
        <div class="info-label">🏠 Adresse :</div>
        <div class="info-value" id="ticket-address"></div>
      </div>
      
      <div class="info-row">
        <div class="info-label">📝 Notes :</div>
        <div class="info-value" id="ticket-notes">Aucune</div>
      </div>
      
      <div class="info-row">
        <div class="info-label">💳 Paiement :</div>
        <div class="info-value" id="ticket-payment"></div>
      </div>
      
      <div class="ticket-divider"></div>
      
      <!-- Récapitulatif de commande -->
      <h5 class="text-gradient fw-bold mb-3">
        <i class="fas fa-shopping-cart me-2"></i>Récapitulatif de Commande
      </h5>
      
      <div id="ticket-items" class="mb-3"></div>
      
      <div class="ticket-divider"></div>
      
      <!-- Total -->
      <div class="d-flex justify-content-between align-items-center fw-bold fs-5">
        <span>💰 Total :</span>
        <span id="ticket-total">0 DA</span>
      </div>
      
      <!-- Code QR (simulé) -->
      <div class="text-center mt-4">
        <div class="qr-code">
          <div class="text-center">
            <i class="fas fa-qrcode fa-3x text-muted"></i>
            <p class="small mt-2 mb-0">Code QR</p>
          </div>
        </div>
        <p class="small text-muted">Scannez pour vérifier l'authenticité</p>
      </div>
      
      <!-- Message de remerciement -->
      <div class="alert alert-success mt-4 text-center">
        <i class="fas fa-check-circle me-2"></i>
        <strong>Commande confirmée !</strong> Merci pour votre confiance.
      </div>
    </div>
    
    <!-- Pied de page du ticket -->
    <div class="ticket-footer">
      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <h6 class="fw-bold">📞 Service Client</h6>
          <p class="mb-0">07 00 00 00 00</p>
        </div>
        <div class="col-md-6">
          <h6 class="fw-bold">🌐 Site Web</h6>
          <p class="mb-0">www.LeH.dz</p>
        </div>
      </div>
      <p class="mt-3 mb-0 small text-muted">
        <i class="fas fa-clock me-1"></i> Émis le <span id="ticket-date">05/11/2023 à 14:30</span>
      </p>
    </div>
  </div>
  
  <!-- Actions -->
  <div class="text-center mt-4 no-print">
    <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
      <button class="btn btn-outline-secondary flex-fill" onclick="goBackToOrder()">
        <i class="fas fa-arrow-left me-2"></i> Retour à la commande
      </button>
      <button class="btn btn-gradient flex-fill pulse" onclick="printTicket()">
        <i class="fas fa-print me-2"></i> Imprimer le ticket
      </button>
      <button class="btn btn-success flex-fill" onclick="downloadTicket()">
        <i class="fas fa-download me-2"></i> Télécharger
      </button>
    </div>
    
    <!-- Section pour impression uniquement -->
    <div class="print-only mt-4">
      <p class="text-center small text-muted">
        Merci de votre confiance ! Le H - Votre partenaire de croissance.
      </p>
    </div>
  </div>
</div>

<!-- CSS Custom Amélioré -->
<style>
  
  .text-gradient {
    background: linear-gradient(45deg, #28a745, #17a2b8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  
  .btn-gradient {
    background: linear-gradient(45deg, #28a745, #17a2b8);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
  }
  
  .btn-gradient:hover {
    opacity: 0.9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }
  
  .ticket-container {
    max-width: 650px;
    margin: 2rem auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 15px;
    overflow: hidden;
    background: white;
  }
  
  .ticket-header {
    background: linear-gradient(45deg, #28a745, #17a2b8);
    color: white;
    padding: 1.5rem;
    text-align: center;
  }
  
  .ticket-body {
    padding: 2rem;
  }
  
  .ticket-footer {
    background-color: #f8f9fa;
    padding: 1.5rem;
    text-align: center;
    border-top: 1px dashed #ddd;
  }
  
  .ticket-item {
    display: flex;
    justify-content: space-between;
    padding: 0.75rem 0;
    border-bottom: 1px dashed #eee;
  }
  
  .ticket-item:last-child {
    border-bottom: none;
  }
  
  .ticket-divider {
    border-top: 2px dashed #ddd;
    margin: 1.5rem 0;
  }
  
  .info-row {
    display: flex;
    margin-bottom: 0.75rem;
  }
  
  .info-label {
    font-weight: 600;
    min-width: 120px;
    color: #343a40;
  }
  
  .info-value {
    flex: 1;
  }
  
  .qr-code {
    width: 120px;
    height: 120px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem auto;
    border: 1px solid #ddd;
    border-radius: 8px;
  }
  
  .company-logo {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
  }
  
  .ticket-number {
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    display: inline-block;
    margin-top: 0.5rem;
  }
  
  .print-only {
    display: none;
  }
  
  @media print {
    body * {
      visibility: hidden;
    }
    .ticket-container, .ticket-container * {
      visibility: visible;
    }
    .ticket-container {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      max-width: 100%;
      box-shadow: none;
      margin: 0;
    }
    .no-print {
      display: none !important;
    }
    .print-only {
      display: block;
    }
  }
  
  .fade-in {
    animation: fadeIn 0.5s ease-in;
  }
  
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  .pulse {
    animation: pulse 2s infinite;
  }
  
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
  }
  
  /* Masquer les éléments Bootstrap non affichés */
  .tab-pane.fade:not(.show) {
    display: none !important;
  }
</style>

<!-- Scripts Améliorés -->
<script>
  // Fonction pour générer le ticket
  function generateTicket() {
    // Générer un ID de ticket unique
    const ticketId = 'CA-' + new Date().getFullYear() + '-' + Math.floor(1000 + Math.random() * 9000);
    document.getElementById('ticket-id').textContent = ticketId;
    
    // Ajouter la date actuelle
    const now = new Date();
    const options = { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' };
    document.getElementById('ticket-date').textContent = now.toLocaleDateString('fr-FR', options);
    
    // Afficher le ticket
    document.getElementById('order').classList.add('d-none');
    document.getElementById('ticket').classList.remove('d-none');
    window.scrollTo(0,0);
  }

  // Formulaire -> Ticket (version améliorée)
  const form = document.getElementById('order-form');
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }
      
      // Remplir les informations du ticket
      document.getElementById('ticket-name').textContent = document.getElementById('name').value;
      document.getElementById('ticket-phone').textContent = document.getElementById('phone').value;
      document.getElementById('ticket-address').textContent = document.getElementById('address').value;
      document.getElementById('ticket-notes').textContent = document.getElementById('notes').value || 'Aucune';
      document.getElementById('ticket-payment').textContent = document.querySelector('input[name="payment"]:checked').value;

      // Récupérer les articles du panier
      const cartItems = document.getElementById('cart-items');
      const ticketItems = document.getElementById('ticket-items');
      
     if (cartItems && cartItems.children.length > 0) {
  const itemsHTML = Array.from(cartItems.children).map(item => {
    const itemText = item.textContent.trim();
    const qtyInput = item.querySelector('.quantity-control input'); // هنا التعديل

    // نلقط السعر
    const priceMatch = itemText.match(/(\d+(?:\.\d+)?)\s*DA/);
    const price = priceMatch ? priceMatch[1] + ' DA' : '0 DA';

    // نلقط الكمية (أي رقم قبل DA أو بجنب + / x)
    const quantityMatch = itemText.match(/(\d+)\s*(x|\+)?/);
    const quantity = qtyInput ? qtyInput.value.trim() : '1'; // نستعمل value بدل textContent

    // نحذف السعر والكمية والرموز الزايدة من النص => يبقى الاسم فقط
    const itemName = itemText
      .replace(/(\d+(?:\.\d+)?)\s*DA/g, '') // نحذف السعر
      .replace(/[-+x]/g, '')               // نحذف الرموز - + x
      .replace(/\d+/g, '')                 // نحذف الأرقام الزايدة
      .trim();

    return `
      <div class="ticket-item" style="display:flex; justify-content:space-between; margin-bottom:5px;">
        <div>${itemName} (x${quantity})</div>
        <div>${price}</div>
      </div>
    `;
  }).join('');


        
        ticketItems.innerHTML = itemsHTML;
      } else {
        ticketItems.innerHTML = '<p class="text-muted text-center">Aucun article dans le panier.</p>';
      }
      
      document.getElementById('ticket-total').textContent = document.getElementById('cart-total')?.textContent || '0 DA';
      
      // Générer le ticket
      generateTicket();
    });
  }

 // 🌈 Impression stylée du ticket
function printTicket() {
  const ticket = document.getElementById('ticket');
  if (!ticket) return alert("Aucune ticket à imprimer.");

  const ticketContent = ticket.innerHTML;

  const printWindow = window.open('', '', 'width=500,height=700');
  printWindow.document.write(`
    <html>
      <head>
        <title>🎟️ Ticket de Commande</title>
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

          body {
            font-family: 'Poppins', sans-serif;
            background: #f8fdfb;
            margin: 0;
            padding: 0;
            color: #333;
          }

          .ticket-container {
            max-width: 380px;
            margin: 40px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            animation: fadeIn 0.6s ease-in-out;
          }

          .ticket-header {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            color: #fff;
            text-align: center;
            padding: 1.5rem 1rem;
            position: relative;
          }

          .ticket-header h2 {
            margin: 0;
            font-size: 1.5rem;
          }

          .ticket-header::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 100%;
            height: 20px;
            background: radial-gradient(circle at top center, transparent 20px, white 20px);
          }

          .ticket-body {
            padding: 1.5rem;
          }

          .ticket-item {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px dashed #ddd;
            padding: 0.6rem 0;
          }

          .ticket-item:last-child {
            border-bottom: none;
          }

          .ticket-item div:first-child {
            font-weight: 600;
            color: #333;
          }

          .ticket-divider {
            border-top: 2px dashed #ddd;
            margin: 1.2rem 0;
          }

          .ticket-footer {
            background: #f6fffb;
            padding: 1rem;
            text-align: center;
            border-top: 1px dashed #ccc;
          }

          .ticket-footer p {
            margin: 0;
            color: #28a745;
            font-weight: 600;
          }

          .qr-box {
            width: 100px;
            height: 100px;
            margin: 1rem auto;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 0.8rem;
            color: #777;
          }

          @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
          }

          @media print {
            body {
              background: #fff;
            }
            .ticket-container {
              box-shadow: none;
              border-radius: 0;
              margin: 0;
            }
          }
        </style>
      </head>
      <body>
        <div class="ticket-container">
          <div class="ticket-body">
            ${ticketContent}
            <div class="ticket-divider"></div>
          </div>
          <div class="ticket-footer">
            <p>Merci pour votre commande 💚</p>
            <p>Bon appétit ! 🍽️</p>
          </div>
        </div>
      </body>
    </html>
  `);

  printWindow.document.close();
  printWindow.focus();
  printWindow.print();
}

  // Téléchargement du ticket (simulé)
  function downloadTicket() {
    alert('Fonctionnalité de téléchargement activée! Le ticket sera téléchargé au format PDF.');
    // Ici, vous pourriez intégrer une bibliothèque comme jsPDF pour générer un PDF
  }
// Télécharger le ticket au format PDF
async function downloadTicket() {
  const ticket = document.getElementById('ticket');
  if (!ticket) return alert("Aucun ticket à télécharger.");

  // Import jsPDF
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Titre
  doc.setFontSize(16);
  doc.text("🎟️ Ticket de Commande", 70, 20);

  // On récupère le contenu du ticket
  const content = ticket.innerText.trim();
  const lines = doc.splitTextToSize(content, 180);

  // Corps du ticket
  doc.setFontSize(12);
  doc.text(lines, 15, 35);

  // Message de remerciement
  doc.text("Merci pour votre commande ❤️", 60, 280);

  // Téléchargement du fichier
  doc.save("ticket_commande.pdf");
}

  // Retour au formulaire
  function goBackToOrder() {
    document.getElementById('ticket').classList.add('d-none');
    document.getElementById('order').classList.remove('d-none');
    window.scrollTo(0,0);
  }

  // Animation du bouton d'impression
  document.addEventListener('DOMContentLoaded', function() {
    const printBtn = document.querySelector('.pulse');
    if (printBtn) {
      printBtn.addEventListener('animationiteration', function() {
        setTimeout(() => {
          this.classList.remove('pulse');
          setTimeout(() => this.classList.add('pulse'), 100);
        }, 6000);
      });
    }
  });
</script>
<!-- Optionnel : Ajouter Animate.css pour animation -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- Onglet Panier -->
<div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart-tab"> 
  <div class="container py-5">
    
    <!-- Titre principal -->
    <h2 class="text-center mb-4 fw-bold text-primary">🛒 Votre Panier</h2>
    
    <!-- Tableau du panier -->
    <div class="table-responsive shadow-sm rounded">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th class="rounded-start">Image</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
            <th class="rounded-end">Actions</th>
          </tr>
        </thead>
        <tbody id="cart-items">
          <!-- Exemple dynamique (remplacé par JS) -->
          <tr>
            <td colspan="7" class="text-center text-muted py-5">
              <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
              Votre panier est vide
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="fw-bold">
            <td colspan="5" class="text-end">Total général :</td>
            <td id="cart-total">0 DA</td>
            <td></td>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- ✅ Note Commande minimum -->
    <div class="alert alert-warning mt-3 shadow-sm" role="alert">
      <i class="bi bi-info-circle-fill me-2"></i>
      <strong>Commande minimum :</strong> 1000 DA (hors frais de livraison).
    </div>

    <!-- Section Suppléments -->
    <div class="bg-light p-4 mt-4 rounded">
      <h5 class="mb-3"><i class="bi bi-plus-circle text-success"></i> Ajouter des suppléments</h5>
      <div class="row g-2">
        <div class="col-md-4">
          <div class="form-check border rounded p-3 bg-white">
            <input class="form-check-input supplement add-to-cart-btn" type="checkbox" data-id="67" value="300" id="supplement1">
            <label class="form-check-label" for="supplement1">
              🧀 Fromage supplémentaire <span class="text-success fw-bold">(+300 DA)</span>
            </label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-check border rounded p-3 bg-white">
            <input class="form-check-input supplement add-to-cart-btn " type="checkbox" value="200" data-id="68" id="supplement2">
            <label class="form-check-label" for="supplement2">
              🌶️ Sauce spéciale <span class="text-success fw-bold">(+200 DA)</span>
            </label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-check border rounded p-3 bg-white">
            <input class="form-check-input supplement add-to-cart-btn" type="checkbox" value="250" data-id="69" id="supplement3">
            <label class="form-check-label" for="supplement3">
              🍟 Frites en plus <span class="text-success fw-bold">(+250 DA)</span>
            </label>
          </div>
        </div>
      </div>
    </div>

    <!-- Boutons d'action -->
    <div class="d-flex flex-column flex-md-row justify-content-between mt-4 gap-2">
      <button class="btn btn-outline-danger px-4 py-2" onclick="clearCart()">
        <i class="bi bi-trash"></i> Vider le panier
      </button>
      <button class="btn btn-success px-4 py-2 fs-5 fw-bold" onclick="checkout()">
        <i class="bi bi-bag-check"></i> Passer la commande
      </button>
    </div>

  </div>
</div>
  </div>
</div>

<style>
  #cart .table th {
    font-weight: 600;
    color: #333;
  }
  .form-check-label {
    cursor: pointer;
    transition: color 0.2s;
  }
  .form-check:hover label {
    color: #0d6efd;
  }
  .btn-success {
    background: linear-gradient(90deg, #28a745, #218838);
    border: none;
    transition: transform 0.2s;
  }
  .btn-success:hover {
    transform: scale(1.05);
  }
  .bg-light {
    border: 1px dashed #dee2e6;
  }
</style>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Filtrage des plats
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Retirer la classe active de tous les boutons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                const menuItems = document.querySelectorAll('.menu-item');
                
                menuItems.forEach(item => {
                    if (filter === 'all') {
                        item.style.display = 'block';
                    } else {
                        const hasBadge = item.querySelector(`.badge.bg-${filter === 'vegetarian' ? 'success' : 
                                                          filter === 'spicy' ? 'danger' : 
                                                          filter === 'gluten-free' ? 'info' : 
                                                          filter === 'new' ? 'primary' : 'warning'}`);
                       const isSpecial = item.querySelector('.special-badge') && 
    (
        (filter === 'new' && item.querySelector('.special-badge').textContent.includes('Nouveau')) ||
        (filter === 'popular' && item.querySelector('.special-badge').textContent.includes('demandé'))
    );

                        if (hasBadge || isSpecial) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    }
                });
            });
        });
        
        // Barre de recherche
        document.getElementById('search-input').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const menuItems = document.querySelectorAll('.menu-item');
            
            menuItems.forEach(item => {
                const title = item.querySelector('.card-title').textContent.toLowerCase();
                const description = item.querySelector('.description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
        
        // Ajout au panier
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                // Ici vous pourriez ajouter la logique pour ajouter l'article au panier
                
                // Mettre à jour le compteur du panier
                const cartCount = document.getElementById('cart-count');
                cartCount.textContent = parseInt(cartCount.textContent) + 1;
                
                // Animation de confirmation
                this.innerHTML = '<i class="bi bi-check2"></i> Ajouté !';
                this.classList.remove('btn-warning');
                this.classList.add('btn-success');
                
                setTimeout(() => {
                    this.innerHTML = 'Ajouter au panier';
                    this.classList.remove('btn-success');
                    this.classList.add('btn-warning');
                }, 2000);
            });
        });
        
        // Sélection des tailles de portion
        document.querySelectorAll('.portion-options .btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const parent = this.parentElement;
                parent.querySelectorAll('.btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('btn-outline-secondary');
                });
                this.classList.add('active');
                this.classList.remove('btn-outline-secondary');
            });
        });
        
        // Navigation fluide vers les ancres
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 

<!-- Script du panier -->
<script>
  let cart = [];

  function updateCartCount() {
    const count = cart.reduce((total, item) => total + item.quantity, 0);
    document.getElementById('cart-count').textContent = count;
  }

  function updateCartItems() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    if (cart.length === 0) {
      cartItems.innerHTML = '<tr><td colspan="6" class="text-center">Votre panier est vide</td></tr>';
      cartTotal.textContent = '0 DA';
      return;
    }
    let html = '';
    let total = 0;
    cart.forEach((item, index) => {
      const itemTotal = item.price * item.quantity;
      total += itemTotal;
      html += `
        <tr>
          <td><img src="${item.image}" class="cart-item-img" alt="${item.name}"></td>
          <td>${item.name}</td>
          <td>
            <div class="input-group quantity-control">
              <button class="btn btn-outline-secondary" onclick="updateQuantity(${index}, -1)">-</button>
              <input type="text" class="form-control text-center" value="${item.quantity}" readonly>
              <button class="btn btn-outline-secondary" onclick="updateQuantity(${index}, 1)">+</button>
            </div>
          </td>
          <td>${item.price} DA</td>
          <td>${itemTotal} DA</td>
          <td><button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})"><i class="bi bi-trash"></i></button></td>
        </tr>
      `;
    });
    cartItems.innerHTML = html;
    cartTotal.textContent = `${total} DA`;
  }

  function addToCart(id) {
    // Ici, vous pouvez charger les données depuis une API ou un fichier JSON
    const menuItems = {
  1: { name: 'Crème de volaille', price: 500, image: 'img/Crème de volaille.jpg' },
  2: { name: 'Hrira maison', price: 300, image: 'img/hrira.jpg' },
  3: { name: 'Bourek viande rouge', price: 250, image: 'img/bourek viande rouge.jpg' },
  4: { name: 'Soupe de légumes', price: 300, image: 'img/Soupe de légumes.jpg' },
  5: { name: 'Gratin de poulet', price: 500, image: 'img/Gratin de poulet.jpg' },
  6: { name: 'Hmiss', price: 200, image: 'img/hmiss.jpg' },
  7: { name: 'Omelettes (Nature/Fromage/Légumes) مع بطاطس', price: 350, image: 'img/omelettes.jpg' },
  8: { name: 'Assiette frite', price: 200, image: 'img/assiette frite.jpg' },
      9: { name: 'Tartare de saumon', price: 1200, image: 'https://images.unsplash.com/photo-1574926054530-540288c8e678' },
      10: { name: 'Salade de poulpe', price: 900, image: 'https://images.unsplash.com/photo-1607532941433-304659e8198a' },
      11: { name: 'Burrata à l\'italienne', price: 900, image: 'https://images.unsplash.com/photo-1607532941433-304659e8198a' },
      12: { name: 'Salade mexicaine', price: 600, image: 'https://images.unsplash.com/photo-1546793665-c74683f339c1' },
      13: { name: 'Niçoise revisitée', price: 600, image: 'https://images.unsplash.com/photo-1546069901-d5bfd2cbfb1f' },
      14: { name: 'César', price: 600, image: 'https://images.unsplash.com/photo-1546793665-c74683f339c1' },
      15: { name: 'Caprese', price: 700, image: 'https://images.unsplash.com/photo-1551248429-40975aa4de74' },
      16: { name: 'Salade de thon', price: 600, image: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c' },
  17: { name: 'Assiette de fromage', price: 1400, image: 'img/assiette de fromage.jpg' },
      18: { name: 'Médaillon de veau poêlée', price: 1900, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      182: { 
  name: 'Médaillon de veau poêlée (M)', 
  price: 2200, 
  image: 'https://images.unsplash.com/photo-1558030006-450675393462' 
},

183: { 
  name: 'Médaillon de veau poêlée (L)', 
  price: 2500, 
  image: 'https://images.unsplash.com/photo-1558030006-450675393462' 
}, // Entrecôte de bœuf grillée
  19: {
    name: 'Entrecôte de bœuf grillée (S)',
    price: 1800,
    image: 'https://images.unsplash.com/photo-1558030006-450675393462'
  },
  192: {
    name: 'Entrecôte de bœuf grillée (M)',
    price: 2100,
    image: 'https://images.unsplash.com/photo-1558030006-450675393462'
  },
  193: {
    name: 'Entrecôte de bœuf grillée (L)',
    price: 2400,
    image: 'https://images.unsplash.com/photo-1558030006-450675393462'
  },

  // M'hamer d'agneau
  20: {
    name: "M'hamer d'agneau (S)",
    price: 1800,
    image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143'
  },
  202: {
    name: "M'hamer d'agneau (M)",
    price: 2100,
    image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143'
  },
  203: {
    name: "M'hamer d'agneau (L)",
    price: 2400,
    image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143'
  },
      21: { name: 'Cordon bleu', price: 2000, image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143' },
      22: { name: 'Cube à la crème (poulet)', price: 1200, image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143' },
      23: { name: 'Nuggets de poulet', price: 1400, image: 'https://images.unsplash.com/photo-1633613286848-e6f43bbafb8d' },
  24: { name: 'Brochettes mixte', price: 2200, image: 'img/brochettes mixte.jpg' },
      25: { name: 'Côte d\'agneau grillée', price: 1800, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
  26: { name: 'Brochettes de viande hachée', price: 1600, image: 'img/brochettes viande hachée.jpg' },
  27: { name: 'Brochettes de poulet', price: 1200, image: 'img/brochettes de poulet.jpg' },
      28: { name: 'Méchoui pour 4', price: 11000, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
  29: { name: 'Tajine langue de veau', price: 1600, image: 'img/tajine langue de veau.jpg' },
  30: { name: 'Tagliatelle au saumon fumé', price: 1400, image: 'img/tagliatelle saumon fumé.jpg' },
  31: { name: 'Tagliatelle carbonara', price: 1000, image: 'img/tagliatelle carbonara.jpg' },
  32: { name: 'Spaghetti bolognaise', price: 1000, image: 'img/spaghetti bolognaise.jpg' },
  33: { name: 'Spaghetti au poulet', price: 900, image: 'img/spaghetti poulet.jpg' },
      34: { name: 'Penne à l\'arrabbiata', price: 1000, image: 'https://images.unsplash.com/photo-1611270633750-86e0aa9f2a95' },
      35: { name: 'Penne sauce fromage/rouge', price: 650, image: 'https://images.unsplash.com/photo-1611270633750-86e0aa9f2a95' },
  36: { name: 'Sandwich classique', price: 700, image: 'img/sandwich classique.jpg' },
      37: { name: 'Burger Le (R)', price: 600, image: 'https://images.unsplash.com/photo-1559847844-5315695dadae' },
  38: { name: 'Chicken burger', price: 800, image: 'img/chicken burger.jpg' },
  39: { name: 'Tacos au poulet', price: 800, image: 'img/tacos poulet.jpg' },
  40: { name: 'Croque monsieur', price: 500, image: 'img/croque monsieur.jpg' },
  41: { name: 'Tiramisu café/caramel', price: 400, image: 'img/tiramisu Café.jpg' },
      42: { name: 'Crème brûlée', price: 400, image: 'https://images.unsplash.com/photo-1551024506-0bccd828d307' },
      43: { name: 'Flan maison', price: 300, image: 'https://images.unsplash.com/photo-1571115177098-24ec42ed204d' },
  44: { name: 'Assiette de fruits', price: 700, image: 'img/assiette fruits.jpg' },
      45: { name: 'Glaces artisanales', price: 200, image: 'https://images.unsplash.com/photo-1576506295286-5cda18df43e7' },
  46: { name: 'Sorbets', price: 200, image: 'img/sorbets.jpg' },
  47: { name: 'Café Nespresso', price: 200, image: 'img/Café nespresso.jpg' },
  48: { name: 'Thé infusion', price: 200, image: 'img/Thé infusion.jpg' },
      49: { name: 'Margherita', price: 500, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      50: { name: 'Anchois', price: 800, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      51: { name: 'Végétarienne', price: 800, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      52: { name: 'Fermière', price: 800, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      53: { name: 'Buffalo', price: 800, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      54: { name: 'Thon', price: 800, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      55: { name: 'Milano', price: 800, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      56: { name: 'Américaine', price: 900, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      57: { name: 'Quatre Fromages', price: 1000, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      58: { name: 'Saumon', price: 1200, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
      
      59: { name: 'Mixte', price: 1200, image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38' },
 
  // Eau minérale
  60: { 
    name: 'Eau minérale (صغير)', 
    price: 50, 
image: 'img/Eau minérale.jpg'  },
  600: { 
    name: 'Eau minérale (كبير)', 
    price: 100, 
image: 'img/Eau minérale.jpg'  },

  // Sodas
  61: { 
    name: 'Coca', 
    price: 120, 
image: 'img/Sodas.jpg'  },
  611: { 
    name: 'Fanta', 
    price: 120, 
image: 'img/Sodas.jpg'  },
  612: { 
    name: 'Sprite', 
    price: 120, 
image: 'img/Sodas.jpg'  },
  613: { 
    name: 'Pepsi', 
    price: 120, 
image: 'img/Sodas.jpg'  }
,
  62: { name: 'Jus naturel pressé', price: 250, image: 'img/Jus naturel pressé.jpg' },
  63: { name: 'Limonade maison', price: 200, image: 'img/Limonade maison.jpg' },
  64: { name: 'Café espresso', price: 100, image: 'img/Café Nespresso.jpg' },
  65: { name: 'Thé à la menthe', price: 120, image: 'img/Thé à la menthe.jpg' },
  66: { name: 'Nespresso/arômes', price: 150, image: 'img/Café Nespresso.jpg' },
  67: { 
    name: '🧀 Fromage supplémentaire', 
    price: 300, 
    image: 'https://images.unsplash.com/photo-1585238341986-46a6b99f2b4b' 
  },
  68: { 
    name: '🌶️ Sauce spéciale', 
    price: 200, 
    image: 'https://images.unsplash.com/photo-1604908816387-df4e6a2e6e5d' 
  },
  69: { 
    name: '🍟 Frites en plus', 
    price: 250, 
    image: 'https://images.unsplash.com/photo-1550547660-d9450f859349' 
  },
   301: { 
    name: "Menu Découverte", 
    price: 2500, 
    image: "https://images.unsplash.com/photo-1600891964599-f61ba0e24092" 
  },
  302: { 
    name: "Menu Gourmet", 
    price: 3200, 
    image: "https://images.unsplash.com/photo-1546069901-eacef0df6022" 
  },
  303: { 
    name: "Menu Végétarien", 
    price: 2200, 
    image: "https://images.unsplash.com/photo-1543353071-087092ec393e" 
  }
 };
    // Suppléments disponibles
const supplements = {
  67: { 
    name: '🧀 Fromage supplémentaire', 
    price: 300, 
    image: 'https://images.unsplash.com/photo-1585238341986-46a6b99f2b4b' 
  },
  68: { 
    name: '🌶️ Sauce spéciale', 
    price: 200, 
    image: 'https://images.unsplash.com/photo-1604908816387-df4e6a2e6e5d' 
  },
  69: { 
    name: '🍟 Frites en plus', 
    price: 250, 
    image: 'https://images.unsplash.com/photo-1550547660-d9450f859349' 
  },
  70: { 
    name: '🥤 Boisson (canette)', 
    price: 120, 
    image: 'https://images.unsplash.com/photo-1604909053364-cad548bb2f47' 
  },
  71: { 
    name: '💧 Eau minérale (petite)', 
    price: 75, 
    image: 'https://images.unsplash.com/photo-1551028150-64b9f398f678' 
  },
  72: { 
    name: '💧 Eau minérale (grande)', 
    price: 120, 
    image: 'https://images.unsplash.com/photo-1551028150-64b9f398f678' 
  }
};

    const item = menuItems[id];
    const existingItem = cart.find(i => i.id === id);
    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      cart.push({ id, name: item.name, price: item.price, image: item.image, quantity: 1 });
    }
    updateCartCount();
    updateCartItems();
    const cartTab = new bootstrap.Tab(document.getElementById('cart-tab'));
    cartTab.show();
    alert(`"${item.name}" a été ajouté au panier`);
  }

  function updateQuantity(index, change) {
    const newQuantity = cart[index].quantity + change;
    if (newQuantity < 1) {
      removeFromCart(index);
      return;
    }
    cart[index].quantity = newQuantity;
    updateCartItems();
    updateCartCount();
  }

  function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartItems();
    updateCartCount();
  }

  function clearCart() {
    if (confirm('Vider le panier ?')) {
      cart = [];
      updateCartItems();
      updateCartCount();
    }
  }

  function checkout() {
    if (cart.length === 0) {
      alert('Votre panier est vide.');
      return;
    }
    const orderTab = new bootstrap.Tab(document.getElementById('order-tab'));
    orderTab.show();
  }

  document.getElementById('order-form').addEventListener('submit', function(e) {
    e.preventDefault();
    if (cart.length === 0) {
      alert('Votre panier est vide.');
      return;
    }
    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const address = document.getElementById('address').value;
    alert(`Merci ${name} !\nLivraison à : ${address}\nNous appellerons au : ${phone}`);
    cart = [];
    updateCartCount();
    updateCartItems();
    this.reset();
  });

  document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    button.addEventListener('click', function() {
      const id = parseInt(this.getAttribute('data-id'));
      addToCart(id);
    });
  });

  document.getElementById('search-input').addEventListener('input', function() {
    const term = this.value.toLowerCase();
    document.querySelectorAll('.menu-item').forEach(item => {
      const title = item.querySelector('.card-title').textContent.toLowerCase();
      item.style.display = title.includes(term) ? 'block' : 'none';
    });
  });
  let currentItemIdToAdd = null; // Stocke temporairement l'ID du plat

// Écouter les boutons "Ajouter au panier"
document.querySelectorAll('.add-to-cart-btn').forEach(button => {
  button.addEventListener('click', function () {
    const id = parseInt(this.getAttribute('data-id'));
    currentItemIdToAdd = id;

    // Réinitialiser les checkboxes
    document.getElementById('supp-cheese').checked = false;
    document.getElementById('supp-sauce').checked = false;
    document.getElementById('supp-fries').checked = false;

    // Ouvrir le modal
    const modal = new bootstrap.Modal(document.getElementById('supplementModal'));
    modal.show();
  });
});

// Confirmer l'ajout avec suppléments
document.getElementById('confirm-add-to-cart').addEventListener('click', function () {
  const modal = bootstrap.Modal.getInstance(document.getElementById('supplementModal'));

  const cheese = document.getElementById('supp-cheese').checked;
  const sauce = document.getElementById('supp-sauce').checked;
  const fries = document.getElementById('supp-fries').checked;

  const selectedSupplements = [];
  let supplementTotal = 0;

  if (cheese) {
    selectedSupplements.push("Fromage (+300 DA)");
    supplementTotal += 300;
  }
  if (sauce) {
    selectedSupplements.push("Sauce (+200 DA)");
    supplementTotal += 200;
  }
  if (fries) {
    selectedSupplements.push("Frites (+250 DA)");
    supplementTotal += 250;
  }

  const item = menuItems[currentItemIdToAdd];

  // Créer un identifiant unique basé sur l'ID + suppléments
  const supplementKey = selectedSupplements.sort().join('|');
  const uniqueId = `${currentItemIdToAdd}_${supplementKey}`;

  // Vérifier si le même plat avec les mêmes suppléments existe déjà
  const existingItem = cart.find(i => i.uniqueId === uniqueId);

  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({
      uniqueId,
      id: currentItemIdToAdd,
      name: item.name,
      price: item.price + supplementTotal,
      basePrice: item.price,
      supplementTotal,
      supplements: selectedSupplements,
      image: item.image,
      quantity: 1
    });
  }

  updateCartCount();
  updateCartItems();
  modal.hide();

  // Notification
  alert(`"${item.name}" ajouté au panier (${selectedSupplements.length > 0 ? selectedSupplements.join(', ') : 'aucun supplément'})`);
  currentItemIdToAdd = null;
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</body>
</html>
<?php include('include/footer.php'); ?>
