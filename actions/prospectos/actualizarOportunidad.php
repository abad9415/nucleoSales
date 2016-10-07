<?php
session_start();
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';

$prospectos = new prospectos($datosConexionBD);

$prospectos->monedaOportunidad = $_POST['monedaOportunidad'];
$prospectos->montoOportunidad = $_POST['montoOportunidad'];
$prospectos->etapaOportunidad = $_POST['etapaProspecto'];
$prospectos->idContacto = $_POST['idContacto'];
$prospectos->idOportunidad = $_POST['idOportunidad'];
$prospectos->descripcionOportunidad = $_POST['descripciones'];
$prospectos->costoOportunidad = $_POST['costos'];
$prospectos->costoInstalacion = $_POST['costoInstalacion'];
$prospectos->periodosPagos = $_POST['periodosPagosOportunidad'];

$comision = 0;
if($_POST['etapaProspecto'] == 6){
  $prospectos->idVendedor = $_SESSION['idvendedor'];
  $consultarcomisionXidVendedorRow = $prospectos->consultarcomisionXidVendedor();
  while($row = $consultarcomisionXidVendedorRow->fetch_assoc()) {
       $comisionDelVendedor = $row['comision'];
  }
  $comision = ($comisionDelVendedor * $_POST['montoOportunidad'])/100;
  
}
$prospectos->comision = $comision;

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
echo $prospectos->actualizarOportunidad();
?>