<?php
//$fecha = $_POST['fec_nac'];
//$fecha_sql = str_replace('/','-', date('Y-m-d', strtotime($fecha)));
require 'conectar.php';

$nombre = $_POST['nombre'];

if(strlen($_POST['direccion'])<1){
    $direccion = '';
} else {$direccion = $_POST['direccion'];}
if(strlen($_POST['telefono'])<1){
    $telefono = 0;
} else {$telefono = $_POST['telefono'];}
if(strlen($_POST['nit'])<1){
    $nit = '';
} else {$nit = $_POST['nit'];}
if(strlen($_POST['sigla'])<1){
    $sigla = '';
} else {$sigla = $_POST['sigla'];}
# Recoje el el tipo de moneda
if($_REQUEST['moneda'] == 'BOL'){
    $moneda = 'Bolivianos';
} else if($_REQUEST['moneda'] == 'USD'){
    $moneda = 'Dólares';
}else if($_REQUEST['moneda'] == 'AMB'){
    $moneda = 'Ambas';}

$inigest = $_POST['inicio_gest'];

$buscar_ultimo = "SELECT MAX(cod_empresa) as nro_max FROM tblempresa";
$res_ultimo = mysqli_query($conexion, $buscar_ultimo);
$auto_id = mysqli_fetch_array($res_ultimo);
$new_id = $auto_id['nro_max']+1;

include('index.php');

$consulta_usr = "SELECT cod_usr FROM tbluser WHERE usr='$usuario'";  
$resultado = mysqli_query($conexion, $consulta_usr);

$usr_id = mysqli_fetch_array($resultado);
$cod_usr = $usr_id['cod_usr'];

$insertar = "INSERT INTO tblempresa VALUES ($new_id,'$nombre','$direccion','$telefono','$nit','$sigla','$moneda','$inigest',$cod_usr)";

$query = mysqli_query($conexion, $insertar);

if($query){
    require 'index.php';
    header('Location:index.php');

    echo '<script language="javascript">';
    echo 'MensajeGuardado();';
    echo '</script>';
}

mysqli_close($conexion);