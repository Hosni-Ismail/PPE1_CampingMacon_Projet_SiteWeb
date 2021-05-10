<?php

////Fonction permettant de vérifier que les caractères sont dans les limites que nous leur fixons
function between($val, $x, $y){
    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;
}

if(isset($_POST['signup-submit'])) {      //Démmarer la procédure d'ajout si le bouton est déclenché

    
    require 'dbh.inc.php';
    
    //Initialisation des variables
    $pseudo = htmlspecialchars($_POST['uid']);
    $email = htmlspecialchars($_POST['mail']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $ville =  htmlspecialchars($_POST['ville']);
    $cp = htmlspecialchars($_POST['cp']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $password = htmlspecialchars($_POST['pwd']);
    $passwordRepeat = htmlspecialchars($_POST['pwd-repeat']);
    
    //Gestion des erreur de saisie
    if(empty($pseudo) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z \p{L}]+$/ui", $pseudo)){
        header("Location: ../index.php?error=invalidemailusername");
        exit();  
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidemail");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z \p{L}]+$/ui", $pseudo) || !between($pseudo,4,20)) {
        header("Location: ../index.php?error=invalidusername");
        exit();
    }
    else if(!between($password,6,20)) {
        header("Location: ../index.php?error=invalidpassword");
        exit();
    }
    else if($password !== $passwordRepeat){
       header("Location: ../index.php?error=passworddontmatch");
       exit();
    }

   else {
       //Vérifie si il n'existe pas déjà de compte avec le même pseudo ou adresse mail
       $sql = "SELECT pseudo, mail FROM client WHERE pseudo=? OR mail=?";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("Location: ../index.php?error=error1");
           exit();
       }
       else {
           mysqli_stmt_bind_param($stmt, "ss", $pseudo, $email);    
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
             if($resultCheck != 0){
                header("Location: ../index.php?error=usernameemailtaken");
                exit();
           }
          
           
           else {
            //Ajout du nouveau client dans la bdd
            $sql = "INSERT INTO client(pseudo, mail, nomcli, prenomcli, adresse, ville, cp, telephone, motpasse) VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../index.php?error=error2");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                            
                    //Crypte le mot de passe afin de le sécurisé contres les injections sql        
                    mysqli_stmt_bind_param($stmt, "sssssssss", $pseudo, $email, $nom, $prenom, $adresse, $ville, $cp, $telephone, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
                
           }
           
       }
   } 
   //Fin de la procedure d'insciption
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
   
}
//Renvois l'utilisateur dans la page d'acceuil
else{
    header("Location: ../index.php");
    exit();
    
}