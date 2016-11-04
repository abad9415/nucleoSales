<?php
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';
$prospectos = new prospectos($datosConexionBD);
/////////////////////////////////////// Codigo postal ///////////////////////
   if (empty($_POST['cp'])) {
   }else{
      $prospectos->cpEmpresa = $_POST['cp'];
      $domicilioRow = $prospectos->consultarDomicilioXCP();
      foreach($domicilioRow as $row){
          $colonia = $row['Colonia'];
          $Municipio = $row['Municipio'];
          $Estado = $row['Estado'];
          $cp = $row['CodigoPostal'];
      }
   }
   $return = array(
      'alert' => $alert,
      'cp' => $cp,
      'colonia' => $colonia,
      'municipio' => $Municipio,
      'estado' => $Estado
  );
/////////////////////////////////////// Codigo postal ///////////////////////
/////////////////////////// Consulatmos ciudades por Estadp /////////////////////////////////////
if (empty($_POST['estado'])) {
   }else{
       
      $prospectos->estadoDomicilioEmpresa = $_POST['estado'];
      $municipiosRow = $prospectos->consultarCiudadesXEstado();
      $x = 0;
      foreach($municipiosRow as $row){
        $municipio[$x] = $row['Municipio'];
        $x++;
      }
     $return = array(
      'municipio' => $municipio,
      'numCiudades' => $x
  );
   }

/////////////////////////// Consulatmos ciudades por Estadp /////////////////////////////////////

/////////////////////////// Consulatmos Colonias por Ciudad /////////////////////////////////////
if (empty($_POST['ciudad'])) {
   }else{
       
      $prospectos->ciudadEmpresa = $_POST['ciudad'];
      $municipiosRow = $prospectos->consultarColoniasXCiudad();
      $x = 0;
      foreach($municipiosRow as $row){
        $colonia[$x] = $row['Colonia'];
        $x++;
      }
     $return = array(
      'colonia' => $colonia,
      'numColonias' => $x
  );
   }

/////////////////////////// Consulatmos Colonias por Ciudad /////////////////////////////////////


echo json_encode($return);
?>