<?php
require 'conectar.php';
session_start();
$nombre_empresa = $_SESSION['IdNombreEmpresa'];
$usuario = $_SESSION['usr'];

$nrocta = $_POST['nrocta'];
$descrip = $_POST['descrip'];
# Recoje el tipo de cuenta
if($_REQUEST['tipo'] == 'ACTIVO'){
    $tipo = 'ACTIVO';
}else if($_REQUEST['tipo'] == 'PASIVO'){
    $tipo = 'PASIVO';
}else if($_REQUEST['tipo'] == 'CAPITAL'){
    $tipo = 'CAPITAL';
}else if($_REQUEST['tipo'] == 'INGRESO'){
    $tipo = 'INGRESO';
}else if($_REQUEST['tipo'] == 'COSTO'){
    $tipo = 'COSTO';
}else if($_REQUEST['tipo'] == 'EGRESO'){
    $tipo = 'EGRESO';}
# Recoje la clase de cuenta
if($_REQUEST['clase'] == 'AUXILIAR'){
    $clase = 'AUXILIAR';
}else if($_REQUEST['clase'] == 'CONTROL'){
    $clase = 'CONTROL';}
# Recoje el tipo de moneda
if($_REQUEST['monedaCta'] == 'BOL'){
    $moneda = 'Bolivianos';
}else if($_REQUEST['monedaCta'] == 'USD'){
    $moneda = 'Dólares';
}else if($_REQUEST['monedaCta'] == 'NNN'){
    $moneda = '';}

$consulta_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa'";
$result = mysqli_query($conexion, $consulta_emp);

$emp_id = mysqli_fetch_array($result);
$cod_empresa = $emp_id['cod_empresa'];

$consulta_usr = "SELECT cod_usr FROM tbluser WHERE usr='$usuario'";
$resultado = mysqli_query($conexion, $consulta_usr);

$usr_id = mysqli_fetch_array($resultado);
$cod_usr = $usr_id['cod_usr'];

$insertar = "INSERT INTO tblplancta VALUES ('$nrocta','$descrip','$tipo','$clase','$moneda',$cod_empresa,$cod_usr)";

$query = mysqli_query($conexion, $insertar);

if($query){
    require 'index.php';
    header('Location:index.php');

    echo '<script language="javascript">';
    echo 'MensajeGuardado();';
    echo '</script>';
} 

mysqli_close($conexion);