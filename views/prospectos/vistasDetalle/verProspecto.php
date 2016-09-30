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
	 				$rfcEmpresa = $row['rfc'];
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
<input type="hidden" value="<?=$nombreEmpresa;?>"id="nombreEmpresa">
	<form action="" id="formEmpresaDetalleProspectos" class="formsDetalleProspectos row" method="post">
		<!------ Form Empresa  ------->
					
		<div class="col-md-4 col-sm-6">
					<p><span class="txt-oscuro">RFC: </span><span id="content-rfc-prospecto"><input type="text" value="<?=$rfcEmpresa;?>" size="15" id="rfcEmpresa" disabled class="inputEmpresa form-control"></span></p>
					<p><span class="txt-oscuro">Calle: </span><input type="text" value="<?=$calleEmpresa;?>" size="15" id="calleEmpresa" disabled class="inputEmpresa form-control"></p>
					<p><span class="txt-oscuro">Numero: </span><input type="text" value="<?=$numeroEmpresa;?>" size="10" id="numeroEmpresa" disabled class="inputEmpresa form-control"></p>
					<p><span class="txt-oscuro">Colonia: </span><input type="text" value="<?=$coloniaEmpresa;?>" size="15" id="coloniaEmpresa" disabled class="inputEmpresa form-control"></p>
					<p><span class="txt-oscuro">Cp: </span><input type="text" value="<?=$cpEmpresa;?>" size="15" id="cpEmpresa" disabled class="inputEmpresa form-control"></p>
		</div>
		<div class="col-md-4 col-sm-6">
					<p><span class="txt-oscuro">Ciudad: </span><input type="text" value="<?=$ciudadEmpresa;?>" size="15" id="ciudadEmpresa" disabled class="inputEmpresa form-control"></p>
					<p><span class="txt-oscuro nombreOrigen">Origen:</span>
							<select name="origenProspecto" id="origenProspecto" class="form-control" disabled>
									<option value="<?=$IorigenEmpresa;?>"><?=$origenProspecto;?></option>
										<?php

											 while($row = $origenesProspectos->fetch_assoc()) {
												 ?><option value="<?=$idOrigenProspecto = $row['idorigen'];?>"><?=$origenProspecto = $row['nombre'];?></option>
												<?php  
												}
										?>
								</select>
					</p>
					<p><span class="txt-oscuro nombreEstado">Estado:</span>
							<select name="estadoProspecto" id="estadoProspecto" class="form-control" disabled class="">
									<option value="<?=$IdestadoEmpresa;?>"><?=$estadoProspecto;?></option>
										<?php

											 while($row = $estadosProspectos->fetch_assoc()) {
												 ?><option value="<?=$idEstadoProspecto = $row['idestado'];?>"><?=$estadoProspecto = $row['nombre'];?></option>
												<?php  
												}
										?>
								</select>
						</p>
						<p><span class="txt-oscuro">Color:</span>
						<input type="color" id="colorProspecto" value="<?=$colorEmpresa;?>" style="display:none;" class="inputEmpresa form-control">
						</p>
							<br>
						<input type="submit" value="Actualizar" class="btn btn-primary" id="submitEmpresa" style="display:none;">
		</div>
		<div class="col-md-4 col-sm-6">
			<br>
			<div id='map_canvasDetalle' class="maps"></div>
		</div>
	</form>
	<!------ Form Empresa  ------->
	<script src='/js/mapsDetalle.js'></script>
	<script src="/js/prospectos/ActualizarDetalleProspecto.js"></script>
	<script>
		$(document).ready(function() {
			//$("#activarEmpresa").click(function() {
				//$( "input:hidden" ).show(200);
				$("#submitEmpresa:hidden").show(200);
				$("#colorProspecto:hidden").show(200);

				$("input").each(function(i) {
					$(".inputEmpresa").removeAttr('disabled');
				});
				$("select").each(function(i) {
					$("select").removeAttr('disabled');
				});
			//});
			
			$("#colorProspecto")
				.change(function() {
                
					$(".colorEmpresaEAT").css({
						"background": $("#colorProspecto").val()
					});
				$("#circuloOfotoEmpresa").css({
						"background": $("#colorProspecto").val()
					});
				})
				
		});
         $("#MapaBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": "rgba(255,255,255,0)"
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