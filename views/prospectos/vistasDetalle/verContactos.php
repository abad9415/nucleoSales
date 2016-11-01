<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
//echo $idprospecto;
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
// $i es cada uno de los usuarios
// $xg2 es cada uno de las citas que tiene ese dichoso usuario

?>
<script src="/js/prospectos/crearAgenda.js"></script>
<input type="color" id="colorProspecto" value="<?=$colorEmpresa;?>" style="display:none;">
			<article class="content-tabla-prospectos">
				<span id="addContactoClick" class="circulo-material btn-agregar-plus"><span class="icon-plus"></span></span>
				<table class="table table-hover tableEAT">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Correo</th>
							<th>Cargo</th>
							<th>Telefono</th>
						</tr>
					</thead>
					<?php
					for($i=1;$i<$xg;$i++){
						?>
						<tr>
							<td>
								<div class="dropdown">
										<span class="dropdown-toggle icon-ellipsis-v" data-toggle="dropdown"></span>
									
										<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
											<li role="presentation"><label for="idContactoDetalle<?=$i;?>" class="pegarLabel" role="menuitem" tabindex="-1">Detalles</label></li>
											<input type="radio" name="idContactoDetalle" value="<?=$idContactoX[$i]?>" class="idContactoDetalle inputRadio" id="idContactoDetalle<?=$i;?>">
											
											<li role="presentation"><label for="idContactoMod<?=$i;?>" class="pegarLabel" role="menuitem" tabindex="-1">Modificar</label></li>
											<input type="radio" name="idContactoMod" value="<?=$idContactoX[$i]?>" class="idContactoMod inputRadio" id="idContactoMod<?=$i;?>">

										 <li role="presentation"><label for="idContactoElim<?=$i;?>" class="pegarLabel" role="menuitem" tabindex="-1">Eliminar</label></li>
										<input type="radio" name="idContactoElim" value="<?=$idContactoX[$i]?>" class="idContactoElim inputRadio" id="idContactoElim<?=$i;?>">
    							</ul><?php echo $sexoContacto[$i] ." " . $nombreContacto[$i];?>
								</div>
							</td>
							<td>
								<?php echo $apePaternoContacto[$i] . " " . $apeMaternoContacto[$i];?>
							</td>
							<td>
								<?=$correo[$i];?>
							</td>
							<td>
								<?=$cargoContacto[$i];?>
							</td>
							<td>
								<?=$telefonoContacto[$i];?>
							</td>
						</tr>

						<?php
											}
									?>
				</table>
			</article>
				<!------ Form Contacto  -------><!------ Form Contacto  ------->
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
						"border-bottom-color": $("#colorProspecto").val()
					});
         $("#CitasBtn").css({
						"border-bottom-style": "solid",
						"border-bottom-color": "rgba(255,255,255,0)"
					});
</script>