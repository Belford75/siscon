<?php
require 'conectar.php';

$usuario = $_POST['usr'];
$contraseña = $_POST['contraseña'];
$empresa = $_REQUEST['IdNombreEmpresa'];

session_start();

$_SESSION['usr'] = $usuario;
$_SESSION['tipo_usr']='';
$_SESSION['IdNombreEmpresa']=$empresa;

$consulta = "SELECT * FROM tbluser WHERE usr='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

while ($encontrado = mysqli_fetch_array($resultado)){
    $_SESSION['tipo_usr']=$encontrado['tipo_usr'];
}

if ($_SESSION['tipo_usr']<>'') {
  
  header("location:index.php");

  $_SESSION['usr'] = $usuario;
  $_SESSION['tipo_usr']=$encontrado['tipo_usr'];
  $_SESSION['IdNombreEmpresa']=$empresa;
  
} else {
  require 'index.php';
  header("location:index.php");
  $usuario = NULL;

  session_unset();
  session_destroy();
  
  echo '<script language="javascript">';
  echo 'MensajeErrorInicio();';
  echo '</script>';
  
  mysqli_free_result($resultado);
  mysqli_close($conexion);
}



?>
