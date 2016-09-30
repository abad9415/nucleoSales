<?php
//echo $_POST['nombreEmpresa'];
//echo " " . $_POST['cargoContacto'];
//incluimos el archivo de configuracion de la BD

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



//enviamos los datos ahora de contactos

$contactos->sexoContacto = $_POST['sexoContacto'];
$contactos->nombreContacto = $_POST['nombreContacto'];
$contactos->apePaternoContacto = $_POST['apePaternoContacto'];
$contactos->apeMaternoContacto = $_POST['apeMaternoContacto'];
$contactos->telefonoContacto = $_POST['telefonoContacto'];
$contactos->correoContacto = $_POST['correoContacto'];
$contactos->cargoContacto = $_POST['cargoContacto'];


//$contactos->montoOportunidad = $_POST['montoOportunidad'];
//$contactos->cargoContacto = $_POST['monedaOportunidad'];
//$contactos->cargoContacto = $_POST['etapaOportunidad'];
//$contactos->cargoContacto = $_POST['descripcionOportunidad'];

//mandamos llamar las clases para guardar los datos
$returnAltaProspectos = $prospectos->altaProspecto();
$returnAltaContacto = $contactos->altaContacto();

//if($returnAltaProspectos == 'Alta exitosa')
  if (($returnAltaProspectos == 'Alta exitosa') && ($returnAltaContacto == 'Alta exitosa')) 
  {
      $respuesta = "Alta Exitosa";
  }else{
    $respuesta = "Ah ocurrido un error";
  }

//traemos los ultimos ids que acabamos de crear
$ultimoIdProspectoRow = $prospectos->ultimoIdProspecto();
$ultimoIdContactoRow = $contactos->ultimoIdContacto();

  while($row = $ultimoIdProspectoRow->fetch_assoc()) {
          $ultimoIdProspecto = $row['idprospecto'];
          
                }

  while($row = $ultimoIdContactoRow->fetch_assoc()) {
          $ultimoIdContacto = $row['idcontacto'];
                }
//pasaremos el ultimo id del prospecto asi como contacto para relacionarlos ademas se lo pasamos a la oportunidad
$prospectos->ultimoIdProspecto = $ultimoIdProspecto;
$prospectos->ultimoIdContacto = $ultimoIdContacto;
//ya que tenemos las ultimas ids de las dos tablas y las regresamos a lib/prospectos.php, las vaciamos en nuestra tabla contacto-prospecto lo haremos en la clase prospectos
 $prospectos->altaRelacionContactoProspecto();
 //$prospectos->altaOportunidad();
//echo json_encode(array("idProspecto" => $ultimoIdProspecto, "idContacto" => $ultimoIdContacto));

	
	//$getpage = $_POST['page'];
	$variable1 = $ultimoIdProspecto;
	$variable2 = $ultimoIdContacto;
	$return = array(
				'home' => $variable1,
				'details' => $variable2,
				'alert' => $respuesta
					);

	echo json_encode(array('content'=>$return['home'], 'details'=>$return['details'], 'alert'=>$return['alert']));
	
	

?>
