  $(document).ready(function() {
		var rfcGuardada = "";
		var noMandar = 1;
		rfcGuardada = $("#rfcEmpresa").val();
		$('#rfcEmpresa').keyup(function() {
								validarRFC();
							});
		$('#rfcEmpresa').focusout(function() {
								validarRFC();
							});
		
    $("#formEmpresaDetalleProspectos").submit(function(e) {
      //alert($("#idprospecto").val());
				if (rfcGuardada == $("#rfcEmpresa").val())
					{
						noMandar = 0;
					}else{
						validarRFC();
					}
			
			if(noMandar === 0){
       $.ajax({
				type: "POST",
				dataType:"json",
				url: '../../actions/prospectos/actualizarDetalleProspectos.php',
				data: "nombreEmpresa="+$("#nombreEmpresa").val()+
                     '&rfcEmpresa='+$("#rfcEmpresa").val()+
                     '&calleEmpresa='+$("#calleEmpresa").val()+
                     '&numeroEmpresa='+$("#numeroEmpresa").val()+
                     '&coloniaEmpresa='+$("#coloniaEmpresa").val()+
                     '&cpEmpresa='+$("#cpEmpresa").val()+
                     '&ciudadEmpresa='+$("#ciudadEmpresa").val()+
                     '&origenProspecto='+$("#origenProspecto").val()+
                     '&estadoProspecto='+$("#estadoProspecto").val()+
				 							'&colorProspecto='+$("#colorProspecto").val()+
               '&idprospecto='+$("#idprospecto").val(),
				success: function(data){
          
        //alert("regrese del actualizar php");
        //alert();
				swal(data.alert + "!", "", "success")
        $("#content").load("../../views/prospectos/detalleProspecto.php?idprospecto=" + $("#idprospecto").val());
        //alert("entraste Actualizar");
				}
			});
			}else{
					//alert("RFC Ya Existe!!!");
					swal("RFC Existente", "Otro vendedor ya tiene este prospecto", "error");
				}
      return false;
    });
		
		
		$("#formContactoDetalleProspectos").submit(function(e) {
			//alert("hola entraste")
      //alert($("#idprospecto").val());
       $.ajax({
				type: "POST",
				dataType:"json",
				url: '../../actions/prospectos/actualizarDetalleContactos.php',
				data: "sexoContacto="+$("#sexoContacto").val()+
                         '&nombreContacto='+$("#nombreContacto").val()+
                         '&apePaternoContacto='+$("#apePaternoContacto").val()+
                         '&apeMaternoContacto='+$("#apeMaternoContacto").val()+
                         '&telefonoContacto='+$("#telefonoContacto").val()+
                         '&correoContacto='+$("#correoContacto").val()+
                         '&cargoContacto='+$("#cargoContacto").val()+
           '&idcontacto='+$("#idcontacto").val(),
				success: function(data){
          //alert("regrese");
        //alert("regrese del actualizar php");
        alert(data.alert);
        $("#content").load("../../views/prospectos/detalleProspecto.php?idprospecto=" + $("#idprospecto").val());
        //alert("entraste Actualizar");
        
				}
			});
      return false;
    });
    
		
		function validarRFC(){
			//alert($("#rfcEmpresa").val());
			$.ajax({
								 type: "POST", 	
									url: '../../actions/prospectos/validarRFC.php',
									data: "rfc="+$("#rfcEmpresa").val()
								}).done(function(result) {
							//alert(result);
					 if(result == "1"){
						 $("#content-rfc-prospecto").addClass('has-error');
						 $( "#mensajeYaExisteRFC" ).remove();
						 $( "#content-rfc-prospecto" ).append( "<strong id='mensajeYaExisteRFC'>RFC ya registrado</strong>" );
						 noMandar = 1;
					 }else{
						 $("#content-rfc-prospecto").removeClass('has-error');
						 $("#content-rfc-prospecto").addClass('has-success');
						 $( "#mensajeYaExisteRFC" ).remove();
						 noMandar = 0;
					 }
				 });
				return false;
		}
   
  });