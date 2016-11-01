  $(document).ready(function() {
		var rfcGuardada = "";
		/*if ($("#btnActionGeneral").val() == 'Actualizar') {
			alert("eres acutalizar!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
				 rfcGuardada = $("#rfcEmpresa").val();
		} */
		var noMandar = 1;
		
		$('#rfcEmpresa').keyup(function() {
								validarRFC();
							});
		$('#rfcEmpresa').focusout(function() {
								validarRFC();
							});
		$('#telefonoContacto').keyup(function() {
								quitarRequired('#telefonoContacto', '#correoContacto');
								
							});
		$('#telefonoContacto').focusout(function() {
								quitarRequired('#telefonoContacto', '#correoContacto');
							});
		
		$('#correoContacto').keyup(function() {
								quitarRequired('#correoContacto', '#telefonoContacto');
							});
		$('#correoContacto').focusout(function() {
								quitarRequired('#correoContacto', '#telefonoContacto');
							});
		
    $("#abadForm2").submit(function(e) {
			
      if ($("#btnActionGeneral").val() == 'Guardar') {
				validarRFC();//ejecutamos la funcion antes de tomar una decision obviamente 
        //alert("entraste guardar");
        var urlAction = "../../actions/altaProspecto.php";
      } else if ($("#btnActionGeneral").val() == 'Actualizar') {
				//alert(rfcGuardada);
				if (rfcGuardada == $("#rfcEmpresa").val())
					{
						//alert("Eres igual te dejare remplazar")
						noMandar = 0;
					}else{
						//alert("Eres diferente aqui ejecutare la comprobacion...");
						validarRFC();
					}
        //alert("entraste Actualizar");
        var urlAction = "../../actions/actualizarProspecto.php";
      }
			if(noMandar === 0){
       $.ajax({
				type: "POST",
				dataType:"json",
				url: urlAction,
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
                     //'&etapaProspecto='+$("#etapaProspecto").val()+
                     '&oportunidadProspecto='+$("#oportunidadProspecto").val()+
                         '&sexoContacto='+$("#sexoContacto").val()+
                         '&nombreContacto='+$("#nombreContacto").val()+
                         '&apePaternoContacto='+$("#apePaternoContacto").val()+
                         '&apeMaternoContacto='+$("#apeMaternoContacto").val()+
                         '&telefonoContacto='+$("#telefonoContacto").val()+
                         '&correoContacto='+$("#correoContacto").val()+
                         '&cargoContacto='+$("#cargoContacto").val()+
				 								 '&facebookContacto='+$("#facebookContacto").val()+
				 								 '&twitterContacto='+$("#twitterContacto").val()+
				 				 				 '&celularContacto='+$("#celularContacto").val()+
				 								 '&correoAlternativoContacto='+$("#correoAlternativoContacto").val()+
           '&idprospecto='+$("#idprospecto").val()+
           '&idcontacto='+$("#idcontacto").val(),
				success: function(data){
          
        if (urlAction == "../../actions/altaProspecto.php") {
         // alert("regrese del alta php");
        //alert("entraste guardar");
             $("#idprospecto").val(data.content);
          $("#idcontacto").val(data.details);
          //Guardar nuevo prospecto
					swal(data.alert, "", "success")
          
          $("#btnActionGeneral").val("Actualizar");


           //enviaremos un btn para editar a la pura empresa
           //$("#actualizarEmpresa").append("<a href='#' id='activarEmpresa'><span class='icon-pencil2'></span></a>");
					// $("#activarEmpresa").css("display: block");
					 document.getElementById("activarEmpresa").style.display = "flex";
					 document.getElementById("activarContacto").style.display = "flex";
           //enviaremos un btn para editar al puro contacto
           //$("#actualizarContacto").append("<a href='#' id='activarContacto'><span class='icon-pencil2'></span></a>");
					

           $(".form-control").each(function(i) {
             $(".form-control").attr('disabled', 'disabled');
           });

           $("#activarEmpresa").click(function() {
             $(".form-control").each(function(i) {
               $(".inputProspecto").removeAttr('disabled');
             });
           });
           $("#activarContacto").click(function() {
             $(".form-control").each(function(i) {
               $(".inputContacto").removeAttr('disabled');
             });
           });
        //correo aqui....
					
					 $.ajax({
         type: "POST",
         url: "../PHPMailer/email.php",
         cache: false,
         data: "Prospecto= "+$("#nombreEmpresa").val()+"&Correo="+$("#correoVendedor").val(),
         success: function(datos){
          //alert(datos);				
         }
       });
					
      } else if (urlAction == '../../actions/actualizarProspecto.php') {
        //alert("regrese del actualizar php");
        //alert(data.alert);
				swal(data.alert, "", "success")
        //alert("entraste Actualizar");
				$("#content").load( "../views/prospectos/altaProspectos.php" );
      }
				}	
				 
				 
			});
				rfcGuardada = $("#rfcEmpresa").val();
				}else{
					//alert("RFC Ya Existe!!!");
					swal("RFC Existente", "Otro vendedor ya tiene este prospecto", "error");
				}
			
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
						 
							//$("#conentDetallePros").load("/views/prospectos/vistasDetalle/verNotas.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idContacto").val() } );
				 });
				return false;
		}
		
		function quitarRequired(campoCondicion, campoModificar){
				if($(campoCondicion).val().length < 1){
									$( campoModificar ).prop( "required", true );
								}else{
									$( campoModificar ).prop( "required", false );
								}
		}
  });