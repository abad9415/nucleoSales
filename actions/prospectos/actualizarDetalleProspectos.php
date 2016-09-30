<?php
//echo $_POST['nombreEmpresa'];
//echo " " . $_POST['cargoContacto'];
//incluimos el archivo de configuracion de la BD

 include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';

//Instaciamos la clase prospectos
$prospectos = new prospectos($datosConexionBD);

$prospectos->nombreEmpresa = $_POST['nombreEmpresa'];
$prospectos->rfcEmpresa = $_POST['rfcEmpresa'];
$prospectos->calleEmpresa = $_POST['calleEmpresa'];
$prospectos->numeroEmpresa = $_POST['numeroEmpresa'];
$prospectos->coloniaEmpresa = $_POST['coloniaEmpresa'];
$prospectos->cpEmpresa = $_POST['cpEmpresa'];
$prospectos->ciudadEmpresa = $_POST['ciudadEmpresa'];
$prospectos->origenProspecto = $_POST['origenProspecto'];
$prospectos->colorProspecto = $_POST['colorProspecto'];
//$prospectos->etapaProspecto = $_POST['etapaProspecto'];
//$prospectos->oportunidadProspecto = $_POST['oportunidadProspecto'];
$prospectos->estadoProspecto = $_POST['estadoProspecto'];

$prospectos->idprospecto = $_POST['idprospecto'];




//mandamos llamar las clases para guardar los datos
$respuesta = $actualizar = $prospectos->actualizarProspecto();

	//$variable1 = $ultimoIdProspecto;
	//$variable2 = $ultimoIdContacto;
	$return = array(
				//'home' => $variable1,
				//'details' => $variable2,
				'alert' => $respuesta
					);

	echo json_encode(array('alert'=>$return['alert']));

//echo $_POST['idprospecto'] . " " . $_POST['idcontacto'];
?>