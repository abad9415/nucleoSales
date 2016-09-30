<?php
$idprospecto=(isset($_REQUEST['idprospecto']))?$_REQUEST['idprospecto']:"";
$idcontacto=(isset($_REQUEST['idcontacto']))?$_REQUEST['idcontacto']:"";
  // Incluimos el archivo de configuración
	include '../../../conexionBD.php';
	// Requerimos la clase de prospectos
	require '../../../lib/prospectos.php';
  //Instanciamos nuestra clase prospectos
  require '../../../lib/contactos.php';

$contactos = new contactos($datosConexionBD);
$prospectos = new prospectos($datosConexionBD);

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
?>
<input type="hidden" value="<?=$idprospecto;?>" id="idprospecto">
<input type="hidden" value="<?=$idcontacto;?>" id="idcontacto">
      <div class="row">
            <div class="col-md-12">
              <h3 class="text-center">Nuevo Contacto Para <?=$nombreProspecto;?></h3>
            </div>
            <form action="" method="post" id="NuevoContactoForm">
                <div class="col-md-6 col-sm-6">
                  <label for="sexoContacto">Trato</label>
                   <select name="sexoContacto" id="sexoContacto" class="form-control inputContacto">
										 <?php if (empty($trato)) {
											} else{
												?>
												 <option value="<?=$trato;?>"><?=$trato;?></option>
												 <?php
											}
										 ?>
                        <option value="Sr.">Sr.</option>
                        <option value="Sra.">Sra.</option>
                    </select>
                    
                   <label for="nombreContacto">Nombre</label>
                    <input type="text" id="nombreContacto" name="nombreContacto" class="form-control inputContacto" value="<?=$nombre;?>">

                    <label for="apePaternoContacto">Apellido Paterno</label>
                    <input type="text" id="apePaternoContacto" name="apePaternoContacto" class="form-control inputContacto" value="<?=$apellidoP;?>">

                    <label for="apeMaternoContacto">Apellido Materno</label>
                    <input type="text" id="apeMaternoContacto" name="apeMaternoContacto" class="form-control inputContacto" value="<?=$apellidoM;?>">
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="telefonoContacto">Telefono</label>
                    <input type="text" id="telefonoContacto" name="telefonoContacto" class="form-control inputContacto" value="<?=$telefono;?>">

                    <label for="correoContacto">Correo</label>
                    <input type="text" id="correoContacto" name="correoContacto" class="form-control inputContacto" value="<?=$correo;?>">

                    <label for="cargoContacto">Cargo</label>
                    <input type="text" id="cargoContacto" name="cargoContacto" class="form-control inputContacto" value="<?=$cargo;?>">
                </div>
								<input type="hidden" id="cargoContacto" name="cargoContacto" class="form-control">
                
							 	<div class="col-xs-12">
                       <input type="submit" value="<?=$actionBtn;?>" name="enviar" class="pull-right btn btn-primary" id="btnActionGeneral">
                </div>
            </form>
      </div>
  <script>
    
    $("#NuevoContactoForm").submit(function(e) {
			if($("#btnActionGeneral").val()=="Guardar"){
				urlAction = "/actions/contactos/altaOtroContacto.php";
			}else if($("#btnActionGeneral").val()=="Modificar"){
				urlAction = "/actions/contactos/actualizarContacto.php";
			}
		//	alert($("#idcontacto").val())
			//alert("segun acabo de imprimir el id del contacto")
       $.ajax({
				type: "POST",
				dataType:"json",
				url: urlAction,
				data: "sexoContacto="+$("#sexoContacto").val()+
                         '&nombreContacto='+$("#nombreContacto").val()+
                         '&apePaternoContacto='+$("#apePaternoContacto").val()+
                         '&apeMaternoContacto='+$("#apeMaternoContacto").val()+
                         '&telefonoContacto='+$("#telefonoContacto").val()+
                         '&correoContacto='+$("#correoContacto").val()+
                         '&cargoContacto='+$("#cargoContacto").val()+
                         '&idcontacto='+$("#idcontacto").val()+
           '&idprospecto='+$("#idprospecto").val(),
				success: function(data){
        //alert(data.alert);
					swal(data.alert + "!", "", "success")
          $("#conentDetallePros").load("/views/prospectos/vistasDetalle/verContactos.php?idprospecto=" + $("#idprospecto").val());
				}	
			});


      return false;
    });
  </script>