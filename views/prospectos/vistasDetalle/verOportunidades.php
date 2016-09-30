<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";

//incluimos el archivo de configuracion de la BD
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/prospectos.php';
 //Instanciamos nuestra clase prospectos
  require '../../../lib/contactos.php';
$contactos = new contactos($datosConexionBD);
$prospectos = new prospectos($datosConexionBD);
$prospectos->idprospecto = $idprospecto;

$consultarEmpresaXId = $prospectos->consultarEmpresaXId();

 while($row = $consultarEmpresaXId->fetch_assoc()) {
          $colorEmpresa = $row['color'];
       }
#########################################
#RECORREOS EL ARREGLO PARA OPORTUNIDAD###
#########################################
$consultarOportunidadesXprospecto = $prospectos->consultarOportunidadesXprospecto();
$xe = 0;
$xetapa = 0;
while($row = $consultarOportunidadesXprospecto->fetch_assoc()) {
	$xe++;
			$idoportunidad[$xe] = $row['idoportunidad'];
			$descripcion[$xe] = $row['descripcion'];
			$monto[$xe] = $row['monto'];
			$idetapa[$xe] = $row['idetapa'];
    $separandoDesc = explode("-SEP-", $descripcion[$xe]);
	$descripcion[$xe] = $separandoDesc [0];
	
		}
for($xa=1;$xa<=$xe;$xa++)
{
	
	$prospectos->etapaProspecto = $idetapa[$xa];
	$etapaActualRow = $prospectos->nombreEtapaXId();
	
	while($row = $etapaActualRow->fetch_assoc()) {
			$etapaActual = $row['nombre'];
		}
	
	$etapaActualFuera[$xa] = $etapaActual;
	//$etapaOportunidad[$xa] = $etapaActual = $prospectos->nombreEtapaXId();
}

#########################################
#RECORREOS EL ARREGLO PARA OPORTUNIDAD###
#########################################
?>
<script src="/js/prospectos/crearAgenda.js"></script>
<input type="color" id="colorProspecto" value="<?=$colorEmpresa;?>" style="display:none;">
			<article class="content-tabla-prospectos">
				<span id="addOportunidadClick" class="circulo-material btn-agregar-plus"><span class="icon-plus"></span></span>
				<table class="table table-hover tableEAT">
					<thead>
						<tr>
							<th>Descripcion</th>
							<th>Monto</th>
							<th>Etapa</th>
						</tr>
					</thead>
					<?php
										for($xa=1;$xa<=$xe;$xa++) {
											?>
						<tr>
							<td>
								
								<div class="dropdown">
										<span class="dropdown-toggle icon-ellipsis-v" data-toggle="dropdown"></span>
										<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
											<li role="presentation"><label for="idOportunidadMod<?=$xa;?>" class="pegarLabel" role="menuitem" tabindex="-1">Detalles</label></li>
											<input type="radio" name="idOportunidadMod" value="<?=$idoportunidad[$xa]?>" class="idOportunidadMod inputRadio" id="idOportunidadMod<?=$xa;?>">

										 </ul><?=$descripcion[$xa]?>
								</div>
							</td>
							<td>
								<?=$monto[$xa]?>
							</td>
							<td>
								<?=$etapaActualFuera[$xa]?>
							</td>
						</tr>

						<?php
											}
									?>
				</table>
			</article>
			
<script>
 $("#MapaBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": "rgba(255,255,255,0)"
					});
        $("#OportunidadesBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": $("#colorProspecto").val()
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
