<?php
//incluimos el archivo de configuracion de la BD
  include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
  require '../../lib/prospectos.php';
$prospectos = new prospectos($datosConexionBD);
$consultarProspectos = $prospectos->consultarProspectos(); 
//echo "funcionando";
$filtroParaQueryVerProspectosReq=(isset($_REQUEST['filtroParaQueryVerProspectos']))?$_REQUEST['filtroParaQueryVerProspectos']:"";
//echo $filtroParaQueryVerProspectos;
if( $filtroParaQueryVerProspectosReq == "todosProspectos"){
  $consultarProspectos = $prospectos->consultarProspectos(); 
}else{
  $filtroParaQueryVerProspectos = "consultarProspectos" . $filtroParaQueryVerProspectosReq;
  $consultarProspectos = $prospectos->$filtroParaQueryVerProspectos();
}

?>