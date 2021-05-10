
<?php

if(isset($_SESSION['idcli'])){ //Récupère les donnéés de l'utilisateur connecté 
    
    require 'includes/dbh.inc.php';

    //Initialisation des variables
    $user =  htmlspecialchars($_SESSION['idcli']);
    $role = htmlspecialchars($_SESSION['role']);
    
    if($role==1){ // Si utilisateur non admin est connecter 
    //Récuperer les réservations du client connecté
    $sql = "SELECT * FROM reservation INNER JOIN mobilhome ON reservation.idmob = mobilhome.idmob WHERE idcli = $user";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { //Afficher ses réservations dans un tableau
        
        
        echo
        '
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Arrivé - Départ</th>
                        <th scope="col">Mobil-home</th>
                        <th scope="col">Date de la réservation</th>
                        <th scope="col">Commentaires</th>
                        <th class="table-danger" scope="col"></th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                    <form action='includes/delete.php' method='POST'>
                    <input name='reserv_id' type='hidden' value=".htmlspecialchars($row["idres"]).">
                      <th scope='row'>".htmlspecialchars($row["prenom"])." ".htmlspecialchars($row["nom"])."</th>
                      <td>".htmlspecialchars($row["datedebut"])." - ".htmlspecialchars($row["datefin"])."</td>
                      <td>".htmlspecialchars($row["nom"])."</td>
                      <td>".htmlspecialchars($row["dateres"])."</td>
                      <td><textarea readonly>".htmlspecialchars($row["commentaires"])."</textarea></td>
                      <td class='table-danger'><button type='submit' name='delete-submit' class='btn btn-danger btn-sm'>Supprimer</button></td>
                          </form>
                    </tr>
              </tbody>";
            
        }   
        echo "</table>";
    
    
    }
    else {    echo "<p class='text-white text-center bg-danger'>Vous avez aucunes réservation!<p>"; }
    }
    
    
    else if($role==2){ // Si l'admin est connecter
    //Récuperer les réservations de tout les clients     
    $sql = "SELECT * FROM reservation INNER JOIN mobilhome ON reservation.idmob = mobilhome.idmob";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { //Afficher leurs réservations dans un tableau
        
        echo
        '
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Arrivé - Départ</th>
                        <th scope="col">Mobil-home</th>
                        <th scope="col">Date de la réservation</th>
                        <th scope="col">Comments</th>
                        <th class="table-danger" scope="col"></th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                    <form action='includes/delete.php' method='POST'>
                    <input name='reserv_id' type='hidden' value=".htmlspecialchars($row["idres"]).">
                    <th scope='row'>".htmlspecialchars($row["prenom"])." ".htmlspecialchars($row["nom"])."</th>
                    <td>".htmlspecialchars($row["datedebut"])." - ".htmlspecialchars($row["datefin"])."</td>
                    <td>".htmlspecialchars($row["nom"])."</td>
                    <td>".htmlspecialchars($row["dateres"])."</td>
                    <td><textarea readonly>".htmlspecialchars($row["commentaires"])."</textarea></td>
                    <td class='table-danger'><button type='submit' name='delete-submit' class='btn btn-danger btn-sm'>Supprimer</button></td>
                          </form>
                    </tr>
              </tbody>";
            
        }   
        echo "</table>";
    
    
    }
    else {    echo "<p class='text-white text-center bg-danger'>Il n'y a aucunes réservation!<p>"; }
    
    }
    
// Fin de la procedure
mysqli_close($conn);
}


