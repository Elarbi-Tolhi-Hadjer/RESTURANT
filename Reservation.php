
<?php
 include('include/currentPage_header.php');
 include('include/dbConnect.php');
 ?>
 <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réserver une table - Le Délice</title>
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

    /* Hero */
    .hero-reservation {
      background: url('https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
      color: white;
      height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
    }

    .hero-reservation::before {
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

    .hero-reservation h1 {
      font-size: 3.5rem;
      background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
      padding: 25px 40px;
      border-radius: 15px;
      backdrop-filter: blur(10px);
      display: inline-block;
      letter-spacing: 1px;
    }

    /* Form Section */
    .form-section {
      padding: 80px 20px;
      background: white;
    }

    .reservation-form {
      max-width: 700px;
      margin: 0 auto;
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .form-label {
      font-weight: 500;
      color: var(--dark-green);
    }

    .form-control {
      border-radius: 10px;
      padding: 12px 15px;
      border: 2px solid #e9ecef;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }

    .btn-reserve {
      background: var(--gold);
      border: none;
      padding: 14px 30px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 50px;
      transition: all 0.3s ease;
    }

    .btn-reserve:hover {
      background: var(--light-gold);
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
    }

    /* Floating labels animation */
    .form-floating > label {
      transition: all 0.2s ease-out;
    }

    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
      transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
      background: white;
      padding: 0 5px;
      font-weight: 600;
      color: var(--gold);
    }

    /* Success/Error Messages */
    .alert {
      border-radius: 15px;
      padding: 20px;
      margin-bottom: 30px;
      font-weight: 500;
    }

    /* Back to Top */
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

    /* Responsive */
    @media (max-width: 768px) {
      .hero-reservation h1 {
        font-size: 2.5rem;
        padding: 20px;
      }
      .reservation-form {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

<!-- Hero -->
<section class="hero-reservation">
  <div class="hero-content">
    <h1>Réservez <span style="color:var(--light-gold)">votre table</span></h1>
  </div>
</section>

<!-- Reservation Form -->
<section class="form-section">
  <div class="container">
    <?php
      // Initialize variables
      $name = $email = $phone = $date = $time = $guests = $notes = "";
      $errors = [];
      $success = "";

      // Process form if submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $date = trim($_POST['date'] ?? '');
        $time = trim($_POST['time'] ?? '');
        $guests = intval($_POST['guests'] ?? 0);
        $notes = trim($_POST['notes'] ?? '');

        // Validation
        if (empty($name)) $errors[] = "Le nom est requis.";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
        if (empty($phone)) $errors[] = "Le téléphone est requis.";
        if (empty($date)) $errors[] = "La date est requise.";
        if (empty($time)) $errors[] = "L'heure est requise.";
        if ($guests < 1 || $guests > 20) $errors[] = "Nombre de convives invalide (1-20).";

        if (empty($errors)) {
          // ✅ SUCCESS: Process reservation (send email, save to DB, etc.)

          // Example: Save to file (you can replace with DB/email logic)
          $reservation_data = "Nouvelle réservation:\n";
          $reservation_data .= "Nom: $name\n";
          $reservation_data .= "Email: $email\n";
          $reservation_data .= "Téléphone: $phone\n";
          $reservation_data .= "Date: $date\n";
          $reservation_data .= "Heure: $time\n";
          $reservation_data .= "Convives: $guests\n";
          $reservation_data .= "Notes: $notes\n";
          $reservation_data .= "------------------------\n";

          file_put_contents('reservations.txt', $reservation_data, FILE_APPEND | LOCK_EX);

          // Optional: Send email
          // mail('your-email@example.com', 'Nouvelle Réservation - Le Délice', $reservation_data);

          $success = "Votre réservation a été envoyée avec succès ! Nous vous contacterons sous 24h pour confirmation.";
          
          // Clear form fields after success
          $name = $email = $phone = $date = $time = $guests = $notes = "";
        }
      }
    ?>

    <?php if (!empty($success)): ?>
      <div class="alert alert-success text-center">
        <i class="fas fa-check-circle me-2"></i> <?= htmlspecialchars($success) ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <ul class="mb-0">
          <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="reservation-form">
      <h2 class="text-center mb-4" style="color: var(--dark-green);">Réservez en quelques clics</h2>
      <p class="text-center mb-4">Remplissez le formulaire ci-dessous. Nous vous contacterons pour confirmer votre réservation.</p>

      <form method="POST" action="">
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>" placeholder="Votre nom complet" required>
              <label for="name">Nom complet</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="votre@email.com" required>
              <label for="email">Email</label>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($phone) ?>" placeholder="06 12 34 56 78" required>
              <label for="phone">Téléphone</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <select class="form-select" id="guests" name="guests" required>
                <option value="" selected disabled>Choisir...</option>
                <?php for ($i = 1; $i <= 20; $i++): ?>
                  <option value="<?= $i ?>" <?= ($guests == $i) ? 'selected' : '' ?>><?= $i ?> <?= ($i > 1) ? 'personnes' : 'personne' ?></option>
                <?php endfor; ?>
              </select>
              <label for="guests">Nombre de convives</label>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control" id="date" name="date" value="<?= htmlspecialchars($date) ?>" min="<?= date('Y-m-d') ?>" required>
              <label for="date">Date</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="time" class="form-control" id="time" name="time" value="<?= htmlspecialchars($time) ?>" required>
              <label for="time">Heure</label>
            </div>
          </div>
        </div>

        <div class="mb-4">
          <div class="form-floating">
            <textarea class="form-control" id="notes" name="notes" placeholder="Demandes spéciales (allergies, anniversaire, etc.)" style="height: 120px;"><?= htmlspecialchars($notes) ?></textarea>
            <label for="notes">Notes spéciales (facultatif)</label>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-reserve">
            <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Footer -->

<!-- Back to Top Button -->
<button id="backToTop" title="Retour en haut">↑</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Back to top
  window.addEventListener('scroll', () => {
    const btn = document.getElementById('backToTop');
    if (window.scrollY > 400) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  });

  document.getElementById('backToTop').addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // Set min date to today
  document.getElementById('date').min = new Date().toISOString().split('T')[0];
</script>
</body>
</html>
<?php include('include/footer.php'); ?>
