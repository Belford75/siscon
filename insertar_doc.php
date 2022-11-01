<?php
require 'conectar.php';
session_start();
$tipo_doc = $_POST['tipo_doc'];
$numeracion = $_POST['numeracion'];

$insertar = "INSERT INTO tblnumeracion VALUES ('$tipo_doc','$numeracion','','','','','','','','','','','','')";

$query = mysqli_query($conexion, $insertar);

if($query){
    require 'index.php';
    header('Location:index.php');

    echo '<script language="javascript">';
    echo 'MensajeGuardado();';
    echo '</script>';
} 

mysqli_close($conexion);