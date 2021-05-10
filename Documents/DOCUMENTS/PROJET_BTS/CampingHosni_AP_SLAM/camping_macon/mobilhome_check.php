<?php
require "header.php";
require "includes/dbh.inc.php";
?>
  
    <!-- fin du header -->

<br><br>
<div class="container">
    <h3 class="text-center"><br>Vérifier les disponibilités des mobil-homes<br></h3>   
    <div class="row">
        <div class="col-md-6 offset-md-3"> 
        <?php
        if(isset($_SESSION['idcli'])){
            echo '<p class="text-white bg-dark text-center">Bonjour '. htmlspecialchars($_SESSION['pseudo']) .', Vous pouvez consulter les disponibilitées dans cet espace.</p>';
        }
 
            ?> 
            <!--Dispornibilité form-->
            <div class="signup-form">
            <form action="" method="post">
                <div class="form-group">
                <label>Arrivée</label>
                <input type="date" class="form-control" name="datedebutmob" placeholder="Date" required="required">
                <br>
                <label>Départ</label>
                <input type="date" class="form-control" name="datefinmob" placeholder="Date" required="required">
                </div>
                <br>
                <div class="form-group">
                <!--Affichage de la liste des types de mobil-homes-->    
                <label>Selectionnez un type de mobil-home</label>
                <select class="form-control" name="typmob">
                <option>-- Séléctionnez un type de mobil-home --</option>
                <?php 
                    
                $sqli = "SELECT * FROM typemobil";
                $result = mysqli_query($conn, $sqli);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.htmlspecialchars($row["idtyp"]).'">'.htmlspecialchars($row['libtyp']).'</option>';
                    }	
                    
                ?>
                </select>
                </div>
                <br>
                <div class="form-group">

                <button type="submit" name="mobilhome-submit" class="btn btn-dark btn-lg btn-block">Afficher les mobil-homes disponibles</button>
                </div>
            </form>
            <br>
             </div>
             <div class="form-group">

             <label>Mobil-home</label>
             <select class="form-control">
             <option>--  Visualiser les mobil-homes --</option>
             <?php
             $datedebutmob = htmlspecialchars($_POST['datedebutmob']);
             $datefinmob = htmlspecialchars($_POST['datefinmob']);
             $idtyp = htmlspecialchars($_POST['typmob']);

             if(isset($_POST['mobilhome-submit'])) {
                 
                    // Filtré les mobil-homes indisponibles et déja en cour de reservation
                    $sqli = "SELECT idmob, nom, idtyp FROM mobilhome WHERE idtyp='.$idtyp.' AND idmob NOT IN(SELECT idmob FROM reservation WHERE(datedebut <= '".$datedebutmob."' AND datefin >= '".$datedebutmob."') OR(datedebut < '".$datefinmob."' AND datefin >= '".$datefinmob."') OR( '".$datedebutmob."'  <= datedebut AND '".$datefinmob."' >= datedebut))";
                 
                    // Affichage des mobil-homes disponibles
                    $result = mysqli_query($conn, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.htmlspecialchars($row["idmob"]).'">'.htmlspecialchars($row['nom']).'</option>';
                    }
                    mysqli_close($conn);
                    }
                
            ?>
            </select>
            </div>
     
        </div>
    </div>
</div>
<br><br>


<?php
require "footer.php";
?>
