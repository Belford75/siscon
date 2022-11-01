<?php

require 'conectar.php';

$cod_usr=$_GET['cod_usr'];

$sql="DELETE FROM tbluser  WHERE cod_usr='$cod_usr'";
$query=mysqli_query($conexion,$sql);

    if($query){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'RegistroEliminado();';
        echo '</script>';
    }
?>
