<?php
require 'conectar.php';

$tipo_doc = $_POST['Mtipo_doc'];
$numeracion = $_POST['Mnumeracion'];

$sql="UPDATE tblnumeracion SET numeracion='$numeracion' WHERE tipo_doc='$tipo_doc'";
$query=mysqli_query($conexion,$sql);

    if($query){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'RegistroModificado();';
        echo '</script>';
    }
?>