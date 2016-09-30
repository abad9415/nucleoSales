//alert("holis te apesta la colis");
$(document).ready(function(){
  //alert("entre!!");
  $("#addAgendaClick").click(function(){
    //alert($("#idcontacto").val());
    //alert($("#idprospecto").val());
    //'parametro1=valor1&parametro2=valor2'
		$("#conentDetallePros").load("/views/prospectos/agenda/altaAgenda.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idcontacto").val() } );
		//$("#aquiHTML").load( "../../views/prospectos/verProspectosSection.php" );
		//$( "spanPHP" ).append( "<?=consultarProspectos()?>" );
	}); 
	
	$("#addOportunidadClick").click(function(){
		$("#conentDetallePros").load("/views/prospectos/oportunidad/altaOportunidad.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idcontacto").val() } );
	});
	
	$("#addContactoClick").click(function(){
		$("#conentDetallePros").load("/views/prospectos/contactos/altaOtroContacto.php", {idprospecto: $("#idprospecto").val()} );
	});
	
	$( ".idOportunidadMod" ).click(function() {
		//alert("desde aca");
			//alert($( this ).val());
			$("#conentDetallePros").load("/views/prospectos/oportunidad/altaOportunidad.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idcontacto").val(), idOportunidad: $( this ).val() } );
		});
	
	$( ".idContactoDetalle" ).click(function() {
		$("#conentDetallePros").load("/views/prospectos/vistasDetalle/verNotas.php", {idprospecto: $("#idprospecto").val(), idcontacto: $( this ).val() } );
		//$("#content").load("/views/prospectos/contactos/actualizarContacto.php", {idContacto: $( this ).val()} );
		});
	
	$( ".idContactoMod" ).click(function() {
		$("#conentDetallePros").load("/views/prospectos/contactos/altaOtroContacto.php", {idprospecto: $("#idprospecto").val(), idcontacto: $( this ).val() } );
		//$("#content").load("/views/prospectos/contactos/actualizarContacto.php", {idContacto: $( this ).val()} );
		});
	
		 $( ".idContactoElim" ).click(function() {
			 if (!confirm("¿Seguro que quieres eliminar este contacto?")){
				 $("#conentDetallePros").load("../../../views/prospectos/vistasDetalle/verContactos.php?idprospecto=" + $("#idprospecto").val());
			 }else{
			   $.ajax({
               type: "POST", 	
                url: '../../../actions/contactos/eliminarContacto.php',
                data:"idContacto="+$( this ).val()
              }).done(function() {
            $("#conentDetallePros").load("../../../views/prospectos/vistasDetalle/verContactos.php?idprospecto=" + $("#idprospecto").val());
            });
				 }
		});
	
	 $( ".idAgendaMod" ).click(function() {
		 $("#conentDetallePros").load("/views/prospectos/agenda/altaAgenda.php", {idprospecto: $("#idprospecto").val(), idcita: $( this ).val() } );
		});
	
		 $( ".idAgendaElim" ).click(function() {
			 if (!confirm("¿Seguro que quieres eliminar la cita?"))
					{
					$("#conentDetallePros").load("/views/prospectos/vistasDetalle/verCitas.php?idprospecto=" + $("#idprospecto").val());
					}else{
						 $.ajax({
               type: "POST", 	
                url: '../../../actions/contactos/eliminarCita.php',
                data:"idcita="+$( this ).val()
              }).done(function(data) {
				 //alert(data);
            $("#conentDetallePros").load("../../../views/prospectos/vistasDetalle/verCitas.php?idprospecto=" + $("#idprospecto").val());
            });
					}
		});
});