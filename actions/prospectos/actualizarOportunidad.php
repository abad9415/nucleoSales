<?php
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
//$prospectos->idcontacto = $_POST['idcontacto'];

echo $prospectos->actualizarOportunidad();
?>