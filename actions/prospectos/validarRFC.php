<?php
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';
//Instaciamos la clase prospectos
$prospectos = new prospectos($datosConexionBD);

$prospectos->rfcEmpresa = $_POST['rfc'];
$respuestaValidacion = $prospectos->validarRFC();
//print_r($respuestaValidacion);
//echo $respuestaValidacion;
$cuenta = $respuestaValidacion->rowCount();
if($cuenta == 0){
  echo "0";
}else{
  echo "1";
}
?>