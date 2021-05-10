<?php

require "header.php";
require "includes/dbh.inc.php";

?>

    <!-- fin du header -->
  
    <br><br>
<div class="container">
    <h3 class="text-center"><br>Vérification de la disponibilité des mobil-homes<br></h3>   
    <div class="row">
        <div class="col-md-6 offset-md-3"> 
        <?php

        if(isset($_SESSION['idcli'])){
            echo '<p class="text-white bg-dark text-center">Bonjour '.  htmlspecialchars($_SESSION['pseudo']) .', prenez votre reservation dans cette espace.</p>';
            
            }
            
            //Début du formulaire de reservation
            
            ?> 
            <br>
            <div class="signup-form">
            <!--Renvoyer l'utilisateur vers la seconde partie du formulaire après validation-->
            <form action="reservation.php" method="post">
                <div class="form-group">
                    <label>Arrivée</label>
                    <input type="date" class="form-control" name="datedebutmob" placeholder="Date" required="required">
                    <br>
                    <label>Départ</label>
                    <input type="date" class="form-control" name="datefinmob" placeholder="Date" required="required">
                </div>
                    <br>
                    <div class="form-group">
                    <label>Selectionnez un type de mobil-home</label>
                    <select class="form-control" name="typmob">
                    <option>-- Séléctionnez un type de mobil-home --</option>
                <?php 
                        
                    //Affichage de la liste des types de mobil-homes
                    $sqli = "SELECT * FROM typemobil";
                    $result = mysqli_query($conn, $sqli);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="'.htmlspecialchars($row["idtyp"]).'">'.htmlspecialchars($row['libtyp']).'</option>';
                            }

                ?>
                </select>
                </div>
                <div class="form-group">
                <br>
                    <button type="submit" name="mobilhome-submit" class="btn btn-dark btn-lg btn-block">Continuer</button>
                </div>
                </form>
                <br>
                </div>
                
              
     
        </div>
    </div>
</div>
<br><br>


<?php

require "footer.php";

?>
