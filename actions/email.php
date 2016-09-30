<?php
//echo $_POST['nombreEmpresa'];
//echo " " . $_POST['cargoContacto'];
//incluimos el archivo de configuracion de la BD
include '../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../lib/validaremail.php';

//requerimos de la clase contacto que esta en el siguiente archivo
//require '../lib/contactos.php';

//Instaciamos la clase validar
$vemail = new validaremail($datosConexionBD);

//Instaciamos la clase contacto
//$contactos = new contactos($datosConexionBD);

$vemail->email = $_POST['email'];


$vemail->buscar();

