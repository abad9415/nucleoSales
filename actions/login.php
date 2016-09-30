<?php
//echo $_POST['nombreEmpresa'];
//echo " " . $_POST['cargoContacto'];
//incluimos el archivo de configuracion de la BD
include '../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../lib/validar.php';

//requerimos de la clase contacto que esta en el siguiente archivo
//require '../lib/contactos.php';

//Instaciamos la clase validar
$validar = new validar($datosConexionBD);

//Instaciamos la clase contacto
//$contactos = new contactos($datosConexionBD);

$validar->user = $_POST['user'];
$validar->password = $_POST['password'];

$validar->verificar();







