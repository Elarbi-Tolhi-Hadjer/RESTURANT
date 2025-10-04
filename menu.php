
<?php
 include('include/currentPage_header.php');
 include('include/dbConnect.php');
 ?>
 <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>🍽️ Menu - Le H Restaurant</title>
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;700&family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --bottle-green: #1a3f2a;
      --gold: #c8a97e;
      --light-gold: #e8d9b5;
      --dark-bg: #121212;
      --light-bg: #f8f5f0;
      --text-dark: #333333;
      --text-light: #f5f5f5;
    }

    html { scroll-behavior: smooth; }
    
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--light-bg);
      color: var(--text-dark);
      margin: 0;
      padding: 0;
    }

    .brand-header {
      background-color: var(--bottle-green);
      padding: 1.5rem 0;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .brand-logo {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.5rem;
      font-weight: 600;
      color: var(--gold);
      letter-spacing: 1px;
      position: relative;
      display: inline-block;
    }

    .brand-logo::first-letter {
      color: var(--bottle-green);
      background-color: var(--gold);
      padding: 0 8px;
      border-radius: 4px;
      margin-right: 4px;
    }

    .navbar {
      background: var(--bottle-green);
      padding: 12px 30px;
      display: flex;
      justify-content: center;
      gap: 20px;
      border-bottom: 2px solid var(--gold);
    }

    .navbar a {
      color: var(--light-gold);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s;
      padding: 5px 10px;
      border-radius: 4px;
    }

    .navbar a:hover {
      color: var(--bottle-green);
      background-color: var(--gold);
    }

    .menu-book {
      background: #fff;
      width: 90%;
      max-width: 1000px;
      margin: 30px auto;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.08);
      border: 1px solid var(--gold);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px);}
      to { opacity: 1; transform: translateY(0);}
    }

    h1 {
      font-family: 'Cormorant Garamond', serif;
      text-align: center;
      font-size: 3em;
      margin-bottom: 30px;
      color: var(--bottle-green);
      position: relative;
    }

    h1::after {
      content: '';
      display: block;
      width: 100px;
      height: 3px;
      background: var(--gold);
      margin: 15px auto 0;
    }

    section {
      margin-bottom: 50px;
    }

    h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.8em;
      margin-bottom: 20px;
      color: var(--bottle-green);
      border-bottom: 2px solid var(--gold);
      display: inline-block;
      padding-bottom: 5px;
    }

    h3 {
      font-family: 'Cormorant Garamond', serif;
      color: var(--bottle-green);
      font-size: 1.4em;
      margin: 25px 0 15px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin-top: 10px;
    }

    li {
      display: flex;
      justify-content: space-between;
      padding: 12px 0;
      border-bottom: 1px dashed #ddd;
      font-size: 1.1em;
    }

    li span {
      font-weight: bold;
      color: var(--bottle-green);
    }

    .footer {
      text-align: center;
      margin-top: 50px;
      padding: 20px;
      background: var(--bottle-green);
      color: var(--light-gold);
    }

    /* Styles pour les onglets */
    .nav-tabs .nav-link {
      color: var(--bottle-green);
      border-color: transparent;
    }

    .nav-tabs .nav-link.active {
      color: var(--gold);
      background-color: var(--bottle-green);
      border-color: var(--bottle-green);
    }

    .tab-content {
      background: white;
      border: 1px solid #dee2e6;
      border-top: none;
      padding: 20px;
      border-radius: 0 0 5px 5px;
    }

    /* Cart styles */
    .badge {
      background-color: var(--gold);
      color: var(--bottle-green);
    }

    /* Card styles */
    .card {
      transition: all 0.3s;
      border: 1px solid rgba(200, 169, 126, 0.3);
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(200, 169, 126, 0.2);
      border-color: var(--gold);
    }

    .card-title {
      color: var(--bottle-green);
      font-weight: 600;
    }

    .btn-success {
      background-color: var(--bottle-green);
      border-color: var(--bottle-green);
    }

    .btn-success:hover {
      background-color: #123020;
      border-color: #123020;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .navbar {
        flex-wrap: wrap;
        gap: 10px;
        padding: 10px;
      }
      
      .menu-book {
        padding: 20px;
        width: 95%;
      }
      
      h1 {
        font-size: 2.2em;
      }
      
      .brand-logo {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

<!-- Brand Header -->
<div class="brand-header">
  <div class="brand-logo">Le H Restaurant</div>
</div>

<!-- Navbar -->
<div class="navbar">
  <a href="#entrees">Entrées</a>
  <a href="#salades">Salades</a>
  <a href="#plats">Plats</a>
  <a href="#sandwichs">Sandwichs</a>
  <a href="#desserts">Desserts</a>
  <a href="#boissons">Boissons</a>
  <a href="#pizzas">Pizzas</a>
</div>

<!-- Menu Content -->
<div class="menu-book" style="animation: fadeIn 1.2s ease;">
  <h1>🍽️ Notre Carte</h1>

  <!-- Entrées -->
  <!-- Entrées -->
<section id="entrees">
  <h2>🍲 Entrées Chaudes</h2>
  <ul>
    <li>Crème de volaille <span>500 DA</span></li>
    <li>Hrira maison <span>300 DA</span></li>
    <li>Soupe de légumes <span>300 DA</span></li>
    <li>Bourek viande rouge <span>250 DA</span></li>
    <li>Gratin de poulet <span>500 DA</span></li>
    <li>Hmiss <span>200 DA</span></li>
    <li>Omelettes (nature/fromage/légumes) + frites <span>300-400 DA</span></li>
    <li>Assiette frite <span>200 DA</span></li>
  </ul>
</section>

<!-- Salades -->
<section id="salades">
  <h2>🥗 Salades</h2>
  <ul>
    <li>Tartare de saumon <span>1200 DA</span></li>
    <li>Salade de poulpe <span>900 DA</span></li>
    <li>Burrata à l'italienne <span>900 DA</span></li>
    <li>Salade mexicaine <span>600 DA</span></li>
    <li>Niçoise revisitée <span>600 DA</span></li>
    <li>César <span>600 DA</span></li>
    <li>Caprese <span>700 DA</span></li>
    <li>Salade de thon <span>600 DA</span></li>
    <li>Assiette de fromage <span>1400 DA</span></li>
  </ul>
</section>

<!-- Plats Principaux -->
<section id="plats">
  <h2>🍖 Plats Principaux</h2>
  
  <h3>🥩 Viandes & Volailles</h3>
  <ul>
    <li>Médaillon de veau poêlé <span>1900 DA</span></li>
    <li>Entrecôte de bœuf grillée <span>1800 DA</span></li>
    <li>M'hamer d'agneau <span>1800 DA</span></li>
    <li>Cordon bleu <span>2000 DA</span></li>
    <li>Cube à la crème (poulet) <span>1200 DA</span></li>
    <li>Nuggets de poulet <span>1400 DA</span></li>
  </ul>

  <h3>🔥 Grillades</h3>
  <ul>
    <li>Brochettes mixte <span>2200 DA</span></li>
    <li>Côte d'agneau grillée <span>1800 DA</span></li>
    <li>Brochettes de viande hachée <span>1600 DA</span></li>
    <li>Brochettes de poulet <span>1200 DA</span></li>
    <li>Méchoui pour 4 (sur réservation) <span>11000 DA</span></li>
  </ul>

  <h3>🍲 Tajines</h3>
  <ul>
    <li>Tajine langue de veau <span>1600 DA</span></li>
  </ul>
  
  <h3>🍝 Pâtes</h3>
  <ul>
    <li>Tagliatelle au saumon fumé <span>1400 DA</span></li>
    <li>Tagliatelle carbonara <span>1000 DA</span></li>
    <li>Spaghetti bolognaise <span>1000 DA</span></li>
    <li>Spaghetti au poulet <span>900 DA</span></li>
    <li>Penne à l'arrabbiata <span>1000 DA</span></li>
    <li>Penne sauce fromage/rouge <span>600-700 DA</span></li>
  </ul>
</section>

<!-- Sandwichs & Burgers -->
<section id="sandwichs">
  <h2>🍔 Sandwichs & Burgers</h2>
  <ul>
    <li>Sandwich classique <span>700 DA</span></li>
    <li>Burger Le (R) <span>600 DA</span></li>
    <li>Chicken burger <span>800 DA</span></li>
    <li>Tacos au poulet <span>800 DA</span></li>
    <li>Croque monsieur <span>500 DA</span></li>
  </ul>
</section>

<!-- Desserts -->
<section id="desserts">
  <h2>🍰 Desserts</h2>
  <ul>
    <li>Tiramisu café/caramel <span>400 DA</span></li>
    <li>Crème brûlée <span>400 DA</span></li>
    <li>Flan maison <span>300 DA</span></li>
    <li>Assiette de fruits <span>700 DA</span></li>
    <li>Glaces artisanales <span>200 DA/boule</span></li>
    <li>Sorbets <span>200 DA/boule</span></li>
  </ul>
</section>

<!-- Boissons -->
<section id="boissons">
  <h2>🍹 Boissons</h2>
  
  <h3>☕ Chaudes</h3>
  <ul>
    <li>Café Nespresso <span>200 DA</span></li>
    <li>Thé infusion <span>200 DA</span></li>
    <li>Café espresso <span>100 DA</span></li>
    <li>Thé à la menthe <span>120 DA</span></li>
    <li>Nespresso/arômes <span>150 DA</span></li>
  </ul>

  <h3>🥤 Fraîches</h3>
  <ul>
    <li>Eau minérale (petit/grand) <span>50-100 DA</span></li>
    <li>Sodas (Coca, Fanta, etc) <span>120 DA</span></li>
    <li>Jus naturel pressé <span>250 DA</span></li>
    <li>Limonade maison <span>200 DA</span></li>
  </ul>
</section>

<!-- Pizzas -->
<section id="pizzas">
  <h2>🍕 Nos Pizzas</h2>
  <ul>
    <li>Margherita <span>500 DA</span></li>
    <li>Anchois <span>800 DA</span></li>
    <li>Végétarienne <span>800 DA</span></li>
    <li>Fermière <span>800 DA</span></li>
    <li>Buffalo <span>800 DA</span></li>
    <li>Thon <span>800 DA</span></li>
    <li>Milano <span>800 DA</span></li>
    <li>Américaine <span>900 DA</span></li>
    <li>Quatre Fromages <span>1000 DA</span></li>
    <li>Saumon <span>1200 DA</span></li>
    <li>Mixte <span>1200 DA</span></li>
  </ul>
  <a href="order.php" class="btn btn-outline-gold mt-2">
order now</a>

</div>



<!-- Script pour le style dynamique du logo -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const logo = document.querySelector('.brand-logo');
    if (logo) {
      const text = logo.textContent.trim();
      logo.innerHTML = text.replace(/^(\w)/, 
        '<span style="color: var(--gold); background-color: var(--bottle-green); padding: 0 4px; border-radius: 3px; margin-right: 2px;">$1</span>') + 
        text.slice(1);
    }
  });
</script>
</body>
</html>
<?php include('include/footer.php'); ?>
