<?php 

require_once 'connessione_db.php';

$prodotti = [];

$query = "SELECT id,nome,descrizione,prezzo,immagine_url,categoria FROM prodotti";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $prodotti[] = $row;
    }
    mysqli_free_result($result);
} else {
    echo "Errore nella query: " . mysqli_error($conn);
    $prodotti = ['error' => 'Impossibile recuperare i dati.'];
}
mysqli_close($conn);

echo json_encode($prodotti);


