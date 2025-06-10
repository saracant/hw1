<?php

$conn = mysqli_connect("localhost","root","","sapori_del_vigneto");
if($conn === false){
    die("ERRORE: Impossibile connettersi al database." . mysqli_connect_error());
}

?>