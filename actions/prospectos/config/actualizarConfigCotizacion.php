<?php
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/prospectos.php';

$prospectos = new prospectos($datosConexionBD);

$prospectos->descripcionCot = $_POST['descripcionCot'];
$prospectos->caracteristicasCot = $_POST['caracteristicasCot'];
$prospectos->extrasCot = $_POST['extrasCot'];
$prospectos->despedidaCot = $_POST['despedidaCot'];
$prospectos->firmaCot = $_POST['firmaCot'];
$prospectos->idconfigCotizacion = $_POST['idconfigCotizacion'];

echo $prospectos->actualizarConfigCotizacion();
?>