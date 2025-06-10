<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I Sapori Del Vigneto</title>
    <link rel="stylesheet" href="mhw3.css">
    <script src="mhw3.js"defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="container header-inner">
            <div class="logo">
                <a href="index.php">I Sapori Del Vigneto</a>
            </div>
            <button class="hamburger">
                <i class="fas fa-bars"></i>
            </button>

            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="chi_siamo.html">CHI SIAMO</a></li>
                    <li><a href="eventi.html">EVENTI</a></li>
                    <li><a href="shop.html">SHOP</a></li>
                    <li><a href="contatti.php">CONTATTI</a></li>
                </ul>

             </nav>
             <div class="header-icons">
                <div class="search-bar-container"> <input type="text" id ="search-input" placeholder="Cerca il tuo prodotto qui">
                    <button id="search-button"><i class="fas fa-search"></i></button>
                </div>
              <a href="login.php"><i class="fas fa-user"></i></a>
              <a href="carrello.php"class="cart"><i class="fas fa-shopping-cart"></i></a>
             </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-image">
            <img id="hero-img" src="cantina.jpg" alt="Ambiente cantina" data-hover-src="cantina2.jpg">
        </div>
        <div class="hero-content">
            <h1>Il Gusto Autentico della Sicilia</h1>
            <p>Scopri la nostra selezione esclusiva di vini pregiati.</p>
            <a href="shop.html" class="button">Esplora la Nostra Cantina</a>
        </div>
    </section>

    <main class="container">
        <section   id ="eventi-section" class="eventi">
            <h2>I Nostri Eventi</h2>
            <div class="eventi-content">
                <div class="eventi-image">
                    <img src="sommelier.jpg" alt="Sommelier">
                </div>
                <div class="eventi-text">
                    <p class="testo-completo"data-testo-originale="Il testo completo dell'evento...">
                    Lasciati avvolgere dall'atmosfera unica de "I Sapori Del Vigneto" durante le nostre serate evento. Immagina di degustare vini pregiati in un ambiente accogliente, magari accompagnati da prelibatezze locali e dalla calda ospitalità siciliana. Ogni evento è un'occasione per vivere momenti indimenticabili all'insegna del gusto e della tradizione.
                    </p>
                    <a href="eventi.html" class="button secondary">Scopri di Più</a>
                </div>
            </div>
        </section>

        <section class="featured-products">
            <h2>La Nostra Selezione</h2>
            <div class="product-grid">
                <article class="product-card"data-descrizione="Un buon Vino.."data-prezzo="16.99">
                    <img src="rosso.jpeg" alt="Nome Vino Rosso 1">
                    <h3>Vino Rosso </h3>
                    <span class="product-category">Vino Rosso</span>
                    <div class="product-action">
                    <button class="button small visualizza-prodotto">Visualizza</button>
                    <button class="button small preferito-btn">Aggiungi ai Preferiti</button>
                    <button class="button small acquista-btn">Acquista</button>
                </div>
                <div class="dettagli-prodotto hidden">
                    <p class="descrizione"></p>
                    <p class="prezzo"></p>
                </div>
                </article>
                <article class="product-card" data-descrizione="Un buon Vino.."data-prezzo="16.99">
                    <img src="bianco.jpeg" alt="Nome Vino Bianco 1">
                    <h3>Vino Bianco</h3>
                    <span class="product-category">Vino Bianco</span>
                    <div class="product-action">
                    <button class="button small visualizza-prodotto">Visualizza</button>
                    <button class="button small preferito-btn">Aggiungi ai Preferiti</button>
                    <button class="button small acquista-btn">Acquista</button>
                    </div>
                    <div class="dettagli-prodotto hidden">
                        <p class="descrizione"></p>
                        <p class="prezzo"></p>
                    </div>
                </article>
                <article class="product-card" data-descrizione="Un buon Vino.."data-prezzo="16.99">
                    <img src="rosato.jpeg" alt="Nome Vino Rosato">
                    <h3>Vino Rosato</h3>
                    <span class="product-category">Vino Rosato</span>
                    <div class="product-action">
                    <button class="button small visualizza-prodotto">Visualizza</button>
                    <button class="button small preferito-btn">Aggiungi ai Preferiti</button>
                    <button class="button small acquista-btn">Acquista</button>
                    </div>
                    <div class="dettagli-prodotto hidden">
                        <p class="descrizione"></p>
                        <p class="prezzo"></p>
                    </div>
                </article>
                <article class="product-card" data-descrizione="Un buon Vino.."data-prezzo="16.99">
                    <img src="prosecco_1.jpeg" alt="Prosecco" >                    
                    <h3>Vino Prosecco</h3>
                    <span class="product-category">Vino Prosecco</span>
                    <div class="product-action">
                    <button class="button small visualizza-prodotto">Visualizza</button>
                    <button class="button small preferito-btn">Aggiungi ai Preferiti</button>
                    <button class="button small acquista-btn">Acquista</button>
                    </div>
                    <div class="dettagli-prodotto hidden">
                        <p class="descrizione"></p>
                        <p class="prezzo"></p>
                    </div>
                </article>
                <article class="product-card" data-descrizione="Un buon Vino.."data-prezzo="16.99">
                    <img src="spumante.jpeg" alt="Spumante">
                    <h3>Vino Spumante</h3>
                    <span class="product-category">Vino Spumante</span>
                    <div class="product-action">
                    <button class="button small visualizza-prodotto">Visualizza</button>
                    <button class="button small preferito-btn">Aggiungi ai Preferiti</button>
                    <button class="button small acquista-btn">Acquista</button>
                    </div>
                    <div class="dettagli-prodotto hidden">
                        <p class="descrizione"></p>
                        <p class="prezzo"></p>
                    </div>
                </article>
            </div>
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
                <p>&copy; 2025 I Sapori Del Vigneto - Tutti i diritti riservati.</p>
            </div>
        </div>
    </footer>
</body>
</html>

