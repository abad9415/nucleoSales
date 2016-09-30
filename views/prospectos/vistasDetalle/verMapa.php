<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/prospectos.php';
$prospectos = new prospectos($datosConexionBD);
$prospectos->idprospecto = $idprospecto;


$consultarEmpresaXId = $prospectos->consultarEmpresaXId();

 while($row = $consultarEmpresaXId->fetch_assoc()) {
          $nombreEmpresa = $row['nombre'];
          $calleEmpresa = $row['calle'];
          $numeroEmpresa = $row['numerodomicilio'];
          $coloniaEmpresa = $row['colonia'];
          $ciudadEmpresa = $row['ciudad'];
          $cpEmpresa = $row['cp'];
          $IdestadoEmpresa = $row['idestado'];
          $IorigenEmpresa = $row['idorigen'];
          $colorEmpresa = $row['color'];
          //$etapaProspecto = $row['idetapa'];
       }

$prospectos->estadoProspecto = $IdestadoEmpresa;
$estadoProspectoRow = $prospectos->nombreEstadoXId();
 while($row = $estadoProspectoRow->fetch_assoc()) {
         $estadoProspecto = $row['nombre'];
       }

$prospectos->origenProspecto = $IorigenEmpresa;
$origenProspectoRow = $prospectos->nombreProspectoXId();
 while($row = $origenProspectoRow->fetch_assoc()) {
         $origenProspecto = $row['nombre'];
       }
$estadosProspectos = $prospectos->obtenerEstados();
$origenesProspectos = $prospectos->obtenerOrigenes();

?>
<input type="color" id="colorProspecto" value="<?=$colorEmpresa;?>" style="display:none;">
<input type="hidden" value="<?=$calleEmpresa;?>" size="15" id="calleEmpresa" disabled class="inputEmpresa">
<input type="hidden" value="<?=$numeroEmpresa;?>" size="10" id="numeroEmpresa" disabled class="inputEmpresa">
<input type="hidden" value="<?=$coloniaEmpresa;?>" size="15" id="coloniaEmpresa" disabled class="inputEmpresa">
<input type="hidden" value="<?=$cpEmpresa;?>" size="15" id="cpEmpresa" disabled class="inputEmpresa">
<input type="hidden" value="<?=$ciudadEmpresa;?>" size="15" id="ciudadEmpresa" disabled class="inputEmpresa">
	<div id='map_canvasDetalle' class="maps"></div>
    

	<!------ Form Empresa  ------->
	<script src='/js/mapsDetalle.js'></script>
	<script>
         $("#MapaBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": $("#colorProspecto").val()
					});
        $("#OportunidadesBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": "rgba(255,255,255,0)"
					});
         $("#ContactosBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": "rgba(255,255,255,0)"
					});
         $("#CitasBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": "rgba(255,255,255,0)"
					});
        
	</script>