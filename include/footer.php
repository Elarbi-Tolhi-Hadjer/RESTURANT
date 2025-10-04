<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Le Délice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --bottle-green: #19443C; 
      --gold: #D4AF37;        
      --light-gold: #E8C547;  
      --dark-green: #004d33;  
    }
    body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
    h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif; }
    footer { background: var(--bottle-green); color: #fff; }
    .text-primary { color: var(--gold) !important; }
    .btn-social {
      margin: 0 5px; transition: all 0.3s ease;
      color: var(--gold); border-color: var(--gold);
    }
    .btn-social:hover {
      transform: translateY(-3px); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      background-color: var(--gold); color: var(--bottle-green);
    }
    .sub-footer {
      background: rgba(0, 0, 0, 0.1); padding: 40px 0;
      border-top: 1px solid rgba(212, 175, 55, 0.3);
      border-bottom: 1px solid rgba(212, 175, 55, 0.3);
    }
    .sub-footer a { color: #fff; text-decoration: none; transition: color 0.3s ease; }
    .sub-footer a:hover { color: var(--light-gold); }
    .modal-content {
      background: var(--dark-green); color: #fff;
      border: 1px solid var(--gold);
    }
    .modal-header { border-bottom: 1px solid var(--gold); }
    .back-to-top {
      position: fixed; bottom: 20px; right: 20px; display: none;
      background: var(--gold); color: var(--bottle-green);
      border: none; width: 50px; height: 50px;
      border-radius: 50%; font-size: 20px;
    }
    .back-to-top:hover { background: var(--light-gold); }
    .footer-menu a {
      color: #fff; margin: 0 10px; text-decoration: none; transition: color 0.3s;
    }
    .footer-menu a:hover { color: var(--gold); }
    .icon-gold { color: var(--gold); }
    .border-gold { border-color: var(--gold) !important; }
    .btn-outline-gold { color: var(--gold); border-color: var(--gold); }
    .btn-outline-gold:hover { background-color: var(--gold); color: var(--bottle-green); }
  </style>
</head>
<body>

<section id="footer">
  <footer class="text-center text-lg-start">
    <!-- Réseaux sociaux -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom border-gold">
      <div class="me-5 d-none d-lg-block">
        <span>Suivez-nous sur les réseaux :</span>
      </div>
      <div class="d-flex pt-2">
        <a class="btn btn-outline-gold btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-gold btn-social" href="#"><i class="fab fa-instagram"></i></a>
        <a class="btn btn-outline-gold btn-social" href="#"><i class="fab fa-tiktok"></i></a>
      </div>
    </section>

    <!-- Infos footer -->
    <section class="sub-footer">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <!-- Logo et description -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-utensils me-3 icon-gold"></i>Le H
            </h6>
            <p>
              Un restaurant d'exception où la tradition gastronomique française rencontre l'innovation, 
              dans un cadre élégant aux couleurs de la bouteille verte et de l'or.
            </p>
          </div>

          <!-- Liens utiles -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-start text-primary text-uppercase mb-4 fw-bold">Liens utiles</h6>
            <p><a href="#" class="text-reset" data-bs-toggle="modal" data-bs-target="#termsModal">Conditions Générales</a></p>
            <p><a href="#" class="text-reset" data-bs-toggle="modal" data-bs-target="#privacyModal">Politique de confidentialité</a></p>
            <p><a href="#" class="text-reset">Menus</a></p>
            <p><a href="#" class="text-reset">Réservations</a></p>
          </div>

          <!-- Navigation -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-start text-primary text-uppercase mb-4 fw-bold">Navigation</h6>
            <p><a href="#" class="text-reset">Accueil</a></p>
            <p><a href="#" class="text-reset">À propos</a></p>
            <p><a href="#" class="text-reset">Galerie</a></p>
            <p><a href="#" class="text-reset">Contact</a></p>
          </div>

          <!-- Contact -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-start text-primary text-uppercase mb-4 fw-bold">Contact</h6>
             <p><i class="fas fa-home me-3 icon-gold"></i>Avenue Khaled Ibn Walid 27,<br>Montagne, 31000, Oran, Algérie</p>
              <p>Code Postal : 600015</p>
              <p><i class="fas fa-envelope me-3 icon-gold"></i> leH@gmail.com</p>
              <p><i class="fas fa-phone me-3 icon-gold"></i> +34123456</p>
              <p><i class="fas fa-clock me-3 icon-gold"></i> 
                ✔️ Lundi - Vendredi : 11h30 - 23h00 <br>
                ✔️ Samedi - Dimanche : 12h00 - 00h00
              </p>
<a href="reservation.php" class="btn btn-outline-gold mt-2">Réserver une table</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Bas du footer -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          © <script>document.write(new Date().getFullYear());</script> Le Délice. Tous droits réservés.
        </div>
        <div class="col-md-6 text-center text-md-end footer-menu">
          <a href="#">Accueil</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#cookiesModal">Cookies</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#faqModal">FAQs</a>
        </div>
      </div>
    </div>
  </footer>
</section>

<!-- Back to top button -->
<button onclick="topFunction()" id="backToTop" class="back-to-top" title="Retour en haut">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  window.onscroll = function() {scrollFunction()};
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("backToTop").style.display = "block";
    } else {
      document.getElementById("backToTop").style.display = "none";
    }
  }
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>

</body>
</html>
