<?php 
  $idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
  $idcita=(isset($_REQUEST['idcita']))?$_REQUEST['idcita']:"";
//echo $idcontacto;
  //$idContacto=(isset($_REQUEST['idcontacto']))?$_REQUEST['idcontacto']:"";
//incluimos el archivo de configuracion de la BD
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
          $nombreEmpresa = $row['nombre'];
          $calleEmpresa = $row['calle'];
          $numeroEmpresa = $row['numerodomicilio'];
          $coloniaEmpresa = $row['colonia'];
          $ciudadEmpresa = $row['ciudad'];
          $cpEmpresa = $row['cp'];
          //$etapaProspecto = $row['idetapa'];
       }

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
					 			if($showContacto[$xg]=="0")
								{
									$xg++;
								}
							 }
    }
if (empty($idcita)) {
	$actionBtn =  'Agendar';
	$Defecha =  null;
	$Dehora =  null;
	$Afecha =  null;
	$AHora = null;
	$descripcion =  null;
	$idcontactoMod = null;
	
}else{
	$actionBtn = 'Actualizar';
		$agenda->idCita = $idcita;
	$consultarCitaXIdRow = $agenda->consultarCitaXId();
	while($row = $consultarCitaXIdRow->fetch_assoc()){
		$Defecha = $row['Defecha'];
		$Dehora = $row['Dehora'];
		$Afecha = $row['Afecha'];
		$AHora = $row['AHora'];
		$descripcion = $row['descripcion'];
		$idcontactoMod = $row['idcontacto'];
	}
	$contactos->idcontacto = $idcontactoMod;
	$consultarContactoXIdRow = $contactos->consultarContactoXId();
	while($row = $consultarContactoXIdRow->fetch_assoc()){
		$nombreContactoMod = $row['nombre'];
		$ApellidoContactoMod = $row['apellidoP'];
	}
}
?>
<input type="hidden" id="idprospecto" value="<?=$idprospecto?>">
<input type="hidden" id="idcita" value="<?=$idcita?>">

<script src="../../../js/contactos/agenda.js"></script>
  <form id="formAgenda" class="row">
			<div class="col-md-12 contents-items">
				<label for="idContacto">Contacto: </label>
				<select name="idContacto" id="idContacto" class="form-control">
							<?php
										if (empty($nombreContactoMod)) {
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
			</div>
			
			<div class="col-md-6 contents-items">
						<label for="deFecha" class="sn-margin-left col-md-12">De: </label>
						<div class="sn-margin-left col-md-6"><input type="date" id="deFecha" required value="<?=$Defecha;?>" class="form-control"></div>
						<div class="col-md-6 sn-margin-left"><input type="time" id="deHora" required value="<?=$Dehora;?>" class="form-control"></div>
				</div>
				<div class="col-md-6 contents-items">
						<label for="aFecha" class="col-md-12 sn-margin-right">A: </label>
						<div class="col-md-6 sn-margin-right"><input type="date" id="aFecha" required value="<?=$Afecha;?>" class="form-control"></div>
						<div class="col-md-6 sn-margin-right"><input type="time" id="aHora" required value="<?=$AHora;?>" class="form-control"></div>
				</div>
				<div class="col-md-12 contents-items">
						<textarea rows="4" cols="50" required id="descripcionAgenda" placeholder="Descripción" class="form-control"><?=$descripcion;?></textarea>
				</div>
				<div class="col-md-12">
						<input type="submit" class="btn btn-success" value="<?=$actionBtn;?>" id="actionBtn" class="form-control">
				</div>
			
  </form>

<script>
  $( "#deFecha" ).change(function() {
    $('#aFecha').val($('#deFecha').val());
  });
  $( "#deHora" ).change(function() {
    $('#aHora').val($('#deHora').val());
  });
</script>