<?php

//incluimos el archivo de configuracion de la BD
include '../../conexionBD.php';
//requerimos de la clase prospectos que esta en el siguiente archivo
require '../../lib/metodos_jefeventas.php';


//Instaciamos la clase vendedor mandamos parametros de la base de datos 
$vendedor = new jefeventas($datosConexionBD);

$vendedor->idvendedor= $_POST['idven'];
$resultado=$vendedor->vendedorid();


while($row=$resultado->fetch_assoc())
{
    $idvendedor=$row['idvendedor'];
    $nombre=$row['nombreusuario'];
    $app=$row['apellidoP'];
   $apm=$row['apellidoM'];
    $mail=$row['correo'];
    $calle=$row['calle'];
    $numerodomicilio=$row['numerodomicilio'];
    $colonia=$row['colonia'];
    $ciudad=$row['ciudad'];
    $usuario=$row['user'];
    $password=$row['password'];
		$telefono=$row['telefono'];
		$telefono2=$row['telefono2'];
}



//header('Location: ../views/jefedeventas/jefeventas.php');





echo '
    		
					<div class="modalrenglones" >
						<h4 class="modal-title " >Informacion Personal</h4>
					</div>
						
						</br>
        		
								
							<div class="bodymodal form-group">
								
										<div class="modalrenglones">
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Nombre</label>
            					<input type="text" name="nombre" id="nombre" class="form-control" value="'.$nombre.'" >
                      <input type="hidden" id="idvendedor" name="idvendedor" value="'.$idvendedor.'">
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Apellido Paterno</label>
            					<input type="text" name="app" id="apm" class="form-control" value="'.$app.'" >
											</div>
									</div>
										 <div class="modalrenglones">
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Apellido Materno</label>
            					<input type="text" name="apm" id="app" class="form-control" value="'.$apm.'" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Correo</label>
            					<input type="text" name="correo" id="correo" class="form-control" value="'.$mail.'" >
											</div>
									 </div>
									<br>
									<div class="row" align="Center">
											 <div class="modalrenglones" >
											<div class="col-md-3 col-md-offset-3">
            					<label for="recipient-name" class="control-label">Celular</label>
            					<input type="text" name="telefono" id="telefono" class="form-control" value="'.$telefono.'">
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Otro Telefono</label>
            					<input type="text" name="telefono2" id="telefono2" class="form-control" value="'.$telefono2.'">
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
            					<input type="text" name="calle" id="calle" class="form-control" value="'.$calle.'">
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Numero de domicilio</label>
            					<input type="text" name="numero" id="numero" class="form-control" value="'.$numerodomicilio.'" >
											</div>
									</div>
										<div class="modalrenglones">		
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Colonia</label>
            					<input type="text" name="colonia" id="colonia" class="form-control" value="'.$colonia.'">
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Ciudad</label>
            					<input type="text" name="ciudad" id="ciudad" class="form-control" value="'.$ciudad.'" >
											</div>
										</div>
								<br>
						<div class="modalrenglones" >
					<h4 class="modal-title example" >Usuario en el Sistema</h4>
					
						</div>
								
								</br>
					 	<div class="modalrenglones">
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Usuario</label>
            					<input type="text" name="user" id="user" class="form-control" value="'.$usuario.'" >
											</div>
											<div class="col-lg-3">
            					<label for="recipient-name" class="control-label">Password</label>
            					<input type="text" name="password"  id="password" class="form-control" value="'.$password.'" >
											</div>
						</div >
							</div>
							</div>';    
                       ?>