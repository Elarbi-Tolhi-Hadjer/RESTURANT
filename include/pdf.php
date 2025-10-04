
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
        }
        .form-control, .form-control-lg {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 12px 15px;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            border-color: #86b7fe;
        }
        .btn-success {
            background: linear-gradient(to right, #28a745, #20c997);
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        #card-details {
            transition: all 0.3s ease;
            border-radius: 10px;
        }
        .ticket-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #dee2e6;
        }
        .ticket-header {
            background: linear-gradient(to right, #0d6efd, #0dcaf0);
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            #ticket, #ticket * {
                visibility: visible;
            }
            #ticket {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .no-print {
                display: none !important;
            }
        }
        .cart-icon {
            position: relative;
        }
        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
    </style>


<!-- Navigation (simulée) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-utensils me-2"></i>Restaurant Delice
        </a>
        <div class="d-flex">
            <div class="cart-icon me-4">
                <i class="fas fa-shopping-cart fa-lg text-white"></i>
                <span class="cart-count">3</span>
            </div>
            <button class="btn btn-outline-light">
                <i class="fas fa-user me-2"></i>Connexion
            </button>
        </div>
    </div>
</nav>

<!-- Onglet Commander -->
<div class="tab-pane fade show active" id="order" role="tabpanel">
  <div class="container py-5">
    <div class="row g-4">
      <!-- Formulaire -->
      <div class="col-lg-6">
        <h2 class="mb-4 text-primary fw-bold">Commandez votre plat préféré</h2>
        <form id="order-form" novalidate>
          <div class="mb-3">
            <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-lg" id="name" placeholder="Entrez votre nom complet" required>
            <div class="invalid-feedback">Veuillez entrer votre nom.</div>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
            <input type="tel" class="form-control form-control-lg" id="phone" placeholder="05 00 00 00 00" inputmode="numeric" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" required>
            <div class="invalid-feedback">Numéro invalide (ex: 05 00 00 00 00).</div>
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Adresse de livraison <span class="text-danger">*</span></label>
            <textarea class="form-control form-control-lg" id="address" rows="3" placeholder="Ex: Rue des Oliviers, App 5, Alger" required></textarea>
            <div class="invalid-feedback">Veuillez entrer votre adresse.</div>
          </div>

          <div class="mb-3">
            <label for="notes" class="form-label">Instructions supplémentaires</label>
            <textarea class="form-control form-control-lg" id="notes" rows="2" placeholder="Sans oignon, livrer à l'interphone..."></textarea>
          </div>

          <!-- Mode de paiement -->
          <div class="mb-4">
            <label class="form-label d-block">Mode de paiement <span class="text-danger">*</span></label>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="payment" id="cash" value="cash" checked>
              <label class="form-check-label" for="cash">
                <i class="fas fa-money-bill-wave text-success me-2"></i>
                Paiement à la livraison (espèces)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment" id="card" value="card">
              <label class="form-check-label" for="card">
                <i class="fas fa-credit-card text-primary me-2"></i>
                Paiement par carte bancaire
              </label>
            </div>
          </div>

          <!-- Détails carte (cachés par défaut) -->
          <div id="card-details" class="p-4 border rounded bg-white shadow-sm" style="display: none;">
            <h6 class="mb-3 text-secondary"><i class="fas fa-lock me-2"></i>Sécurisé - Informations confidentielles</h6>
            <div class="mb-3">
              <label for="card-number" class="form-label">Numéro de carte</label>
              <input type="text" class="form-control form-control-lg" id="card-number" placeholder="1111 2222 3333 4444" inputmode="numeric" maxlength="19">
              <small class="text-muted">Entrez les 16 chiffres sans espaces.</small>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="expiry" class="form-label">Date d'expiration</label>
                <input type="text" class="form-control form-control-lg" id="expiry" placeholder="MM/AA" maxlength="5">
              </div>
              <div class="col-md-6 mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="password" class="form-control form-control-lg" id="cvv" placeholder="123" maxlength="4" autocomplete="off">
                <small class="text-muted">3 chiffres au dos de la carte.</small>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-success btn-lg w-100 py-3 fw-bold shadow-sm">
            <i class="fas fa-check-circle me-2"></i>Confirmer la commande
          </button>
        </form>

        <!-- Message de confirmation -->
        <div id="success-message" class="alert alert-success mt-4 d-none text-center fw-bold">
          <i class="fas fa-check-circle me-2"></i>
          Commande confirmée ! Nous vous contacterons bientôt.
        </div>
      </div>

      <!-- Informations livraison -->
      <div class="col-lg-6">
        <div class="card shadow-lg border-0 h-100">
          <div class="card-body d-flex flex-column">
            <div>
              <h5 class="card-title text-center mb-4 text-primary">
                <i class="fas fa-truck me-2"></i>Informations de livraison
              </h5>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-shopping-basket text-success me-2"></i> <strong>Commande minimum :</strong> 1000 DA</li>
                <li class="mb-2"><i class="fas fa-shipping-fast text-info me-2"></i> <strong>Frais de livraison :</strong> 200 DA</li>
                <li class="mb-2"><i class="fas fa-clock text-warning me-2"></i> <strong>Délai :</strong> 30 à 45 minutes</li>
                <li class="mb-2"><i class="fas fa-wallet text-primary me-2"></i> <strong>Paiement :</strong> Espèces ou Carte bancaire</li>
              </ul>
              <hr>
              <h5 class="card-title text-center mb-3 text-secondary">
                <i class="fas fa-calendar-alt me-2"></i>Heures d'ouverture
              </h5>
              <ul class="list-unstyled">
                <li class="mb-1"><i class="far fa-calendar-alt me-2"></i> <strong>Dimanche à jeudi :</strong> 11h - 23h</li>
                <li><i class="far fa-calendar-alt me-2"></i> <strong>Vendredi et samedi :</strong> 12h - 00h</li>
              </ul>
            </div>
            <div class="mt-auto pt-3 text-center">
              <p class="text-muted small mb-1">
                <i class="fas fa-shield-alt me-1"></i> Service sécurisé et fiable
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

<!-- Ticket d'achat (caché initialement) -->
<div id="ticket" class="container py-5 d-none">
  <div class="card shadow-lg border-0 mx-auto" style="max-width: 600px;">
    <div class="ticket-header">
      <h3 class="mb-0"><i class="fas fa-receipt me-2"></i>Ticket de Commande</h3>
      <p class="mb-0">Merci pour votre commande !</p>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-3">
        <div>
          <strong>Date:</strong> <span id="ticket-date"></span>
        </div>
        <div>
          <strong>Référence:</strong> #<span id="ticket-ref"></span>
        </div>
      </div>
      
      <h5 class="text-primary"><i class="fas fa-user me-2"></i>Informations client</h5>
      <p><strong>Nom :</strong> <span id="ticket-name"></span></p>
      <p><strong>Téléphone :</strong> <span id="ticket-phone"></span></p>
      <p><strong>Adresse :</strong> <span id="ticket-address"></span></p>
      <p><strong>Instructions :</strong> <span id="ticket-notes"></span></p>
      
      <hr>
      
      <h5 class="text-primary"><i class="fas fa-utensils me-2"></i>Détails de la commande</h5>
      <div id="ticket-items">
        <!-- Les éléments du panier seront injectés ici -->
      </div>
      
      <div class="mt-4">
        <div class="d-flex justify-content-between">
          <span>Sous-total:</span>
          <span id="ticket-subtotal">0 DA</span>
        </div>
        <div class="d-flex justify-content-between">
          <span>Frais de livraison:</span>
          <span>200 DA</span>
        </div>
        <div class="d-flex justify-content-between fw-bold fs-5 mt-2">
          <span>Total:</span>
          <span id="ticket-total">0 DA</span>
        </div>
      </div>
      
      <hr>
      
      <p><strong>Mode de paiement :</strong> <span id="ticket-payment"></span></p>
      <p><strong>Statut :</strong> <span class="badge bg-info">En préparation</span></p>
      
      <div class="alert alert-info mt-4">
        <i class="fas fa-info-circle me-2"></i>
        Votre commande sera livrée dans un délai de 30 à 45 minutes.
      </div>
      
      <div class="text-center mt-4 no-print">
        <button class="btn btn-primary me-2" onclick="window.print()">
          <i class="fas fa-print me-2"></i>Imprimer
        </button>
        <button class="btn btn-success" onclick="location.reload()">
          <i class="fas fa-plus-circle me-2"></i>Nouvelle commande
        </button>
      </div>
      
      <div class="text-center mt-4">
        <p class="text-muted small mb-0">
          <i class="fas fa-phone me-1"></i> Service client : 07 00 00 00 00
        </p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Afficher/masquer les détails de carte
  document.querySelectorAll('input[name="payment"]').forEach((radio) => {
    radio.addEventListener('change', function () {
      const cardDetails = document.getElementById('card-details');
      if (this.value === 'card') {
        cardDetails.style.display = 'block';
        cardDetails.classList.add('animate__animated', 'animate__fadeIn');
      } else {
        cardDetails.style.display = 'none';
      }
    });
  });

  // Formatage du numéro de carte (1111 2222 3333 4444)
  const cardNumber = document.getElementById('card-number');
  if (cardNumber) {
    cardNumber.addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      let formatted = '';
      for (let i = 0; i < value.length; i++) {
        if (i > 0 && i % 4 === 0) formatted += ' ';
        formatted += value[i];
      }
      e.target.value = formatted.slice(0, 19);
    });
  }

  // Formatage de la date d'expiration (MM/AA)
  const expiry = document.getElementById('expiry');
  if (expiry) {
    expiry.addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length >= 3) {
        e.target.value = value.slice(0, 2) + '/' + value.slice(2, 4);
      } else {
        e.target.value = value;
      }
    });
  }

  // Gestion de la soumission du formulaire
  const form = document.getElementById('order-form');
  const successMsg = document.getElementById('success-message');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Validation simple
    if (!form.checkValidity()) {
      e.stopPropagation();
      form.classList.add('was-validated');
      return;
    }

    // Générer un numéro de référence aléatoire
    const refNumber = Math.floor(100000 + Math.random() * 900000);
    
    // Récupérer la date actuelle
    const now = new Date();
    const options = { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' };
    const dateStr = now.toLocaleDateString('fr-FR', options);
    
    // Remplir le ticket avec les informations du formulaire
    document.getElementById('ticket-date').textContent = dateStr;
    document.getElementById('ticket-ref').textContent = refNumber;
    document.getElementById('ticket-name').textContent = document.getElementById('name').value;
    document.getElementById('ticket-phone').textContent = document.getElementById('phone').value;
    document.getElementById('ticket-address').textContent = document.getElementById('address').value;
    document.getElementById('ticket-notes').textContent = document.getElementById('notes').value || "Aucune";
    
    // Mode de paiement
    const paymentMethod = document.querySelector('input[name="payment"]:checked');
    document.getElementById('ticket-payment').textContent = 
      paymentMethod.value === 'cash' ? 'Paiement à la livraison (espèces)' : 'Carte bancaire';
    
    // Simuler des éléments de commande (à remplacer par votre propre logique de panier)
    const ticketItems = document.getElementById('ticket-items');
    ticketItems.innerHTML = `
      <div class="ticket-item">
        <div>Couscous Royal</div>
        <div>1 800 DA</div>
      </div>
      <div class="ticket-item">
        <div>Salade Méchouia</div>
        <div>600 DA</div>
      </div>
      <div class="ticket-item">
        <div>Boisson</div>
        <div>200 DA</div>
      </div>
    `;
    
    // Calculer les totaux
    document.getElementById('ticket-subtotal').textContent = '2 600 DA';
    document.getElementById('ticket-total').textContent = '2 800 DA';
    
    // Cacher le formulaire, afficher le ticket
    document.getElementById('order').style.display = 'none';
    document.getElementById('ticket').classList.remove('d-none');
  });
</script>
