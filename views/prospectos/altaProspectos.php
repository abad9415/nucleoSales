<?php
@$idjefeventas=$_GET["idusuario"];
  // Incluimos el archivo de configuración
	include '../../conexionBD.php';
	// Requerimos la clase de usuarios
	require '../../lib/prospectos.php';
  //Instanciamos nuestra clase usuarios
	$prospectos = new prospectos($datosConexionBD);
  $nombreEmpresa = null;
  $calleEmpresa = null;
  $numeroEmpresa = null;
  $coloniaEmpresa = null;
  $cpEmpresa = null;
  $ciudadEmpresa = null;
//origen prospecto
  $idOrigenProspecto = null;
  $origenProspecto = null;
//estado prospecto
  $idEstadoProspectos = null;
  $estadoProspecto = null;
//estapa de prospecto
$idEtapaProspecto = null;
  $etapaProspecto = null;

  $origenesProspectos = $prospectos->obtenerOrigenes();
  $estadosProspectos = $prospectos->obtenerEstados();
  $etapasProspectos = $prospectos->obtenerEtapas();
$obtenerMonedas = $prospectos->obtenerMonedas();
$ultimoIdProspectoRow = $prospectos->ultimoIdProspecto();



?>
    <div class="contentInt">
        <form id="abadForm2" method="post">
          <div class="row">
						<div class="col-md-12">
							 <button type="button" class="close" aria-label="Close" id="cerrarAltaProspectos"><span aria-hidden="true">&times;</span></button>
						</div>
             <div class="col-md-12">
                 <h2>Empresa</h2>
							 	 <div class="circulo-material btn-agregar-plus" id="activarEmpresa" style="display: none"><span class="icon-pencil"></span></div>
             </div>
              <div class="col-md-4 col-sm-6">
                   <div class="form-group">
                       <label for="nombreEmpresa">Nombre</label>
                       <input type="text" id="nombreEmpresa" name="nombreEmpresa" class="form-control inputProspecto" required>
                   </div>
									<div class="form-group" id="content-rfc-prospecto">
                       <label for="rfcEmpresa">RFC</label>
                       <input type="text" id="rfcEmpresa" name="rfcEmpresa" class="form-control inputProspecto" required>
                   </div>

                    <div class="form-group">
                        <label for="calleEmpresa">Calle</label>
                        <input type="text" id="calleEmpresa" name="calleEmpresa" class="form-control inputProspecto" required>
                    </div>

                    <div class="form-group">
                        <label for="numeroEmpresa">N°</label>
                        <input type="number" id="numeroEmpresa" name="numeroEmpresa" class="form-control inputProspecto" required>
                    </div>

                    <div class="form-group">
                        <label for="coloniaEmpresa">Colonia</label>
                        <input type="text" id="coloniaEmpresa" name="coloniaEmpresa" class="form-control inputProspecto" required>
                    </div>
										<div class="form-group">
                        <label for="cpEmpresa">Codigo Postal</label>
                        <input type="number" id="cpEmpresa" name="cpEmpresa" class="form-control inputProspecto">
                    </div>
              </div>
              <div class="col-md-4 col-sm-6">
                   
                    <div class="form-group">
                        <label for="ciudadEmpresa">Ciudad</label>
                        <input type="text" id="ciudadEmpresa" name="ciudadEmpresa" class="form-control inputProspecto" required>
                    </div>

                    <div class="form-group">
                        <label for="origenProspecto">Origen</label>
                        <select name="origenProspecto" class="form-control inputProspecto" id="origenProspecto">
                          <?php
                             while($row = $origenesProspectos->fetch_assoc()) {
                               ?><option value="<?=$idOrigenProspecto = $row['idorigen'];?>"><?=$origenProspecto = $row['nombre'];?></option>
                              <?php  
                              }
                          ?>
                        </select>
                    </div>
									 <div class="form-group">
                        <label for="estadoProspecto">Estado</label>
                        <select name="estadoProspecto" id="estadoProspecto" class="form-control inputProspecto">
                            <?php
                               while($row = $estadosProspectos->fetch_assoc()) {
                                 ?><option value="<?=$idOrigenProspecto = $row['idestado'];?>"><?=$estadoProspecto = $row['nombre'];?></option>
                                <?php  
                                }
                            ?>
						
                        </select>
                    </div>
								<div class="form-group">
                        <label for="estadoProspecto">Color</label>
												<input type="color" id="colorProspecto" value="#197CDF" class="inputEmpresa">
                    </div>
               </div>
               <div class="col-md-4 col-sm-12">
                     <div id='map_canvas' class="maps"></div>
               </div>
            
            </div>
            <div class="row">
                <div class="col-md-12">
                 <h2>Contacto</h2>
								 <div class="circulo-material btn-agregar-plus" id="activarContacto" style="display: none"><span class="icon-pencil"></span></div>
                </div>
                 
							  <div class="col-md-12">
                 <p id="actualizarContacto"></p>
                </div>
                <div class="col-md-4 col-sm-6">
                  <label for="sexoContacto">Trato</label>
                   <select name="sexoContacto" id="sexoContacto" class="form-control inputContacto">
                        <option value="Sr.">Sr.</option>
                        <option value="Sra.">Sra.</option>
                    </select>
                    
                   <label for="nombreContacto">Nombre</label>
                    <input type="text" id="nombreContacto" name="nombreContacto" class="form-control inputContacto" required>

                    <label for="apePaternoContacto">Apellido Paterno</label>
                    <input type="text" id="apePaternoContacto" name="apePaternoContacto" class="form-control inputContacto" required>

                    <label for="apeMaternoContacto">Apellido Materno</label>
                    <input type="text" id="apeMaternoContacto" name="apeMaternoContacto" class="form-control inputContacto" required>
                </div>

                <div class="col-md-4 col-sm-6">
                    <label for="telefonoContacto">Telefono</label>
                    <input type="tel" id="telefonoContacto" name="telefonoContacto" class="form-control inputContacto" required>

                    <label for="correoContacto">Correo</label>
                    <input type="email" id="correoContacto" name="correoContacto" class="form-control inputContacto" required>

                    <label for="cargoContacto">Cargo</label>
                    <input type="text" id="cargoContacto" name="cargoContacto" class="form-control inputContacto" required>
                </div>
								<input type="hidden" id="cargoContacto" name="cargoContacto" class="form-control">
                </div>
							 	<div class="col-xs-12">
                       <input type="submit" value="Guardar" name="enviar" class="pull-right btn btn-primary" id="btnActionGeneral">
                </div>
            </div>
					        
				</form>
    </div>

       <script src='../../js/maps.js'></script>

<script src="../../js/enviarAltaProspectos.js"></script>


<script>
	var tipousuario=<?php $idjefeventas ?>;
	
 $("#cerrarAltaProspectos").click(function(){
	 	//alert(tipousuario);
			 $("#content").load( "../../views/prospectos/vistaProspectos.php" );
	  });
	

</script>