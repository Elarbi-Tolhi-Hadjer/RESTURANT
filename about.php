<?php
include('include/currentPage_header.php');
include('include/dbConnect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>À propos - Le H</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --bottle-green: #19443C;
      --gold: #D4AF37;
      --light-gold: #E8C547;
      --dark-green: #004d33;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      overflow-x: hidden;
    }

    h1,h2,h3,h4,h5,h6 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
    }

    /* Hero Section */
    .hero-about {
      background: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
      color: white;
      height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .hero-about::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.4);
    }

    .hero-content {
      z-index: 2;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 1s ease forwards 0.5s;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero-about h1 {
      font-size: 3.5rem;
      background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
      padding: 25px 40px;
      border-radius: 15px;
      backdrop-filter: blur(10px);
      display: inline-block;
      letter-spacing: 1px;
    }

    /* Section Styling */
    .section-about {
      padding: 80px 20px;
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease;
    }

    .section-about.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .section-about img {
      max-width: 100%;
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.15);
      transition: transform 0.4s ease;
    }

    .section-about img:hover {
      transform: scale(1.03);
    }
.awards img {
  transition: transform 0.3s ease, filter 0.3s ease;
  filter: grayscale(100%);
}
.awards img:hover {
  transform: scale(1.1);
  filter: grayscale(0%);
}
.awards p {
  color: #555;
}

    .section-about h2 {
      color: var(--dark-green);
      position: relative;
      padding-bottom: 15px;
      font-size: 2.2rem;
    }

    .section-about h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: var(--gold);
      border-radius: 2px;
    }

    .section-about p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #555;
    }

    /* Values Cards */
    .values .card {
      border: none;
      background: #fff;
      border-radius: 15px;
      padding: 30px;
      text-align: center;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .values .card:hover {
      transform: translateY(-12px) scale(1.02);
      box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .values .card i {
      color: var(--gold);
      font-size: 2.5rem;
      margin-bottom: 15px;
      transition: transform 0.3s ease;
    }

    .values .card:hover i {
      transform: rotate(10deg) scale(1.1);
    }

    /* Chef Section */
    .chef-section {
      background: linear-gradient(135deg, #f9f9f9, #f0f5f0);
      border-radius: 20px;
      overflow: hidden;
      position: relative;
    }

    .chef-img {
      animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }

    /* Testimonials */
    .testimonial-card {
      transition: all 0.3s ease;
    }

    .testimonial-card:hover {
      transform: scale(1.05);
      box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    /* Why Choose Us Icons */
    .feature-box i {
      transition: all 0.3s ease;
    }

    .feature-box:hover i {
      transform: scale(1.2) rotate(15deg);
    }

    /* Newsletter */
    .newsletter-section {
      background: linear-gradient(135deg, var(--bottle-green), var(--dark-green));
      color: white;
    }

    .newsletter-section input {
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.3);
      color: white;
    }

    .newsletter-section input:focus {
      background: rgba(255,255,255,0.2);
      border-color: var(--light-gold);
      box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
    }

    /* Back to Top Button */
    #backToTop {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
      background: var(--gold);
      color: white;
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      font-size: 24px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.25);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    #backToTop:hover {
      background: var(--light-gold);
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.3);
    }

    /* Map styling */
    .map-container {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    /* Awards section */
    .awards img {
      filter: grayscale(100%) brightness(1.2);
      transition: all 0.4s ease;
      padding: 10px;
    }

    .awards img:hover {
      filter: grayscale(0%) brightness(1);
      transform: scale(1.1);
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
      .hero-about h1 {
        font-size: 2.5rem;
        padding: 20px;
      }
      .section-about {
        padding: 40px 15px;
      }
    }
  </style>
</head>
<body>

<!-- Hero -->
<section class="hero-about">
  <div class="hero-content">
    <h1>À propos de <span style="color:var(--light-gold)">Le H</span></h1>
  </div>
</section>

<!-- About section -->
<section class="section-about container">
  <div class="row align-items-center mb-5">
    <div class="col-md-6">
      <img src="https://images.unsplash.com/photo-1554679665-f5537f187268?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Le Délice Restaurant" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h2>Notre histoire</h2>
      <p>
        Depuis notre ouverture, Le H s’est donné pour mission de marier tradition et innovation culinaire. 
        Nous sélectionnons les meilleurs ingrédients locaux pour créer des plats raffinés qui ravissent vos papilles.
      </p>
      <p>
        Notre équipe passionnée partage un amour profond pour la gastronomie française et algérienne, 
        offrant une expérience unique dans un cadre élégant aux couleurs de la bouteille verte et de l’or.
      </p>
    </div>
  </div>

  <div class="row values text-center">
    <h2 class="mb-5">Nos valeurs</h2>
    <div class="col-md-4 mb-4">
      <div class="card">
        <i class="fas fa-seedling"></i>
        <h5>Qualité</h5>
        <p>Des produits frais et de qualité supérieure pour chaque plat servi.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <i class="fas fa-heart"></i>
        <h5>Passion</h5>
        <p>Une équipe dévouée qui cuisine avec amour et créativité.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <i class="fas fa-award"></i>
        <h5>Excellence</h5>
        <p>Un service et une expérience gastronomique sans compromis.</p>
      </div>
    </div>
  </div>
</section>

<!-- Chef Section -->
<section class="section-about container">
  <h2 class="text-center mb-5">Rencontrez notre Chef</h2>
  <div class="row align-items-center chef-section">
    <div class="col-md-4 text-center p-4">
      <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Chef Amira" class="rounded-circle img-fluid shadow-lg chef-img">
    </div>
    <div class="col-md-8 p-4">
      <h3>Chef Amira Benali</h3>
      <p><em>“La cuisine est un art qui se partage avec le cœur.”</em></p>
      <p>
        Diplômée de l’École Ferrandi à Paris, Chef Amira allie finesse française et saveurs algériennes. 
        Avec 15 ans d’expérience, elle crée chaque plat comme une œuvre unique — équilibrée, audacieuse, et pleine d’émotion.
      </p>
      <p>
        Son plat signature ? Le <strong>Magret de Canard aux Dattes et Épices du Hoggar</strong> — un hommage à ses racines.
      </p>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="section-about container mt-5 bg-light py-5 rounded-4">
  <h2 class="text-center mb-5">Ce que disent nos clients</h2>
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card border-0 shadow-sm h-100 testimonial-card">
        <div class="card-body text-center">
          <i class="fas fa-quote-left text-muted mb-3"></i>
          <p class="card-text">“Un voyage gustatif entre Paris et Alger. Le couscous au safran ? Un rêve.”</p>
          <h6 class="mt-3">— Sophie L., Paris</h6>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card border-0 shadow-sm h-100 testimonial-card">
        <div class="card-body text-center">
          <i class="fas fa-quote-left text-muted mb-3"></i>
          <p class="card-text">“Service impeccable, ambiance chaleureuse. On revient chaque mois !”</p>
          <h6 class="mt-3">— Karim T., batna</h6>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card border-0 shadow-sm h-100 testimonial-card">
        <div class="card-body text-center">
          <i class="fas fa-quote-left text-muted mb-3"></i>
          <p class="card-text">“Le meilleur pain d’épices que j’ai mangé… et je suis algérienne !”</p>
          <h6 class="mt-3">— Élodie M.,Alger</h6>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="section-about container mt-5">
  <h2 class="text-center mb-5">Pourquoi Le H ?</h2>
  <div class="row text-center">
    <div class="col-md-3 mb-4">
      <div class="feature-box p-4">
        <i class="fas fa-leaf fa-3x text-success mb-3"></i>
        <h5>100% Local & Bio</h5>
        <p>Produits de saison, partenaires locaux certifiés.</p>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="feature-box p-4">
        <i class="fas fa-clock fa-3x text-warning mb-3"></i>
        <h5>Service Rapide</h5>
        <p>Commande en 45 min max, même en heure de pointe.</p>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="feature-box p-4">
        <i class="fas fa-wine-glass-alt fa-3x text-danger mb-3"></i>
        <h5>Accord Mets-Vins</h5>
        <p>Sommelier sur place pour sublimer chaque plat.</p>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="feature-box p-4">
        <i class="fas fa-music fa-3x text-info mb-3"></i>
        <h5>Ambiance Live</h5>
        <p>Musique orientale ou jazz les vendredis soirs.</p>
      </div>
    </div>
  </div>
</section>
<!-- Awards -->
<section class="section-about container mt-5 py-5 bg-white rounded-4 shadow-sm awards">
  <h2 class="text-center mb-5">Reconnu par les meilleurs</h2>
  <div class="row justify-content-center align-items-center text-center">

    <div class="col-6 col-md-2 mb-4">
      <img src="img/award1.png" alt="Office National du Tourisme Algérien" class="img-fluid" style="max-height: 60px;">
      <p class="mt-2 small fw-semibold">Tourisme Algérien</p>
    </div>

    <div class="col-6 col-md-2 mb-4">
      <img src="img/award2.png" alt="Chef Academy Africa" class="img-fluid" style="max-height: 60px;">
      <p class="mt-2 small fw-semibold">Chef Academy Africa</p>
    </div>

    <div class="col-6 col-md-2 mb-4">
      <img src="img/award3.png" alt="UNESCO Gastronomie" class="img-fluid" style="max-height: 60px;">
      <p class="mt-2 small fw-semibold">UNESCO Gastronomie</p>
    </div>

    <div class="col-6 col-md-2 mb-4">
      <img src="img/award4.png" alt="Prix de la Cuisine Arabe" class="img-fluid" style="max-height: 60px;">
      <p class="mt-2 small fw-semibold">Prix de la Cuisine Arabe</p>
    </div>

    <div class="col-6 col-md-2 mb-4">
      <img src="img/award5.png" alt="Trophée du Goût Algérien" class="img-fluid" style="max-height: 60px;">
      <p class="mt-2 small fw-semibold">Goût Algérien</p>
    </div>

  </div>
</section>

<!-- Visit Us + Map -->
<section class="section-about container mt-5 text-center">
  <h2>Envie de vivre l’expérience ?</h2>
  <p class="lead">Réservez votre table ou venez nous rendre visite.</p>
  <a href="reservation.php" class="btn btn-warning btn-lg me-3 px-5">Réserver une table</a>
  <a href="contact.php" class="btn btn-outline-dark btn-lg px-5">Nous contacter</a>

  <div class="mt-5 map-container">

    <iframe 
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103667.75630823961!2d-0.7211077196494331!3d35.711032034910936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7e891088dc111b%3A0xe64ee477c4d59bc0!2sThe%20Adress%20Residence!5e0!3m2!1sfr!2sdz!4v1734993838651!5m2!1sfr!2sdz"      width="100%" 
      height="350" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy">
    </iframe>
    <p class="mt-3"><strong>Adresse :</strong> The Adress Residence, 127 Rue Hamamouche Abed, Oran 31000</p>
  </div>
</section>



<!-- Back to Top Button -->
<button id="backToTop" title="Retour en haut">↑</button>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Reveal sections on scroll
  document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.section-about');
    
    const revealSection = function(entries, observer) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    };

    const sectionObserver = new IntersectionObserver(revealSection, {
      root: null,
      threshold: 0.15
    });

    sections.forEach(section => {
      sectionObserver.observe(section);
    });

    // Back to top button
    const backToTopButton = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 400) {
        backToTopButton.style.display = "block";
      } else {
        backToTopButton.style.display = "none";
      }
    });

    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  });
</script>
</body>
</html>
<?php include('include/footer.php'); ?>
