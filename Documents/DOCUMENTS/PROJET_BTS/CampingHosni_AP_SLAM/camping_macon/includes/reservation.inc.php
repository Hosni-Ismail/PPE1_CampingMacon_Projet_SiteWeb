<?php

session_start();

//Fonction permettant de vérifier que les caractères sont dans les limites que nous leur fixons
function between($val, $x, $y){
    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;
}

if(isset($_POST['reserv-submit'])) { //Démmarer la procédure d'ajout si le bouton est déclenché

require 'dbh.inc.php';

    //Initialisation des variables
    $datedebut= htmlspecialchars($_POST['datedebut']);
    $datefin= htmlspecialchars($_POST['datefin']);
    $idmob= htmlspecialchars($_POST['mobilhome']);
    $idcli= htmlspecialchars($_SESSION['idcli']);
    $prenom= htmlspecialchars($_POST['prenom']);
    $nom= htmlspecialchars($_POST['nom']);
    $commentaires= htmlspecialchars($_POST['commentaires']);

    //Gestion des erreur de saisie
    if(empty($prenom) || empty($nom) || empty($datedebut) || empty($datefin)) {
        header("Location: ../reservation.php?error3=emptyfields");
        exit();
    }
        else if(!preg_match("/^[a-zA-Z \p{L}]+$/ui", $prenom) || !between($prenom,2,20)) {
        header("Location: ../reservation.php?error3=invalidfname");
        exit();
    }
        else if(!preg_match("/^[a-zA-Z \p{L}]+$/ui", $nom) || !between($nom,2,40)) {
        header("Location: ../reservation.php?error3=invalidlname");
        exit();
    }

        else if ( $idmob == "-- Séléctionnez un mobil-home --"  ) {
        header("Location: ../reservation.php?error3=emptyfields");
        exit();
    }
    
    else{
        //Ajout de la reservation dans la bdd
         $sql = "INSERT INTO reservation(datedebut, datefin, idmob, idcli, prenom, nom, commentaires) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../reservation.php?error3=sqlerror1");
                    exit();
                }
                else {       
                    mysqli_stmt_bind_param($stmt, "ssiisss", $datedebut, $datefin, $idmob, $idcli, $prenom, $nom, $commentaires);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../reservation.php?reservation=success");
                    exit();
                }
        }
    
    //Fin de la procedure de reservation
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
    


    


