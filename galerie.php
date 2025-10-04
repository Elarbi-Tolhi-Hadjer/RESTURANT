<?php
include('include/currentPage_header.php');
include('include/dbConnect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Galerie Restaurant Le H</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
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
  </style>
</head>
<body>

<div class="brand-header">
  <div class="brand-logo">Le H Restaurant</div>
</div>

<div class="container">
  <!-- Section Galerie d'images -->
  <section id="galerie">
    <h3>📸 Ambiance & Dégustation</h3>  
    <div class="masonry-grid">
      <?php for ($i = 1; $i <= 28; $i++): ?>
        <div class="masonry-item">
          <img src="img/r<?php echo $i; ?>.jpg" alt="Image <?php echo $i; ?>" onclick="openLightbox('img/r<?php echo $i; ?>.jpg')">
          <div class="overlay">Image <?php echo $i; ?></div>
        </div>
      <?php endfor; ?>
    </div>
  </section>

  <!-- Section Vidéos -->
  <section id="videos">
    <h2>🎥 L'expérience Le H</h2>
    <div class="video-grid">
      <?php for ($i = 1; $i <= 14; $i++): ?>
        <div class="video-box" onclick="openVideoModal('img/v/leR (<?php echo $i; ?>).mp4')">
          <video muted onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;">
            <source src="img/v/leR (<?php echo $i; ?>).mp4" type="video/mp4">
          </video>
        </div>
      <?php endfor; ?>
    </div>
  </section>
</div>

<!-- Lightbox image -->
<div class="lightbox" id="lightbox" aria-modal="true" role="dialog" aria-label="Visualisation image agrandie" tabindex="-1">
  <span class="lightbox-close" role="button" aria-label="Fermer la lightbox" onclick="closeLightbox()">✖</span>
  <img src="" alt="Image agrandie" id="lightbox-img" />
</div>

<!-- Modal vidéo -->
<div class="video-modal" id="videoModal" aria-modal="true" role="dialog" aria-label="Lecture vidéo" tabindex="-1">
  <div class="video-content">
    <span class="video-close" role="button" aria-label="Fermer la vidéo" onclick="closeVideoModal()">✖</span>
    <video id="modalVideo" controls></video>
  </div>
</div>

<script>
  // --- Lightbox ---
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');

  function openLightbox(src) {
    lightboxImg.src = src;
    lightbox.classList.add('active');
    lightbox.focus();
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.remove('active');
    lightboxImg.src = '';
    document.body.style.overflow = '';
  }

  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  // --- Modal vidéo ---
  const videoModal = document.getElementById('videoModal');
  const modalVideo = document.getElementById('modalVideo');

  function openVideoModal(src) {
    modalVideo.src = src;
    videoModal.classList.add('active');
    modalVideo.play();
    videoModal.focus();
    document.body.style.overflow = 'hidden';
  }

  function closeVideoModal() {
    videoModal.classList.remove('active');
    modalVideo.pause();
    modalVideo.currentTime = 0;
    modalVideo.src = '';
    document.body.style.overflow = '';
  }

  videoModal.addEventListener('click', (e) => {
    if (e.target === videoModal) closeVideoModal();
  });

  // Close on ESC key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (lightbox.classList.contains('active')) closeLightbox();
      if (videoModal.classList.contains('active')) closeVideoModal();
    }
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
<?php include('include/footer.php'); ?>