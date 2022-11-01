<?php
require 'conectar.php';

$text = $_POST['text'];

$q1 = "SELECT COUNT(DISTINCT cta) as cant FROM tblauxiliarcta WHERE cta ='$text'";
$Ejec = mysqli_query($conexion, $q1);

$no_cta = mysqli_fetch_array($Ejec);
$nomCta = $no_cta['cant'];

echo $nomCta;

?>