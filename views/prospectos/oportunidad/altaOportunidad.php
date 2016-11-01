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

  foreach($consultarRelacionDeProspectosContactos as $row){
     $idContacto[$xg] = $row['idcontacto'];
     $contactos->idcontacto = $idContacto[$xg];

     //consultamos el contacto por el id que acabamos de enviar
      $consultarContactoXId = $contactos->consultarContactoXId();

     foreach($consultarContactoXId as $row2)
           {
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
          $monto = $row['monto'];
          $idmoneda = $row['idmoneda'];
          $idprospecto = $row['idprospecto'];
          $idetapa = $row['idetapa'];
          $idcontactoMod = $row['idcontacto'];
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
        $prospectos->idOportunidad = $idOportunidad;
        $archivosRow = $prospectos->consultarArchivosCotizacion();
    }

?>
<form enctype="multipart/form-data" id="oportunidadForm" method="post">
    <input type="hidden" value="<?=$idOportunidad;?>" id="idOportunidad" name="idOportunidad">
    <input type="hidden" value="<?=$idcontactoMod;?>" id="idcontactoMod">
  	<?php
							if($actionBtn == "Modificar"){
								?>
									<div id="activarModificar" class="circulo-material btn-agregar-plus"><span class="icon-pencil"></span></div>
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
									<select id="periodosPagosOportunidad" name="periodosPagosOportunidad" class="form-control inputOportunidad" disabled>
												<?php
													if (empty($periodosPagosOportunidad)) {}else{
														?>
																<option value="Mensual">Mensual</option>
																<option value="Semestral">Semestral</option>
																<option value="Anual">Anual</option>
														<?php
															}
															?>
															<?php
															 while($row = $consultarOportunidadesXprospectoRow->fetch_assoc()) {
																 ?><option value="<?$row['periodosPagos'];?>"><?$row['periodosPagos'];?></option>
																<?php  
																}
														?>
										
										
										
										
									</select>
						

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
              <label for="descripcionOportunidad">Descripcion</label>
              <input type="text" id="descripcionOportunidad" name="descripcionOportunidad" class="form-control inputOportunidad" value="<?=$descripcion;?>" disabled>
					</div>
          <div id="mostrarArchivosCotizacion" class="content-archivos-cotizacion">
            <?php
						$iarch = 0;
            foreach($archivosRow as $rowArchivos){
							if($iarch == 0){
								?>
						<label class="content-btns-oportunidades">Archivos</label>
						<?php
								$iarch = 1;
							}
              ?>
                <input type="radio" id="descargarArchivoCotizacion<?=$rowArchivos['idarchivosOportunidad'];?>" class="descargarArchivoCotizacion inputRadio" value="<?=$rowArchivos['idarchivosOportunidad'];?>">
                <label for="descargarArchivoCotizacion<?=$rowArchivos['idarchivosOportunidad'];?>" type="button" class="btn btn-success content-btns-oportunidades"><span class="icon-file-pdf"></span> <?=$rowArchivos['archivo'];?></label>
            <?php
            }
            ?>
            
          </div>
			</div>
      <div class="content-btns-oportunidades">
				<input type="hidden" id="idprospecto" name ="idprospecto" value="<?=$idprospecto;?>">
				<input type="hidden" id="actionBtn" name ="actionBtn" value="<?=$actionBtn;?>">
				<input type="submit" value="<?=$actionBtn;?>" name="enviar" class="btn btn-primary inputOportunidad" id="btnActionGeneral" disabled>
				<div id="descargarReportes" style="display: none;" class="">
          <input type="file" id="archivoCotizacion" name="archivoCotizacion" class="form-control inputOportunidad" disabled>
<!-- 					<span id="descargarCotizacion" class="btn btn-danger"><span class="icon-file-pdf">Cotización</span></span> -->
				</div>
			</div>
</form>
<div id="content-download"></div>
<script>
		$(document).ready(function(){
		var banderaClick = 0;
		if ($("#btnActionGeneral").val() == "Guardar") {
			$("input").each(function(i) {
				$(".inputOportunidad").removeAttr('disabled');
			});
			$("select").each(function(i) {
				$("select").removeAttr('disabled');
			});
		}
		$("#cerrarOportunidad").click(function() {
			//$("#content").load("../../views/prospectos/detalleProspecto.php?idprospecto=" + $("#idprospecto").val());
			$("#conentDetallePros").load("../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());

		});

		$("#descargarCotizacion").click(function() {
				swal("Momentito por favor!", "trabajando en esto..", "warning")
				//window.open("/actions/reportes/rptCotizacion.php?idprospecto=" + $("#idprospecto").val() + "&idOportunidad=" + $("#idOportunidad").val() + "&idcontactoMod=" + $("#idcontactoMod").val());
		});
		$("#activarModificar").click(function() {
			$("input").each(function(i) {
				$(".inputOportunidad").removeAttr('disabled');
			});
			$("select").each(function(i) {
				$("select").removeAttr('disabled');
			});
		});
      
      /*Etapa 3 = cotizacion*/
       if ($("#etapaProspecto").val() == "3") {
          //alert("ya eres");
          document.getElementById("descargarReportes").style.display = "inline-block";
          } else {
            document.getElementById("descargarReportes").style.display = "none";
          }
          $("#etapaProspecto").change(function() {
            if ($("#etapaProspecto").val() == "3") {
              //alert("ya eres");
              document.getElementById("descargarReportes").style.display = "inline-block";
            } else {
              document.getElementById("descargarReportes").style.display = "none";
            }
        });
      /*Etapa 3 = cotizacion*/
      
      
      /*enviar por ajax todos los datos incluyendo el archivo*/
           $("#oportunidadForm").submit(function(e){
             if($("#btnActionGeneral").val()=='Guardar'){
               var url="../../../actions/prospectos/altaOportunidad.php";
             }else if($("#btnActionGeneral").val()=='Modificar'){
               var url="../../../actions/prospectos/actualizarOportunidad.php";
             }
             
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("oportunidadForm"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: url,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
               })    
                .done(function(result){
                     //$("#content").load("/views/vendedor.php");
                      swal(result+"!", "", "success")
                  if(result == "Cambio exitoso"){
                    $("#conentDetallePros").load("../../../views/prospectos/oportunidad/altaOportunidad.php", {idprospecto: $("#idprospecto").val(), idOportunidad: $("#idOportunidad").val() } );
                  }else{
                    $("#conentDetallePros").load("../../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());
                  }
                });
           
        });
      /*enviar por ajax todos los datos incluyendo el archivo*/
      
      /*Descargar el archivo de la cotizacion*/
      $(".descargarArchivoCotizacion").click(function(){
				window.location.replace("../../../actions/prospectos/oportunidades/descargarArchivo.php?idArchivoOportunidad=" + $(this).val() + "&idprospecto=" + $("#idprospecto").val() + "&idOportunidad=" + $("#idOportunidad").val());
			//window.location.replace("../../../actions/prospectos/oportunidades/descargarArchivo.php", {idArchivoOportunidad: $(this).val(), idprospecto: $("#idprospecto").val(), idOportunidad: $("#idOportunidad").val() });		
			});
      /*Descargar el archivo de la cotizacion*/
			
			//Buscamos la definicion de pagos para seleecionarla
			if($("#actionBtn").val() == 'Modificar'){
      $( "option:contains('<?=$periodosPagosOportunidad;?>')" ).attr('selected','selected');
      $( "option:contains('<?=$idetapa;?>')" ).attr('selected','selected');
  		}
    });
</script>



