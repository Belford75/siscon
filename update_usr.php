<?php
require 'conectar.php';
$cod_usr = $_POST['cod_usr'];
$usr = $_POST['usr'];
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$tipo_usr = $_POST['tipo_usr'];

$sql="UPDATE tbluser SET usr='$usr', nombre='$nombre', contraseña='$contraseña', tipo_usr='$tipo_usr' WHERE cod_usr='$cod_usr'";
$query=mysqli_query($conexion,$sql);

    if($query){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'RegistroModificado();';
        echo '</script>';
    }
?>