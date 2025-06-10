<?php
session_start();

$errore = false; 


if (isset($_SESSION['id_utente'])) {
    header("Location: profilo.php");
    exit; 
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $conn = mysqli_connect("localhost", "root", "", "sapori_del_vigneto");
    if (mysqli_connect_errno()) {
        die("Connessione al database fallita: " . mysqli_connect_error());
    }

    $username_input = mysqli_real_escape_string($conn, $_POST['username']);
    $password_input = mysqli_real_escape_string($conn, $_POST['password']);


    $query = "SELECT id,username FROM utenti WHERE username = '" . $username_input . "' AND password = '" . $password_input . "'";
    
    $res = mysqli_query($conn, $query); 

    if($res === false) {
        echo "Errore nella query: " . mysqli_error($conn);
    mysqli_close($conn);
    exit;
}

    
    if (mysqli_num_rows($res) > 0) {
        $res = mysqli_fetch_assoc($res);
        
        $_SESSION['id_utente'] = $res['id'];
        $_SESSION['username'] = $res['username'];
        
        
        header("Location: profilo.php");
        exit; 
    } else {
        
        $errore = true;
    }

    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accedi - I Sapori Del Vigneto</title>
    <link rel="stylesheet" href="mhw3.css"> 
    <link rel="stylesheet" href="login.css">
    <script src="login.js" defer></script> 
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
                    <li><a href="contatti.php" class="current">CONTATTI</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <div class="search-bar-container"> 
                    <input type="text" id ="search-input" placeholder="Cerca il tuo prodotto qui">
                    <button id="search-button"><i class="fas fa-search"></i></button>
                </div>
                <a href="<?php echo isset($_SESSION['username']) ? 'profilo.php' : 'login.php'; ?>"><i class="fas fa-user"></i></a>
                <a href="carrello.php" class="cart"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>         
    </header>

    <main class="container">
        <section class="accedi-container">
            <h2>Accedi</h2>
            <p style="text-align: center; margin-top: 15px;">
                Non hai ancora il tuo profilo? <a href="registrazione.php" class="account-link">Registrati</a>
            </p>

            <?php 
            if ($errore) {
                echo "<div class='errore-message'>Credenziali non valide.</div>";
            }
            ?>

            <form action="" method="post"> 
                <div class="form-group">
                    <label for="username"></label> <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password"></label> <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                
                <button type="submit" class="accedi-button">Accedi</button>
                </form>
            
            <p style="text-align: center; margin-top: 15px;">
                Hai dimenticato la password? <a href="#" class="account-link">Recuperala</a>
            </p>
            <div id="user-area" style="display: none;">
                <p>Benvenuto, <span id="logged-in-user"></span>!</p>
                <button id="logout-button">Logout</button>
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
