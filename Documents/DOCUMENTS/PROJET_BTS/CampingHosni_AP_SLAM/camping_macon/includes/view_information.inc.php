<?php


if(isset($_SESSION['idcli'])){ //Récupère les donnéés de l'utilisateur connecté 
    
    require 'includes/dbh.inc.php';

    //Initialisation des variables
    $user = htmlspecialchars($_SESSION['idcli']);
    $role = htmlspecialchars($_SESSION['role']);
    
    if($role==1){ // Si utilisateur non admin est connecter 
    $sql = "SELECT * FROM client WHERE idcli = $user";
    //Récuperer les informations du client connecté     
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { //Afficher ses informations dans un tableau
         
        echo
        '
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Code Postal</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Adresse e-mail</th>
                        <th scope="col">Date de création du comptel</th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                    <form action='includes/delete.php' method='POST'>
                    <input name='client_id' type='hidden' value=".htmlspecialchars($row["idcli"]).">
                      <th scope='row'>".htmlspecialchars($row["prenomcli"])." ".htmlspecialchars($row["nomcli"])."</th>
                      <td>".htmlspecialchars($row["adresse"])."</td>
                      <td>".htmlspecialchars($row["ville"])."</td>
                      <td>".htmlspecialchars($row["cp"])."</td>
                      <td>".htmlspecialchars($row["telephone"])."</td>
                      <td>".htmlspecialchars($row["mail"])."</td>
                      <td>".htmlspecialchars($row["reg_date"])."</td>
              </tbody>";
            
        }   
        echo "</table>";
    
    
    }
    else {    echo "<p class='text-white text-center bg-danger'>Il n'y à aucun compte!<p>"; }
    }
    
    else if($role==2){ // Si l'admin est connecter
    $sql = "SELECT * FROM client";
    //Récuperer les information de tout les clients     
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { //Afficher leurs informations dans un tableau
         
        echo
        '
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Code Postal</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Adresse e-mail</th>
                        <th scope="col">Date de création du comptel</th>
                        <th class="table-danger" scope="col"></th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                    <form action='includes/delete.php' method='POST'>
                    <input name='client_id' type='hidden' value=".htmlspecialchars($row["idcli"]).">
                      <th scope='row'>".htmlspecialchars($row["prenomcli"])." ".htmlspecialchars($row["nomcli"])."</th>
                      <td>".htmlspecialchars($row["adresse"])."</td>
                      <td>".htmlspecialchars($row["ville"])."</td>
                      <td>".htmlspecialchars($row["cp"])."</td>
                      <td>".htmlspecialchars($row["telephone"])."</td>
                      <td>".htmlspecialchars($row["mail"])."</td>
                      <td>".htmlspecialchars($row["reg_date"])."</td>
                      <td class='table-danger'><button type='submit' name='delete-client' class='btn btn-danger btn-sm'>Supprimer</button></td>
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


