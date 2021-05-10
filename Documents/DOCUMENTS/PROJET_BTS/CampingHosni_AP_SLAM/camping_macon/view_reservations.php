<?php
require "header.php";
?>

    <!-- fin du header -->
    
<br><br>
<div class="container">
<h3 class="text-center"><br>Consultez vos réservations<br></h3>     

<?php
    // Consultation des réservations
    //Gestion des erreurs
    if(isset($_SESSION['idcli'])){
        echo '<p class="text-white bg-dark text-center">'. htmlspecialchars($_SESSION['pseudo']) .', Vous pouvez visualiser vos réservations dans cette espace.</p><br>';
        if(isset($_GET['delete'])){
            if($_GET['delete'] == "error") {
                echo '<h5 class="bg-danger text-center">Erreur!</h5>';
            }
            if($_GET['delete'] == "success"){ 
                echo '<h5 class="bg-success text-center">Suppresion reussie</h5>';
            }
        }  
    require 'includes/view_reservation.inc.php';   
 }
    else {
        echo '	<p class="text-center text-danger"><br>Vous devez vous connecter!<br></p>
       <p class="text-center">Vous devevez crée un compte afin visualiser vos réservation!<br><br><p>';   
    }    
?>


<h3 class="text-center"><br>Consultez vos informations<br></h3>     

<?php
    //Consultation des informations client
    //Gestion des erreurs
    if(isset($_SESSION['idcli'])){
        echo '<p class="text-white bg-dark text-center">'. htmlspecialchars($_SESSION['pseudo']) .', Vous pouvez visualiser vos informations dans cette espace.</p><br>';

    require 'includes/view_information.inc.php';   
 }
    else {
        echo '	<p class="text-center text-danger"><br>Vous devez vous connecter!<br></p>
       <p class="text-center">Vous devevez crée un compte afin visualiser vos informations!<br><br><p>';   
    }    
?>

</div>
<br><br>

<?php
require "footer.php";
?>