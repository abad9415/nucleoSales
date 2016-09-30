$(document).ready( function() {
	  var xg = 0;
	var idInicialDescripcion = 0;
	var banderaAgregaroportunidad = 0;
	var menosEsta = "";
	var banderaPrimerVezClickBorrar = 0;
	var res = "";
	var descripciones = "";
  var costos = "";
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	  	function concatenarOportunidades() {
		 if ($("#btnActionGeneral").val() == "Modificar") {
			 var idInicialDescripcionMod = idInicialDescripcion -2;
			 x=0;
			 while (x<=idInicialDescripcionMod){
				 if(banderaPrimerVezClickBorrar === 1){
					 //alert("la x vale " + x); 
					 for(x2 = 0; x2<res.length; x2++){
						 if(x == res[x2]){
							 //alert("entre porque borrare este");
						 //alert(res[x2]);
							 x++;
						 }
					 }
				 }
				 		id = '#DescripcionOculta'+x;
								 if($(id).val()===""){

								 }else{
									 if(x==idInicialDescripcionMod){
											 if(banderaAgregaroportunidad === 0){
													 //alert("soy igualititito sin anadir")
												  	descripciones = descripciones + $(id).val();
													// alert($(id).val());
													 id = '#CostosOcultos'+x;
													 costos = costos + $(id).val();
											 }else{
													 //alert("soy igualititito aanadiendo")
													 descripciones = descripciones + $(id).val() + "-SEP-";
													 //alert($(id).val());
													 id = '#CostosOcultos'+x;
													 costos = costos + $(id).val() + "-SEP-";
											 }
										 
									 }else{
										  descripciones = descripciones + $(id).val() + "-SEP-";
									// alert($(id).val());
                   id = '#CostosOcultos'+x;
                   costos = costos + $(id).val() + "-SEP-";
									 }
									 
								 }  
				 x++;
			 }
			 if(banderaAgregaroportunidad === 0){
				  xg = xg-1;
				 
			 }else{
				  xg = xg-1;
				 //alert("imprimir xg "+xg);
				 x = idInicialDescripcion;
				 while(x <= xg){
					 if(banderaPrimerVezClickBorrar === 1){
					 for(x2 = 0; x2<res.length; x2++){
						 if(x === res[x2]){
							 //alert("entre porque borrare este2");
						 //alert(res[x2]);
							 x++;
						 }
					 }
				 }
					 
					 if(x==xg){
                   id = '#descripcionOportunidad'+x;
                   descripciones = descripciones + $(id).val();
									 //alert("soy igual a: " +x+ $(id).val());
                   id = '#costoOportunidad'+x;
                   costos = costos + $(id).val();
               }else{
                   id = '#descripcionOportunidad'+x;
                   descripciones = descripciones + $(id).val() + "-SEP-";
									// alert($(id).val());
                   id = '#costoOportunidad'+x;
                   costos = costos + $(id).val() + "-SEP-";
                   }
					 x++;
				 }
			 }
			 
		 }else{
			 x = idInicialDescripcion;
			 while(x <= xg){
				  if(x==xg){
                   id = '#descripcionOportunidad'+x;
                   descripciones = descripciones + $(id).val();
									// alert($(id).val());
                   id = '#costoOportunidad'+x;
                   costos = costos + $(id).val();
               }else{
                   id = '#descripcionOportunidad'+x;
                   descripciones = descripciones + $(id).val() + "-SEP-";
									// alert($(id).val());
                   id = '#costoOportunidad'+x;
                   costos = costos + $(id).val() + "-SEP-";
                   }
				 x++;
			 }
		 }
		}
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos
	//Creamos una super funcion que realizara la concatenacion de nuestros elementos Creamos una super funcion que realizara la concatenacion de nuestros elementos

$( ".radioDescripcionOportunidad" ).click(function() {
	if (!confirm("¿Seguro que quieres eliminar esta oportunidad?")){
				 
			 }else{
		if(banderaPrimerVezClickBorrar === 0){
			menosEsta = menosEsta + $( this ).val();
			banderaPrimerVezClickBorrar = 1;
		}else{
			menosEsta = menosEsta + " " + $( this ).val();
		}
		res = menosEsta.split(" ");
		concatenarOportunidades();
		       //alert(descripciones);
		//alert(res.length - 1)
		//alert("id del selecionado: " +$( this ).val());
		var elUltimo = $("#idInicialDescripcion").val() -2;
		if($( this ).val() == elUltimo){
			var desbaratarDes = descripciones.split("-SEP-");
			var desbaratarCos = costos.split("-SEP-");
			var quitarElUltimo = desbaratarDes.length - 3;
			var descripcionesN = "";
			var costosN = ""
			for(i=0;i<=quitarElUltimo;i++){
				if(i == quitarElUltimo){
					descripcionesN = descripcionesN + desbaratarDes[i];
					costosN = costosN + desbaratarCos[i];
				}else{
					descripcionesN = descripcionesN + desbaratarDes[i] + "-SEP-";
					costosN = costosN + desbaratarCos[i] + "-SEP-";
				}
				
			//alert(desbaratarDes[i])
			}
			costos = costosN;
			descripciones = descripcionesN;
			//alert(costosN);
		}
          $.ajax({
               type: "POST", 	
                url: "../../../actions/prospectos/actualizarOportunidad.php",
                data:"monedaOportunidad="+$("#monedaOportunidad").val()+
                      '&montoOportunidad='+$("#montoOportunidad").val()+
                    '&etapaProspecto='+$("#etapaProspecto").val()+
                    '&descripcionOportunidad='+$("#descripcionOportunidad").val()+
                    '&idOportunidad='+$("#idOportunidad").val()+
                    '&adjuntoOportunidad='+$("#adjuntoOportunidad").val()+
                    '&idContacto='+$("#idContacto").val()+
                    '&costoInstalacion='+$("#costoInstalacion").val()+
                    '&periodosPagosOportunidad='+$("#periodosPagosOportunidad").val()+
                    '&descripciones='+descripciones+
                    '&costos='+costos+
                      '&idprospecto='+$("#idprospecto").val()
                      //'&idcontacto='+$("#idcontacto").val()
              }).done(function(result) {
           // alert(result);
            
            //$("#content").load( "../../../views/prospectos/actualizarProspectos.php" );
						$("#conentDetallePros").load("/views/prospectos/oportunidad/altaOportunidad.php", {idprospecto: $("#idprospecto").val(), idcontacto: $("#idcontacto").val(), idOportunidad: $("#idOportunidad").val() } );
           // $("#conentDetallePros").load("../../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());
            }); 
              return false;
				 }
		});
	
  if ($("#btnActionGeneral").val() == "Modificar") {
				//alert($("#DescripcionOculta1").val())
				 idInicialDescripcion = $("#idInicialDescripcion").val();
				//var cantidadCostos = $("#cantidadCostos").val();
		
				xg = idInicialDescripcion;
		//alert(xg)
		//id = '#descripcionOportunidad'+xg;
		//alert("valor de la casilla " + $(id).val());
		}
  
  $("#masOportunidades").click(function(){
		if($("#btnActionGeneral").val() == "Guardar"){
			xg++;
			$( "#descripcionDiv" ).append( "<br> <input type='text' class='form-control' id='descripcionOportunidad"+xg+"'> " );
        $( "#costosDiv" ).append( "<br> <input type='text' class='form-control' id='costoOportunidad"+xg+"'> " );
		}else{
			banderaAgregaroportunidad = 1;
			$( "#descripcionDiv" ).append( "<br> <input type='text' class='form-control' id='descripcionOportunidad"+xg+"'> " );
        $( "#costosDiv" ).append( "<br> <input type='text' class='form-control' id='costoOportunidad"+xg+"'> " );
			xg++;
		}
     });

	
   $("#oportunidadForm").submit(function(e){
     //alert("submit");
       concatenarOportunidades();
           
            //alert(costos);
     if($("#btnActionGeneral").val()=='Guardar'){
       url="../../../actions/prospectos/altaOportunidad.php";
     }else if($("#btnActionGeneral").val()=='Modificar'){
       url="../../../actions/prospectos/actualizarOportunidad.php";
     }
          $.ajax({
               type: "POST", 	
                url: url,
                data:"monedaOportunidad="+$("#monedaOportunidad").val()+
                      '&montoOportunidad='+$("#montoOportunidad").val()+
                    '&etapaProspecto='+$("#etapaProspecto").val()+
                    '&descripcionOportunidad='+$("#descripcionOportunidad").val()+
                    '&idOportunidad='+$("#idOportunidad").val()+
                    '&adjuntoOportunidad='+$("#adjuntoOportunidad").val()+
                    '&idContacto='+$("#idContacto").val()+
                    '&costoInstalacion='+$("#costoInstalacion").val()+
                    '&periodosPagosOportunidad='+$("#periodosPagosOportunidad").val()+
                    '&descripciones='+descripciones+
                    '&costos='+costos+
                      '&idprospecto='+$("#idprospecto").val()
                      //'&idcontacto='+$("#idcontacto").val()
              }).done(function(result) {
           // alert(result);
            swal(result+"!", "", "success")
						if(result == "Cambio exitoso"){
							$("#conentDetallePros").load("../../../views/prospectos/oportunidad/altaOportunidad.php", {idprospecto: $("#idprospecto").val(), idOportunidad: $("#idOportunidad").val() } );
						}else{
							$("#conentDetallePros").load("../../../views/prospectos/vistasDetalle/verOportunidades.php?idprospecto=" + $("#idprospecto").val());
						}
            //$("#content").load( "../../../views/prospectos/actualizarProspectos.php" );
            
            });
              return false;
      });
});