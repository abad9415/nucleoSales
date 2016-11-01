<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/prospectos.php';
 //Instanciamos nuestra clase prospectos
require '../../../lib/contactos.php';

require '../../../lib/agenda.php';

$contactos = new contactos($datosConexionBD);
$prospectos = new prospectos($datosConexionBD);
$agenda = new agenda($datosConexionBD);

$prospectos->idprospecto = $idprospecto;

$consultarEmpresaXId = $prospectos->consultarEmpresaXId();

 while($row = $consultarEmpresaXId->fetch_assoc()) {
          $colorEmpresa = $row['color'];
       }

$prospectos->idprospecto = $idprospecto;

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
?>
<script src="/js/prospectos/crearAgenda.js"></script>
<input type="hidden" id="idprospecto" value="<?=$idprospecto;?>">
<input type="hidden" id="idcontacto" value="<?=$idContacto;?>">
<input type="color" id="colorProspecto" value="<?=$colorEmpresa;?>" style="display:none;">
		<article class="">
					<span id="addAgendaClick" class="circulo-material btn-agregar-plus"><span class="icon-plus"></span></span>
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
			 					for($i=1;$i<$xg2;$i++) {
									?>
							<tr>
								<td>
									<div class="dropdown">
										<span class="dropdown-toggle icon-ellipsis-v" data-toggle="dropdown"></span>
										<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
											<li role="presentation"><label for="idAgendaMod<?=$i;?>" class="pegarLabel" role="menuitem" tabindex="-1">Modificar</label></li>
											<input type="radio" name="idAgendaMod" value="<?=$idcita[$i]?>" class="idAgendaMod inputRadio" id="idAgendaMod<?=$i;?>">

										 <li role="presentation"><label for="idAgendaElim<?=$i;?>" class="pegarLabel" role="menuitem" tabindex="-1">Eliminar</label></li>
										<input type="radio" name="idAgendaElim" value="<?=$idcita[$i]?>" class="idAgendaElim inputRadio" id="idAgendaElim<?=$i;?>">
    							</ul><?=$Defecha[$i];?>
								</div>
									
								</td>
								<td>
									<?=$Dehora[$i]?>
								</td>
								<td>
									<?php echo $nombreContactoCita[$i] . " " . $apellidoPContactoCita[$i];?>
								</td>
								<td>
									<?=$descripcionAgenda[$i]?>
								</td>
							</tr>

							<?php
									}
			 				?>
					</table>
		</article>
<script>
	 $('.dropdown-toggle').dropdown();
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
						"border-bottom-color": $("#colorProspecto").val()
					});
</script>