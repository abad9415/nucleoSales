<?php
//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/contactos.php';

//Instaciamos la clase prospectos
$contactos = new contactos($datosConexionBD);

$contactos->idcontacto = $_POST['idContacto'];

echo $contactos->bajaContacto();
?>