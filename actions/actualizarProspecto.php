<?php
 include '../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../lib/prospectos.php';
//requerimos de la clase contacto que esta en el siguiente archivo
require '../lib/contactos.php';

//Instaciamos la clase prospectos
$prospectos = new prospectos($datosConexionBD);
//Instaciamos la clase contacto
$contactos = new contactos($datosConexionBD);

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



//enviamos los datos ahora de contactos

$contactos->sexoContacto = $_POST['sexoContacto'];
$contactos->nombreContacto = $_POST['nombreContacto'];
$contactos->apePaternoContacto = $_POST['apePaternoContacto'];
$contactos->apeMaternoContacto = $_POST['apeMaternoContacto'];
$contactos->telefonoContacto = $_POST['telefonoContacto'];
$contactos->correoContacto = $_POST['correoContacto'];
$contactos->cargoContacto = $_POST['cargoContacto'];
$contactos->facebookContacto = $_POST['facebookContacto'];
$contactos->twitterContacto = $_POST['twitterContacto'];
$contactos->correoalternativo = $_POST['correoAlternativoContacto'];
$contactos->celular = $_POST['celularContacto'];
$contactos->idcontacto = $_POST['idcontacto'];

//mandamos llamar las clases para guardar los datos
$actualizar = $prospectos->actualizarProspecto();
$actualizarCon = $contactos->actualizarContacto();
//echo $actualizar . " " . $actualizarCon;

if (($actualizar == 'Cambio exitoso') && ($actualizarCon == 'Cambio exitoso')) 
  {
      $respuesta = "Cambio exitoso";
  }else{
    $respuesta = "Ah ocurrido un error";
  }

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