<?php

require 'conectar.php';

$cod_emp=$_GET['cod_empresa'];

$sql="DELETE FROM tblempresa  WHERE cod_empresa='$cod_emp'";
$query=mysqli_query($conexion,$sql);

    if($query){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'RegistroEliminado();';
        echo '</script>';
    }
?>