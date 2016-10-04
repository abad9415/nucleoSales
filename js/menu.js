$(document).ready(function(){

	
   $("#content").load( "../views/grafica/Metas.php" );
		
	
	
	$("#inicio").click(function() {
		
       $("#content").load( "../views/grafica/Metas.php" );
  });
	
	$("#altaProspectos").click(function(){
			
        $("#content").load( "../views/prospectos/vistaProspectos.php" );
	});
	
		
	
	
	  $("#Graficas").click(function() {
			$("#content").load("../views/grafica/MenuGrafica.php" );
		});
			
			
	  
		$("#Calendario").click(function(){
				
     $("#content").load( "../views/Calendario/Calendario.php" );
        
	});
	
	
	$("#reportes").click(function(){
        $("#content").load( "../views/reportes/areareportes.php" );
      
	});
	
	$("#configGeneral").click(function(){
        $("#content").load( "../views/prospectos/configVendedor.php" );
      
	});	
});

  
