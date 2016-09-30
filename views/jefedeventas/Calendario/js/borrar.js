   $(document).ready(function() {

   	$("#borrar").submit(function(e) {
   		$.ajax({
   			type: "POST",
   			url: "../../views/Calendario/editEventTitle.php",
   			cache: false,
   			data: "id=" + $("#id").val() +
   				'&delete=' + document.getElementById("delete").checked +
   				'&title=' + $("#title").val(),

   		}).done(function(result) {
				$('#ModalEdit').modal('hide');
				setTimeout ("$('#content').load( '../../views/jefedeventas/Calendario/Calendario.php' );", 500); 
   		});
			return false;
			
   	});
		 
		 var idCont;
		 var idEmp ;
		 
		 $('#Empresa').on('change', function(){
		idEmp = $("#Empresa").val();
			$.ajax({
			 		url: '../../views/Calendario/consultaContactos.php',
			 		type: "POST",
			 		data: "id="+idEmp,
			 		success: function(ressp) {
						
					$('#contacto option').remove();
					$('#contacto').append(ressp);
						}	
					});
	});
		 $('#tipoCita').on('change', function(){
			 if(parseInt($("#tipoCita").val())==2){
				 
			 		$( "#Empresa" ).prop( "disabled", false );
				 	$( "#contacto" ).prop( "disabled", false );
			 }
			 if(parseInt($("#tipoCita").val())==3){
				 
			 		$( "#Empresa" ).prop( "disabled", false );
				 	$( "#contacto" ).prop( "disabled", false );
				 }
			 else{
				 $( "#Empresa" ).prop( "disabled", true );
				 	$( "#contacto" ).prop( "disabled", true );
			 }
			 });
		 $('#contacto').on('change', function(){
			 idCont = $("#contacto").val();
			 
			 });
		 
		 $("#GuardarCita").submit(function(e) {
   		
			 $.ajax({
   			type: "POST",
   			url: "../../views/Calendario/altaCita.php",
   			cache: false,
   			data: "idContacto=" +idCont +
   						'&idEmpresa=' +idEmp +
   						'&deFecha=' + $("#deFecha").val()+
				 			'&deHora='+ $("#deHora").val()+
				 			'&aFecha=' + $("#aFecha").val()+
				 			'&aHora='+ $("#aHora").val()+
				 			'&Cita='+$("#cita").val(),

   		}).done(function(result) {
				$('#ModalAddVendedor').modal('hide');
				setTimeout ("$('#content').load( '../../views/Calendario/Calendario.php' );", 500); 
				
   		
   		});
			return false;
			 
			
   	});
		 
   });