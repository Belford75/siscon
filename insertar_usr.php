<?php
require 'conectar.php';
$usr = $_POST['usr'];
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$tipo_usr = $_POST['tipo_usr'];

$buscar_ultimo = "SELECT MAX(cod_usr) as nro_max FROM tbluser";
$res_ultimo = mysqli_query($conexion, $buscar_ultimo);
$auto_id = mysqli_fetch_array($res_ultimo);
$new_id = $auto_id['nro_max']+1;

$insertar = "INSERT INTO tbluser VALUES ($new_id,'$usr','$nombre','$contraseña','$tipo_usr')";

$query = mysqli_query($conexion, $insertar);

if($query){
    require 'index.php';
    header("location:index.php");

    echo '<script language="javascript">';
    echo 'MensajeGuardado();';
    echo '</script>';
}

?>
