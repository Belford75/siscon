<?php
require 'conectar.php';

$text = $_POST['text'];

$q1 = "SELECT descrip FROM tblplancta WHERE cta='$text'";
$Ejec = mysqli_query($conexion, $q1);

$no_cta = mysqli_fetch_array($Ejec);
$nomCta = $no_cta['descrip'];

echo $nomCta;
?>