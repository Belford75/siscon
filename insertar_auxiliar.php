<?php
require 'conectar.php';
session_start();
$nombre_empresa = $_SESSION['IdNombreEmpresa'];

$ctamadre = $_POST['ctamadre'];
$cod_aux = $_POST['cod_aux'];
$descripAux = $_POST['descripAux'];


$consulta_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa'";
$result = mysqli_query($conexion, $consulta_emp);

$emp_id = mysqli_fetch_array($result);
$cod_empresa = $emp_id['cod_empresa'];

$insertar = "INSERT INTO tblauxiliarcta VALUES ('$cod_aux','$descripAux','$ctamadre',$cod_empresa)";

$query = mysqli_query($conexion, $insertar);

if($query){
    require 'index.php';
    header('Location:index.php');

    echo '<script language="javascript">';
    echo 'MensajeGuardado();';
    echo '</script>';
} 

mysqli_close($conexion);