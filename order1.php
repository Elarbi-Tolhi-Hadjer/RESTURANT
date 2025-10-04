
<?php
 include('include/currentPage_header.php');
 include('include/dbConnect.php');
 ?>
<!DOCTYPE html>
<html lang="FR" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>🍽️ قائمة مطعمنا - طلب إلكتروني</title>
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #c0392b;
      --secondary-color: #e67e22;
      --light-color: #f8f9fa;
      --dark-color: #343a40;
    }
    .supplements-text {
  margin: 20px 0;
  font-size: 0.9em;
  color: var(--secondary-color);
}
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Tajawal', sans-serif;
      background: #f0f0f5; 
      color: var(--dark-color);
    }
    
    /* تحسينات التنقل */
    .navbar {
      background: #fff;
      padding: 15px 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
      display: flex;
      justify-content: center;
      gap: 20px;
    }
    
    .navbar a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      padding: 5px 10px;
      border-radius: 5px;
    }
    
    .navbar a:hover {
      color: white;
      background-color: var(--primary-color);
    }
    
    /* تحسينات القائمة */
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
    
    h1, h2, h3 {
      font-family: 'Amiri', serif;
    }
    
    h1 {
      text-align: center;
      font-size: 3em;
      margin-bottom: 20px;
      color: var(--primary-color);
      position: relative;
    }
    
    h1::after {
      content: "";
      display: block;
      width: 150px;
      height: 3px;
      background: var(--secondary-color);
      margin: 15px auto;
    }
    
    section {
      margin-bottom: 50px;
    }
    #search-input {
  border-radius: 25px;
  padding-right: 10px;
}
    
    h2 {
      font-size: 2em;
      margin-bottom: 20px;
      color: var(--secondary-color);
      border-bottom: 2px solid var(--secondary-color);
      display: inline-block;
      padding-bottom: 5px;
      padding-right: 15px;
    }
    
    .menu-category {
      color: #d4a373;
      padding-bottom: 8px;
      border-bottom: 2px solid #d4a373;
      margin: 20px 0 15px;
      font-size: 1.3em;
    }
    
    .menu-item {
      transition: all 0.3s;
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      margin-bottom: 20px;
    }
    
    .menu-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .menu-item .card-img-top {
      height: 180px;
      object-fit: cover;
      transition: transform 0.3s;
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
    
    .dietary-badge {
      font-size: 0.7em;
      padding: 3px 8px;
      border-radius: 10px;
      margin-left: 5px;
    }
    
    .vegetarian {
      background-color: #4CAF50;
      color: white;
    }
    
    .gluten-free {
      background-color: #2196F3;
      color: white;
    }
    
    .spicy {
      background-color: #f44336;
      color: white;
    }
    
    /* تحسينات نظام الطلب */
    .quantity-control {
      width: 120px;
    }
    
    .quantity-control .btn {
      width: 35px;
    }
    
    .quantity-control input {
      text-align: center;
    }
    
    .add-to-cart-btn {
      background-color: var(--primary-color);
      border: none;
      transition: all 0.3s;
    }
    
    .add-to-cart-btn:hover {
      background-color: var(--secondary-color);
    }
    
    /* تحسينات عربة التسوق */
    .cart-item-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }
    
    .remove-item-btn {
      padding: 3px 8px;
    }
    
    /* قسم المعلومات */
    .info-section {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
      border-right: 5px solid var(--secondary-color);
    }
    
    /* التذييل */
    .footer {
      background-color: var(--dark-color);
      color: white;
      padding: 30px 0;
      text-align: center;
      margin-top: 50px;
    }
    
    .footer a {
      color: var(--secondary-color);
      text-decoration: none;
    }
    
    .footer a:hover {
      text-decoration: underline;
    }
    
    /* تأثيرات للعناصر المميزة */
    .special-item {
      border: 2px solid var(--secondary-color);
      position: relative;
    }
    
    .special-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: var(--secondary-color);
      color: white;
      padding: 3px 10px;
      border-radius: 5px;
      font-size: 0.8em;
      z-index: 1;
    }
    
    /* تصميم متجاوب */
    @media (max-width: 768px) {
      .navbar {
        flex-wrap: wrap;
        padding: 10px;
      }
      
      .menu-book {
        padding: 20px;
      }
      
      h1 {
        font-size: 2em;
      }
    }
     .navbar {
    position: fixed; /* لتثبيت الشريط في الأعلى */
    top: 0;
    width: 100%;
    background-color: #f8f8f8;
    padding: 10px 0;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 1000;
  }

  .navbar a {
    text-decoration: none;
    color: #333;
    margin: 0 15px;
    font-weight: bold;
    font-size: 16px;
    transition: color 0.3s;
  }

  .navbar a:hover {
    color: #d35400;
  }

  body {
    padding-top: 60px; /* لتعويض المساحة التي يشغلها الشريط الثابت */
  }
          :root {
            --primary-dark: #1E5631; /* Vert bouteille */
            --primary-light: #4A785E;
            --accent-gold: #C6A664; /* Or mat */
            --accent-light: #E8D9B0;
            --neutral-cream: #F8F7F5;
            --text-dark: #333333;
            --text-light: #777777;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--neutral-cream);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Header */
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

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
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

        /* Navigation */
        nav {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 20px;
        }

        .nav-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
        }

        .nav-logo .logo-mini {
            width: 40px;
            height: 40px;
            background-color: var(--primary-dark);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            border: 2px solid var(--accent-gold);
        }

        .nav-logo .logo-mini span {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: white;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            position: relative;
            transition: color 0.3s;
        }

        .nav-links a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--accent-gold);
            bottom: -5px;
            left: 0;
            transition: width 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-dark);
        }

        .nav-links a:hover:after {
            width: 100%;
        }

        /* Sections */
        .section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
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

        /* Menu */
        .menu-category {
            margin: 50px 0 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent-light);
        }

        .menu-category h3 {
            font-size: 1.8rem;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
        }

        .menu-category h3:before {
            content: '';
            display: inline-block;
            width: 15px;
            height: 15px;
            background-color: var(--accent-gold);
            margin-right: 15px;
            transform: rotate(45deg);
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px dashed var(--accent-light);
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .item-name {
            font-weight: 600;
            color: var(--primary-dark);
        }

        .item-price {
            color: var(--accent-gold);
            font-weight: bold;
        }

        .item-desc {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-top: 5px;
            font-style: italic;
        }

        .dietary-tag {
            display: inline-block;
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: 8px;
            font-weight: bold;
        }

        .vegetarian {
            background-color: rgb(109, 255, 114);
            color: #2E7D32;
        }

        .vegan {
            background-color: rgba(139, 195, 74, 0.2);
            color: #558B2F;
        }

        .gluten-free {
            background-color: rgb(116, 190, 250);
            color: #1565C0;
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .gallery-item {
            height: 250px;
            overflow: hidden;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(30, 86, 49, 0.8), transparent);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        /* Footer */
        footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 60px 20px 30px;
            text-align: center;
        }

        .footer-logo {
            font-size: 3rem;
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
            display: inline-block;
        }

        .footer-logo span {
            display: inline-block;
            width: 60px;
            height: 60px;
            background-color: white;
            color: var(--primary-dark);
            border-radius: 50%;
            line-height: 60px;
            margin-right: 10px;
            vertical-align: middle;
            border: 2px solid var(--accent-gold);
        }

        .footer-links {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 30px 0;
        }

        .footer-links li {
            margin: 0 15px;
        }

        .footer-links a {
            color: var(--accent-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: white;
        }

        .social-links {
            margin: 30px 0;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            color: white;
            border-radius: 50%;
            line-height: 40px;
            margin: 0 10px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: var(--accent-gold);
            transform: translateY(-5px);
        }

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            font-size: 0.9rem;
            color: var(--accent-light);
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
                margin-top: 20px;
            }
            
            .nav-links li {
                margin: 0 10px;
            }
            
            .gallery {
                grid-template-columns: 1fr;
            }
        }
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

  </style>
</head>
<body>
<!-- Hero Section -->
    <section class="hero">
        <div class="logo">
            <span>R</span>
        </div>
        <h1><?php echo $general_setting['Name'] ?></h1>
        <p>Une expérience gastronomique où la botanique rencontre l'art culinaire</p>
        <a href="#menu" class="btn" style="
            background-color: var(--accent-gold);
            color: var(--primary-dark);
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            border: 2px solid var(--accent-gold);
        ">Découvrir notre menu</a>
    </section>

<!-- Navigation Tabs -->
<ul class="nav nav-tabs justify-content-center" id="menuTabs" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#view-menu">Voir le menu</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="order-tab" data-bs-toggle="tab" data-bs-target="#order">Commander</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="cart-tab" data-bs-toggle="tab" data-bs-target="#cart">Panier <span class="badge bg-danger" id="cart-count">0</span></button>
  </li>
</ul>

<!-- Tab Contents -->
<div class="tab-content p-3 border border-top-0 rounded-bottom" id="menuTabsContent">
<div id="menu">
  <!-- ... -->
</div>
  <!-- Onglet Voir le menu -->
  <div class="tab-pane fade show active" id="view-menu" role="tabpanel">
    <div class="menu-book">
      <div class="section-title text-center mb-4">
        <h2><i class="bi bi-journal"></i> Notre Carte</h2>
      </div>

      <!-- Barre de recherche -->
      <div class="d-flex justify-content-center my-4">
        <div style="max-width: 300px; width: 100%;">
          <input type="text" id="search-input" class="form-control shadow-sm ps-4" placeholder="🔍 Rechercher un plat..." />
        </div>
      </div>

<nav class="menu-nav ">
  <div class="nav-container">
    <div class="nav-logo">
      <div class="logo-mini">R</div>
      <span class="restaurant-name"><?php echo $general_setting['Name'] ?></span>
    </div>
    <ul class="nav-links">
      <li><a href="#salades">🥗 Salades</a></li>
      <li><a href="#plats">🍽️ Plats</a></li>
      <li><a href="#sandwichs">🥪 Sandwichs</a></li>
      <li><a href="#desserts">🍰 Desserts</a></li>
      <li><a href="#boissons">🥤 Boissons</a></li>
      <li><a href="#pizzas">🍕 Pizzas</a></li>
    </ul>
  </div>
</nav>

      </br>
      <!-- Informations importantes -->
      <div class="info-section mb-4 text-center">
        <h3><i class="bi bi-info-circle-fill"></i> Informations importantes</h3>
        <p>Nous utilisons dans notre restaurant des ingrédients frais et locaux pour préparer tous nos plats avec soin et passion. Nous vous garantissons une qualité optimale et une hygiène irréprochable pour tous vos repas.</p>
        <div class="dietary-info mt-3">
          <span class="badge vegetarian">Végétarien</span>
          <span class="badge gluten-free">Sans gluten</span>
          <span class="badge spicy">Épicé</span>
        </div>
         <div class="dietary-info mt-3">
      <span class="badge bg-success">🥦 Végétarien</span>
      <span class="badge bg-info">🌾 Sans gluten</span>
      <span class="badge bg-danger">🔥 Épicé</span>
      <span class="badge bg-primary">🆕 Nouveau</span>
      <span class="badge bg-warning text-dark">🥇 Plus demandé</span>
    </div>
      </div>


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
      <section id="salades">
        <h2>🥗 Les Salades</h2>
        
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item special-item">
              <span class="special-badge">Nouveau</span>
              <img src="https://images.unsplash.com/photo-1574926054530-540288c8e678" class="card-img-top" alt="Tartare de saumon">
              <div class="card-body">
                <h5 class="card-title">Tartare de saumon</h5>
                <p class="description">Tartare de saumon frais avec épices</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1200 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="9">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1607532941433-304659e8198a" class="card-img-top" alt="Salade de poulpe">
              <div class="card-body">
                <h5 class="card-title">Salade de poulpe</h5>
                <p class="description">Salade de poulpe avec olives et légumes</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">900 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="10">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1607532941433-304659e8198a" class="card-img-top" alt="Burrata à l'italienne">
              <div class="card-body">
                <h5 class="card-title">Burrata à l'italienne <span class="badge vegetarian">Végétarien</span></h5>
                <p class="description">Burrata italienne avec tomates et basilic</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">900 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="11">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1546793665-c74683f339c1" class="card-img-top" alt="Salade mexicaine">
              <div class="card-body">
                <h5 class="card-title">Salade mexicaine <span class="badge spicy">Épicé</span></h5>
                <p class="description">Salade mexicaine avec haricots, maïs et poivrons</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">600 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="12">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1546069901-d5bfd2cbfb1f" class="card-img-top" alt="Niçoise revisitée">
              <div class="card-body">
                <h5 class="card-title">Niçoise revisitée</h5>
                <p class="description">Salade niçoise avec thon, œufs et olives</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">600 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="13">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1546793665-c74683f339c1" class="card-img-top" alt="César">
              <div class="card-body">
                <h5 class="card-title">César</h5>
                <p class="description">Salade César avec poulet et sauce maison</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">600 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="14">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1551248429-40975aa4de74" class="card-img-top" alt="Caprese">
              <div class="card-body">
                <h5 class="card-title">Caprese <span class="badge vegetarian">Végétarien</span></h5>
                <p class="description">Salade caprese avec mozzarella, tomates et basilic</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">700 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="15">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" class="card-img-top" alt="Salade de thon">
              <div class="card-body">
                <h5 class="card-title">Salade de thon</h5>
                <p class="description">Salade de thon avec légumes</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">600 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="16">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Assiette de fromage.jpg" class="card-img-top" alt="Assiette de fromage">
              <div class="card-body">
                <h5 class="card-title">Assiette de fromage <span class="badge vegetarian">Végétarien</span></h5>
                <p class="description">Assortiment de fromages</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1400 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="17">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     <!-- Plats Principaux -->
      <section id="plats">
        <h2>🍖 Plats Principaux</h2>
        
        <h3 class="menu-category">🥩 Viandes et Volailles</h3>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1558030006-450675393462" class="card-img-top" alt="Médaillon de veau poêlée">
              <div class="card-body">
                <h5 class="card-title">Médaillon de veau poêlée</h5>
                <p class="description">Médaillons de veau avec sauce maison</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1900 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="18">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1558030006-450675393462" class="card-img-top" alt="Entrecôte de bœuf grillée">
              <div class="card-body">
                <h5 class="card-title">Entrecôte de bœuf grillée</h5>
                <p class="description">Entrecôte de bœuf grillée</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1800 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="19">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1603360946369-dc9bb6258143" class="card-img-top" alt="M'hamer d'agneau">
              <div class="card-body">
                <h5 class="card-title">M'hamer d'agneau</h5>
                <p class="description">Agneau rôti aux épices</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1800 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="20">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="https://images.unsplash.com/photo-1603360946369-dc9bb6258143" class="card-img-top" alt="Cordon bleu">
              <div class="card-body">
                <h5 class="card-title">Cordon bleu</h5>
                <p class="description">Cordon bleu de poulet avec fromage et jambon</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">2000 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="21">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Cube à la crème .jpg
" class="card-img-top" alt="Cube à la crème (poulet)">
              <div class="card-body">
                <h5 class="card-title">Cube à la crème (poulet)</h5>
                <p class="description">Dés de poulet à la sauce crème</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1200 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="22">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card menu-item">
              <img src="img\Nuggets de poulet.jpg" class="card-img-top" alt="Nuggets de poulet">
              <div class="card-body">
                <h5 class="card-title">Nuggets de poulet</h5>
                <p class="description">Nuggets de poulet croustillants</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">1400 DA</span>
                  <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="23">Ajouter au panier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
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
      <!-- الحلويات -->
     <!-- Desserts -->
<section id="desserts">
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
<section id="boissons">
  <h2>🍹 Boissons</h2>
  <h3 class="menu-category">☕ Boissons chaudes</h3>
  <div class="row">
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Café Nespresso.jpg" class="card-img-top" alt="Café Nespresso">
        <div class="card-body">
          <h5 class="card-title">Café Nespresso <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Café Nespresso</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">200 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="47">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Thé infusion .jpg" class="card-img-top" alt="Thé infusion">
        <div class="card-body">
          <h5 class="card-title">Thé infusion <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Infusion aux herbes</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">200 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="48">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
      
  <h3 class="menu-category">🥤 Boissons fraîches</h3>
  
  <div class="row">
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Eau minérale .jpg" class="card-img-top" alt="Eau minérale">
        <div class="card-body">
          <h5 class="card-title">Eau minérale (petit/grand) <span class="badge gluten-free">Sans gluten</span></h5>
          <p class="description">Eau minérale</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">50-100 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="60">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Sodas .jpg" class="card-img-top" alt="Sodas">
        <div class="card-body">
          <h5 class="card-title">Sodas (Coca, Fanta, etc) <span class="badge gluten-free">Sans gluten</span></h5>
          <p class="description">Boissons gazeuses</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">120 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="61">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="img\Jus naturel pressé.jpg" class="card-img-top" alt="Jus naturel pressé">
        <div class="card-body">
          <h5 class="card-title">Jus naturel pressé <span class="badge vegetarian">Végétarien</span> <span class="badge gluten-free">Sans gluten</span></h5>
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
          <h5 class="card-title">Limonade maison <span class="badge vegetarian">Végétarien</span> <span class="badge gluten-free">Sans gluten</span></h5>
          <p class="description">Limonade maison</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">200 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="63">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    
    
  </div>
</section>

<!-- Pizzas -->
<section id="pizzas">
  <h2>🍕 Pizzas</h2>
  
  <div class="row">
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Margherita">
        <div class="card-body">
          <h5 class="card-title">Margherita <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Pizza margherita avec fromage et tomate</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">500 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="49">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Anchois">
        <div class="card-body">
          <h5 class="card-title">Anchois</h5>
          <p class="description">Pizza aux anchois</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">800 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="50">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
      <div class="card menu-item">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Végétarienne">
        <div class="card-body">
          <h5 class="card-title">Végétarienne <span class="badge vegetarian">Végétarien</span></h5>
          <p class="description">Pizza végétarienne</p>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">800 DA</span>
            <button class="btn btn-sm add-to-cart-btn btn-warning" data-id="51">Ajouter au panier</button>
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
          <h5 class="card-title">Buffalo <span class="badge spicy">Épicé</span></h5>
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
          <h5 class="card-title">Quatre Fromages <span class="badge vegetarian">Végétarien</span></h5>
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
      </div>
    </div>
    
    <p class="text-center text-muted small supplements-text">
      <i class="bi bi-plus-circle"></i> Suppléments : +300 DA
    </p>
  </div>
</section>

</div>
</div>
<!-- Onglet Commander -->
  <div class="tab-pane fade" id="order" role="tabpanel">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-6">
          <h2 class="mb-4">Commandez votre plat préféré</h2>
          <form id="order-form">
            <div class="mb-3">
              <label for="name" class="form-label">Nom complet</label>
              <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Numéro de téléphone</label>
              <input type="tel" class="form-control" id="phone" required>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Adresse</label>
              <textarea class="form-control" id="address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="notes" class="form-label">Notes supplémentaires</label>
              <textarea class="form-control" id="notes" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Confirmer la commande</button>
          </form>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Informations de livraison</h5>
              <p class="card-text">- Commande minimum : 1000 DA</p>
              <p class="card-text">- Frais de livraison : 200 DA</p>
              <p class="card-text">- Délai de livraison : 30-45 minutes</p>
              <p class="card-text">- Paiement : Espèces à la livraison ou par carte bancaire</p>
              <hr>
              <h5 class="card-title">Heures d'ouverture</h5>
              <p class="card-text">- Dimanche à jeudi : 11h - 23h</p>
              <p class="card-text">- Vendredi et samedi : 12h - 00h</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Onglet Panier -->
  <div class="tab-pane fade" id="cart" role="tabpanel">
    <div class="container py-5">
      <h2 class="mb-4">Panier</h2>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Plat</th>
              <th>Quantité</th>
              <th>Prix</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="cart-items">
            <tr>
              <td colspan="6" class="text-center">Votre panier est vide</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" class="text-end">Total :</td>
              <td id="cart-total">0 DA</td>
              <td></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="d-flex justify-content-between">
        <button class="btn btn-outline-secondary" onclick="clearCart()">Vider le panier</button>
        <button class="btn btn-warning" onclick="checkout()">Passer commande</button>
      </div>
    </div>
  </div>
</div>

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
      1: { name: 'Crème de volaille', price: 500, image: 'https://images.unsplash.com/photo-1547592180-85f173990554' },
      2: { name: 'Hrira maison', price: 300, image: 'https://images.unsplash.com/photo-1544025162-d76694265947' },
      3: { name: 'Bourek viande rouge', price: 250, image: 'https://images.unsplash.com/photo-1601050690597-df0568f70950' },
      4: { name: 'Soupe de légumes', price: 300, image: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c' },
      5: { name: 'Gratin de poulet', price: 500, image: 'https://images.unsplash.com/photo-1601050690597-df0568f70950' },
      6: { name: 'Hmiss', price: 200, image: 'https://images.unsplash.com/photo-1518779578993-ec3579fee39f' },
      7: { name: 'Omelettes (Nature/Fromage/Légumes) مع بطاطس', price: 350, image: 'https://images.unsplash.com/photo-1558584724-0e4d32ca55a4' },
      8: { name: 'Assiette frite', price: 200, image: 'https://images.unsplash.com/photo-1632818924360-68d4994cfdb2' },
      9: { name: 'Tartare de saumon', price: 1200, image: 'https://images.unsplash.com/photo-1574926054530-540288c8e678' },
      10: { name: 'Salade de poulpe', price: 900, image: 'https://images.unsplash.com/photo-1607532941433-304659e8198a' },
      11: { name: 'Burrata à l\'italienne', price: 900, image: 'https://images.unsplash.com/photo-1607532941433-304659e8198a' },
      12: { name: 'Salade mexicaine', price: 600, image: 'https://images.unsplash.com/photo-1546793665-c74683f339c1' },
      13: { name: 'Niçoise revisitée', price: 600, image: 'https://images.unsplash.com/photo-1546069901-d5bfd2cbfb1f' },
      14: { name: 'César', price: 600, image: 'https://images.unsplash.com/photo-1546793665-c74683f339c1' },
      15: { name: 'Caprese', price: 700, image: 'https://images.unsplash.com/photo-1551248429-40975aa4de74' },
      16: { name: 'Salade de thon', price: 600, image: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c' },
      17: { name: 'Assiette de fromage', price: 1400, image: 'https://images.unsplash.com/photo-1550583724-b2692b85b150' },
      18: { name: 'Médaillon de veau poêlée', price: 1900, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      19: { name: 'Entrecôte de bœuf grillée', price: 1800, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      20: { name: 'M\'hamer d\'agneau', price: 1800, image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143' },
      21: { name: 'Cordon bleu', price: 2000, image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143' },
      22: { name: 'Cube à la crème (poulet)', price: 1200, image: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143' },
      23: { name: 'Nuggets de poulet', price: 1400, image: 'https://images.unsplash.com/photo-1633613286848-e6f43bbafb8d' },
      24: { name: 'Brochettes mixte', price: 2200, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      25: { name: 'Côte d\'agneau grillée', price: 1800, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      26: { name: 'Brochettes de viande hachée', price: 1600, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      27: { name: 'Brochettes de poulet', price: 1200, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      28: { name: 'Méchoui pour 4', price: 11000, image: 'https://images.unsplash.com/photo-1558030006-450675393462' },
      29: { name: 'Tajine langue de veau', price: 1600, image: 'img\' },
      30: { name: 'Tagliatelle au saumon fumé', price: 1400, image: 'img\' },
      31: { name: 'Tagliatelle carbonara', price: 1000, image: 'img\' },
      32: { name: 'Spaghetti bolognaise', price: 1000, image: 'img\' },
      33: { name: 'Spaghetti au poulet', price: 900, image: 'img\' },
      34: { name: 'Penne à l\'arrabbiata', price: 1000, image: 'img\' },
      35: { name: 'Penne sauce fromage/rouge', price: 650, image: 'img\' },
      36: { name: 'Sandwich classique', price: 700, image: 'img\' },
      37: { name: 'Burger Le (R)', price: 600, image: 'img\' },
      38: { name: 'Chicken burger', price: 800, image: 'img\' },
      39: { name: 'Tacos au poulet', price: 800, image: 'img\' },
      40: { name: 'Croque monsieur', price: 500, image: 'img\' },
      41: { name: 'Tiramisu café/caramel', price: 400, image: 'https://images.unsplash.com/photo-1563805042-7684c019e1cb' },
      42: { name: 'Crème brûlée', price: 400, image: 'https://images.unsplash.com/photo-1551024506-0bccd828d307' },
      43: { name: 'Flan maison', price: 300, image: 'https://images.unsplash.com/photo-1571115177098-24ec42ed204d' },
      44: { name: 'Assiette de fruits', price: 700, image: 'https://images.unsplash.com/photo-1568702846914-96b305d2aaeb' },
      45: { name: 'Glaces artisanales', price: 200, image: 'https://images.unsplash.com/photo-1576506295286-5cda18df43e7' },
      46: { name: 'Sorbets', price: 200, image: 'https://images.unsplash.com/photo-1576506295286-5cda18df43e7' },
      47: { name: 'Café Nespresso', price: 200, image: 'img\.jpg' },
      48: { name: 'Thé infusion', price: 200, image: 'img\.jpg' },
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
   60: { name: 'Eau minérale (صغير/كبير)', price: 75, image: 'https://images.unsplash.com/photo-1551028150-64b9f398f678' },
61: { name: 'Sodas (كوكا، فانتا، إلخ)', price: 120, image: 'https://images.unsplash.com/photo-1551029506-0807df4e2031' },
62: { name: 'Jus naturel pressé', price: 250, image: 'https://images.unsplash.com/photo-1551029506-0807df4e2031' },
63: { name: 'Limonade maison', price: 200, image: 'https://images.unsplash.com/photo-1551028150-64b9f398f678' },
64: { name: 'Café espresso', price: 100, image: 'img\.jpg' },
65: { name: 'Thé à la menthe', price: 120, image: 'img\.jpg' },
66: { name: 'Nespresso/arômes', price: 150, image: 'img\.jpg' }  };
    
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
   // === FILTRE INTERACTIF ===
  const buttons = document.querySelectorAll('.filter-btn');
  const items = document.querySelectorAll('.menu-item');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      buttons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
      const filter = button.getAttribute('data-filter');

      items.forEach(item => {
        const category = item.getAttribute('data-category') || '';
        if (filter === 'all' || category.includes(filter)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  // === MENU COMBO ===
  const selects = document.querySelectorAll('.combo-select');
  const comboPrice = document.getElementById('combo-price');
  const addComboBtn = document.getElementById('add-combo-btn');
  const cart = document.getElementById('cart');

  function updateComboPrice() {
    let total = 0;
    selects.forEach(select => {
      const selected = select.options[select.selectedIndex];
      if (selected.dataset.price) {
        total += parseInt(selected.dataset.price);
      }
    });
    comboPrice.textContent = Math.round(total * 0.8); // Réduction de 20%
  }

  selects.forEach(select => {
    select.addEventListener('change', updateComboPrice);
  });

  addComboBtn.addEventListener('click', () => {
    const starter = document.getElementById('combo-starter').options[document.getElementById('combo-starter').selectedIndex].text;
    const main = document.getElementById('combo-main').options[document.getElementById('combo-main').selectedIndex].text;
    const dessert = document.getElementById('combo-dessert').options[document.getElementById('combo-dessert').selectedIndex].text;
    const price = comboPrice.textContent;

    const li = document.createElement('li');
    li.className = 'list-group-item d-flex justify-content-between align-items-center';
    li.innerHTML = `${starter}, ${main}, ${dessert} <span class="badge bg-primary">${price} DA</span>`;
    cart.appendChild(li);
  });
</script>

</body>
</html>
<?php include('include/footer.php'); ?>

