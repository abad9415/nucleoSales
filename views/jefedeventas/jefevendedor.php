 
<?php
  //incluimos el archivo de configuracion de la BD
  include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
  require '../../lib/metodos_jefeventas.php';
  //Instaciamos la clase prospectos
  $vendedor = new jefeventas($datosConexionBD);
  $consultarvendedor= $vendedor->obtener_vendedores(); 

?>
	  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRxC6Y4f-j6nECyHWigtBATtJyXyha-XU&libraries=adsense&sensor=true&language=es"></script>
	
	<link rel="stylesheet" href="../../css/stylejefeventas.css">
<script src="../../js/jefeventas/enviaraltavendedor.js"></script>


<div id="contenedorvendedores" class="col-sm-offset-2 col-sm-8 vista contenedorvendedores ">
		<div class="row">
					<div class="col-md-12">
				
       <button type="button" class="close" aria-label="Close" id="cerrarDetalle"><span aria-hidden="true">&times;</span></button>
    </div>
			<br>
			<div align="center">
				<h1>
					Vendedores
				</h1>
			</div>
	
	</div>

<div id="opciones"  >

                

<button type="button" class="btn btn-primary" id="nuevoven"><span class="icon-plus"></span> Vendedor</button>
<button type="button" class="btn btn-success"   id="nuevoprospecto" ><span class="icon-plus"></span> Prospecto</button>


  
                 </div>
	

						<div class="contenedorvendedores" align="center">
                    <table id="tablaven" class="tablavendedores"   >
                        <thead>
                          <tr>
                            <th>ID</th>
														<th>Nombre</th>
                            <th>Email</th>
														<th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="vende">
														
															<?php
          											     while($row = $consultarvendedor->fetch_assoc()) { ?>
								
																<td>
																		<div class="circulo id-prospecto-paginar-prospectos" style="background-color:#2A6088" >

																				<p id="<?= $row['idvendedor']; ?>"><?= $row['idvendedor']; ?></p>
																		</div>
																</td>
														
														 <td><?= $row['nombreusuario']." ".$row['apellidoP']."  ".$row['apellidoM']; ?></td>
                           
                           
														<td><?= $row['correo']; ?></td>
														
														<td>
															 	<div class="icon-pencil-modificar-prospecto">
                    								<span class="btn-modificar-prospecto icon-pencil colorEmpresaEAT" id="modificarvendedor" ></span>
																</div>
														</td>
                          </tr>
                          
															<?php } ?>
                        </tbody>
                     </table>
                 </div>
	
</div>

		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalnewvendedor">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
					<div class="modal-header">
       			 <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
       			 <h3 class="modal-title modalrenglones" id="exampleModalLabel">Nuevo Vendedor</h3>
      		</div>
			<form  id="formaltvendedor" class="formulariobody" >
				<div id="cuerpobody" class="modal-body ">
					<div class="modalrenglones" >
						<h4 class="modal-title " >Informacion Personal</h4>
					</div>
						
						</br>
        		
								
							<div class="bodymodal form-group">
								
										<div class="modalrenglones">
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Nombre</label>
            					<input type="text" name="nombre" id="nombre" class="form-control" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Apellido Paterno</label>
            					<input type="text" name="apm" id="apm" class="form-control" >
											</div>
									</div>
										 <div class="modalrenglones">
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Apellido Materno</label>
            					<input type="text" name="app" id="app" class="form-control" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Correo</label>
            					<input type="text" name="correo" id="correo" class="form-control" >
											</div>
									 </div>
								<br>
									<div class="row" align="Center">
											 <div class="modalrenglones" >
											<div class="col-md-3 col-md-offset-3">
            					<label for="recipient-name" class="control-label">Celular</label>
            					<input type="text" name="telefono" id="telefono" class="form-control" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Otro Telefono</label>
            					<input type="text" name="telefono2" id="telefono2" class="form-control" >
											</div>
									 </div>
								</div>
								
								
								<br>
								
														<div class="modalrenglones" >
											 <h4 class="modal-title " >Domicilio</h4>
								</div>
										
											</br>
									<div class="modalrenglones">
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Avenida</label>
            					<input type="text" name="calle" id="calle" class="form-control" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Numero de domicilio</label>
            					<input type="text" name="numero" id="numero" class="form-control" >
											</div>
									</div>
										<div class="modalrenglones">		
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Colonia</label>
            					<input type="text" name="colonia" id="colonia" class="form-control">
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Ciudad</label>
            					<input type="text" name="ciudad" id="ciudad" class="form-control" >
											</div>
										</div>
								<br>
						<div class="modalrenglones" >
					<h4 class="modal-title example" >Usuario en el Sistema</h4>
					
						</div>
								
								</br>
					 	<div class="modalrenglones" >
											<div class="col-lg-3 col-md-offset-2">
            					<label for="recipient-name" class="control-label">Usuario</label>
            					<input type="text" name="user" id="user" class="form-control" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Password</label>
            					<input type="text" name="password"  id="password" class="form-control" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Comision %</label>
            					<input type="number" step="any" name="comision"  id="comision" class="form-control" >
											</div>
							<br>
						</div >
							</div>
							</div>
			
				 <div class="modal-footer modalrenglones">
       								 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        							<input type="submit"  value="Guardar"  id="enviar" class="btn btn-primary" data-dismiss="modal">
     								 </div>
							
							
					</form>
				


    </div>
    		</div>
  		</div>

<!--Modal Editar -->

		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalEditarVendedor">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
					<div class="modal-header">
       			 <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
       			 <h3 class="modal-title modalrenglones" id="exampleModalLabel">Editar Vendedor</h3>
      		</div>
			<form  id="formalteditvendedor" class="formulariobody" >
				<div id="cuerpobody1" class="modal-body ">
				
				</div>
			
				 <div class="modal-footer modalrenglones">
       								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					  					<button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminar">Eliminar</button>
        							<input type="button"  value="Guardar"  id="enviaredit" class="btn btn-primary" data-dismiss="modal">
     								 </div>
							
							
					</form>
				


    </div>
    		</div>
  		</div>
<!--Modal Editar-->


	

<script>
$('#tablaven').dataTable();
</script>
