<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon.ico">  <!--favicon-->
<title>Mâcon Camping</title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css">  <!--style.css document-->
  <link href="css/font-awesome.min.css" rel="stylesheet"> <!--police-awesome-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <!--bootstrap-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--googleapis jquery-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--police-awesome-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  <!--bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script> <!--bootstrap-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> <!--bootstrap-->
</head>
<style>
.flex-column { 
       max-width : 260px;
   }
           
.container {
            background: #f9f9f9;
        }
      
.img {
            margin: 5px;
        }

.logo img{
	 width:250px;
	 height:250px;
	margin-top:150px;
	margin-bottom:40px;
}
</style>

<body>
 <!---navbar--->   
<nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
		<strong><em>Mâcon Camping</em></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navi">
                <ul class="navbar-nav mr-auto">
                    
                    
                    <?php
                    //Header après connexion
                    if(isset($_SESSION['idcli'])){ echo'
                    <li class="nav-item">
                        <a class="nav-link" href="mobilhome_check.php" >Disponibilités Mobil-home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservation_check.php" >Nouvelle réservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_reservations.php" >Consulter réservation</a>
                    </li>';

                    }
                    //Header avant connexion
                    else { echo'
                    <li class="nav-item">
	                 <a class="nav-link" href="#presentation">Présentation</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#typmob">Nos Mobil-homes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reservation">Réservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Contact</a>
                    </li>
                    '; } 
                    ?>
                    
                </ul>
                
                    <?php
                    //Boutton déconnexion
                    if(isset($_SESSION['idcli'])){
                    echo '
                    <form class="navbar-form navbar-right" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit" class="btn btn-outline-dark">Déconnexion, '. htmlspecialchars($_SESSION['pseudo']).'</button>
                    </form>';
                    }
                    else{  
                    echo '
                    <div>
                    <ul class="navbar-nav ml-auto">
                    <li><a class="nav-link fa fa-sign-in" data-toggle="modal" data-target="#myModal_reg">&nbsp;Inscription</a></li>
                    <li><a class="nav-link fa fa-user-plus" data-toggle="modal" data-target="#myModal_login">&nbsp;Connexion</a></li>
                    </ul> 
                    </div>
                    ';} 
                    ?>
              
            </div>
        </div>
</nav>

<div class="container">
  <!-- Création du menu modal pour les onglet connexion et inscription -->                          
    <div class="modal fade" id="myModal_login">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Connexion</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            
            <?php
            if(isset($_GET['error1'])){
        
            //Script pour que le modal s'affiche toujours même en cas d'erreur
            echo '  <script>
                    $(document).ready(function(){
                    $("#myModal_login").modal("show");
                    });
                    </script> ';
        
            //Gestion d'erreur pour la connexion
        
            if($_GET['error1'] == "emptyfields") {   
            echo '<h5 class="text-danger text-center">Remplissez tous les champs, Veuillez ressayer!</h5>';
            }
            else if($_GET['error1'] == "error") {   
            echo '<h5 class="text-danger text-center">Erreur, Veuillez ressayer!</h5>';
            }
            else if($_GET['error1'] == "wrongpwd") {   
                echo '<h5 class="text-danger text-center">Mot de passe incorrect, Veuillez ressayer!!</h5>';
            }
            else if($_GET['error1'] == "error2") {   
                echo '<h5 class="text-danger text-center">Erreur, Veuillez ressayer!</h5>';
            }
            else if($_GET['error1'] == "nouser") {   
                echo '<h5 class="text-danger text-center">Compte inexistant, Veuillez ressayer!!</h5>';
                }
            }
            echo'<br>';
            ?>  
            
                    <div class="signin-form">
                    <form action="includes/login.inc.php" method="post">
                        <p class="hint-text">Si vous n'avez pas de compte <a data-toggle="modal" href="#myModal_reg">inscrivez vous</a>.</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mailuid" placeholder="Pseudo ou e-mail" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Connexion</button>
                    </div>
                            </form>
                    </div>   
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div> 
</div>

    
<div class="container">
  <!-- Le Modal -->
    <div class="modal fade" id="myModal_reg">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Inscription</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>      
            <!-- Modal body -->
                <div class="modal-body">   

                <?php
                if(isset($_GET['error'])){
                    //Script pour que le modal s'affiche toujours même en cas d'erreur
                    echo '  <script>
                                $(document).ready(function(){
                                $("#myModal_reg").modal("show");
                                });
                            </script> ';


                    //Gestion d'erreur ou de reussite pour l'inscription

                    if($_GET['error'] == "emptyfields") {   
                        echo '<h5 class="bg-danger text-center">Remplissez tous les champs, Veuillez ressayer!</h5>';
                    }
                    else if($_GET['error'] == "invalidemailusername") {   
                        echo '<h5 class="bg-danger text-center">Pseudo ou e-mail incorrect, Veuillez ressayer!</h5>';
                    }
                    else if($_GET['error'] == "invalidemail") {   
                        echo '<h5 class="bg-danger text-center">Email incorrect, Veuillez ressayer!</h5>';
                    }
                    else if($_GET['error'] == "usernameemailtaken") {   
                        echo '<h5 class="bg-danger text-center">Pseudo ou e-mail déjà pris, Veuillez ressayer!</h5>';
                    }
                    else if($_GET['error'] == "invalidusername") {   
                        echo '<h5 class="bg-danger text-center">Pseudo incorrect, Veuillez ressayer!!</h5>';
                    }
                    else if($_GET['error'] == "invalidpassword") {   
                        echo '<h5 class="bg-danger text-center">Mot de passe incorrect, Veuillez ressayer!</h5>';
                    }
                    else if($_GET['error'] == "passworddontmatch") {   
                        echo '<h5 class="bg-danger text-center">Les deux mots de passe ne sont pas identiques, Veuillez ressayer!</h5>';
                    }
                    else if($_GET['error'] == "error1") {   
                        echo '<h5 class="bg-danger text-center">Erreur, Veuillez ressayer!</h5>';
                    }
                    else if($_GET['error'] == "error2") {   
                        echo '<h5 class="bg-danger text-center"Erreur, Veuillez ressayer!</h5>';
                    }
                }
                if(isset($_GET['signup'])) { 
                    //Script pour que le modal s'affiche toujours même en cas de reussite
                    echo '  <script>
                                $(document).ready(function(){
                                $("#myModal_reg").modal("show");
                                });
                            </script> ';

                    if($_GET['signup'] == "success"){ 
                        echo '<h5 class="bg-success text-center">Inscription reussie, Veuillez vous connecter</h5>';
                    }
                }
                echo'<br>';
                ?>
    
    <!---Inscription form -->
                    <div class="signup-form">
                        <form action="includes/signup.inc.php" method="post">
                            <p class="hint-text">Créé-vous un compte dès maintenant afin de prendre une réservation</p>
                            <div class="form-group">
                                    <input type="text" class="form-control" maxlength="20" minlength="4" name="uid" placeholder="Pseudo" required="required">
                                    <small class="form-text text-muted">Votre pseudo doit etre compris entre 4-20 caractères</small>
                            </div>
                            <div class="form-group">
                                    <input type="email" maxlength="30" class="form-control" name="mail" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="text" maxlength="30" class="form-control" name="nom" placeholder="Nom" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="text" maxlength="30" class="form-control" name="prenom" placeholder="Prénom" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="text" maxlength="30" class="form-control" name="adresse" placeholder="Adresse" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="number" class="form-control" name="cp" placeholder="Code postal" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="text" maxlength="30" class="form-control" name="ville" placeholder="Ville" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="number" class="form-control" name="telephone" placeholder="Téléphone" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" maxlength="20" minlength="6" class="form-control" name="pwd" placeholder="Mot de passe" required="required">
                                <small class="form-text text-muted">Votre mot de passe doit etre compris entre 6-20 caractères</small>
                            </div>
                            <div class="form-group">
                                <input type="password" maxlength="20" class="form-control" name="pwd-repeat" placeholder="Confirmer mot de passe" required="required">
                            </div>        
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" required="required"> En cliquant je certifie avoir lu et accepter les <a href="#">Conditions générales d'utilisation</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup-submit" class="btn btn-dark btn-lg btn-block">Valider l'inscription</button>
                            </div>
                        </form>
                            <div class="text-center">Vous avez déjà un compte ? <a data-toggle="modal" href="#myModal_login">Connectez-vous</a></div>
                    </div> 	
                </div>        
                <!-- Modal footer -->
                <div class="modal-footer">

                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div> 
            </div>
        </div>
    </div>
</div>
   

