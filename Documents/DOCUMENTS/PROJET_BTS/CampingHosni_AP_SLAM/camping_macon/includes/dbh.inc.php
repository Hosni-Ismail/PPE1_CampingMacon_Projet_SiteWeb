<?php
//Connexion à la base de données
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "camping_hosni_lilian";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
mysqli_query($conn,"SET CHARACTER SET 'utf8'");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

if (!$conn){
    die("Connection failed:" .mysqli_connect_error());
}
?>

