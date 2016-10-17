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
$prospectos->descripcionOportunidad = $_POST['descripcionOportunidad'];
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
 $respuesta = $prospectos->altaOportunidad();

if($_FILES['archivoCotizacion']['name'] != ""){
    $ultimoIdRow = $prospectos->ultimoIdOportunidad();
    foreach($ultimoIdRow as $row)
    {
      $ultimoIdOportunidad = $row['idoportunidad'];
    }
  
  
    /*validando si existe directorio para el prospecto*/
    $idProspecto = $_POST['idprospecto'];
    $carpetaProspectoOportunidad = "../../files/cotizacion/$idProspecto/$ultimoIdOportunidad";
  
    if (!file_exists($carpetaProspectoOportunidad)) {
          mkdir($carpetaProspectoOportunidad, 0777, true);
      }
    /*validando si existe directorio para el prospecto*/
  
    move_uploaded_file($_FILES['archivoCotizacion']['tmp_name'], "$carpetaProspectoOportunidad/" . $_FILES['archivoCotizacion']['name']);

    $prospectos->ultimoIdOportunidad = $ultimoIdOportunidad;
    $prospectos->archivo = $_FILES['archivoCotizacion']['name'];
    $respuesta = $prospectos->altaArchivoOportunidad();
}
echo $respuesta;
?>