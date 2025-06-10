<?php 

header('Content-Type: application/json');
require_once 'connessione_db.php';
$eventi = [];

$query = "SELECT id, nome, descrizione, DATE_FORMAT(data_evento, '%d %M %Y - %H:%i') AS data_formattata,luogo, immagine_url, posti_disponibili FROM eventi ORDER BY data_evento DESC";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventi[] = $row;
    }
    mysqli_free_result($result);
} else {
    echo json_encode(['error' => 'Impossibile recuperare i dati: '. mysqli_error($conn)]);
    exit;
}

mysqli_close($conn);
echo json_encode($eventi);


