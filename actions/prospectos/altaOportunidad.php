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
$prospectos->ultimoIdProspecto = $_POST['idprospecto'];
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
echo $prospectos->altaOportunidad();
?>