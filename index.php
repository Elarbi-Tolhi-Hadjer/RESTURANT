
<?php
 include('include/currentPage_header.php');
 include('include/dbConnect.php');
 ?>
 <style>
   .hover-zoom {
    transition: transform 0.3s ease;
}
.hover-zoom:hover {
    transform: scale(1.05);
}

    .video-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
}

.video-box {
  border-radius: 12px;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.3s ease;
  position: relative;
}

.video-box:hover {
  transform: scale(1.03);
}

.video-box video {
  width: 100%;
  height: auto;
  border-radius: 12px;
}

     .image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
  }

  .image-grid img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .image-grid img:hover {
    transform: scale(1.05);
  }

  /* نافذة منبثقة (Lightbox) */
  .lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }

  .lightbox img {
    max-width: 80%;
    max-height: 80%;
    border-radius: 10px;
  }

  .lightbox-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.7);
    border: none;
    font-size: 2rem;
    color: #000;
    cursor: pointer;
    border-radius: 50%;
  }
     .restaurant-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px; /* المسافة بين العناصر */
  }

  .restaurant-section .content {
    flex: 1;
    max-width:70%; /* تحديد أقصى عرض للنص */
  }

  .restaurant-section .video-box {
    flex: 1;
    max-width: 50%; /* تحديد أقصى عرض للفيديو */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .restaurant-section video {
    width: 100%;
    max-width: 300px; /* حجم الفيديو */
    border-radius: 10px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
  }

  .restaurant-section h2 {
    font-size: 1.8rem;
    margin-bottom: 15px;
  }

  .restaurant-section p {
    font-size: 1rem;
    line-height: 1.6;
  }
      .video-box {
    width: 240px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin: 15px;
  }

  .video-box:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
  }

  .video-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .video-box video {
    width: 100%;
    height: auto;
    display: block;
  }

  .title {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }
     body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    h2, h3 {
      color: #d4a373;
      font-weight: bold;
    }

    .section {
      padding: 60px 20px;
      background: #fff;
      border-radius: 20px;
      margin: 30px auto;
      max-width: 1200px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }

    .section img {
      border-radius: 10px;
    }

    .menu-card {
      border: none;
      border-radius: 15px;
      background-color: #fff8f0;
      transition: transform 0.3s ease;
    }

    .menu-card:hover {
      transform: translateY(-5px);
    }

    .video-section iframe {
      width: 100%;
      height: 400px;
      border-radius: 10px;
    }

    .btn-primary {
      background-color: #d4a373;
      border: none;
    }

    .btn-primary:hover {
      background-color: #c68658;
    }
   body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .restaurant-section {
      background: #fff;
      padding: 60px 20px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
      margin: 30px auto;
      max-width: 1200px;
    }

    .restaurant-section h2 {
      color: #d4a373;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .restaurant-section .subtitle {
      color: #6c757d;
      margin-bottom: 20px;
    }

    .section-divider {
      border-top: 2px solid #d4a373;
      width: 80px;
      margin: 20px 0;
    }

    .highlight {
      background-color: #fff3cd;
      padding: 15px;
      border-left: 5px solid #ffc107;
      border-radius: 5px;
    }

    .btn-primary {
      background-color: #d4a373;
      border: none;
    }

    .btn-primary:hover {
      background-color: #c68658;
    }
    .menu-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    position: relative;
    display: inline-block;
  }

  .menu-title::after {
    content: "";
    position: absolute;
    width: 60%;
    height: 4px;
    background-color: #e67e22;
    left: 50%;
    bottom: -10px;
    transform: translateX(-50%);
    border-radius: 2px;
  }

  @media (max-width: 768px) {
    .menu-title {
      font-size: 1.8rem;
    }
  }
  .instagram-carousel .carousel-item {
    position: relative;
  }

  .instagram-carousel .carousel-item img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    object-fit: cover;
  }

  .carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
  }

  .instagram-carousel .carousel-control-prev, .instagram-carousel .carousel-control-next {
    top: 50%;
    transform: translateY(-50%);
  }
  .masonry-grid {
  columns: 4 200px;
  column-gap: 1rem;
  padding: 20px;
}

.masonry-item {
  break-inside: avoid;
  margin-bottom: 1rem;
  position: relative;
  cursor: pointer;
  overflow: hidden;
  border-radius: 12px;
  transition: transform 0.3s ease;
}

.masonry-item img {
  width: 100%;
  border-radius: 12px;
  transition: transform 0.4s ease;
}

.masonry-item:hover img {
  transform: scale(1.1);
}

.overlay {
  position: absolute;
  bottom: 0;
  background: rgba(0,0,0,0.6);
  color: white;
  width: 100%;
  padding: 8px;
  text-align: center;
  font-size: 14px;
  opacity: 0;
  transition: opacity 0.3s;
}

.masonry-item:hover .overlay {
  opacity: 1;
}.offer-card {
  border-radius: 20px;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.offer-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.offer-card img {
  height: 180px;
  object-fit: cover;
  border-bottom: 2px solid #f1f1f1;
}

.offer-period {
  font-family: 'Segoe UI', sans-serif;
  font-weight: bold;
  border-bottom: 2px solid #fff;
  border-radius: 0 0 20px 20px;
}

.offer-card .card-body {
  padding: 1rem 1.2rem;
}

.offer-card .card-title {
  font-size: 1.1rem;
  color: #333;
}

.offer-card .card-text {
  font-size: 0.95rem;
  color: #555;
}

.offer-card .btn {
  margin-top: 10px;
  border-radius: 25px;
  font-size: 0.9rem;
  padding: 6px 16px;
}

#temoignages .card {
  transition: transform 0.3s ease;
}
#temoignages .card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}


  
  /* Boutons dégradés modernes */
  .btn-gradient-primary {
    background: linear-gradient(45deg, #007bff, #00d4ff);
    color: white;
    border: none;
  }
  .btn-gradient-primary:hover {
    background: linear-gradient(45deg, #0056b3, #00a1cc);
    transform: scale(1.05);
  }

  .btn-gradient-success {
    background: linear-gradient(45deg, #28a745, #85e085);
    color: white;
    border: none;
  }
  .btn-gradient-success:hover {
    background: linear-gradient(45deg, #1c7430, #5ab35a);
    transform: scale(1.05);
  }

  /* Effet de shadow et bordures arrondies */
  .card {
    border-radius: 1rem;
  }

  /* Pour le formulaire */
  form .form-control,
  form .form-select {
    box-shadow: none !important;
    border: 1.5px solid #ced4da;
    transition: border-color 0.3s ease;
  }
  form .form-control:focus,
  form .form-select:focus {
    border-color: #00c0f7;
    box-shadow: 0 0 8px rgba(0,192,247,0.25);
  }

    .hover-primary:hover { color: #0d6efd !important; text-decoration: underline; }
    .hover-secondary:hover { color: #6c757d !important; text-decoration: underline; }
 
.chef-card {
  border-radius: 15px;
  transition: transform 0.3s;
}

.chef-card:hover {
  transform: translateY(-10px);
}

.chef-name {
  color: #d4a373;
  font-weight: 700;
  font-size: 2rem;
}

.chef-title {
  font-style: italic;
  margin-bottom: 20px;
}

.chef-bio p {
  line-height: 1.8;
  margin-bottom: 15px;
}

.chef-social i {
  transition: transform 0.3s;
}

.chef-social i:hover {
  transform: scale(1.2);
}

 .restaurant-section {
  padding: 60px 0;
  background-color: #fff;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.content {
  text-align: center;
  margin-bottom: 40px;
}

.content h2 {
  color: #d4a373;
  font-size: 2.2rem;
  margin-bottom: 15px;
}

.subtitle {
  color: #6c757d;
  font-size: 1.2rem;
}

.section-divider {
  width: 80px;
  height: 3px;
  background-color: #d4a373;
  margin: 20px auto;
}

.restaurant-info {
  max-width: 800px;
  margin: 0 auto;
}

.info-card {
  margin-bottom: 30px;
  padding: 20px;
  border-radius: 10px;
  background-color: #f9f9f9;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.info-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.highlight-card {
  background-color: #fff8f0;
  border-left: 4px solid #d4a373;
}

.info-title {
  color: #d4a373;
  font-size: 1.4rem;
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.info-title i {
  margin-right: 10px;
}

.info-list {
  padding-left: 20px;
}

.info-list li {
  margin-bottom: 8px;
  color: #555;
}

.highlight-text {
  background-color: rgba(212, 163, 115, 0.1);
  padding: 15px;
  border-radius: 5px;
  font-style: italic;
}

.cta-box {
  margin-top: 40px;
  padding: 30px;
  background-color: #f5f5f5;
  border-radius: 10px;
}

.cta-box p {
  margin-bottom: 20px;
  color: #555;
}

.cta-btn {
  background-color: #d4a373;
  border: none;
  padding: 12px 30px;
  font-size: 1.1rem;
  transition: all 0.3s;
}

.cta-btn:hover {
  background-color: #c08a5e;
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(212, 163, 115, 0.3);
}

@media (max-width: 768px) {
  .content h2 {
    font-size: 1.8rem;
  }
  
  .subtitle {
    font-size: 1rem;
  }
  
  .info-card {
    padding: 15px;
  }
}

  .video-container video {
  object-fit: cover;
  height: 100%;
  max-height: 350px;
}

.hover-zoom {
  transition: transform 0.3s ease;
}

.hover-zoom:hover {
  transform: scale(1.05);
}

.chef-name {
  font-weight: 600;
  font-size: 1.1rem;
  color: #333;
}

  .signature img {
  width: 200px; /* Smaller signature image */
  height: auto; /* Maintain aspect ratio */
}

.restaurant-presentation {
  padding: 80px 0;
  background-color: #f9f5f0;
  position: relative;
  overflow: hidden;
}

.presentation-wrapper {
  display: flex;
  align-items: center;
  gap: 50px;
}

.presentation-content {
  flex: 2;  /* Takes more space */
  padding: 20px;
  position: relative;
  z-index: 2;
}

.presentation-video {
  flex: 1;  /* Takes less space */
  position: relative;
  max-width: 450px; /* Limits maximum video size */
}

.presentation-title {
  font-size: 2.5rem;
  color: #d4a373;
  margin-bottom: 20px;
  font-weight: 700;
  line-height: 1.2;
}

.presentation-subtitle {
  font-size: 1.3rem;
  color: #6c757d;
  margin-bottom: 25px;
  font-weight: 300;
}

.divider {
  width: 80px;
  height: 3px;
  background-color: #d4a373;
  margin: 25px 0;
}

.presentation-text {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #555;
  margin-bottom: 30px;
}

.signature {
  margin-top: 30px;
}

.chef-name {
  font-style: italic;
  color: #d4a373;
  font-weight: 500;
  margin-top: 5px;
}

.video-container {
  position: relative;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  transition: all 0.3s ease;
  width: 100%;
  height: 300px; /* Fixed height */
}

.video-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 25px 50px rgba(0,0,0,0.2);
}

.hero-video {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures video fills container */
  display: block;
  border-radius: 15px;
}

.play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 70px;
  height: 70px;
  background-color: rgba(212, 163, 115, 0.8);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.play-button i {
  color: white;
  font-size: 30px;
  margin-left: 5px;
}

.play-button:hover {
  background-color: rgba(212, 163, 115, 1);
  transform: translate(-50%, -50%) scale(1.1);
}

/* Responsive Design */
@media (max-width: 992px) {
  .presentation-wrapper {
    flex-direction: column;
    gap: 30px;
  }
  
  .presentation-content {
    text-align: center;
  }
  
  .divider {
    margin: 25px auto;
  }
  
  .presentation-video {
    max-width: 100%; /* Full width on smaller screens */
  }
}

@media (max-width: 768px) {
  .presentation-title {
    font-size: 2rem;
  }
  
  .presentation-subtitle {
    font-size: 1.1rem;
  }
  
  .video-container {
    height: 250px; /* Smaller height on mobile */
  }
  
  .play-button {
    width: 50px;
    height: 50px;
  }
  
  .play-button i {
    font-size: 20px;
  }
}

  body {
             font-family: 'Tagesschrift', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
/* Bouton déclencheur */
.nav-trigger-btn {
  position: fixed;
  top: 20px;
  left: 20px;
  z-index: 1000;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #d4a373;
  color: white;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  box-shadow: 0 2px 10px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.nav-trigger-btn:hover {
  background-color: #c08a5e;
  transform: scale(1.1);
}

/* Barre de navigation */
.hidden-sidebar {
  position: fixed;
  top: 0;
  left: -300px;
  width: 280px;
  height: 100vh;
  background-color: rgba(255,255,255,0.95);
  backdrop-filter: blur(5px);
  z-index: 1050;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  box-shadow: 2px 0 15px rgba(0,0,0,0.1);
  padding: 20px;
  display: flex;
  flex-direction: column;
}

.hidden-sidebar.active {
  left: 0;
}

.sidebar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  padding-bottom: 15px;
  border-bottom: 1px solid rgba(212,163,115,0.3);
}

.sidebar-header h6 {
  color: #d4a373;
  margin: 0;
  font-size: 1.1rem;
  display: flex;
  align-items: center;
}

.close-btn {
  background: none;
  border: none;
  color: #d4a373;
  font-size: 1.5rem;
  cursor: pointer;
  transition: transform 0.2s;
}

.close-btn:hover {
  transform: rotate(90deg);
}

.nav-links {
  list-style: none;
  padding: 0;
  margin: 0;
  flex-grow: 1;
}

.nav-links li a {
  display: flex;
  align-items: center;
  padding: 12px 15px;
  color: #495057;
  text-decoration: none;
  border-radius: 6px;
  margin-bottom: 5px;
  transition: all 0.3s ease;
}

.nav-links li a:hover,
.nav-links li a.active {
  background-color: rgba(212, 163, 115, 0.15);
  color: #d4a373;
  transform: translateX(5px);
}

.nav-links li a i {
  width: 24px;
  text-align: center;
}

.nav-divider {
  height: 1px;
  background-color: rgba(212,163,115,0.2);
  margin: 15px 0;
}

.scroll-indicator {
  height: 3px;
  background-color: rgba(212,163,115,0.1);
  border-radius: 3px;
  margin-top: auto;
}

#scroll-progress {
  height: 100%;
  width: 0%;
  background-color: #d4a373;
  border-radius: 3px;
  transition: width 0.1s ease;
}

/* Overlay */
.nav-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  z-index: 1040;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
}

.nav-overlay.active {
  opacity: 1;
  visibility: visible;
}

/* Responsive */
@media (max-width: 767px) {
  .hidden-sidebar {
    width: 85%;
    left: -85%;
  }
}
.nav-trigger-btn {
  position: fixed;
  top: 50%; /* Center vertically */
  left: 20px;
  transform: translateY(-50%); /* Adjust for exact centering */
  z-index: 1000;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #d4a373;
  color: white;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  box-shadow: 0 2px 10px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}
.hidden-sidebar.active ~ .nav-trigger-btn {
  opacity: 0;
  pointer-events: none; /* Disables clicks */
}

:root {
      --bottle-green: #1a3f2a;
      --gold: #c8a97e;
      --light-gold: #e8d9b5;
      --dark-bg: #121212;
      --light-bg: #f8f5f0;
      --text-dark: #333333;
      --text-light: #f5f5f5;
      
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--light-bg);
      color: var(--text-dark);
      margin: 0;
      padding: 0;
    }
    .img-small {
   width: 250px;
  height: 170px;
  object-fit: cover;
  border-radius: 12px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: block;
  margin: auto;
}

.img-small:hover {
  transform: scale(1.03);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);}


    .brand-header {
      background-color: var(--bottle-green);
      padding: 1.5rem 0;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

    h2, h3 {
      font-family: 'Cormorant Garamond', serif;
      color: var(--bottle-green);
      font-weight: 600;
      margin-bottom: 20px;
      text-align: center;
      position: relative;
    }

    h2::after, h3::after {
      content: '';
      display: block;
      width: 80px;
      height: 2px;
      background: var(--gold);
      margin: 15px auto 0;
    }

    .container {
      max-width: 1200px;
      margin: 30px auto;
      padding: 0 20px;
    }

    /* --- Section Vidéos --- */
    .video-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin: 40px 0;
    }

    .video-box {
      width: 280px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      cursor: pointer;
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .video-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.2);
      border-color: var(--gold);
    }

    .video-box video {
      width: 100%;
      display: block;
      border-radius: 12px;
    }

    /* --- Section Galerie photos masonry --- */
    .masonry-grid {
      columns: 4 250px;
      column-gap: 1.5rem;
      padding: 20px 0;
    }

    .masonry-item {
      break-inside: avoid;
      margin-bottom: 1.5rem;
      position: relative;
      cursor: pointer;
      overflow: hidden;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border: 1px solid rgba(0,0,0,0.05);
    }

    .masonry-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .masonry-item img {
      width: 100%;
      border-radius: 12px;
      transition: transform 0.4s ease;
      display: block;
    }

    .masonry-item:hover img {
      transform: scale(1.05);
    }

    .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(transparent, rgba(26, 63, 42, 0.8));
      color: var(--light-gold);
      width: 100%;
      padding: 15px;
      text-align: center;
      font-size: 14px;
      opacity: 0;
      transition: opacity 0.3s;
      border-radius: 0 0 12px 12px;
      font-family: 'Cormorant Garamond', serif;
    }

    .masonry-item:hover .overlay {
      opacity: 1;
    }

    /* --- Lightbox image --- */
    .lightbox {
      display: none;
      position: fixed;
      top:0; left:0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.9);
      justify-content: center;
      align-items: center;
      z-index: 10000;
      cursor: pointer;
    }

    .lightbox.active {
      display: flex;
    }

    .lightbox img {
      max-width: 90%;
      max-height: 90%;
      border-radius: 12px;
      box-shadow: 0 0 30px rgba(200, 169, 126, 0.3);
      border: 2px solid var(--gold);
    }

    .lightbox-close {
      position: absolute;
      top: 30px;
      right: 40px;
      font-size: 2.5rem;
      color: var(--gold);
      cursor: pointer;
      user-select: none;
      transition: transform 0.3s;
    }

    .lightbox-close:hover {
      transform: scale(1.1);
    }

    /* --- Modal vidéo --- */
    .video-modal {
      display: none;
      position: fixed;
      top:0; left:0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.95);
      justify-content: center;
      align-items: center;
      z-index: 10000;
    }

    .video-modal.active {
      display: flex;
    }

    .video-content {
      position: relative;
      width: 80%;
      max-width: 900px;
    }

    .video-content video {
      width: 100%;
      height: auto;
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.6);
      border: 3px solid var(--gold);
    }

    .video-close {
      position: absolute;
      top: -50px;
      right: 0;
      font-size: 2rem;
      color: var(--gold);
      cursor: pointer;
      user-select: none;
      background: rgba(26, 63, 42, 0.7);
      padding: 8px 15px;
      border-radius: 10px;
      font-weight: bold;
      transition: all 0.3s;
    }

    .video-close:hover {
      background: var(--bottle-green);
    }

    /* --- Responsive --- */
    @media (max-width: 1200px) {
      .masonry-grid {
        columns: 3 250px;
      }
    }

    @media (max-width: 768px) {
      .video-box {
        width: 45%;
      }
      
      .masonry-grid {
        columns: 2 200px;
      }
      
      .lightbox-close {
        top: 20px;
        right: 25px;
        font-size: 2rem;
      }
      
      .video-content {
        width: 90%;
      }
    }

    @media (max-width: 480px) {
      .video-box {
        width: 100%;
      }
      
      .masonry-grid {
        columns: 1 100%;
      }
      
      .brand-logo {
        font-size: 2rem;
      }
      
      .lightbox-close {
        top: 15px;
        right: 20px;
        font-size: 1.8rem;
      }
    }
    .gallery-section {
  padding: 60px 20px;
  background: #fffef8;
  text-align: center;
}

.gallery-slider {
  display: flex;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  gap: 20px;
  padding: 20px 0;
}

.gallery-slide {
  flex: 0 0 auto;
  scroll-snap-align: start;
  width: 250px;
  height: 160px;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  transition: transform 0.3s;
}

.gallery-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.gallery-slide:hover {
  transform: scale(1.05);
}

.btn-gallery {
  display: inline-block;
  margin-top: 20px;
  background-color: #1E5631; /* Vert */
  color: #fff;
  padding: 12px 30px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: bold;
  transition: background 0.3s ease;
}

.btn-gallery:hover {
  background-color: #C6A664; /* Or */
  color: #1E5631;
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

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;500&display=swap" rel="stylesheet">

 <!-- Bootstrap 5 CDN -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Sidebar Navigation -->
<!-- Bouton de déclenchement -->
<button id="nav-trigger" class="nav-trigger-btn">
  <i class="bi bi-list"></i>
</button>

<!-- Barre de navigation cachée -->
<div id="toc-sidebar" class="hidden-sidebar">
  <div class="sidebar-header">
    <h6>
      <i class="bi bi-compass me-2"></i>Navigation
    </h6>
    <button id="sidebar-close" class="close-btn">
      <i class="bi bi-x"></i>
    </button>
  </div>
  
  <ul class="nav-links">
    <li>
      <a href="#presentation">
        <i class="bi bi-info-circle me-2"></i>Présentation
      </a>
    </li>
    <li>
      <a href="#galerie">
        <i class="bi bi-images me-2"></i>Galerie
      </a>
    </li>
    <li>
      <a href="#menu">
        <i class="bi bi-menu-up me-2"></i>Menu
      </a>
    </li>
    <li>
      <a href="#videos">
        <i class="bi bi-camera-reels me-2"></i>Vidéos
      </a>
    </li>
    <li class="nav-divider"></li>
    <li>
      <a href="#contact">
        <i class="bi bi-telephone me-2"></i>Contact
      </a>
    </li>
  </ul>
  
  <div class="scroll-indicator">
    <div id="scroll-progress"></div>
  </div>
</div>

<!-- Overlay -->
<div id="nav-overlay" class="nav-overlay"></div>



<script>
document.addEventListener('DOMContentLoaded', function() {
  const triggerBtn = document.getElementById('nav-trigger');
  const sidebar = document.getElementById('toc-sidebar');
  const closeBtn = document.getElementById('sidebar-close');
  const overlay = document.getElementById('nav-overlay');
  
  // Ouvrir la sidebar
  triggerBtn.addEventListener('click', function() {
    sidebar.classList.add('active');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  });
  
  // Fermer la sidebar
  function closeSidebar() {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = '';
  }
  
  closeBtn.addEventListener('click', closeSidebar);
  overlay.addEventListener('click', closeSidebar);
  
  // Fermer après clic sur un lien
  document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', closeSidebar);
  });
  
  // Mise à jour de la progression du scroll
  window.addEventListener('scroll', function() {
    const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
    const scrollProgress = (window.scrollY / scrollTotal) * 100;
    document.getElementById('scroll-progress').style.width = scrollProgress + '%';
  });
});
</script>

<div id="presentation">
  <!-- ... -->
</div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css ">

    <!-- Google Fonts: Indian Modern Vibe -->
    <link rel="preconnect" href="https://fonts.googleapis.com ">
    <link rel="preconnect" href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=Dancing+Script:wght@500;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

 <!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Le H AAND - Accueil</title>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=Dancing+Script:wght@500;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- AOS (animations on scroll) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

  <style>
    :root{
      --primary-dark: #2D1B00;
      --accent-gold: #D4AF37;
      --accent-saffron: #FF6F00;
      --accent-teal: #008080;
      --background-cream: #FFF8F0;
      --text-muted: #5C4B3F;
      --india-pattern: rgba(212,175,55,0.05);
    }

    /* Base */
    *{box-sizing:border-box}
    body{
      font-family: 'Poppins', sans-serif;
      background-color: var(--background-cream);
      color:#222;
      margin:0;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
    }

    a{text-decoration:none}

    /* HERO */
    .hero{
      background: linear-gradient(135deg, var(--background-cream) 0%, #f9f4e8 100%);
      padding: 110px 0;
      position: relative;
      overflow: hidden;
    }

    /* subtle mandala pattern on the right */
    .hero::before{
      content:"";
      position:absolute;
      top:0;
      right:-10%;
      width:60%;
      height:100%;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 800 800'%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0' x2='1'%3E%3Cstop offset='0' stop-color='%23D4AF37' stop-opacity='0.06'/%3E%3Cstop offset='1' stop-color='%23FF6F00' stop-opacity='0.03'/%3E%3C/linearGradient%3E%3C/defs%3E%3Ccircle cx='400' cy='400' r='300' fill='url(%23g)'/%3E%3Cpath d='M400 100 L420 170 L490 170 L440 210 L460 280 L400 240 L340 280 L360 210 L310 170 L380 170 Z' fill='%23D4AF37' fill-opacity='0.02'/%3E%3C/svg%3E");
      background-repeat:no-repeat;
      background-size:contain;
      pointer-events:none;
      z-index:0;
      opacity:0.9;
    }

    .container{max-width:1140px;margin:0 auto;padding:0 15px;position:relative;z-index:2}
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
/* Hover */
.logo:hover{
  transform: scale(1.08);
  box-shadow: 0 10px 30px rgba(0, 100, 0, 0.5), 
              0 0 25px rgba(212, 175, 55, 0.7);
}

/* Animation du gradient */
@keyframes gradientMove {
  0%{ background-position: 0% 50%; }
  50%{ background-position: 100% 50%; }
  100%{ background-position: 0% 50%; }
}


    .hero h1{
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4.2vw, 3.6rem);
      margin:0 0 12px;
      color:var(--primary-dark);
      letter-spacing:0.6px;
    }

    .hero p.lead{
      color:var(--text-muted);
      max-width:760px;
      font-size:1.05rem;
      margin:0 auto 22px;
      font-style:italic;
    }

    /* indian touch subtitle (small) */
    .hero .subtag{
      display:inline-block;
      font-size:0.95rem;
      color:var(--accent-saffron);
      font-weight:600;
      margin-left:8px;
      font-family: 'Dancing Script', cursive;
    }

    /* CTA button with saffron gradient + subtle icon */
    .hero .btn{
      background: linear-gradient(90deg, var(--accent-saffron), #f08a23);
      color:white;
      border-radius:44px;
      padding:14px 36px;
      font-weight:700;
      letter-spacing:1px;
      box-shadow: 0 10px 30px rgba(255,111,0,0.18);
      display:inline-flex;
      align-items:center;
      gap:10px;
      text-transform:uppercase;
      transition: transform .25s ease, box-shadow .25s ease;
    }

    .hero .btn i{font-size:1.05rem}
    .hero .btn:hover{transform:translateY(-4px); box-shadow:0 18px 40px rgba(255,111,0,0.28)}

    /* spice floating icons */
    .spice-icons{
      position:absolute;
      bottom:-10px;
      left:6%;
      z-index:1;
      opacity:0.95;
      pointer-events:none;
    }
    .spice-icons span{display:inline-block;font-size:1.8rem;margin-right:36px;animation:float 5s ease-in-out infinite}
    .spice-icons span:nth-child(2){animation-delay:1s}
    .spice-icons span:nth-child(3){animation-delay:2s}
    @keyframes float{
      0%,100%{transform:translateY(0)}
      50%{transform:translateY(-14px)}
    }

    /* Presentation section (white card feel) */
    .restaurant-presentation{
      background:white;
      padding:80px 0;
      margin-top:40px;
      border-radius:18px 18px 0 0;
      box-shadow:0 -8px 40px rgba(0,0,0,0.03);
    }

    .presentation-title{
      font-family:'Playfair Display', serif;
      font-size:calc(1.6rem + 0.6vw);
      font-weight:700;
      color:var(--primary-dark);
    }
    .presentation-title span{color:var(--accent-saffron)}

    .presentation-subtitle{color:var(--text-muted);margin-top:10px}
    .section-divider{height:4px;width:90px;background:linear-gradient(90deg,var(--accent-gold),var(--accent-saffron));border-radius:3px;margin:18px 0}

    .presentation-text{line-height:1.75;color:#444;margin-top:8px}

    .chef-name{font-family:'Dancing Script',cursive;color:var(--accent-teal);font-size:1.3rem;margin:0}

    /* Video card */
    .video-container{
      border:10px solid var(--background-cream);
      border-radius:14px;
      box-shadow:0 20px 60px rgba(0,0,0,0.09);
      position:relative;
      overflow:hidden;
    }
    .video-container video{display:block;width:100%;height:110%;object-fit:cover;filter:saturate(1.05)}
    .play-button{
      width:66px;height:66px;border-radius:50%;background:rgba(255,255,255,0.95);display:flex;align-items:center;justify-content:center;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);box-shadow:0 8px 30px rgba(0,0,0,0.12)
    }
    .play-button i{color:var(--accent-saffron);font-size:1.6rem}

    /* CTA buttons under presentation */
    .cta-group{display:flex;gap:14px;flex-wrap:wrap;justify-content:center;margin-top:26px}
    .cta-btn{padding:12px 30px;border-radius:50px;background:linear-gradient(45deg,var(--accent-teal),var(--accent-saffron));color:#fff;border:none;font-weight:600;box-shadow:0 10px 30px rgba(0,128,128,0.12)}
    .cta-outline{padding:12px 30px;border-radius:50px;background:transparent;border:2px solid var(--accent-gold);color:var(--primary-dark);font-weight:600}

    /* responsive */
    @media (max-width:992px){
      .hero{padding:70px 0}
      .spice-icons{display:none}
      .restaurant-presentation{padding:60px 0}
    }
  </style>
</head>
<body>

  <!-- HERO -->
<section class="hero position-relative text-center text-light d-flex align-items-center" 
         style="min-height:100vh; background:linear-gradient(rgba(0, 0, 0, 0.6), rgba(43, 64, 41, 0.77)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;" 
         aria-label="Hero">

  <div class="container" data-aos="fade-up">
    <!-- Logo stylisé -->
    <div class="logo mb-4" title="Le H logo">
      <span style="font-size:4rem; font-weight:900; color:var(--accent-gold);">H</span>
    </div>

    <!-- Titre principal -->
    <h1 class="display-4 fw-bold text-warning">
      Le H <br>
      <small class="fs-5 text-warning">— Saveurs Algériennes Réinventées</small>
    </h1>

    <!-- Phrase d'accroche -->
    <p class="lead mt-3 mb-4 text-white">
      Voyagez au cœur de la gastronomie algérienne, où <strong>tradition</strong> et 
      <strong>créativité</strong> s’harmonisent dans chaque plat.
    </p>

    <!-- CTA -->
    <div class="d-flex justify-content-center gap-3">
      <a href="#menu" class="btn btn-warning btn-lg rounded-pill shadow">
        <i class="bi bi-book-half"></i> Voir le Menu
      </a>
      <a href="reservation.php" class="btn btn-outline-light btn-lg rounded-pill">
        <i class="bi bi-calendar-check"></i> Réserver une Table
      </a>
    </div>
  </div>

  <!-- Décorations flottantes -->
  <div class="floating-icons" aria-hidden="true">
    <span>🥘</span>
    <span>🍋</span>
    <span>🌿</span>
    <span>🔥</span>
  </div>
</section>

<!-- CSS rapide pour l'animation -->
<style>
.floating-icons {
  position: absolute;
  bottom: 10%;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 15px;
  font-size: 2rem;
  opacity: 0.8;
}
.floating-icons span {
  animation: float 6s ease-in-out infinite;
}
.floating-icons span:nth-child(2) { animation-delay: 1s; }
.floating-icons span:nth-child(3) { animation-delay: 2s; }
.floating-icons span:nth-child(4) { animation-delay: 3s; }

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
</style>

  <!-- PRESENTATION -->
  <section class="restaurant-presentation" id="presentation" aria-label="Présentation">
    <div class="container">
      <div class="row align-items-center g-5">
        <!-- Left: Texte -->
        <div class="col-lg-6" data-aos="fade-right">
          <h2 class="presentation-title">Bienvenue au <span>Le H 🌿</span></h2>
          <p class="presentation-subtitle">Un lieu où la cuisine algérienne rencontre une subtile inspiration ITALIAN.</p>

          <div class="section-divider" aria-hidden="true"></div>

          <p class="presentation-text">
            Au Le H , nous réinterprétons les grands classiques algériens — <strong>couscous, chorba, tajines, méchoui</strong> —
            avec des épices et techniques qui apportent une profondeur nouvelle aux plats.
            Produits locaux, cuisson lente et recettes familiales revisitées pour une expérience conviviale et mémorable.
          </p>

          <div class="d-flex align-items-center mt-4">
            <img src="img/sign.jpg" alt="Signature du chef" style="height:60px;border-radius:50%;border:3px solid var(--accent-gold);margin-right:14px" />
            <p class="chef-name">Le Chef Le H </p>
          </div>
        </div>

        <!-- Right: Video / Image -->
        <div class="col-lg-6" data-aos="zoom-in">
          <div class="video-container" role="region" aria-label="Vidéo présentation">
            <!-- Remplace src par ta vidéo / image si tu veux -->
            <video autoplay loop muted playsinline>
              <source src="img/v/b.mp4" type="video/mp4">
              <!-- fallback image -->
              Votre navigateur ne supporte pas la vidéo.
            </video>
            <div class="play-button" title="Play preview"><i class="bi bi-play-fill"></i></div>
          </div>
        </div>
      </div>

      <!-- CTA sous la présentation -->
      <div class="text-center">
        <h3 style="font-family:'Playfair Display',serif;color:var(--primary-dark);margin-top:36px" data-aos="fade-up">Bienvenue dans notre univers</h3>
        <p style="color:var(--text-muted);max-width:760px;margin:10px auto 0" data-aos="fade-up" data-aos-delay="80">
          Explorez notre menu inspiré de l’Algérie et des senteurs italian — ou réservez votre table dès maintenant.
        </p>

        <div class="cta-group" data-aos="fade-up" data-aos-delay="160">
          <a href="#menu" class="cta-btn"><i class="bi bi-list-check me-2"></i> Menu</a>
          <a href="reservation.php" class="cta-outline"><i class="bi bi-calendar-check me-2"></i> Réserver</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 900, once: true, easing: 'ease-out-cubic' });
  </script>



<!-- Section Infos Restaurant -->
<section id="section2" class="container py-5">
  <div class="text-center mb-4">
    <h2>Café et Restaurant <?php echo $general_setting['Name'] ?></h2>
    <p>Un lieu chaleureux pour savourer un bon café, déguster des plats variés et partager des moments agréables.</p>
  </div>
</section>

  <div class="restaurant-info">
    <!-- Horaires -->
    <div class="info-card">
      <h4 class="info-title">🍽️ Horaires d'ouverture</h4>
      <ul class="info-list">
        <li><strong>Petit déjeuner</strong> : 6h30 - 10h00</li>
        <li><strong>Déjeuner</strong> : 12h00 - 15h00</li>
        <li><strong>Dîner</strong> : 18h30 - 22h30</li>
      </ul>
    </div>

    <!-- Cuisine -->
    <div class="info-card highlight-card">
      <h4 class="info-title">🥗 Cuisine et spécialités</h4>
      <p>
        Notre chef vous invite à découvrir une carte alliant saveurs locales et influences internationales. 
        Produits frais, menus de saison et options végétariennes sont à l’honneur.
      </p>
      <p>
        Chaque plat est préparé avec soin pour offrir une harmonie parfaite entre tradition et créativité. 
        Nous privilégions les circuits courts et les produits bio pour garantir qualité et respect de l’environnement.
      </p>
    </div>

    <!-- Événements -->
    <div class="info-card">
      <h4 class="info-title">🎉 Événements et privatisations</h4>
      <p>
        Que ce soit pour un dîner d'affaires, une fête privée ou un anniversaire, notre espace est privatisable 
        avec menus personnalisés et service dédié.
      </p>
    </div>

    <!-- CTA Contact -->
    <div class="cta-box text-center mt-4">
      <p class="mb-3">
        Pour réserver une table, organiser un événement ou obtenir notre carte complète, 
        contactez-nous via le site ou au service client du <?php echo $general_setting['Name'] ?>.
      </p>
      <a href="#contact" class="cta-btn">📞 Contactez-nous</a>
    </div>
  </div>
</section>

<!-- Styles Modernes -->
<style>
.presentation-title {
  font-family: 'Playfair Display', serif;
  font-size: 2.5rem;
  font-weight: 700;
}
.presentation-title span {
  color: #b8860b; /* Doré */
}
.section-divider {
  width: 80px;
  height: 3px;
  background: linear-gradient(90deg, #b8860b, #d4af37);
  border-radius: 5px;
  margin: 15px auto;
}
.info-card {
  background: rgba(255,255,255,0.85);
  backdrop-filter: blur(12px);
  border-radius: 20px;
  padding: 25px;
  margin: 20px 0;
  box-shadow: 0 8px 24px rgba(0,0,0,0.1);
  transition: transform .3s ease;
}
.info-card:hover {
  transform: translateY(-5px);
}
.cta-btn {
  background: linear-gradient(135deg, #b8860b, #d4af37);
  color: #fff;
  border-radius: 50px;
  padding: 12px 30px;
  text-decoration: none;
  transition: all .3s ease;
}
.cta-btn:hover {
  transform: scale(1.05);
}
.cta-btn-outline {
  border-radius: 50px;
  transition: all .3s ease;
}
.video-container {
  position: relative;
}
.play-button {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  background: rgba(255, 255, 255, 0.7);
  border-radius: 50%;
  width: 70px; height: 70px;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer;
  font-size: 2rem;
  color: #b8860b;
  transition: all 0.3s ease;
}
.play-button:hover {
  background: rgba(255, 255, 255, 0.9);
  transform: translate(-50%, -50%) scale(1.1);
}
</style>

<!-- Script vidéo -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const video = document.querySelector('.hero-video');
  const playButton = document.querySelector('.play-button');

  playButton.addEventListener('click', function() {
    if (video.paused) {
      video.play();
      video.removeAttribute('muted');
      playButton.style.display = 'none';
    } else {
      video.pause();
      video.setAttribute('muted', '');
      playButton.style.display = 'flex';
    }
  });
});
</script>

</head>
<body>


<!-- Section Hero Menu avec Parallax -->
<section id="menu-hero" class="d-flex align-items-center justify-content-center text-white text-center" 
  style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
  url('https://images.unsplash.com/photo-1504674900247-0877df9cc836'); 
  background-size: cover; 
  background-position: center; 
  background-attachment: fixed; 
  height: 100vh;">

  <div class="animate__animated animate__zoomIn">
    <h1 class="display-3 fw-bold">🍷 Bienvenue dans notre univers culinaire</h1>
    <p class="lead mb-4">Savourez l'élégance de chaque plat, préparé avec passion</p>
    <a href="#menu" class="btn btn-lg btn-warning shadow-lg px-5 rounded-pill">Découvrir</a>
  </div>
</section>

<div id="menu">
  <!-- ... -->
</div>
<!-- Section Menu Vedette en 3D -->
<section id="menu-vedette" class="py-5" style="background: linear-gradient(135deg, #fdfbf7, #f1eee9);">
  <div class="container text-center">
    <h2 class="fw-bold mb-5" style="color:#1a3f2a; font-family: 'Cormorant Garamond', serif;">
      ✨ Nos Plats Vedettes
    </h2>

    <!-- Swiper.js Carousel -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <!-- Plat 1 -->
        <div class="swiper-slide">
          <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1558030006-450675393462" class="card-img-top" alt="Entrecôte">
            <div class="card-body">
              <h5 class="fw-bold text-success">Entrecôte grillée</h5>
              <p>Viande tendre grillée à la perfection.</p>
              <span class="badge bg-warning text-dark">1800 DA</span>
            </div>
          </div>
        </div>

        <!-- Plat 2 -->
        <div class="swiper-slide">
          <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb" class="card-img-top" alt="Tiramisu">
            <div class="card-body">
              <h5 class="fw-bold text-success">Tiramisu maison</h5>
              <p>Un nuage de mascarpone au café.</p>
              <span class="badge bg-warning text-dark">500 DA</span>
            </div>
          </div>
        </div>

        <!-- Plat 3 -->
        <div class="swiper-slide">
          <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="card-img-top" alt="Pizza">
            <div class="card-body">
              <h5 class="fw-bold text-success">Pizza Quatre Fromages</h5>
              <p>Un mélange fondant de fromages italiens.</p>
              <span class="badge bg-warning text-dark">1000 DA</span>
            </div>
          </div>
        </div>

      </div>

      <!-- Pagination + Navigation -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- Bouton -->
    <div class="mt-4">
      <a href="menu.php" class="btn btn-success btn-lg rounded-pill shadow">Voir toute la carte</a>
    </div>
  </div>
</section>
<section id="temoignages" class="py-5" style="background: linear-gradient(135deg,#f8f9fa,#fff);">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold" style="color:#1a3f2a; font-family: 'Cormorant Garamond', serif;">
      💬 Avis de nos clients
    </h2>
    <div class="row g-4">

      <!-- Témoignage -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-lg border-0 p-4 rounded-4 animate__animated animate__fadeInUp">
          <div class="d-flex align-items-center mb-3">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="rounded-circle me-3 border border-2 border-success" width="65" height="65">
            <div>
              <h6 class="mb-0 fw-bold">Karim B.</h6>
              <small class="text-muted">Oran</small>
            </div>
          </div>
          <p class="fst-italic">“La meilleure chorba que j'ai mangée de ma vie ! Service impeccable et ambiance chaleureuse.”</p>
          <div class="text-warning">⭐⭐⭐⭐⭐</div>
        </div>
      </div>

      <!-- Témoignage -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-lg border-0 p-4 rounded-4 animate__animated animate__fadeInUp animate__delay-1s">
          <div class="d-flex align-items-center mb-3">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="rounded-circle me-3 border border-2 border-success" width="65" height="65">
            <div>
              <h6 class="mb-0 fw-bold">Nadia M.</h6>
              <small class="text-muted">Alger</small>
            </div>
          </div>
          <p class="fst-italic">“Un brunch parfait en famille. Produits frais, service souriant et déco agréable. Je recommande à 100% !”</p>
          <div class="text-warning">⭐⭐⭐⭐⭐</div>
        </div>
      </div>

      <!-- Témoignage -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-lg border-0 p-4 rounded-4 animate__animated animate__fadeInUp animate__delay-2s">
          <div class="d-flex align-items-center mb-3">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="rounded-circle me-3 border border-2 border-success" width="65" height="65">
            <div>
              <h6 class="mb-0 fw-bold">Yacine D.</h6>
              <small class="text-muted">Constantine</small>
            </div>
          </div>
          <p class="fst-italic">“Le méchoui pour 4 personnes était tout simplement exceptionnel. On s’est régalés du début à la fin.”</p>
          <div class="text-warning">⭐⭐⭐⭐⭐</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<section id="location" class="py-5" style="background: linear-gradient(135deg, #f9f9f9, #ffffff);">
  <div class="container">
    <div class="row align-items-center gx-5">

      <!-- Infos -->
      <div class="col-lg-6 mb-4 mb-lg-0 animate__animated animate__fadeInLeft">
        <h2 class="mb-4 fw-bold" style="color:#1a3f2a;">📍 Nous Trouver</h2>
        
        <!-- Adresse -->
        <div class="mb-4 d-flex align-items-center gap-3">
          <i class="fas fa-map-marker-alt fa-2x text-danger"></i>
          <div>
            <p class="mb-1 fw-semibold">Adresse</p>
            <p class="mb-0 text-muted">
              <?php echo $general_setting['Address_line1'] ?>,
              <?php echo $general_setting['Address_line2'] ?>,
              <?php echo $general_setting['City'] ?>,
              <?php echo $general_setting['State'] ?>,
              <?php echo $general_setting['Country'] ?>,
              <?php echo $general_setting['Zip_code'] ?>
            </p>
          </div>
        </div>

        <!-- Téléphone -->
        <div class="mb-4 d-flex align-items-center gap-3">
          <i class="fas fa-phone-alt fa-2x text-primary"></i>
          <div>
            <p class="mb-1 fw-semibold">Téléphone</p>
            <a href="tel:+<?php echo $general_setting['Telephone_number'] ?>" 
               class="text-decoration-none text-dark">
               +<?php echo $general_setting['Telephone_number'] ?>
            </a>
          </div>
        </div>

        <!-- Email -->
        <div class="mb-4 d-flex align-items-center gap-3">
          <i class="fas fa-envelope fa-2x text-secondary"></i>
          <div>
            <p class="mb-1 fw-semibold">Email</p>
            <a href="mailto:<?php echo $general_setting['Email'] ?>" 
               class="text-decoration-none text-dark">
               <?php echo $general_setting['Email'] ?>
            </a>
          </div>
        </div>

        <!-- Horaires -->
        <h5 class="mt-4 fw-semibold">🕑 Horaires d'ouverture :</h5>
        <ul class="list-unstyled text-muted mb-4">
          <li>✔️ Lundi - Vendredi : 11h30 - 23h00</li>
          <li>✔️ Samedi - Dimanche : 12h00 - 00h00</li>
        </ul>

        <!-- Bouton directions -->
        <a href="https://www.google.com/maps/dir/?api=1&destination=Rue+Ahmed+Zabana+Oran" target="_blank" 
           class="btn btn-lg px-4 shadow" 
           style="background: linear-gradient(45deg, #1a3f2a, #3eb489); color:white; border:none; border-radius: 50px;">
          <i class="fas fa-directions me-2"></i> Obtenir l'itinéraire
        </a>
      </div>

      <!-- Map -->
      <div class="col-lg-6 animate__animated animate__fadeInRight">
        <div class="shadow-lg rounded-4 overflow-hidden border">
          <div class="ratio ratio-16x9">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102770.804775998!2d-0.703021!3d35.6970711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQxJzQ5LjUiTiAwwrA0MicyMi4xIlc!5e0!3m2!1sfr!2sdz!4v1234567890123!5m2!1sfr!2sdz"
              allowfullscreen="" loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


<!-- Swiper.js CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Script init Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 30,
      stretch: 0,
      depth: 200,
      modifier: 1,
      slideShadows: true,
    },
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<style>
  /* Réduire la taille des images dans le carrousel */
  .swiper-slide img {
    max-width: 320px;   /* العرض الأقصى */
    max-height: 220px;  /* الطول الأقصى */
    margin: 0 auto;     /* لتوسيط الصورة */
    border-radius: 15px; /* زوايا ناعمة */
    object-fit: cover;   /* يحافظ على التناسب */
    transition: transform 0.4s ease;
  }

  /* Effet zoom léger au hover */
  .swiper-slide img:hover {
    transform: scale(1.05);
  }

  /* Fixer largeur البطاقة */
  .swiper-slide .card {
    width: 340px;  
    margin: auto;
  }

  /* Taille أنيقة للباج badge */
  .card .badge {
    font-size: 0.9rem;
    padding: 6px 12px;
  }
</style>

<!-- Style Custom -->
<style>
  .img-hover {
    transition: transform 0.6s ease, filter 0.5s ease;
  }
  .img-hover:hover {
    transform: scale(1.1);
    filter: brightness(90%);
  }
</style>
<!-- Section 5 : Call to Action Modernisée -->
 <div id="contact" ></div>
<section  class="section py-5 bg-gradient-to-right" style="background: linear-gradient(135deg, #f8f9fa 0%, #e0f7fa 100%);">
  <div class="container">
    <div class="row align-items-center gy-4">

      <!-- Texte & CTA -->
      <div class="col-lg-6">
        <h2 class="display-4 fw-bold mb-3">Réservez votre table ou demandez un service traiteur</h2>
        <p class="lead text-secondary mb-4">Notre équipe est à votre écoute pour toute demande personnalisée. Simple, rapide et efficace.</p>
        <div class="d-flex flex-wrap gap-3">
          <a href="#reservationForm" class="btn btn-gradient-primary btn-lg d-flex align-items-center gap-2 shadow-sm" style="border-radius: 50px; transition: transform 0.3s;">
            <i class="fas fa-phone-alt"></i> Contactez-nous
          </a>
          <a href="https://wa.me/" target="_blank" rel="noopener" class="btn btn-gradient-success btn-lg d-flex align-items-center gap-2 shadow-sm" style="border-radius: 50px; transition: transform 0.3s;">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>
        </div>
      </div>

      <!-- Carte service restauration -->
      <div class="col-lg-6">
        <div class="card shadow border-0 rounded-4 overflow-hidden">
          <div class="row g-0">
            <div class="col-md-5">
              <img src="assets/picture/leR.png" alt="Service Restauration" class="img-fluid h-100" style="object-fit: cover;">
            </div>
            <div class="col-md-7 p-4 d-flex flex-column justify-content-center">
              <h4 class="card-title fw-semibold mb-2">Service Restauration</h4>
              <p class="text-muted mb-3">Commandes, événements et menus spéciaux adaptés à vos besoins.</p>
              <div>
                <a href="https://www.facebook.com" target="_blank" class="text-decoration-none mx-2 fs-4 text-primary" aria-label="Facebook">
                  <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank" class="text-decoration-none mx-2 fs-4 text-danger" aria-label="Instagram">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="mailto:votre@email.com" class="text-decoration-none mx-2 fs-4 text-secondary" aria-label="Email">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<div id="Réserver"></div>
<!-- Formulaire de réservation moderne -->
<div class="container my-5" id="reservationForm">
  <h3 class="text-center mb-5 fw-bold" style="font-family: 'Cairo', sans-serif;">Réserver une table</h3>
  <form class="row g-4 needs-validation" novalidate>
    <div class="col-md-6">
      <label for="name" class="form-label fw-semibold">Nom complet</label>
      <input type="text" class="form-control form-control-lg rounded-pill" id="name" placeholder="Entrez votre nom complet" required>
      <div class="invalid-feedback">Veuillez entrer votre nom complet.</div>
    </div>
    <div class="col-md-6">
      <label for="phone" class="form-label fw-semibold">Numéro de téléphone</label>
      <input type="tel" class="form-control form-control-lg rounded-pill" id="phone" placeholder="Entrez votre numéro de téléphone" required pattern="^\+?\d{7,15}$">
      <div class="invalid-feedback">Veuillez entrer un numéro de téléphone valide.</div>
    </div>
    <div class="col-md-4">
      <label for="date" class="form-label fw-semibold">Date</label>
      <input type="date" class="form-control form-control-lg rounded-pill" id="date" required min="<?= date('Y-m-d'); ?>">
      <div class="invalid-feedback">Veuillez sélectionner une date valide.</div>
    </div>
    <div class="col-md-4">
      <label for="time" class="form-label fw-semibold">Heure</label>
      <input type="time" class="form-control form-control-lg rounded-pill" id="time" required>
      <div class="invalid-feedback">Veuillez sélectionner une heure valide.</div>
    </div>
    <div class="col-md-4">
      <label for="guests" class="form-label fw-semibold">Nombre de personnes</label>
      <select class="form-select form-select-lg rounded-pill" id="guests" required>
        <option value="" disabled selected>Choisissez le nombre de personnes</option>
        <option value="1">1 personne</option>
        <option value="2">2 personnes</option>
        <option value="3">3 personnes</option>
        <option value="4">4 personnes</option>
        <option value="5">5 personnes</option>
        <option value="6">6 personnes</option>
        <option value="7">7+ personnes</option>
      </select>
      <div class="invalid-feedback">Veuillez choisir le nombre de personnes.</div>
    </div>
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-gradient-primary btn-lg px-5 rounded-pill shadow-sm">Confirmer la réservation</button>
    </div>
  </form>
</div>



<!-- Script validation Bootstrap 5 -->
<script>
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<!-- Custom CSS -->


<script>
 document.addEventListener('DOMContentLoaded', function() {
  // Toggle sidebar
  const toggleBtn = document.getElementById('sidebar-toggle');
  const sidebar = document.getElementById('toc-sidebar');
  
  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });

  // Mobile menu toggle
  document.getElementById('mobile-menu-btn').addEventListener('click', function() {
    sidebar.classList.toggle('d-none');
  });

  // Smooth scrolling for sidebar links
  document.querySelectorAll('#toc-sidebar a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 20,
          behavior: 'smooth'
        });
        
        // Close mobile menu if open
        if (!sidebar.classList.contains('d-none') && window.innerWidth < 768) {
          sidebar.classList.add('d-none');
        }
      }
    });
  });

  // Active section detection on scroll
  window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('#toc-sidebar .nav-link');
    
    let current = '';
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;
      
      if (window.scrollY >= sectionTop - 200) {
        current = section.getAttribute('id');
      }
    });
    
    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${current}`) {
        link.classList.add('active');
      }
    });

    // Update scroll progress
    const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
    const scrollProgress = (window.scrollY / scrollTotal) * 100;
    document.getElementById('scroll-progress').style.width = scrollProgress + '%';
  });
});
</script>

    <script>
function openVideoModal(src) {
  const modal = document.createElement('div');
  modal.className = 'video-modal';
  modal.innerHTML = `
    <div class="video-content">
      <span onclick="this.parentElement.parentElement.remove()" class="close-btn">✖</span>
      <video src="${src}" controls autoplay></video>
    </div>
  `;
  document.body.appendChild(modal);
}
</script>
<script>

// Video modal functionality
function openVideoModal(src) {
  const modal = document.createElement('div');
  modal.className = 'video-modal';
  modal.innerHTML = `
    <div class="video-content">
      <button class="close-btn" onclick="this.parentElement.parentElement.remove()">✖</button>
      <video src="${src}" controls autoplay></video>
    </div>
  `;
  document.body.appendChild(modal);
}

// Close video modal when clicking outside
document.addEventListener('click', function(e) {
  if (e.target.className === 'video-modal') {
    e.target.remove();
  }
});
</script>

<script>

    function openLightbox(src) {
  const lightbox = document.createElement('div');
  lightbox.className = 'lightbox';
  lightbox.innerHTML = `<img src="${src}" alt=""><span onclick="this.parentElement.remove()">✖</span>`;
  document.body.appendChild(lightbox);
}

document.head.insertAdjacentHTML("beforeend", `
<style>
.lightbox {
  position: fixed; top: 0; left: 0; width: 100%; height: 100%;
  background: rgba(0,0,0,0.8); display: flex; justify-content: center;
  align-items: center; z-index: 1000;
}
.lightbox img {
  max-width: 90%; max-height: 90%;
  border-radius: 12px;
}
.lightbox span {
  position: absolute; top: 20px; right: 30px;
  font-size: 2rem; color: white; cursor: pointer;
}
</style>
`);

  function changeVideo(src) {
    const video = document.getElementById('mainVideo');
    video.src = src;
    video.load();
    video.play();
  }
</script>

<script>
  // Toggle sidebar
  document.getElementById('sidebar-toggle').addEventListener('click', function() {
    document.getElementById('toc-sidebar').classList.toggle('collapsed');
  });
  
  // Mobile menu toggle
  document.getElementById('mobile-menu-btn').addEventListener('click', function() {
    document.getElementById('toc-sidebar').classList.toggle('d-none');
  });
  
  // Update active link on scroll
  window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('#toc-sidebar .nav-link');
    
    let current = '';
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;
      
      if (pageYOffset >= sectionTop - 200) {
        current = section.getAttribute('id');
      }
    });
    
    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${current}`) {
        link.classList.add('active');
      }
    });
    
    // Update scroll progress
    const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
    const scrollProgress = (window.scrollY / scrollTotal) * 100;
    document.getElementById('scroll-progress').style.width = scrollProgress + '%';
  });
</script>
<script>
// Script pour le scroll fluide et la détection active
document.addEventListener('DOMContentLoaded', function() {
  // 1. Scroll fluide
  document.querySelectorAll('#toc-sidebar a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 20,
          behavior: 'smooth'
        });
      }
    });
  });

  // 2. Détection de la section active
  window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('#toc-sidebar .nav-link');
    
    let current = '';
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;
      
      if (window.scrollY >= sectionTop - 200) {
        current = section.getAttribute('id');
      }
    });
    
    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${current}`) {
        link.classList.add('active');
      }
    });
  });
});
</script>


<!-- FontAwesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/js/lightbox.min.js"></script>
<script>
  function openLightbox(imageSrc) {
    document.getElementById('lightbox-img').src = imageSrc;
    document.getElementById('lightbox').style.display = 'flex';
  }

  function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
  }
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Ajout des IDs dynamiques aux sections pour navigation fluide
    document.querySelectorAll("section").forEach((section, index) => {
      section.id = "section" + (index + 1);
    });
  });
</script>
</section>

<?php include('include/footer.php'); ?>
