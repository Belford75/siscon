<?php

session_start();

echo '<script language="javascript">';
echo 'MensajeCerrarSesion();';
echo '</script>';

session_destroy();

header("location:index.php");

?>

