<?php

    require 'mensajes.html';
    
    @session_start();

    if(!isset($_SESSION['usr'])){
        $usuario = null;
    } else {
        $usuario = $_SESSION['usr'];
    }
    
    if($usuario<>null){
       $tipo_usuario = $_SESSION['tipo_usr'];
       $nombre_empresa_activa = $_SESSION['IdNombreEmpresa'];
    }
    
    require 'librerias.php';
    require 'barra_superior.php';
?>