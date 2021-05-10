<?php
require "header.php";
require 'includes/dbh.inc.php';
?>

<header class="header">
    <div class="row">
        <div class="col-md-12 text-center">
   <a class="logo"><img src="img/logocamping.png" alt="logo"></a>
   </div>
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-outline-light btn-lg" data-toggle="modal" data-target="#myModal_login"><em>Réserver un mobil-home</em></button>
        </div>
    </div>
</header>



<!--section présentation-->

<section id="presentation">

 <div class="container">
   <h3 class="text-center"><br><br>Camping Municipal de Mâcon</h3>
   <div class="row">
<!--carousel (diaporama de présentation pour le camping)-->
     <div class="col-sm"><br><br><br><br><br><br>
      	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
        <div class="carousel-inner">
           <div class="carousel-item active">
             <img class="d-block w-100" src="photos/camping1.jpg" height="375" width="470" alt="First slide">
           </div>
           <div class="carousel-item">
           <img class="d-block w-100" src="photos/camping2.jpg" height="375" width="470" alt="Second slide">
           </div>
           <div class="carousel-item">
           <img class="d-block w-100" src="photos/camping3.png" height="375" width="470" alt="Third slide">
           </div>
        </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div><br><br>
     </div>

<!--fin du carousel-->

     <div class="col-sm">
    	<div class="arranging"><br><hr>
	<h4 class="text-center">Présentation</h4>
	<p><br>Aux portes du pays Mâconnais, le camping * * * * de Mâcon, adhérent à la charte « Camping Qualité », est situé dans un environnement verdoyant, au bord de la Saône : 254 emplacements sur 5 hectares de terrain plat et ombragé, piscine chauffée (ouverte de mi-mai à mi-septembre), aires de jeux et de sports, salle de loisirs, magasin, bar, restaurant et bien d’autres services. A proximité immédiate : centre nautique avec 5 bassins, berges de la Saône (pêche, activités nautiques, port de plaisance), immense espace vert de détente sportive et de promenade.<br>
    <br>Entre Bourgogne et Beaujolais, le camping * * * * de Mâcon est idéalement situé pour découvrir les richesses culturelles et gastronomiques ; il est au centre de nombreux circuits touristiques : route des vins, circuit Lamartine, circuit des églises romanes... mais aussi de châteaux, paysages, traditions, vignobles, produits du terroir.<br>
    De nombreuses animations prennent place l’été à Mâcon : spectacles de rue, théâtre, musique, cinéma...<br><br><br></p><hr>
	</div>
     </div>
    </div><br>
    </div>

</section>
<!--fin de la section présentation-->

<!--section typmob-->
<section id="typmob">
<br><br>
<div class="container">  
    <div class="row staff">
            <div class="col">
            <h3 class="text-center"><br>Présentation de nos mobil-homes<br></h3> 
            <!--récupération de la liste des types de mobil-homes-->          
            <div class="signup-form">
            <form action="#typmob" method="post">
                    <br>
                    <div class="form-group">
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
                <div class="form-group">
                    <button type="submit" name="showtypmob" class="btn btn-dark btn-lg btn-block">Valider</button>
                </div>     

            <?php
                
            //affichage des informations concernant le type de mobil-home choisie et photos
                
            if(isset($_POST['showtypmob']) &&  $_POST['typmob'] == "-- Séléctionnez un type de mobil-home --" ) 
            { 
                echo '<h5 class="bg-danger text-center">Type de mobil-home non sélectionner, Veuillez ressayer!</h5>';}

            else if(isset($_POST['showtypmob'])) {
                $idtyp=htmlspecialchars($_POST['typmob']);

            $sql = ("SELECT * FROM typemobil WHERE idtyp = $idtyp");
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {  
                
                echo
                '
                    <table class="table table-hover table-responsive-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Nombre de personne max</th>
                                <th scope="col">Description courte</th>
                                <th scope="col">Description longue</th>
                                <th scope="col">Tarif à la semaine</th>
                            </tr>
                        </thead> ';
                while($row = $result->fetch_assoc()) {
                echo"
                        <tbody>
                            <tr>
                            <th scope='row'>". htmlspecialchars($row["libtyp"])."</th>
                            <td>". htmlspecialchars($row["nbpers"])."</td>
                            <td>". htmlspecialchars($row["descripcourte"])."</td>
                            <td>". htmlspecialchars($row["descriplongue"])."</td>
                            <td>". htmlspecialchars($row["tarifsemaine"])."</td>
                            </tr>
                    </tbody>";
                    
                }   
                echo "</table>";
            
            
            }
            $sql = ("SELECT * FROM photo WHERE idtyp = $idtyp");
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {  
                
                echo
                '
                    <table class="table table-hover table-responsive-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                            </tr>
                        </thead> ';
                while($row = $result->fetch_assoc()) {
                echo"
                        <tbody>
                            <tr>
                            <th scope='row'> <img src='photos/$row[nomfichier]'width='500'> <br/> </th>
                            </tr>
                    </tbody>";
                    
                }   
                echo "</table>";
                  
            }
            else {    echo "<p class='text-white text-center bg-danger'>Erreur!<p>"; }}
            ?>
            <br><br>
                </form>
            </div>
        </div>    
    </div>
</div><br><br>
</section>
<!--fin de la section typmob-->

<div class="header2">
</div>

<div class="container" id="reservation">
    <h3 class="text-center"><br><br>Réservation<br><br></h3>
    <img  src="photos/camping4.jpg" height="335px" width="1110px" class="img-fluid rounded">
    <br><br>
    <button type="button" class="btn btn-outline-dark btn-block btn-lg" data-toggle="modal" data-target="#myModal_login">Réserver un mobil-home!</button>
        
</div><br><br>

<div class="header2">
</div>

<!--debut de la section contact -->
<section class="map" id="footer">
    <div class="container">
    <h3 class="text-center"><br><br>Contact</h3><br>
    <!--carte google maps ciblé sur le camping de mâcon-->
    <div class="mapouter">
    <div class="gmap_canvas">
    <iframe width="1080" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=Macon%20camping&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    <a href="https://soap2day-to.com"></a><br>
    <style>.mapouter{position:relative;text-align:right;height:250px;width:100%;}</style>
    <a href="https://www.embedgooglemap.net">google map api for website</a>
    <style>.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:100}</style>
    </div>
    </div>
            <!--information conernant le camping-->
            <div class="col">
            <br><h4 class="text-right"><strong>Retrouvez nous</strong></h4>
            <p class="text-right">Camping Municipal de Mâcon<br><i class="fa fa-map-marker"></i>&nbsp; 1 Rue des Grandes <br> Varennes, 71000 Sancé <br><br>email: camping@ville-macon.fr<br>phone: 03 85 38 16 22</p>
            </div>
        
	</div>
</section>
<!--fin de la section contact-->


<?php
require "footer.php";
?>
