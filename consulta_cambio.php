<?php
  require 'conectar.php';
  
  date_default_timezone_set("America/La_Paz");
  $hoy = date("Y-m-d");

  $p = "SELECT cambio FROM tbltipocambio WHERE fecha='$hoy'";
  $respuesta = mysqli_query($conexion, $p);

  while ($encontrado = mysqli_fetch_array($respuesta)){
    $_SESSION['cambio']=$encontrado['cambio'];
    $cambio = $_SESSION['cambio'];
    //echo 'Tipo de Cambio: '; echo $cambio;
  }

?>