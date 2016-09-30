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

$consultarRelacionDeProspectosContactos = $prospectos->consultarRelacionDeProspectosContactos();
$xg=1;
while($row = $consultarRelacionDeProspectosContactos->fetch_assoc()) {
	
       $idContactoX[$xg] = $row['idcontacto'];
			 $contactos->idcontacto = $idContactoX[$xg];
				
			 //consultamos el contacto por el id que acabamos de enviar
				$consultarContactoXId = $contactos->consultarContactoXId();

				 while($row2 = $consultarContactoXId->fetch_assoc()) {
								 $sexoContacto[$xg] = $row2['trato'];
								 $nombreContacto[$xg] = $row2['nombre'];
								 $apePaternoContacto[$xg] = $row2['apellidoP'];
								 $apeMaternoContacto[$xg] = $row2['apellidoM'];
								 $telefonoContacto[$xg] = $row2['telefono'];
								 $correo[$xg] = $row2['correo'];
								 $cargoContacto[$xg] = $row2['cargo'];
								 $showContacto[$xg] = $row2['show'];
					 			if($showContacto[$xg]=="0")
								{
									$xg++;
								}
					 			
							 }				
    }


$xg2=1;
// $i es cada uno de los usuarios
// $xg2 es cada uno de las citas que tiene ese dichoso usuario
for($i=1;$i<$xg;$i++)
{
	$agenda->idContacto = $idContactoX[$i];
	$agenda->idprospecto = $idprospecto;
	$consultarAgendaXUsuario = $agenda->consultarAgendaXUsuario();
	
			 while($row = $consultarAgendaXUsuario->fetch_assoc()) {
											$idcita[$xg2] = $row['idcita'];
											$Defecha[$xg2] = $row['Defecha'];
											$Dehora[$xg2] = $row['Dehora'];
											$descripcionAgenda[$xg2] = $row['descripcion'];
											$idcontacto[$xg2] = $row['idcontacto'];
				 //A continuacion consultaremos el contacto de cada cita
				 						$contactos->idcontacto = $idcontacto[$xg2];
				 					$consultarContactoXId = $contactos->consultarContactoXId();
				 							while($row2 = $consultarContactoXId->fetch_assoc()) {
												$nombreContactoCita[$xg2] = $row2['nombre'];
												$apellidoPContactoCita[$xg2] = $row2['apellidoP'];
											}
				 
				 						$xg2++;
									 }
}

//consultareamos de una vez la agenda con este usuario especificamente
$prospectos->idprospecto = $idprospecto;

//$agenda->idprospecto = $idprospecto;
//$agenda->idContacto = $idContacto;

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


#########################################
#RECORREOS EL ARREGLO PARA OPORTUNIDAD###
#########################################
$xe = 0;
$xetapa = 0;
while($row = $consultarOportunidadesXprospecto->fetch_assoc()) {
	$xe++;
			$idoportunidad[$xe] = $row['idoportunidad'];
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
$origenesProspectos = $prospectos->obtenerOrigenes();
?>

<input type="hidden" id="idprospecto" value="<?=$idprospecto;?>">
<input type="hidden" id="colorProspectoMaster" value="<?=$colorEmpresa;?>">
	<section class="contentInt">
				<div class="content-header-prospectos">
					<div class="logoProspecto content-imagen-prospecto">
						 <div class="circuloEAT" id="circuloOfotoEmpresa"><p><?=strtoupper($nombreEmpresa[0]);?></p></div>
					</div>
					
           <div class="content-info-prospecto">
						   <div class="content-nombre-opciones-prospecto">
									  <h2 class="nombre-prospecto" id="nombreEmpresaMaster"><?=$nombreEmpresa;?></h2>
                    <span class="btn-modificar-prospecto icon-pencil colorEmpresaEAT" id="modificarEsteProspecto"></span>
               </div>
						 
						 	 <div class="cajaDeEstadoyMas">
									<span class="cuadradoEAT colorEmpresaEAT"><?=$estadoProspecto;?></span>
									<span class="cuadradoEAT colorEmpresaEAT"><?=$origenProspecto;?></span>
            	 </div>
						 		<span class="txt-rfc-detalle-prospecto">RFC: <?=$rfcEmpresa;?></span>
							 <p class="direccion-prospecto"><?php echo $calleEmpresa . ", #" . $numeroEmpresa . " " . $coloniaEmpresa . ", Cp." . $cpEmpresa . ", " . $ciudadEmpresa?></p>
				
					</div>
			 </div>
						<div class="content-meno-prsopectos">
							<span href="#" id="inicioMapaPros" role="button" class="btn-menu-prospecto">
								<h4  id="MapaBtn">Mapa</h4>
							</span>
							<span href="#" id= "oportunidadesDetallePros" role="button" class="btn-menu-prospecto">
							   <h4  id="OportunidadesBtn">Oportunidades</h4>
							</span>
							<span href="#" id= "contactosDetallePros" role="button" class="btn-menu-prospecto">
								<h4  id="ContactosBtn">Contactos</h4>
							</span>
							<span href="#" id= "citasDetallePros" role="button" class="btn-menu-prospecto">
								<h4  id="CitasBtn">Citas</h4>
							</span>
						</div>
		<div id="conentDetallePros"></div>
	</section>
	
<script>
	$("#conentDetallePros").load( "../../views/prospectos/vistasDetalle/verMapa.php?idprospecto=" + $("#idprospecto").val());
$("#inicioMapaPros").click(function(){
			 $("#conentDetallePros").load( "../../views/prospectos/vistasDetalle/verMapa.php?idprospecto=" + $("#idprospecto").val());
			 //$("#conentDetallePros").load( "../../views/prospectos/vistasDetalle/verProspecto.php?idprospecto=" + $("#idprospecto").val());
	  });
	
	$("#oportunidadesDetallePros").click(function(){
			 $("#conentDetallePros").load( "../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());
	  });
	
	$("#contactosDetallePros").click(function(){
			 $("#conentDetallePros").load( "../../views/prospectos/vistasDetalle/verContactos.php?idprospecto=" + $("#idprospecto").val());
	  });	
	
	$("#citasDetallePros").click(function(){
			 $("#conentDetallePros").load( "../../views/prospectos/vistasDetalle/verCitas.php?idprospecto=" + $("#idprospecto").val());
	  });
	
    $("#circuloOfotoEmpresa").css({
						"background": $("#colorProspectoMaster").val()
					});
    $(".colorEmpresaEAT").css({
						"background": $("#colorProspectoMaster").val()
					});
    
    $('#modificarEsteProspecto').click(function () {
        $("#conentDetallePros").load( "../../views/prospectos/vistasDetalle/verProspecto.php?idprospecto=" + $("#idprospecto").val());
    });
</script>