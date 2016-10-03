  $(document).ready(function(e) {	
		
$("#nuevoprospecto").click(function(){
	
	$("#content").load("../prospectos/altaProspectos.php");

	
});
	


		$('#cerrarDetalle').click(function(){
	location.reload();
	
});


		$('tbody').find('tr').find("td:first").click(function(e){
$("#contenedorvendedores").load("prospectosvendedor.php?idven="+$(this).find('p').text());

 
	
//	$("#modalvendedor").modal("show");
	
});
		

	$('tbody').find('tr').find("td:last").find("span").click(function(e){
			
			alert("Editar");
		});
		
		
		
		
	  $(document).on("click", "#enviar",function(e) {
			
			
				 $.ajax({
															type: "POST",
															url: "../../actions/jefeventas/altavendedor.php",
															cache: false,
															data: $("#formaltvendedor").serialize(),
															success: function(data){
																alert("enviado");
																	location.reload();
															}
															});
			
			
			
			
			 });
		
		
	
  });