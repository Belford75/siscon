<?php
require 'conectar.php';

$cod_empresa = $_POST['cod_empresa'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$nit = $_POST['nit'];
$sigla = $_POST['sigla'];
if($_REQUEST['moneda'] == 'BOL'){
    $moneda = 'Bolivianos';
} else if($_REQUEST['moneda'] == 'USD'){
    $moneda = 'Dólares';
}else if($_REQUEST['moneda'] == 'AMB'){
    $moneda = 'Ambas';}
$inigest = $_POST['inicio_gest'];
$cod_usr = $_POST['cod_usr'];

$sql="UPDATE tblempresa SET nombre='$nombre', direccion='$direccion', telefono='$telefono', nit='$nit', sigla='$sigla', moneda='$moneda', inicio_gest='$inigest', cod_usr='$cod_usr' WHERE cod_empresa='$cod_empresa'";
$query=mysqli_query($conexion,$sql);

    if($query){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'RegistroModificado();';
        echo '</script>';
    }
?>