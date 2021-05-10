<?php
if (isset($_POST['login-submit'])) {
    
    require 'dbh.inc.php';
    
    $mailuid = htmlspecialchars($_POST['mailuid']);
    $password = htmlspecialchars($_POST['pwd']);
    
    
    if(empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error1=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM client WHERE pseudo=? OR mail=?";     //Verifier si les données saisis match avec celles de la bdd
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error1=error");
        exit();
        }
        else {
            
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['motpasse']);   //Vérification du mot de passe
                if($pwdCheck == false){
                    header("Location: ../index.php?error1=wrongpwd");   //Message d'erreur si il ne match pas
                    exit();   
                }
                else if($pwdCheck == true) {
                    session_start();   
                    // Création des sessions
                   $_SESSION['idcli'] = htmlspecialchars($row['idcli']);
                   $_SESSION['nomcli'] = htmlspecialchars($row['nomcli']);
                   $_SESSION['prenomcli'] = htmlspecialchars($row['prenomcli']);
                   $_SESSION['pseudo'] = htmlspecialchars($row['pseudo']);
                   $_SESSION['role'] = htmlspecialchars($row['role_id']);
                    
                    //Gestion des erreurs
                    
                    header("Location: ../reservation_check.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error1=error2");
                    exit();    
                }
            }
            else{
                header("Location: ../index.php?error1=nouser");
                exit();
            }
        }
    }
    
}
else{
    header("Location: ../index.php");
    exit();
}

