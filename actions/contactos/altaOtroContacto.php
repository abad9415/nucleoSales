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
$contactos->facebookContacto = $_POST['facebookContacto'];
$contactos->twitterContacto = $_POST['twitterContacto'];
$contactos->correoalternativo = $_POST['correoAlternativoContacto'];
$contactos->celular = $_POST['celularContacto'];



$returnAltaContacto = $contactos->altaContacto();

//$respuesta = $returnAltaContacto
//traemos los ultimos ids que acabamos de crear
//$ultimoIdProspectoRow = $prospectos->ultimoIdProspecto();
$ultimoIdContactoRow = $contactos->ultimoIdContacto();

  while($row = $ultimoIdContactoRow->fetch_assoc()) {
          $ultimoIdContacto = $row['idcontacto'];
                }
//pasaremos el ultimo id del prospecto asi como contacto para relacionarlos ademas se lo pasamos a la oportunidad
$prospectos->ultimoIdProspecto = $_POST['idprospecto'];
$prospectos->ultimoIdContacto = $ultimoIdContacto;
//ya que tenemos las ultimas ids de las dos tablas y las regresamos a lib/prospectos.php, las vaciamos en nuestra tabla contacto-prospecto lo haremos en la clase prospectos
 $alert = $prospectos->altaRelacionContactoProspecto();
 //$prospectos->altaOportunidad();
//echo json_encode(array("idProspecto" => $ultimoIdProspecto, "idContacto" => $ultimoIdContacto));

	
	$return = array(
				'alert' => $alert
					);

	echo json_encode(array('alert'=>$return['alert']));
	
	

?>
