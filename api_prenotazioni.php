<?php 
session_start();

header('Content-Type: application/json');
require_once 'connessione_db.php';

$prenotazioniUtente = [];

if(!isset($_SESSION['id_utente'])) {
    echo json_encode(['error' => 'Utente non autenticato.Effettua il login']);
    exit;
}

if(mysqli_connect_errno()) {
    error_log('Errore di connessione al database:' . mysqli_connect_error());
    echo json_encode(['error' => 'Connessione al database fallita. Riprova più tardi.']);
    exit;
}

$id_utente =$_SESSION['id_utente'];
$query = "SELECT 
p.id AS prenotazione_id,
e.nome AS nome_evento,
 date_format(e.data_evento, ' %d %M %Y - %H:%i') as data_evento_formattata,
 e.luogo AS luogo_evento,
  e.immagine_url, 
  p.data_prenotazione,
  p.numero_posti
          FROM prenotazioni p 
          JOIN eventi e ON p.id_evento = e.id 
          WHERE p.id_utente = '$id_utente' 
          ORDER BY p.data_prenotazione DESC";

          $result = mysqli_query($conn,$query);
          if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $dateTimePrenotazione = new DateTime($row['data_prenotazione']);
                $row['data_prenotazione_formattata_php'] = $dateTimePrenotazione->format('d M Y - H:i');
                $prenotazioniUtente[] = $row;
            }
            mysqli_free_result($result);
            echo json_encode($prenotazioniUtente);
          } else {
            $errorMessage = 'Errore nel recupero delle prenotazioni: ' .mysqli_error($conn);
            error_log('Errore API Prenotazioni: ' . $errorMessage);
          }
          if($conn) {
            mysqli_close($conn);
          }