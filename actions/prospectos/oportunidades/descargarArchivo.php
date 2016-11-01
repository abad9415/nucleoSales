<?php
$idArchivoOportunidad=(isset($_REQUEST['idArchivoOportunidad']))?$_REQUEST['idArchivoOportunidad']:"";
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
$idOportunidad=(isset($_REQUEST['idOportunidad']))?$_REQUEST['idOportunidad']:"";

	include '../../../conexionBD.php';
	// Requerimos la clase de prospectos
	require '../../../lib/prospectos.php';
  $prospectos = new prospectos($datosConexionBD);
  $prospectos->idarchivosOportunidad = $idArchivoOportunidad;
  $consultarArchivoXIdRow = $prospectos->consultarArchivosCotizacionXId();
foreach($consultarArchivoXIdRow as $row){
  $nombreArchivo = $row['archivo'];
}
header("Content-disposition: attachment; filename=$nombreArchivo");
// $mime = mime_content_type("$nombreArchivo");
// header("Content-type: $mime");
readfile("../../../files/cotizacion/$idprospecto/$idOportunidad/$nombreArchivo");
?>