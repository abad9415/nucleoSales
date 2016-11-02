<?php
session_start();
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';

$prospectos = new prospectos($datosConexionBD);

$prospectos->monedaOportunidad = $_POST['monedaOportunidad'];
$prospectos->montoOportunidad = $_POST['montoOportunidad'];
$prospectos->costoInstalacionOportunidad = $_POST['costoInstalacionOportunidad'];
$prospectos->etapaOportunidad = $_POST['etapaProspecto'];
$prospectos->idContacto = $_POST['idContacto'];
$prospectos->idOportunidad = $_POST['idOportunidad'];
$prospectos->descripcionOportunidad = $_POST['descripcionOportunidad'];
$prospectos->periodosPagos = $_POST['periodosPagosOportunidad'];

$comision = 0;
$comisionInstalacion = 0;
/*Validando y asignando comisiones*/
 $prospectos->idVendedor = $_SESSION['idvendedor'];
  $consultarcomisionXidVendedorRow = $prospectos->consultarcomisionXidVendedor();
  while($row = $consultarcomisionXidVendedorRow->fetch_assoc()) {
       $comisionDelVendedor = $row['comision'];
       $comisionDelVendedorInstalacion = $row['comisionxinstalacion'];
  }
if($_POST['etapaProspecto'] == 6){
  $comision = ($comisionDelVendedor * $_POST['montoOportunidad'])/100;
	$comisionInstalacion = ($comisionDelVendedorInstalacion * $_POST['costoInstalacionOportunidad'])/100;
}
/*Validando y asignando comisiones*/
$prospectos->comision = $comision;
$prospectos->comisionInstalacion = $comisionInstalacion;
  $prospectos->idOportunidad=$_POST['idOportunidad'];
	$consultarOportunidadesXprospectoRow = $prospectos->consultarOportunidadXiD();
  while($row = $consultarOportunidadesXprospectoRow->fetch_assoc()) {
    $idetapaActual = $row['idetapa'];
    $fechaActual = $row['fechadeetapa'];
  }
$fechaSistemaDesdeAction = '';
if($idetapaActual == $_POST['etapaProspecto']){
  $fechaSistemaDesdeAction = $fechaActual;
}else{
  $fechaSistemaDesdeAction = date("Y-m-d");
}

$prospectos->fechaSistemaDesdeAction = $fechaSistemaDesdeAction;

$respuestaActualizacion = $prospectos->actualizarOportunidad();

// $prospectos->ultimoIdOportunidad = $_POST['idOportunidad'];
// $prospectos->archivo = $_FILES['archivoCotizacion']['name'];
// $prospectos->altaArchivoOportunidad();
if($_FILES['archivoCotizacion']['name'] != ""){
  
  
    /*validando si existe directorio para el prospecto*/
    $idProspecto = $_POST['idprospecto'];
    $ultimoIdOportunidad = $_POST['idOportunidad'];
    $carpetaProspectoOportunidad = "../../files/cotizacion/$idProspecto/$ultimoIdOportunidad";
  
    if (!file_exists($carpetaProspectoOportunidad)) {
          mkdir($carpetaProspectoOportunidad, 0777, true);
      }
    /*validando si existe directorio para el prospecto*/
  
    move_uploaded_file($_FILES['archivoCotizacion']['tmp_name'], "$carpetaProspectoOportunidad/" . $_FILES['archivoCotizacion']['name']);

    $prospectos->ultimoIdOportunidad = $_POST['idOportunidad'];
    $prospectos->archivo = $_FILES['archivoCotizacion']['name'];
    $respuestaActualizacion = $prospectos->altaArchivoOportunidad();
}

echo $respuestaActualizacion;

//echo $_POST['idOportunidad'];
?>