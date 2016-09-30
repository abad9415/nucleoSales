<?php
//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/agenda.php';

//Instaciamos la clase prospectos
$agenda = new agenda($datosConexionBD);

$agenda->deFecha = $_POST['deFecha'];
$agenda->deHora = $_POST['deHora'];
$agenda->aFecha = $_POST['aFecha'];
$agenda->aHora = $_POST['aHora'];
$agenda->descripcionAgenda = $_POST['descripcionAgenda'];
$agenda->idprospecto = $_POST['idprospecto'];
$agenda->idContacto = $_POST['idContacto'];

echo $agenda->altaAgenda();
?>