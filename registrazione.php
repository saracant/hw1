<?php 
session_start();

require_once 'connessione_db.php';

$messaggio_errore = "";

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome =mysqli_real_escape_string($conn,$_POST['nome']);
    $cognome = mysqli_real_escape_string($conn,$_POST['cognome']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];
    $ripeti = $_POST['ripeti'];

    if (empty($nome) || empty($cognome) || empty($username) || empty($email) || empty($password) || empty($ripeti)) {
        $messaggio_errore = "Tutti i campi sono obbligatori.";
    } else if (strlen($password) < 6) {
        $messaggio_errore = "La password deve contenere almeno 6 caratteri!";
    } else if ($password !== $ripeti) {
        $messaggio_errore = "Le password non corrispondono.";
    } else {
        $query = "SELECT * FROM utenti WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $messaggio_errore = "Username già esistente. Scegli un altro username.";
        } else {
            $password_hashed = password_hash($password_raw, PASSWORD_DEFAULT); 
            $query = "INSERT INTO utenti (nome, cognome, username, email, password) VALUES ('$nome', '$cognome', '$username', '$email', '$password')";
            if (mysqli_query($conn, $query)) {

                $user_id = mysqli_insert_id($conn); 
                $_SESSION['id_utente'] = $user_id;
                $_SESSION['username'] = $username;
                echo "Registrazione avvenuta con successo! Reindirizzamento al profilo...";
                header("Location: profilo.php");
                exit;
            } else {
                $messaggio_errore = "Errore durante la registrazione: " . mysqli_error($conn);
            }
        }
    }
}
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati - I Sapori Del Vigneto</title>
    <link rel="stylesheet" href="mhw3.css"> 
    <link rel="stylesheet" href="registrazione.css">
    <script src="registrazione.js" defer></script>
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
                    <li><a href="contatti.php"class="current">CONTATTI</a></li>
                </ul>

             </nav>
             <div class="header-icons">
                 <div class="search-bar-container"> <input type="text" id ="search-input" placeholder="Cerca il tuo prodotto qui">
                    <button id="search-button"><i class="fas fa-search"></i></button>
                </div>
              <a href="#"><i class="fas fa-user"></i></a>
              <a href="carrello.php"class="cart"><i class="fas fa-shopping-cart"></i></a>
             </div>
        </div>        
        </header>

    <main class="container">
     <section class="registration-container">
        <h2>Registrati</h2>
        <form id="registration-form" method="post" action="registrazione.php">
             <div class="form-group">
                <label for="nome"></label>
                <input type="text" id="nome" name="nome" placeholder="Nome*" required>
            </div>
            <div class="form-group">
                <label for="cognome"></label>
                <input type="text" id="cognome" name="cognome" placeholder="Cognome*" required>
            </div>
            <div class="form-group">
                <label for="username"></label>
                <input type="text" id="username" name="username" placeholder="Username*" required>
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="Email*" required>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Password*" required>
            </div>
            <div class="form-group">
                <label for="ripeti"></label>
                <input type="password" id="ripeti" name="ripeti" placeholder="Ripeti password*"required>
            </div>
            <button type="submit" class="register-button">Registrati</button>
            <?php if (!empty($messaggio_errore)): ?>
            <p id="registration-message"><?php echo $messaggio_errore; ?></p>
            <?php endif; ?>
        </form>
        <p style="text-align: center; margin-top: 15px;">
            Hai già un account? <a href="login.php" class="login-link">  Accedi</a>
        </p>
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