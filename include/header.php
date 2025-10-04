<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;500&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    
    <style>
        /* Couleur chaude pour un restaurant */
        #navbar_top {
            background-color: #1a3f2a; /* beige chaud */
        }
        .dropdown-menu {
            background-color: #bba17f;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #f9c74f; /* couleur accent */
        }
    </style>
</head>
<body>

<?php 
include('functions.php');
include('general.php');

if(isset($_SESSION['loggedUserId'])) {
    $id = $_SESSION['loggedUserId'];
    $s = "SELECT * FROM users_details WHERE UserId='$id'";
    $result = mysqli_query($con, $s) or die ('failed to query');
    $user_details = mysqli_fetch_assoc($result);
}
?>

<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo / Nom du restaurant -->
        <a class="navbar-brand" href="#"><i class="fas fa-utensils me-2"></i><?php echo $general_setting['Name'] ?></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">À propos</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="menu.php" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="menu.php#starters">Entrées</a>
                        <a class="dropdown-item" href="menu.php#main-courses">Plats Principaux</a>
                        <a class="dropdown-item" href="menu.php#desserts">Desserts</a>
                        <a class="dropdown-item" href="menu.php#drinks">Boissons</a>
                    </div>
                </li>

                <li class="nav-item"><a class="nav-link" href="reservation.php">Réservations</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php if(isset($user_details['FirstName'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> <?php echo htmlspecialchars($user_details['FirstName']); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="client/dashboard.php">Mon Compte</a>
                            <a class="dropdown-item" href="client/account.php">Modifier Profil</a>
                            <a class="dropdown-item" href="logout.php">Déconnexion</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Ici continuer la page restaurant -->

</body>
</html>
