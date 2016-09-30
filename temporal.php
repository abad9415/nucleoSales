<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
//echo $idprospecto;
//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/prospectos.php';
 //Instanciamos nuestra clase prospectos
  require '../../lib/contactos.php';

require '../../lib/agenda.php';

$contactos = new contactos($datosConexionBD);
$prospectos = new prospectos($datosConexionBD);
$agenda = new agenda($datosConexionBD);


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
          //$etapaProspecto = $row['idetapa'];
       }

//$prospectos->etapaProspecto = $etapaProspecto;

/*$nombreEtapaXId = $prospectos->nombreEtapaXId();
   while($row = $nombreEtapaXId->fetch_assoc()) {
     $origenProspecto = $row['nombre'];
    }*/

/*Empezamos a consultar ahora los contactos
Por el momento funcionara solo para un usuario */
$consultarRelacionDeProspectosContactos = $prospectos->consultarRelacionDeProspectosContactos();
while($row = $consultarRelacionDeProspectosContactos->fetch_assoc()) {
       $idContacto = $row['idcontacto'];
    }
$contactos->idcontacto = $idContacto;

//consultamos el contacto por el id que acabamos de enviar
$consultarContactoXId = $contactos->consultarContactoXId();

 while($row = $consultarContactoXId->fetch_assoc()) {
         $sexoContacto = $row['trato'];
         $nombreContacto = $row['nombre'];
         $apePaternoContacto = $row['apellidoP'];
         $apeMaternoContacto = $row['apellidoM'];
         $telefonoContacto = $row['telefono'];
         $correo = $row['correo'];
         $cargoContacto = $row['cargo'];
          
       }
//consultareamos de una vez la agenda con este usuario especificamente
$prospectos->idprospecto = $idprospecto;

$agenda->idprospecto = $idprospecto;
$agenda->idContacto = $idContacto;

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

$consultarOportunidadesXprospecto = $prospectos->consultarOportunidadesXprospecto();
$consultarAgendaXUsuario = $agenda->consultarAgendaXUsuario();

#########################################
#RECORREOS EL ARREGLO PARA OPORTUNIDAD###
#########################################
$xe = 0;
$xetapa = 0;
while($row = $consultarOportunidadesXprospecto->fetch_assoc()) {
	$xe++;
			$descripcion[$xe] = $row['descripcion'];
			$monto[$xe] = $row['monto'];
			$idetapa[$xe] = $row['idetapa'];
	
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
$estadosProspectos = $prospectos->obtenerEstados();

?>
	<script src="/js/prospectos/crearAgenda.js"></script>
	<input type="hidden" id="idcontacto" value="<?=$idContacto;?>">


	<section class="contentInt">
		<div class="row">
			<div class="col-md-12">
				<a href="#" id="refrescarEsta">Refrescar</a>
				<h2 class="text-center">Detalle del Prospecto</h2></div>

<form action="" id="formEmpresaDetalleProspectos" class="formsDetalleProspectos"> <!------ Form Empresa  ------->
			<div class="col-md-12">
				<h3><input type="text" value="<?=$nombreEmpresa;?>" placeholder="Nombre" disabled id="nombreEmpresa"></h3>
				<a href="#" id="activarEmpresa"><span class="icon-pencil"></span></a>
			</div>

			<div class="col-md-4">
				<p><span class="txt-oscuro">Id: </span><input type="text" value="<?=$idprospecto;?>" size="10" disabled id="idprospecto"></p>
				<p><span class="txt-oscuro">Calle: </span><input type="text" value="<?=$calleEmpresa;?>" size="15" id="calleEmpresa" disabled></p>
				<p><span class="txt-oscuro">Numero: </span><input type="text" value="<?=$numeroEmpresa;?>" size="10" id="numeroEmpresa" disabled></p>
				<p><span class="txt-oscuro">Colonia: </span><input type="text" value="<?=$coloniaEmpresa;?>" size="15" id="coloniaEmpresa" disabled></p>
				<p><span class="txt-oscuro">Cp: </span><input type="text" value="<?=$cpEmpresa;?>" size="15" id="cpEmpresa" disabled></p>
				<p><span class="txt-oscuro">Ciudad: </span><input type="text" value="<?=$ciudadEmpresa;?>" size="15" id="ciudadEmpresa" disabled></p>
			</div>

			<div class="col-md-5">
				<div id='map_canvasDetalle' class="maps"></div>
			</div>

			<div class="col-md-3">
				<div class="cuadroEstado">
					<div class="nombreEstado">ESTADO</div>
						<select name="estadoProspecto" id="estadoProspecto" class="" disabled>
							<option value="<?=$IdestadoEmpresa;?>"><?=$estadoProspecto;?></option>
								<?php
									 
									 while($row = $estadosProspectos->fetch_assoc()) {
										 ?><option value="<?=$idOrigenProspecto = $row['idestado'];?>"><?=$estadoProspecto = $row['nombre'];?></option>
										<?php  
										}
								?>
						</select>
				</div>
				<div class="cuadroOrigen">
					<div class="nombreOrigen">ORIGEN</div>
						<select name="estadoProspecto" id="estadoProspecto" class="" disabled>
							<option value="<?=$IorigenEmpresa;?>"><?=$origenProspecto;?></option>
								<?php
									 
									 while($row = $estadosProspectos->fetch_assoc()) {
										 ?><option value="<?=$idOrigenProspecto = $row['idestado'];?>"><?=$estadoProspecto = $row['nombre'];?></option>
										<?php  
										}
								?>
						</select>
				</div>
				<input type="submit" value="Actualizar" class="btn btn-primary" id="submitEmpresa" style="display:none;">
			</div>
</form> <!------ Form Empresa  ------->
			<article class="col-md-12">
				<a href="#" id="addOportunidadClick"><span class="icon-pencil"></span></a>
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
								<?=$descripcion[$xa]?>
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


			<?php
     if (isset($nombreContacto)) {
  
      ?>
				<div class="col-md-12">
					<h3>Contacto</h3>
					<a href="#"><span class="icon-pencil"></span></a>
				</div>

				<article class="col-md-6">
					<p><span class="txt-oscuro">Nombre: </span><span class="txt-derecha"><?php echo $sexoContacto . " " . $nombreContacto;?></span></p>
					<p><span class="txt-oscuro">Apellidos: </span><span class="txt-derecha"><?php echo $apePaternoContacto . " " . $apeMaternoContacto;?></span></p>
					<p><span class="txt-oscuro">Correo: </span><span class="txt-derecha"><?=$correo;?></span></p>
				</article>

				<div class="col-md-6">
					<p><span class="txt-oscuro">Cargo: </span><span class="txt-derecha"><?=$cargoContacto;?></span></p>
					<p><span class="txt-oscuro">Telefono: </span><span class="txt-derecha"><?=$telefonoContacto;?></span></p>
				</div>

				<div class="col-md-12">
					<h3>Citas</h3>
				</div>

				<article class="col-md-12">
					<a href="#" id="addAgendaClick"><span class="icon-pencil"></span></a>
					<table class="table table-hover tableEAT">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Contacto</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<?php
			 					while($row = $consultarAgendaXUsuario->fetch_assoc()) {
									?>
							<tr>
								<td>
									<?=$row['Defecha'];?>
								</td>
								<td>
									<?=$row['Dehora'];?>
								</td>
								<td>
									<?php echo $nombreContacto . " " . $apePaternoContacto . " " . $apeMaternoContacto;?>
								</td>
								<td>
									<?=$row['descripcion'];?>
								</td>
							</tr>

							<?php
									}
			 				?>
					</table>
				</article>
				<?php }else{
        // si no existe contactos que realmente no deberia pasar jamas
      }?>
		</div>
	</section>
	<script src='../../js/mapsDetalle.js'></script>
<script>
	 $(document).ready(function() {
		 $("#refrescarEsta").click(function(){
			$("#content").load("../../views/prospectos/detalleProspecto.php?idprospecto=" + $("#idprospecto").val());
	});
    $( "#activarEmpresa" ).click(function(){
			$( "input:hidden" ).show(200);
        $( "input" ).each(function( i ) {
          $("input").removeAttr('disabled');
         });
				$( "select" ).each(function( i ) {
          $("select").removeAttr('disabled');
         });
    });
    
});
</script>