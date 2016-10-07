<?php

	$idven=(isset($_REQUEST['idven']))?$_REQUEST['idven']:"";
		
  //incluimos el archivo de configuracion de la BD
  include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
  require '../../lib/prospectos.php';
 	require '../../lib/metodos_jefeventas.php';
  //Instaciamos la clase prospectos
  $prospectos = new prospectos($datosConexionBD);
 	$prospectos->idven=$idven;
  $consultarProspectos = $prospectos->prospectosxvendedor(); 
 	
	$vendedor = new jefeventas($datosConexionBD);
 	$consultarvendedor =$vendedor->obtener_vendedores(); 


?>
<script>


$('tbody').find('tr').find("td:last").find("span").click(function(e){
	
var nomprospecto=$(this).parents('tr').find("#nombre").text();
var varprospecto=$(this).parents('tr').find("td:first").text()
	$("#nombreprospecto").text(nomprospecto);

	$("#idprospect").val(varprospecto);
	$("#modalprospectos").modal();
});
	
	$('tbody').find('tr').find("td:first").click(function(e){
		
		//alert($(this).find('p').text());
$('#content').load("../../views/prospectos/detalleProspecto.php?idprospecto="+$(this).find('p').text());

});
	
	
	$('#cerrarDetalle').click(function(){
	  $("#content").load("../../views/jefedeventas/jefevendedor.php");
	});
	
	
	$("#formchange").submit(function(){
			 $.ajax({
															type: "POST",
															url: "../../actions/jefeventas/cambiarvendedor.php",
															cache: false,
															data: $("#formchange").serialize(),
				 
															success: function(data){
																
															
												
															}
															});
	
		swal({
  title: "Sweet!",
  text: "Here's a custom image.",
  imageUrl: 'thumbs-up.jpg'
});
			// $("#content").load("../../views/jefedeventas/jefevendedor.php");
	});
	
	
	
		</script>
	    <link rel="stylesheet" href="../../css/styleEAT.css">

	<div id="campoprospectos" align="center" class="contenedorvendedores" >
			<div class="col-md-12 ">
				<br>
				  <button type="button" class="close" aria-label="Close" id="cerrarDetalle"><span aria-hidden="true">&times;</span></button>
				<br>
				<h1>
					Prospectos
				</h1>
     
    </div>
		<br>
		<div >
			<form action="#" method="post" id="formVerProspect">
				<div id="pro">
					<?php
					$datos = count($consultarProspectos);
					if ($datos==0) {
							?>
					<center><h2>No tienes prospectos registrados!</h2></center>
					<?php
					}else{
						?>
						<table class="tablavendedores" id="tablavendedorpro">
						<thead>
							<tr>
								<th>ID</th>
								<th >Empresa</th>
								<th >Ciudad</th>
								<th >Opciones</th>
								
							
							</tr>
						</thead>
					<tbody>
						<?php
						
						
           while($row = $consultarProspectos->fetch_assoc()) { ?>
							<tr>
								<td >
										<div class="circulo id-prospecto-paginar-prospectos" style="background-color: <?=$row['color'];?>">
											<p>
											<?= $row['idprospecto']; ?>
									</p>
									</div>
										
								</td>
								<td id="nombre" >
									<?=$row['nombre'];?>
								</td>
								<td >
									<?=$row['ciudad'];?>
								</td>
							<td >
						 								<div class="icon-pencil-modificar-prospecto">
                    								<span class="btn-modificar-prospecto icon-group2 colorEmpresaEAT" id="span-cambiar-vendedor" style="width:30px"></span>
																</div>
								
							</td>
							</tr>
							<?php
           } ?>
							</tbody>
							
							
					</table>
					<?php
					}
					?>
					
				</div>
			</form>
		</div>

		
		
		
		
			<div class="modal fade" id="modalprospectos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<form method="Post"  id="formchange">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Cambiar Vendedor</h4>
					</div>
					<div class="modal-body">
						<h3 id="nombreprospecto">
								
								</h3>

						<select name="idvendedor" id="Emp" class="form-control">
									<option selected="selected" disabled="disabled">Prospecto</option>
									<?php
											 while($row = $consultarvendedor->fetch_assoc()) { ?>
												<option value="<?= $row['idvendedor']; ?>"><?=$row['nombreusuario'];?></option>
									<?php
						 } ?>

							</select>
								<input id="idprospect" type="hidden" name="idprospecto">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="guardar">Crear</button>
					</div>
				</div>
			</form>
		</div>
	</div>
		
		
		
		
		
		
		
		
		
		
		
		<script>
	$('#tablavendedorpro').dataTable();
</script>