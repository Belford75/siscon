<?php

//$conexion = mysqli_connect("localhost", "root", "", "siscon");

$server = "localhost";
$user = "root";
$pass = "";
$db = "siscon";

$conexion = new mysqli($server,$user,$pass,$db);

if($conexion->connect_errno){
   die("ERROR EN LA CONEXION" . $conexion->connect_errno);
}
