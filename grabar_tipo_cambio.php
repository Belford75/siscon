<?php
require 'conectar.php';
session_start();

$fecha = $_POST['fecha'];
$fecha_sql = str_replace('/','-', date('Y-m-d', strtotime($fecha)));

$cambio = $_POST['cambio'];

$insertar = "INSERT INTO tbltipocambio VALUES ('$fecha_sql',$cambio)";

$query = mysqli_query($conexion, $insertar);

if($query){
    require 'index.php';
    header("Location: index.php");

    echo '<script language="javascript">';
    echo 'MensajeGuardado();';
    echo '</script>';
}

?>