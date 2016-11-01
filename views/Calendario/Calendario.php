<?php
date_default_timezone_set('America/Tijuana');
require_once('../../views/Calendario/bdd.php');

	include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
  require '../../lib/prospectos.php';
	require '../../lib/ConsultasCalendario.php';
  //Instaciamos la clase prospectos
  $prospectos = new prospectos($datosConexionBD);
  $consultarProspectos = $prospectos->consultarProspectos(); 

	$ConsultasCalendario = new EventosC($datosConexionBD);
 	$llenarCalendario = $ConsultasCalendario->llenarCalendario();  

?>
	<meta charset="UTF-8">    	
  	
    <style>

	#calendar {
		max-width: 1000px;
		box-shadow:         0px 0px 16px 0px rgba(50, 50, 50, 0.5);
		border-radius: 10px;
		padding: 10px;
	}
	.col-centered{
		float: none;
		margin: 10 auto;
	}
			
    </style>


    <!-- Page Content -->
    <div>
                <div id="calendar" class="col-centered">
                </div>
    
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form id="borrar" class="formsDetalleProspectos">
			  <div class="modal-header">
					<input type="text" name="Ntitle" class="col-md-10 txt-oscuro" disabled id="Ntitle" >
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Descripcion:</label>
					
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
					
				  </div>
				
				    <div class="form-group"> 
						
						  <div class="checkbox  text-right">
							<label class="text-danger"><input type="checkbox"  id="delete"name="delete">Eliminar</label>
						  </div>
						
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit"  id="enviar" name="enviar" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<!-- editmodal -->
			
				<!-- agregar modal -->
			<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form id="GuardarCita" class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Citas</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
					  <input type="text" name="cita" id="cita" class="form-control" id="title" required placeholder="Citas">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-2 control-label">Empresa:</label>
					<div class="col-sm-10">
					
					  <select name="Empresa" id="Empresa"class="form-control" id="empresa">
							<option selected="selected" disabled="disabled">Prospecto</option>
								<?php
           while($row = $consultarProspectos->fetch_assoc()) { ?>
							<option value="<?= $row['idprospecto']; ?>"><?=$row['nombre'];?></option>
						  <?php
           } ?>
						</select>
						</div>
						<label  class="col-sm-2 control-label">Contacto:</label>
					<div class="contacto col-sm-10">
					  <select name="contacto" class="form-control" id="contacto">
						</select>
						</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-4">
					  <input type="date" name="deFecha" class="form-control" required id="deFecha">
						</div>
						<div class="col-sm-3">
						<input type="time" id="deHora" class="form-control" required name="deHora">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Termino</label>
					<div class="col-sm-4">
					  <input type="date" name="aFecha" class="form-control" required id="aFecha" >
						</div>
						<div class="col-sm-3">
						<input type="time" id="aHora" class="form-control" required name="aHora">
					</div>
				  </div>
				
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Crear</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
				
				
				
    </div>
	
    <!-- /.container -->



    <!-- Bootstrap Core JavaScript -->

	
	<script>
	
		

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			 lang:'es',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?php echo (new \DateTime())->format('Y-m-d'); ?>',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				//alert((moment(start).format('YYYY-MM-DD'))+" "+(moment(end).format('YYYY-MM-DD')));
				$('#ModalAdd #deFecha').val((moment(start).format('YYYY-MM-DD')));
				$('#ModalAdd #aFecha').val((moment(start).format('YYYY-MM-DD')));
				$('#ModalAdd').modal('show');
				
			},
		
			eventRender: function(event, element) {
				
				element.bind('click', function() {
									
					$.ajax({
			 		url: '../../views/Calendario/ContCal.php',
			 		type: "POST",
			 		data: "id="+event.id,
			 		success: function(rep) {
						$('#ModalEdit #Ntitle').val(rep);
						}	
					});
					
					$('#ModalEdit #id').val(event.id);
					
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position
				
				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
		
				edit(event);

			},
			events: [
			<?php 
              while($row = $llenarCalendario->fetch_assoc()) { 
                  ?>
				{
					id: '<?php echo $row['id']; ?>',
					title: '<?php echo $row['title']; ?>',
					start: '<?php echo $row['start']; ?>',
					end: '<?php echo $row['end']; ?>',
					color: '<?php echo $row['color']; ?>',
				},
			<?php } ?>
			]
			
		});
		
	
		function edit(event){
			
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: '../../views/Calendario/editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
			
						//alert('Saved');
					}else{
						//alert(rep);
						//alert('Could not be saved. try again.'); 
					}
				}
			});
			
		}
	
		
	});
		

</script>

<script src="../../views/Calendario/js/borrar.js"></script>