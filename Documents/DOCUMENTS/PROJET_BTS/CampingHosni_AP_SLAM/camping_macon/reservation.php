<?php

require "header.php";
require "includes/dbh.inc.php";

?>
  
    <!-- fin du header -->

    <br><br>
<div class="container">
    <h3 class="text-center"><br>Entrez vos coordonées<br><br></h3>  
    <div class="row">
        <div class="col-md-6 offset-md-3"> 
        <?php

        if(isset($_SESSION['idcli'])){
            echo '<p class="text-white bg-dark text-center">Bonjour '.  htmlspecialchars($_SESSION['pseudo']) .', prenez votre reservation dans cette espace.</p>';
            
            //gestion d'erreur dans les espaces de saisies 
            
            if(isset($_GET['error3'])){ //affichage des messages si une erreur est détecter ou si la processus n'a pas recontré d'erreur

                if($_GET['error3'] == "emptyfields") {
                    echo '<h5 class="bg-danger text-center">Remplissez tous les champs, Veuillez ressayer!</h5>';
                }
                else if($_GET['error3'] == "invalidfname") {   
                    echo '<h5 class="bg-danger text-center">Prenom incorrect, Veuillez ressayer!</h5>';
                }
                else if($_GET['error3'] == "invalidlname") {   
                    echo '<h5 class="bg-danger text-center">Nom incorrect, Veuillez ressayer!</h5>';
                }
            }
                if(isset($_GET['reservation'])) {   
                   if($_GET['reservation'] == "success"){ 
                    echo '<h5 class="bg-success text-center">Votre réservation à été validé!</h5>';
                }
                }
            }

            ?> 
                
                <?php
            
                //Suite du formulaire de reservation
            
                //message d'erreur si aucun mobil-home n'a été séléctionné
                if(isset($_POST['mobilhome-submit']) &&  $_POST['typmob'] == "-- Séléctionnez un type de mobil-home --"  ) { 
                    echo '<h5 class="bg-danger text-center">Type de mobil-home non sélectionner, Veuillez ressayer!</h5>';
                }

                ?>
                <div class="signup-form">
                <!--récuperation de la prermière partie du formulaire-->    
                <form action="includes/reservation.inc.php" method="post">
                <div class="form-group">
                    <label>Mobil-home</label>
                <select class="form-control" name="mobilhome">
                    <option>-- Séléctionnez un mobil-home --</option>
                <?php
                    // initialisation des variables 
                    $datedebutmob= htmlspecialchars($_POST['datedebutmob']);
                    $datefinmob= htmlspecialchars($_POST['datefinmob']);
                    $idtyp= htmlspecialchars($_POST['typmob']);
                    $_SESSION['datedebutmob'] = htmlspecialchars($datedebutmob);
                    $_SESSION['datefinmob'] = htmlspecialchars($datefinmob);

                if(isset($_POST['mobilhome-submit'])) {
                    
                        // Filtré les mobil-homes indisponibles et déja en cour de reservation
                        $sqli = "SELECT idmob, nom, idtyp FROM mobilhome WHERE idtyp='.$idtyp.' AND idmob NOT IN(SELECT idmob FROM reservation WHERE(datedebut <= '".$datedebutmob."' AND datefin >= '".$datedebutmob."') OR(datedebut < '".$datefinmob."' AND datefin >= '".$datefinmob."') OR( '".$datedebutmob."'  <= datedebut AND '".$datefinmob."' >= datedebut))";
                    
                        // Affichage des mobil-homes disponibles
                        $result = mysqli_query($conn, $sqli);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="'.htmlspecialchars($row["idmob"]).'">'.htmlspecialchars($row['nom']).'</option>';
                        }
                        }

                ?>
                
                </select>
                    <small class="form-text text-muted">Séléctionnez un mobil-home disponible dans cette liste.</small>
                </div> 
                <div class="form-group">
                    <!--Récuperation des dates saisis dans le formulaires précedent-->
                    <input type="hidden" class="form-control" name="datedebut" placeholder="Date" required="required" value="<?php echo  htmlspecialchars($_SESSION['datedebutmob'])?>">
                    <input type="hidden" class="form-control" name="datefin" placeholder="Date" required="required" value="<?php echo  htmlspecialchars($_SESSION['datefinmob'])?>">
                </div>
                <div class="form-group">
                     <!--Affichage automatique des nom et prénom du client connécter-->
                    <label>Prénom</label>
                    <input type="text" class="form-control" name="prenom" value="<?php echo htmlspecialchars($_SESSION['prenomcli'])?>" required="required">
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="nom" value="<?php echo htmlspecialchars($_SESSION['nomcli'])?>" required="required">
                </div>  
                <br>  
                <div class="form-group">
                    <label>Commentaires</label>
                    <textarea class="form-control" name="commentaires" placeholder="Comments" maxlength="200" rows="3"></textarea>
                    <small class="form-text text-muted">La section commentaires vous permet d'informer l'équipe de Mâcon Camping sur des détails spécifiques. 200 caractère maximum.</small>
                </div> 
                <div class="form-group">
                    <label class="checkbox-inline"><input type="checkbox" required="required"> En cliquant je certifie avoir lu et accepter les <a href="#">Conditions générales d'utilisation</a></label>
                </div>  
                <div class="form-group">
                    <button type="submit" name="reserv-submit" class="btn btn-dark btn-lg btn-block">Valider la reservation</button>
                </div>
                </form>
                <br><br>
                </div>
                
                <!--Fin du formulaire de réservation--> 
        </div>
    </div>
</div>
<br><br>


<?php

require "footer.php";

?>
