  $(document).ready(function(e) {	
		
$("#nuevoprospecto").click(function(){
	
	$("#content").load("../prospectos/altaProspectos.php");

	
});
	


		$('#cerrarDetalle').click(function(){
	location.reload();
	
});

		
		
		$("#nuevoven").click(function(){

			$("#modalnewvendedor").modal("toggle");
		});
		
		
		
		
		
		
		
		
		

		$('tbody').find('tr').find("td:first").click(function(e){
$("#contenedorvendedores").load("prospectosvendedor.php?idven="+$(this).find('p').text());

 
	
//	$("#modalvendedor").modal("show");
	
});
		

	$('tbody').find('tr').find("td:last").find("span").click(function(e){
			var varprospecto=$(this).parents('tr').find("td:first").text()
		
		
		
			$.ajax({
															type: "POST",
															url: "../../actions/jefeventas/Informacionvendedor.php",
															cache: false,
															data: "idven="+varprospecto,
															success: function(data){
															
																$("#cuerpobody1").html(data);
																$("#modalEditarVendedor").modal("toggle");
																
													
															}
															});
			
		});
		
		
		
		
	  $(document).on("click","#enviar",function(e) {
		
			
				 $.ajax({
															type: "POST",
															url: "../../actions/jefeventas/altavendedor.php",
															cache: false,
															data: $("#formaltvendedor").serialize(),
																success: function(data){
																
														swal({
																	title: "Guardado!",
																	type: "success",
																	confirmButtonClass: "btn-success",
																	confirmButtonText: "ok",
																	closeOnConfirm: false
																},
																function(){
																	location.reload();
																});
 																																			
															
																}
															});
		
				//	document.getElementById("#formaltvendedor").reset()	
			
			
			 });
		
		 $(document).on("click", "#enviaredit",function(e) {
			
									 $.ajax({
															type: "POST",
															url: "../../actions/jefeventas/editarvendedor.php",
															cache: false,
															data: $("#formalteditvendedor").serialize(),
															success: function(data){
																
														swal({
																	title: "Modificado!",
																	type: "success",
																	confirmButtonClass: "btn-success",
																	confirmButtonText: "ok",
																	closeOnConfirm: false
																},
																function(){
																	location.reload();
																});
 																																			
															
																}
													});
														
											
			
			
			 });
		
		$("#eliminar").click(function(){
			var idv=$("#idvendedor").val();
			
			
			
			$.ajax({
															type: "POST",
															url: "../../actions/jefeventas/eliminarVendedor.php",
															cache: false,
															data: "idven="+idv,
																success: function(data){
																
																
														swal({
																	title: "Eliminado!",
																	type: "error",
																	confirmButtonClass: "btn-success",
																	confirmButtonText: "ok",
																	closeOnConfirm: false
																},
																function(){
																	location.reload();
																});
 																																			
															
																}
															});
			
			
		});
		
	
  });