<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
$idOportunidad=(isset($_REQUEST['idOportunidad']))?$_REQUEST['idOportunidad']:"";
  // Incluimos el archivo de configuración
	include '../../../conexionBD.php';
	// Requerimos la clase de prospectos
	require '../../../lib/prospectos.php';
  //Instanciamos nuestra clase prospectos
  require '../../../lib/contactos.php';

$contactos = new contactos($datosConexionBD);
$prospectos = new prospectos($datosConexionBD);
    $etapasProspectos = $prospectos->obtenerEtapas();
    $obtenerMonedas = $prospectos->obtenerMonedas();
$prospectos->idprospecto = $idprospecto;
$consultarRelacionDeProspectosContactos = $prospectos->consultarRelacionDeProspectosContactos();
$xg=1;
while($row = $consultarRelacionDeProspectosContactos->fetch_assoc()) {
	
       $idContacto[$xg] = $row['idcontacto'];
			 $contactos->idcontacto = $idContacto[$xg];
				
			 //consultamos el contacto por el id que acabamos de enviar
				$consultarContactoXId = $contactos->consultarContactoXId();

				 while($row2 = $consultarContactoXId->fetch_assoc()) {
								 $nombreContacto[$xg] = $row2['nombre'];
								 $apePaternoContacto[$xg] = $row2['apellidoP'];
					 				$showContacto[$xg] = $row2['show'];
					 			if($showContacto[$xg] == "0")
								{
									$xg++;
								}
							 }
    }
if (empty($idOportunidad)) {
	$actionBtn = "Guardar";
	$descripcion="";
	$costoPorOportunidad="";
	$nombreEtapa="";
	$nombreMoneda="";
	$simboloMoneda="";
	$idInicialDescripcion = 0;
	$idInicialCostos = 0;
	$periodosPagosOportunidad = "";
}else{
	$actionBtn = "Modificar";
	$prospectos->idOportunidad=$idOportunidad;
	$consultarOportunidadesXprospectoRow = $prospectos->consultarOportunidadXiD();
	 
	while($row = $consultarOportunidadesXprospectoRow->fetch_assoc()) {
          $descripcion = $row['descripcion'];
          $costoPorOportunidad = $row['costoPorOportunidad'];
          $monto = $row['monto'];
          $idmoneda = $row['idmoneda'];
          $idprospecto = $row['idprospecto'];
          $idetapa = $row['idetapa'];
          $idcontactoMod = $row['idcontacto'];
          $costoInstalacion = $row['costoInstalacion'];
          $periodosPagosOportunidad = $row['periodosPagos'];
          //$etapaProspecto = $row['idetapa'];
       }
	$prospectos->idmoneda=$idmoneda;
	$obtenerMonedaXIdRow = $prospectos->obtenerMonedaXId();
	while($row = $obtenerMonedaXIdRow->fetch_assoc()) {
          $nombreMoneda = $row['nombre'];
          $simboloMoneda = $row['simbolo'];
          //$etapaProspecto = $row['idetapa'];
       }
	$prospectos->etapaProspecto = $idetapa;
	$nombreEtapaXIdRow = $prospectos->nombreEtapaXId();
	while($row = $nombreEtapaXIdRow->fetch_assoc()) {
          $nombreEtapa = $row['nombre'];
       }
	$contactos->idcontacto = $idcontactoMod;
	$consultarContactoXIdRow = $contactos->consultarContactoXId();
	while($row = $consultarContactoXIdRow->fetch_assoc()){
		$nombreContactoMod = $row['nombre'];
		$ApellidoContactoMod = $row['apellidoP'];
	}
}

$descripcionesSeparadas = explode("-SEP-", $descripcion);
$costosSeparados = explode("-SEP-", $costoPorOportunidad);

$cantidadDescripciones = count($descripcionesSeparadas);
$cantidadCostos = count($costosSeparados);


if($actionBtn == "Modificar"){
	$idInicialDescripcion = $cantidadDescripciones + 1;
	$idInicialCostos = $cantidadCostos + 1;
	?>
<input type="hidden" value="<?=$cantidadDescripciones;?>" id="cantidadDescripciones">
<input type="hidden" value="<?=$cantidadCostos;?>" id="cantidadCostos">
<input type="hidden" value="<?=$idInicialDescripcion;?>" id="idInicialDescripcion" class="inputOportunidad">
<?php
}
?>
	<script src="../../../js/prospectos/altaOportunidad.js"></script>

	<form action="" id="oportunidadForm" method="post">
		<input type="hidden" value="<?=$idOportunidad;?>" id="idOportunidad">
				<h2 class="">Oportunidad</h2>
				<?php
							if($actionBtn == "Modificar"){
								?>
									<div class="circulo-material btn-agregar-plus"><span class="icon-pencil" id="activarModificar"></span></div>
									<input type="hidden" value="<?=$idOportunidad;?>" id="idOportunidad">
									<input type="hidden" value="<?=$idcontactoMod;?>" id="idcontactoMod">
								<?php
							}
				?>
		<div class="content-items-opotunidad">
				<div class="item-oportunidad">
						<label for="idContacto">Contacto</label>
						<select name="idContacto" id="idContacto" disabled class="form-control inputOportunidad">
							<?php
							if ($actionBtn == 'Guardar') {
							}else{
								?>
							<option value="<?=$idcontactoMod;?>"><?=$nombreContactoMod . " " . $ApellidoContactoMod;?></option>
							<?php
							}
							?>
						<?php
						for($i=1;$i<$xg;$i++){
							?>
							<option value="<?=$idContacto[$i];?>"><?=$nombreContacto[$i] . " " . $apePaternoContacto[$i];?></option>
							 <?php
							}
							?>
							</select>

							<label for="periodosPagosOportunidad">Definir los pagos:</label>
							<input type="text" id="periodosPagosOportunidad" class="form-control inputOportunidad" disabled placeholder="Renta Mensual Precio Educativo." value="<?=$periodosPagosOportunidad;?>">

								<label for="monedaOportunidad">Moneda</label>
								<select name="monedaOportunidad" class="form-control inputOportunidad" id="monedaOportunidad" disabled>
											<?php
											if (empty($nombreMoneda)) {}else{
												?>
											<option value="<?=$idmoneda;?>"><?=$simboloMoneda . " " . $nombreMoneda;?></option>
											<?php
											}
												?>
											<?php
												 while($row = $obtenerMonedas->fetch_assoc()) {
													 ?><option value="<?=$idOrigenProspecto = $row['idmoneda'];?>"><?=$row['simbolo']. " " .$row['nombre'];?></option>
													<?php  
													}
											?>
								</select>
					</div>
					<div class="item-oportunidad">
						<label for="montoOportunidad">Monto</label>
						<input type="number" id="montoOportunidad" name="montoOportunidad" class="form-control inputOportunidad" value="<?=$monto;?>" disabled>


							<label for="etapaProspecto">Etapa</label>
							<select name="etapaProspecto" id="etapaProspecto" class="form-control inputProspecto" disabled>
															<?php
													if (empty($nombreEtapa)) {}else{
														?>
															<option value="<?=$idetapa;?>"><?=$nombreEtapa;?></option>
														<?php
															}
															?>
															<?php
															 while($row = $etapasProspectos->fetch_assoc()) {
																 ?><option value="<?=$idEtapaProspecto = $row['idetapa'];?>"><?=$origenProspecto = $row['nombre'];?></option>
																<?php  
																}
														?>
								 </select>
						</div>
			</div>
				
				********************************************************************************************************************
<?php
				if($actionBtn=='Guardar'){
					?>
			 <div class="content-oportunides-altaOportunidad">
						<div class="content-descripcion-oportunidad-guardar items-oportunidades" id="descripcionDiv">
							<h5>Descripcion</h5>
							<div class="has-success">
								<input type="text" id="descripcionOportunidad<?=$idInicialDescripcion;?>" class="form-control inputOportunidad">
							</div>
						</div>
						
						<div class="content-costo-oportunidad items-oportunidades" id="costosDiv">
							<h5>Costo</h5>
							<div class="has-success">
								<input type="text" id="costoOportunidad<?=$idInicialCostos;?>" class="form-control inputOportunidad">
							</div>
						</div>
				</div>
					<div class="content-btn-agregar-oportunidad" id="costosMasDiv" style="display: none;">
						<label for="descripcionOportunidad" class="circulo-material btn-agregar-plus"><span class="icon-plus" id="masOportunidades"></span></label>
					</div>
					<br>
				<?php
				}else{
					?>
		<div class="content-oportunides-altaOportunidad">
							<div class="content-boteBasura-oportunidad items-oportunidades">
										<?php
										for($xElim = 0; $xElim < $cantidadDescripciones; $xElim++){
											?>
										<div class="elementos-oportunidades-cotizacion">
											<label for="radioDescripcionOculta<?=$xElim;?>" class="inputOportunidad circulo-material"><span class="icon-trash-o"></span></label>
										</div>
										<?php
										}
										?>
							</div>
							<div class="content-descripcion-oportunidad items-oportunidades" id="descripcionDivMod">
											<?php
											if($actionBtn=='Modificar'){
											for($xDes = 0; $xDes < $cantidadDescripciones; $xDes++){
													?>
												 <?php
												 if($xDes == 0){
													 ?><div class="has-success elementos-oportunidades-cotizacion">
																 <input type="radio" id="radioDescripcionOculta<?=$xDes;?>" class="inputRadio radioDescripcionOportunidad" value="<?=$xDes;?>">
																<input type="text" id="DescripcionOculta<?=$xDes;?>" value="<?=$descripcionesSeparadas[$xDes];?>" class="inputOportunidad form-control" disabled>
														 </div>
												 <?php
												 }else{
													 ?>
												<div class="elementos-oportunidades-cotizacion">
												 <input type="radio" id="radioDescripcionOculta<?=$xDes;?>" class="inputRadio radioDescripcionOportunidad" value="<?=$xDes;?>">
												<input type="text" id="DescripcionOculta<?=$xDes;?>" value="<?=$descripcionesSeparadas[$xDes];?>" class="inputOportunidad form-control" disabled>
												</div>
													<?php 
												 }
												?>
												<?php
												}
												?>
							</div>
							<div class="content-costo-oportunidad items-oportunidades" id="costosDivMod">
										<?php
										for($xCost = 0; $xCost < $cantidadDescripciones; $xCost++){
											?>
										<?php
											if($xCost == 0){
												?>
												<div class="has-success elementos-oportunidades-cotizacion">
													<input type="number" id="CostosOcultos<?=$xCost;?>" value="<?=$costosSeparados[$xCost];?>" class="inputOportunidad form-control" disabled>
												</div>
										<?php
											}else{
												?>
												<div class="elementos-oportunidades-cotizacion">
													<input type="number" id="CostosOcultos<?=$xCost;?>" value="<?=$costosSeparados[$xCost];?>" class="inputOportunidad form-control" disabled>
												</div>
											<?php
											}
										}
											}
										?>
							</div>
					</div>
		<div class="">
			<div class="col-xs-8" id="descripcionDiv"></div>
			<div class="col-xs-4" id="costosDiv"></div>
		</div>
		<div class="content-btn-agregar-oportunidad" id="costosMasDiv" style="display: none;">
				<label for="descripcionOportunidad" class="circulo-material btn-agregar-plus"><span class="icon-plus" id="masOportunidades"></span></label>
		</div>
		<br>
				
				<?php
				}
				?>
					<div class="content-costo-instalacion" id="costoInstalacionDiv" style="display: none;">
						<label for="costoInstalacion">Costo por instalación</label>
						<input type="number" id="costoInstalacion" name="costoInstalacion" class="form-control inputOportunidad" value="<?=$costoInstalacion;?>" disabled>
					</div>

			<div class="content-btns-oportunidades">
				<input type="hidden" id="idprospecto" value="<?=$idprospecto;?>">
				<input type="submit" value="<?=$actionBtn;?>" name="enviar" class="btn btn-primary" id="btnActionGeneral">
				<div id="descargarReportes" style="display: none;" class="">
					<span id="descargarCotizacion" class="btn btn-danger"><span class="icon-file-pdf"> Cotización</span></span>
				</div>
			</div>
	</form>
	<script>
		$(document).ready(function(){
		var banderaClick = 0;
		if ($("#btnActionGeneral").val() == "Guardar") {
			banderaClick = 1;
			$("input").each(function(i) {
				$(".inputOportunidad").removeAttr('disabled');
			});
			$("select").each(function(i) {
				$("select").removeAttr('disabled');
			});
		} else {
			banderaClick = 0;
		}
		$("#cerrarOportunidad").click(function() {
			//$("#content").load("../../views/prospectos/detalleProspecto.php?idprospecto=" + $("#idprospecto").val());
			$("#conentDetallePros").load("../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());

		});

		$("#descargarCotizacion").click(function() {
			if (banderaClick == 1) {
				//alert("Guarda la oportunidad para poder generar el PDF");
				swal("Guarda la oportunidad", "y descargar el pdf", "warning")
			} else {
				//alert($("idcontacto").val());
				//alert(banderaClick);
				//banderaClick = 1;
				//parametro = parametro + contacto;
				window.open("/actions/reportes/rptCotizacion.php?idprospecto=" + $("#idprospecto").val() + "&idOportunidad=" + $("#idOportunidad").val() + "&idcontactoMod=" + $("#idcontactoMod").val());
			}
			//$("#content").load("../../views/prospectos/detalleProspecto.php?idprospecto=" + $("#idprospecto").val());
			//$("#conentDetallePros").load("../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());

		});
		$("#activarModificar").click(function() {
			banderaClick = 1;
			//alert("click")
			$("input").each(function(i) {
				$(".inputOportunidad").removeAttr('disabled');
			});
			$("select").each(function(i) {
				$("select").removeAttr('disabled');
			});
		});
*************************************************************************************************
		//3 es cotizacion
		if ($("#etapaProspecto").val() == "3") {
			//alert("ya eres");
			document.getElementById("descargarReportes").style.display = "inline-block";
			document.getElementById("costosMasDiv").style.display = "inline-block";
			document.getElementById("costoInstalacionDiv").style.display = "inline-block";
		} else {
			document.getElementById("descargarReportes").style.display = "none";
			document.getElementById("costosMasDiv").style.display = "none";
			document.getElementById("costoInstalacionDiv").style.display = "none";
		}
		$("#etapaProspecto").change(function() {
			if ($("#etapaProspecto").val() == "3") {
				//alert("ya eres");
				document.getElementById("descargarReportes").style.display = "inline-block";
				document.getElementById("costosMasDiv").style.display = "inline-block";
				document.getElementById("costoInstalacionDiv").style.display = "inline-block";
			} else {
				document.getElementById("descargarReportes").style.display = "none";
				document.getElementById("costosMasDiv").style.display = "none";
				document.getElementById("costoInstalacionDiv").style.display = "none";
			}
		});
		//Empezamos con la parte de actualizar y a;adir campos por cada separacion que viene de la BD
	//en el archivo js/prospectos/altaOportunidad.js
			});
	</script>