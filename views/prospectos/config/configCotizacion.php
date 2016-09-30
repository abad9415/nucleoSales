<?php
include '../../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../../lib/prospectos.php';

$prospectos = new prospectos($datosConexionBD);


$consularConfigCotizacionRow = $prospectos->consultarConfigCotizacionXvendedor();
$consularConfigCotizacionRow = $consularConfigCotizacionRow->fetchAll();
foreach($consularConfigCotizacionRow as $row){
	$idconfigCotizacion = $row['idconfigCotizacion'];
	$descripcionCot = $row['descripcion'];
	$caracteristicasCot = $row['caracteristicas'];
	$extrasCot = $row['extras'];
	$despedidaCot = $row['despedida'];
	$firmaCot = $row['firma'];
}
if(empty($descripcionCot)){
$actionBtn = 'Guardar';
$idconfigCotizacion = "" ;
$descripcionCot = "Envió la presente describiendo algunas características de nuestro servicio y soporte así como una propuesta de la opción de 10, 20, 30, 50 Mbps simétricos Dedicados con salida redundante y 1 Dirección IP.";
	$caracteristicasCot = '1.- Conexión a Internet de banda ancha simétrica, las 24 horas los 365 días del año dentro de los están dares
     internacionales así como soporte técnico.
2.- Asignación de 1 dirección IP.
3.- Tiempo de Respuesta para Soporte, Telefónico Inmediato, en sitio máximo 2 horas.
4.- Contrato sin plazo forzoso.
5.- Router incluido permite restringir y limitar acceso a internet para mejorar la productividad del personal.
6.- Asesoría en todos sus proyectos donde se involucre a su conexión de INTERNET como:
			- Contratación y administración de su dominio "Web".
			- Contratación de servicios de telefonía IP, interna o pública (Telefonía IP).
			- Servicio de video vigilancia y monitoreo remoto.
			- Contratación de Servidores de respaldo y/o FTP.';
	
	$extrasCot = 'La instalación incluye un router Mikrotik Profesional y equipo de radio en comodato.
- Pago semestral obtienen un equipo UniFi largo alcance costo
Nota: Todos los costos son en M.N y no incluyen IVA.';
	
	$despedidaCot = "Esperando que la presente le proporcione la información requerida, me despido quedando a sus órdenes para
cualquier aclaración.
		Relación de costos dirigida a Representante de: ";
	
	$firmaCot = 'Escribe Tu nombre
Red Siete, S. de R.L. de C.V.
Telefono: (686) 111-11-11
oficina tel 686 5635367';
	
}else{
$actionBtn = 'Modificar';
}
?>
<input type="hidden" value="<?=$idconfigCotizacion;?>" id="idconfigCotizacion">

<?php
if($actionBtn == 'Guardar'){
	?>
<p class="bg-primary"><span class="icon-lightbulb-o"></span>Modifica lo que creas necesario.</p>
<?php
}
?>
<form class="row" id="documentoCotizacion">
<div class="form-group">
	<label for="descripcionCot">Descripción / Introducción.</label>
<textarea name="descripcionCot" id="descripcionCot" class="form-control" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
	 <?=$descripcionCot;?></textarea>
</div>

<div class="form-group">
	<label for="caracteristicasCot">Caracteristicas.</label>
<textarea name="caracteristicasCot" id="caracteristicasCot" class="form-control" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
	<?=$caracteristicasCot;?></textarea>
</div> 

<div class="form-group">
	<label for="extrasCot">Extras.</label>
<textarea name="extrasCot" id="extrasCot" class="form-control" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
	<?=$extrasCot;?></textarea>
</div>

<div class="form-group">
	<label for="despedidaCot">Despedida.</label>
<textarea name="despedidaCot" id="despedidaCot" class="form-control" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
	<?=$despedidaCot;?></textarea>
</div>

<div class="form-group">
	<label for="firmaCot">Firma.</label>
<textarea name="firmaCot" id="firmaCot" class="form-control" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
	<?=$firmaCot;?></textarea>
</div>

<input type="submit" class="btn btn-default" id="btnActionGeneral" value="<?=$actionBtn;?>">
</form>

<script>
$(document).ready( function() {
 $("#documentoCotizacion").submit(function(e){
	 if($("#btnActionGeneral").val()=='Guardar'){
		 url="/actions/prospectos/config/altaConfigCotizacion.php";
	 }else if($("#btnActionGeneral").val()=='Modificar'){
		 url="/actions/prospectos/config/actualizarConfigCotizacion.php";
	 }
				$.ajax({
						 type: "POST", 	
							url: url,
							data:"descripcionCot="+$("#descripcionCot").val()+
										'&caracteristicasCot='+$("#caracteristicasCot").val()+
									'&extrasCot='+$("#extrasCot").val()+
									'&despedidaCot='+$("#despedidaCot").val()+
									'&firmaCot='+$("#firmaCot").val()+
									'&idconfigCotizacion='+$("#idconfigCotizacion").val()

						}).done(function(result) {
					alert(result);    
						 $("#cargarConfig").load( "../views/prospectos/config/configCotizacion.php" );
					});
						return false;
		});
});
</script>