<?php
//echo $_POST['nombreEmpresa'];
//echo " " . $_POST['cargoContacto'];
//incluimos el archivo de configuracion de la BD

include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';
require '../../lib/contactos.php';

//Instaciamos la clase prospectos
$prospectos = new prospectos($datosConexionBD);
//Instaciamos la clase contacto
$contactos = new contactos($datosConexionBD);

//enviamos los datos ahora de contactos

$contactos->sexoContacto = $_POST['sexoContacto'];
$contactos->nombreContacto = $_POST['nombreContacto'];
$contactos->apePaternoContacto = $_POST['apePaternoContacto'];
$contactos->apeMaternoContacto = $_POST['apeMaternoContacto'];
$contactos->telefonoContacto = $_POST['telefonoContacto'];
$contactos->correoContacto = $_POST['correoContacto'];
$contactos->cargoContacto = $_POST['cargoContacto'];
$contactos->idcontacto = $_POST['idcontacto'];

$alert = $contactos->actualizarContacto();

//$alert = $_POST['idcontacto'];
	
	$return = array(
				'alert' => $alert
					);

	echo json_encode(array('alert'=>$return['alert']));
	
	

?>
