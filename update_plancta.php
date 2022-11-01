<?php
require 'conectar.php';

$cuenta = $_POST['Ncta'];

$descrip = $_REQUEST['Ndescrip'];
# Recoje el tipo de cuenta
if($_REQUEST['Ntipo'] == 'ACTIVO'){
    $tipo = 'ACTIVO';
}else if($_REQUEST['Ntipo'] == 'PASIVO'){
    $tipo = 'PASIVO';
}else if($_REQUEST['Ntipo'] == 'CAPITAL'){
    $tipo = 'CAPITAL';
}else if($_REQUEST['Ntipo'] == 'COSTO'){
    $tipo = 'COSTO';
}else if($_REQUEST['Ntipo'] == 'INGRESO'){
    $tipo = 'INGRESO';
}else if($_REQUEST['Ntipo'] == 'EGRESO'){
    $tipo = 'EGRESO';}
# Recoje la clase de cuenta
if($_REQUEST['Nclase'] == 'AUXILIAR'){
    $clase = 'AUXILIAR';
}else if($_REQUEST['Nclase'] == 'CONTROL'){
    $clase = 'CONTROL';}
# Recoje el tipo de moneda
if($_REQUEST['NmonedaCta'] == 'Bolivianos'){
    $moneda = 'Bolivianos';
}else if($_REQUEST['NmonedaCta'] == 'Dólares'){
    $moneda = 'Dólares';
}else if($_REQUEST['NmonedaCta'] == 'NNN'){
    $moneda = '';}
$cod_empresa = $_REQUEST['cod_empresa'];
$cod_usr = $_REQUEST['usr'];

$sql="UPDATE tblplancta SET descrip='$descrip', tipo='$tipo', clase='$clase', moneda='$moneda', cod_empresa='$cod_empresa', cod_usr='$cod_usr' WHERE cta='$cuenta'";
$query=mysqli_query($conexion,$sql);

    if($query){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'RegistroModificado();';
        echo '</script>';
    }
?>