<?php
//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/agenda.php';

//Instaciamos la clase prospectos
$agenda = new agenda($datosConexionBD);

$agenda->idcita = $_POST['idcita'];

echo $agenda->BajaCita();
?>