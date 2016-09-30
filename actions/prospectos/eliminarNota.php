<?php
//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/notas.php';

//Instaciamos la clase prospectos
$notas = new notas($datosConexionBD);

$notas->idNota = $_POST['idNota'];

echo $notas->BajaNota();
?>