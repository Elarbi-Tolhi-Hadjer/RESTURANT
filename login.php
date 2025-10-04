<?php
include('include/currentPage_header.php');
include('include/dbConnect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo $general_setting['Name'] ?> | Connexion</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      background-color: var(--light-bg);
      color: var(--text-dark);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .brand-header {
      background-color: var(--bottle-green);
      padding: 1.5rem 0;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .brand-logo {
      font-family: 'Playfair Display', serif;
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

    .hero-section {
      background: linear-gradient(rgba(26, 63, 42, 0.7), rgba(26, 63, 42, 0.7)), 
                  url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0') center/cover no-repeat;
      height: 280px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: var(--text-light);
      margin-bottom: 3rem;
      position: relative;
    }

    .hero-section::after {
      content: '';
      position: absolute;
      bottom: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: var(--gold);
    }

    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      font-weight: 500;
      letter-spacing: 1px;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      flex: 1;
    }

    .form-container {
      display: flex;
      justify-content: center;
      margin-bottom: 5rem;
    }

    .login-form {
      width: 100%;
      max-width: 450px;
      padding: 2.5rem;
      background: white;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      border-radius: 8px;
      border-top: 4px solid var(--gold);
    }

    .form-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      text-align: center;
      margin-bottom: 1.5rem;
      color: var(--bottle-green);
      position: relative;
      padding-bottom: 1rem;
    }

    .form-title::after {
      content: '';
      display: block;
      width: 60px;
      height: 2px;
      background: var(--gold);
      margin: 0.5rem auto 0;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      font-size: 0.95rem;
      color: var(--bottle-green);
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
      transition: all 0.3s;
      background-color: #f9f9f9;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.2);
      background-color: white;
    }

    .btn {
      display: inline-block;
      padding: 0.8rem 1.5rem;
      background: var(--bottle-green);
      color: var(--light-gold);
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      width: 100%;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 0.5rem;
    }

    .btn:hover {
      background: #123020;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-footer {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.9rem;
      color: #666;
    }

    .form-footer a {
      color: var(--bottle-green);
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border-bottom: 1px dotted var(--gold);
    }

    .form-footer a:hover {
      color: var(--gold);
    }

    .input-icon {
      position: relative;
    }

    .input-icon i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gold);
      cursor: pointer;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      font-size: 0.9rem;
    }

    .remember-me {
      display: flex;
      align-items: center;
    }

    .remember-me input {
      margin-right: 8px;
      accent-color: var(--bottle-green);
    }

    .forgot-password a {
      color: var(--bottle-green);
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
    }

    .forgot-password a:hover {
      color: var(--gold);
    }

    @media (max-width: 768px) {
      .hero-section {
        height: 220px;
      }
      
      .hero-title {
        font-size: 2rem;
      }
      
      .login-form {
        padding: 1.5rem;
      }
      
      .brand-logo {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

<div class="brand-header">
  <div class="brand-logo"><?php echo $general_setting['Name'] ?></div>
</div>

<div class="hero-section">
  <h1 class="hero-title">Connexion à votre compte</h1>
</div>

<div class="container">
  <div class="form-container">
    <form class="login-form" method="post" action="process_login.php">
      <h2 class="form-title">Accès Privé</h2>
      
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="votre@email.com" required>
      </div>
      
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <div class="input-icon">
          <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
          <i class="toggle-password">👁️</i>
        </div>
      </div>
      
      <div class="remember-forgot">
        <div class="remember-me">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Se souvenir de moi</label>
        </div>
        <div class="forgot-password">
          <a href="forgot_password.php">Mot de passe oublié ?</a>
        </div>
      </div>
      
      <button type="submit" class="btn">Se connecter</button>
      
      <div class="form-footer">
        <p>Nouveau client ? <a href="register.php">Créez votre compte</a></p>
      </div>
    </form>
  </div>
</div>

<footer>
  <?php include('include/footer.php'); ?>
</footer>

<script>
  // Toggle password visibility
  document.querySelectorAll('.toggle-password').forEach(icon => {
    icon.addEventListener('click', function() {
      const input = this.previousElementSibling;
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      this.textContent = type === 'password' ? '👁️' : '👁️‍';
    });
  });

  // Highlight first letter in logo
 d// Modification dans le script
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