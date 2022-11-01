<?php
    require 'conectar.php';

    $cod_usr=$_GET['cod_usr'];

    $sql="SELECT * FROM tblingresos WHERE cod_usr='$cod_usr'";
    $query=mysqli_query($conexion,$sql);

    $Resul = mysqli_fetch_array($query);

    if(isset($Resul['cod_usr'])){
        $codigo = $Resul['cod_usr'];
    }else{
        $codigo = '';  
    }

    if($codigo!=''){
        require 'index.php';
        header("location:index.php");

        echo '<script language="javascript">';
        echo 'MensajeNoEliminado();';
        echo '</script>';
    } else {
        require 'eliminar_usr.php';
        header("location:eliminar_usr.php?cod_usr="+$cod_usr);
    }
?>