<?php
    require 'conectar.php';

    $cod_emp=$_GET['cod_empresa'];

    $sql="SELECT * FROM tblingresos WHERE cod_empresa='$cod_emp'";
    $query=mysqli_query($conexion,$sql);

    $Resul = mysqli_fetch_array($query);

    if(isset($Resul['cod_empresa'])){
        $codigo = $Resul['cod_empresa'];
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
        require 'eliminar_emp.php';
        header("location:eliminar_emp.php?cod_empresa="+$cod_emp);
    }
?>