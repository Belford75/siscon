<?php
require 'conectar.php';

$cod_aux = $_POST['Mcod_aux'];
$descrip = $_POST['MdescripAux'];

$sql="UPDATE tblauxiliarcta SET descrip='$descrip' WHERE cod_aux='$cod_aux'";
$query=mysqli_query($conexion,$sql);

    if($query){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'RegistroModificado();';
        echo '</script>';
    }
?>