$(document).ready(function() {
var mediaquery = window.matchMedia("(max-width: 900px)");
if (mediaquery.matches) {
  // alert("pantalla chica");
} else {
 //alert("pantalla grande");
}
		
											 
	$("#current").click(function() {
		location.reload();
	});

	$("#vendedores").click(function() {
  $("#content").load("../../views/jefedeventas/jefevendedor.php");
		

	
	});
	
	$("#Departamento").click(function(){
		
      	$("#content").load("../../views/jefedeventas/graficas/Botones.php");
	
				
	});
	
	
	$("#funnel").click(function(){
      	$("#content").load("../../views/jefedeventas/BotonesFunnel.php");
	
				
	});

	
		$("#Calendar").click(function(){
  			$("#content").load( "../../views/jefedeventas/Calendario/Calendario.php" );
				
				
	});
			$("#Metas").click(function(){
  			$("#content").load( "../../views/jefedeventas/MetasJefe.php" );
				
				
				
				
	});
	
	$("#ventasO").click(function(){
      	$("#content").load("../../views/jefedeventas/jefegraficaventas.php");
					
				
	});
	
		$("#cerrar").click(function(){
     	 window.location="../../lib/cerrarsesion.php";
		});
	
		$("#Comisiones").click(function(){
        $("#content").load( "comisiones/vistaComisiones.php" );      
	});	

});
