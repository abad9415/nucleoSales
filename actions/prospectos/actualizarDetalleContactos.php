<?php
//echo $_POST['nombreEmpresa'];
//echo " " . $_POST['cargoContacto'];
//incluimos el archivo de configuracion de la BD
 include '../../conexionBD.php';
//requerimos de la clase contacto que esta en el siguiente archivo
require '../../lib/contactos.php';

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

$respuesta = $contactos->actualizarContacto();
//echo $actualizar . " " . $actualizarCon;

	//$variable1 = $ultimoIdProspecto;
	//$variable2 = $ultimoIdContacto;
	$return = array(
				//'home' => $variable1,
				//'details' => $variable2,
				'alert' => $respuesta
					);

	echo json_encode(array('alert'=>$return['alert']));

//echo $_POST['idprospecto'] . " " . $_POST['idcontacto']; 
//echo "entre php";
?>