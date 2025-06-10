<?php
session_start();
header('Content-Type: application/json'); 

require_once 'connessione_db.php'; 


$errors = [];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $errors[] = "Metodo di richiesta non valido.";
}


if (empty($_POST)) {
    $errors[] = "Nessun dato ricevuto dal form.";
} else {
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $cognome = isset($_POST['cognome']) ? trim($_POST['cognome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : ''; 
    $messaggio = isset($_POST['messaggio']) ? trim($_POST['messaggio']) : '';
    $privacy_accettata = isset($_POST['privacy']) ? true : false; 

   
    if (empty($nome)) {
        $errors[] = "Il campo Nome è obbligatorio.";
    }
    if (empty($cognome)) {
        $errors[] = "Il campo Cognome è obbligatorio.";
    }
    if (empty($email)) {
        $errors[] = "Il campo Email è obbligatorio.";
    }
    if (empty($messaggio)) {
        $errors[] = "Il campo Messaggio è obbligatorio.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'indirizzo email non è valido.";
    }
    if (!$privacy_accettata) {
        $errors[] = "Devi accettare l'informativa sulla Privacy.";
    }
}


if (!empty($errors)) {
    echo json_encode(['success' => false, 'error' => implode(" ", $errors)]);
    if (isset($conn) && $conn) {
        $conn->close();
    }
    exit();
}


if (!$conn) {
    error_log("Errore: Connessione al database non disponibile in messaggio_contatto.php.");
    echo json_encode(['success' => false, 'error' => 'Errore di connessione al database. Riprova più tardi.']);
    exit();
}

$nome_escaped = mysqli_real_escape_string($conn, $nome);
$cognome_escaped = mysqli_real_escape_string($conn, $cognome);
$email_escaped = mysqli_real_escape_string($conn, $email);
$telefono_escaped = mysqli_real_escape_string($conn, $telefono);
$messaggio_escaped = mysqli_real_escape_string($conn, $messaggio);



$query = "INSERT INTO messaggi_contatto (nome, cognome, email, telefono, messaggio) VALUES (
    '" . $nome_escaped . "',
    '" . $cognome_escaped . "',
    '" . $email_escaped . "',
    '" . $telefono_escaped . "',
    '" . $messaggio_escaped . "'
)";

if (mysqli_query($conn, $query)) {
     echo json_encode(['success' => true, 'message' => 'Messaggio inviato con successo!']);
} else {
    error_log("Errore di inserimento messaggio nel database: " . mysqli_error($conn));
    echo json_encode(['success' => false, 'error' => 'Si è verificato un errore durante l\'invio del messaggio. Riprova più tardi.']);
}

if ($conn) {
    mysqli_close($conn);
}
?>
