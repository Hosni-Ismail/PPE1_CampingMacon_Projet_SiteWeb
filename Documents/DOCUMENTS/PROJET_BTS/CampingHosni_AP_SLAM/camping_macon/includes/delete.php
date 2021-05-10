<?php

// Supprimer des réservation
// Gestion des erreurs
if(isset($_POST['delete-submit'])) {
 
 require 'dbh.inc.php';
 
 $reservation_id = htmlspecialchars($_POST['reserv_id']);
    
 $sql = "DELETE FROM reservation WHERE idres =$reservation_id";
if (mysqli_query($conn, $sql)) {
    header("Location: ../view_reservations.php?delete=success");
} else {
    header("Location: ../view_reservations.php?delete=error");
}
}

//Supprimer des clients pour le compte admin
// Gestion des erreurs
if(isset($_POST['delete-client'])) {
 
    require 'dbh.inc.php';
    
   $client_id = htmlspecialchars($_POST['client_id']);
       
    $sql = "DELETE FROM client WHERE idcli =$client_id";
   if (mysqli_query($conn, $sql)) {
       header("Location: ../view_reservation.php?delete=success");
   } else {
       header("Location: ../view_reservation.php?delete=error");
   }
   }
// Fin de la procedure
mysqli_close($conn);
?>

    


