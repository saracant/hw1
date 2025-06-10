<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti - I Sapori Del Vigneto</title>
    <link rel="stylesheet" href="mhw3.css">
    <link rel="stylesheet" href="contatti.css">
    <script src="contatti.js"defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="container header-inner">
            <div class="logo">
                <a href="mhw3.html">I Sapori Del Vigneto</a>
            </div>
            <button class="hamburger">
                <i class="fas fa-bars"></i>
            </button>

            <nav class="main-nav">
                <ul>
                    <li><a href="mhw3.html">HOME</a></li>
                    <li><a href="#">CHI SIAMO</a></li>
                    <li><a href="eventi.html">EVENTI</a></li>
                    <li><a href="shop.html">SHOP</a></li>
                    <li><a href="contatti.html"class="current">CONTATTI</a></li>
                </ul>

             </nav>
             <div class="header-icons">
                 <div class="search-bar-container"> <input type="text" id ="search-input" placeholder="Cerca il tuo prodotto qui">
                    <button id="search-button"><i class="fas fa-search"></i></button>
                </div>
              <a href="profilo.php"><i class="fas fa-user"></i></a>
              <a href="carrello.php"class="cart"><i class="fas fa-shopping-cart"></i></a>
             </div>
        </div>
    </header>

    <main class="container contact-container">
        <section class="contact-info">
            <h2>Informazioni di Contatto</h2>
            <p><i class="fas fa-map-marker-alt"></i>Indirizzo: Via Del Vigneto 456, 00000 Catania </p>
            <p><i class="fas fa-phone"></i> Telefono: 012 3456789</p>
            <p><i class="fas fa-envelope"></i> Email: isaporidelvigneto@Vigneto.it</p>
            <p><i class="far fa-clock"></i> Orari di Apertura: Lunedì - Venerdì, 9:00 - 18:00</p>
        </section>

        <section class="contact-form">
            <h2>Scrivici un Messaggio</h2>
            <form id="contactForm" action="#" method="POST">
                <div>
                    <label for="nome"></label>
                    <input type="text" id="nome" name="nome" placeholder="Nome" required>
                </div>
                <div>
                    <label for="cognome"></label>
                    <input type="text" id="cognome" name="cognome" placeholder="Cognome" required>
                </div>
                <div>
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="telefono"></label>
                    <input type="text" id="telefono" name="telefono" placeholder="Telefono" required>
                </div>
                <div>
                    <label for="messaggio"></label>
                    <textarea id="messaggio" name="messaggio" rows="10" placeholder="Scrivi il tuo messaggio" required></textarea>
                </div>
                <div class="privacy-agreement">
                    <input type="checkbox" id="privacy" nome="privacy" required>
                    <label for="privacy">
                        Ho letto l'informativa sulla Privacy...
                    </label>
                </div>
                <button type="submit">Invia</button>
            </form>
            <div id="responseMessage" style="margin-top: 10px;"></div>
        </section>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="footer-contact">
                <h3>Contatti</h3>
                <p>Indirizzo: Via Del Vigneto 456</p>
                <p>Telefono: 012 3456789</p>
                <p>Email: isaporidelvigneto@Vigneto.it</p>
            </div>
            <div class="footer-links">
                <h3>Link Utili</h3>
                <ul>
                    <li><a href="#">Spedizioni e Pagamenti</a></li>
                    <li><a href="#">Resi e Rimborsi</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Termini e Condizioni</a></li>
                </ul>
            </div>
            <div class="footer-copyright">
                <p>© 2025 I Sapori Del Vigneto - Tutti i diritti riservati.</p>
            </div>
        </div>
    </footer>
</body>
</html>
