<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
$idcontacto=(isset($_REQUEST['idcontacto']))?$_REQUEST['idcontacto']:"";
  // Incluimos el archivo de configuración
	include '../../../conexionBD.php';
	// Requerimos la clase de prospectos
	require '../../../lib/prospectos.php';
  //Instanciamos nuestra clase prospectos
  require '../../../lib/contactos.php';
  require '../../../lib/notas.php';

$contactos = new contactos($datosConexionBD);
$prospectos = new prospectos($datosConexionBD);
$notas = new notas($datosConexionBD);

		$prospectos->idprospecto = $idprospecto;
    $nombreProspectoRow = $prospectos->consultarProspectoXId();

       while($row = $nombreProspectoRow->fetch_assoc()) {
                $nombreProspecto = $row['nombre'];
				}
if (empty($idcontacto)) {
	$actionBtn = "Guardar";
	//$trato = null;
		$nombre = "";
		$apellidoP = "";
		$apellidoM = "";
		$telefono = "";
		$correo = "";
		$cargo = "";
}else{
	$actionBtn = "Modificar";
	$contactos->idcontacto = $idcontacto;
	$consultarContactoXIdRow = $contactos->consultarContactoXId();
	while($row = $consultarContactoXIdRow->fetch_assoc()) {
		$trato = $row['trato'];
		$nombre = $row['nombre'];
		$apellidoP = $row['apellidoP'];
		$apellidoM = $row['apellidoM'];
		$telefono = $row['telefono'];
		$correo = $row['correo'];
		$cargo = $row['cargo'];
	}
}
$notas->idprospecto = $idprospecto;
$notas->idContacto = $idcontacto;
$consultarNotasRow = $notas->consultarNotas();
$xg=0;
while($row = $consultarNotasRow->fetch_assoc()) {
	$xg++;
		$idNotaNotas[$xg] = $row['idNota'];
		$descripcionNotas[$xg] = $row['descripcion'];
		$horaNotas[$xg] = $row['hora'];
		$fechaNotas[$xg] = $row['fecha'];
	}

?>
<script src="/js/prospectos/crearNotas.js"></script>
<section class="row">
  <div class="col-xs-12">
    <div class="col-xs-6">
      <p><b>Nombre: </b><?=$trato . " " . $nombre . " " . $apellidoP . " " . $apellidoM;?></p>
      <p><b>Telefono: </b><?=$telefono;?></p>
    </div>
    
    <div class="col-xs-6">
      <p><b>Correo: </b><?=$correo;?></p>
      <p><b>Cargo: </b><?=$cargo;?></p>
    </div>
  </div>
  <form action="#" class="col-xs-12" id="FormNotasDetalle" method="post">
			<input type="hidden" id="idprospecto" value="<?=$idprospecto;?>">
			<input type="hidden" id="idContacto" value="<?=$idcontacto;?>">
		
			<div class="col-xs-12">
				<textarea id="descripcionNota"  placeholder="Escribe aqui todas tus notas para crear un historial..." class="textarea-nuevaNota-contacto"></textarea>
			</div>
		
    <div class="col-xs-12 btn-guardar">
				<input type="submit" class="btn btn-success" value="Guardar">
				<span class="btn btn-danger" id="cancelNotas">Cancelar</span>
	  </div>
  </form>
	<div class="col-xs-12">
			<?php
			for($i=$xg;$i>0;$i--)
			{
				$fecha[$i] = strftime("%b,%d,%Y", strtotime($fechaNotas[$i]));
				//$fecha[$i] = date("F j, Y", strtotime($fechaNotas[$i]));
				$hora[$i] = date("g:i a", strtotime($horaNotas[$i]));
				//$newDate = date("d-m-Y", strtotime($originalDate));
				?>
			<label for="idNotaDetalleMod<?=$i;?>" class="col-xs-12 labelSinEstilos notasContenedor mouseNormarl">
						<div class="cuadroNotas mouseNormarl">
							<p><?=$trato . " " . $nombre . " " . $apellidoP . " " . $apellidoM;?></p>
							<span><?=$fecha[$i] . " " . $hora[$i];?></span>
						</div>


						<div class="cuadroNotasInf<?=$idNotaNotas[$i];?> mouseNormarl">
							<p class="textareaDisfrasada"><?=$descripcionNotas[$i];?></p>
						</div>
					<div id='btnsNotasGuardadas<?=$idNotaNotas[$i];?>' style="display: none;" class="btnsNotasGuardadas"> 
						<label class='btn btn-success editarNota' for="idNotaMod<?=$i;?>">Editar</label>
						<input type="radio" value="<?=$idNotaNotas[$i];?>" id="idNotaMod<?=$i;?>" class="idNotaMod inputRadio">

						<label class='btn btn-danger eliminarNota' for="idNotaElim<?=$i;?>">Eliminar</label>
						<input type="radio" value="<?=$idNotaNotas[$i];?>" id="idNotaElim<?=$i;?>" class="idNotaElim inputRadio">
					</div>
			</label>
			<input type="radio" value="<?=$idNotaNotas[$i];?>" id="idNotaDetalleMod<?=$i;?>" class="idNotaDetalleMod inputRadio">
			<?php
			}
			?>
	</div>
</section>
<script>
	$(document).ready(function(){
		var bandera=0;
		var divOcultoModi;
		var divOcultoModiN;
		$(".idNotaDetalleMod").click(function(){
				if(bandera==0){
					divOcultoModi = "btnsNotasGuardadas" + $(this).val();
					document.getElementById(divOcultoModi).style.display = "inline-block";
					//alert(divOcultoModi + "bande 0")
					bandera=1;
				}else{
								//alert(divOcultoModi)
						if(bandera==1){
							document.getElementById(divOcultoModi).style.display = "none";
							divOcultoModiN = "btnsNotasGuardadas" + $(this).val();
							document.getElementById(divOcultoModiN).style.display = "inline-block";
							divOcultoModi = divOcultoModiN;
							bandera=1;
						}
				}
			});
			
	$( ".idNotaMod" ).click(function() {
		bandera = 3;
		var id = ".cuadroNotasInf" + $( this ).val()
		//alert(id);
		//alert($( this ).val())
		var divOcultoModi = "btnsNotasGuardadas" + $(this).val();
			//alert(divOcultoModi)
			document.getElementById(divOcultoModi).style.display = "none";  
		$(id).load("/views/prospectos/notas/notaSelectModificar.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idContacto").val(), idNota: $( this ).val() } );
		//$("#content").load("/views/prospectos/contactos/actualizarContacto.php", {idContacto: $( this ).val()} );
		});
		
		$( ".idNotaElim" ).click(function() {
			 if (!confirm("¿Seguro que quieres eliminar esta nota?")){
				 $("#conentDetallePros").load("/views/prospectos/vistasDetalle/verNotas.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idContacto").val() } );
			 }else{
			   $.ajax({
               type: "POST", 	
                url: '/actions/prospectos/eliminarNota.php',
                data:"idNota="+$( this ).val()
              }).done(function() {
            $("#conentDetallePros").load("/views/prospectos/vistasDetalle/verNotas.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idContacto").val() } );
            });
				 }
		});
		
		}); 
</script>