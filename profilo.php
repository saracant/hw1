<?php

session_start();

if(!isset($_SESSION['id_utente']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];

require_once 'connessione_db.php';

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo Utente - I Sapori Del Vigneto</title>
     <link rel="stylesheet" href="mhw3.css"> 
     <link rel="stylesheet" href="profilo.css">
     <script src="profilo.js" defer></script>
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
    <main class="profilo-container">
        <selection class="profilo-selection">
            <h1> Il Mio Profilo!</h1>
            <div class="user-info">
                <p><strong>Nome Utente:</strong> <?php echo htmlspecialchars($username); ?></p>
            </div>
            <hr> <h2>Le mie Prenotazioni</h2>
            <div id="prenotazioni-list" class="prenotazioni-grid">
                <p>Caricamento prenotazioni...</p>
            </div>
        </selection>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>
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