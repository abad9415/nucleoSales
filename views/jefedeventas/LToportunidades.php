<?php 
include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
 	require '../../lib/metodos_jefeventas.php';
	$miVariable= $_POST['variableL'];
	$IDV=$_POST['IDVendedor'];
  //incluimos el archivo de configuracion de la BD
  $et = new jefeventas($datosConexionBD);
  $Listado = $et->Listadototal($miVariable,$IDV);  
?>

  <div class="contentList">


    
<table class="table table-hover tableEAT">
           <thead>
             <tr>
							  <th>ID</th> 
                <th>Prospecto</th>
							 	<th>Monto</th>
                <th>Fecha de Etapa</th>
							 <th>Nombre Vendedor</th>
                
              </tr>
           </thead>
                <tbody>  
           <?php
           while($row = $Listado->fetch_assoc()) { ?>
                <tr>
								<td><p><?= $row['idprospecto']; ?></p></td>
                <td><?= $row['nombre']; ?></td>
                <td>$<?=$row['monto'];?></td>
                <td><?=$row['fechadeetapa'];?></td>
								<td><?= $row['nombreusuario']; ?></td>
              </tr>
           <?php
           } ?>
					</tbody>
          </table>

  </div>

<script>
	
$('tbody').find('tr').click(function(e){
	var id=$(this).find('p').text();
	var etapa=0;
	
	switch('<?php echo $miVariable ?>'){
		case 'Analizando': 
				etapa=1;
			break;
		case 'Propuesta': 
				etapa=2;
			break;
		case 'Cotizacion': 
				etapa=3;
			break;
		case 'Demo': 
				etapa=4;
			break;
		case 'Cerrado Perdido': 
				etapa=5;
			break;
		case 'Cerrado Ganado': 
				etapa=6;
			break;
		default: 
			etapa=0;
			break;
	}
	
		 $.ajax({
						type: "POST",
						url: "../../views/grafica/OportunidaLista.php",
						cache: false,
						data: "idProspecto="+id+"&idEtapa="+etapa,
						success: function(datos){
						 $("#Origenes").html(datos);				
						}
			 	});
	$('#ModalAdd').modal('show');
	
});
</script>

<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<form class="formsDetalleProspectos">
				<input type="text" value="Descripcion" name="Origen" class="col-md-5 txt-oscuro" disabled id="Origen" >
				</form>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div id="Origenes" class="modal-body">
					
			</div>
		  </div>
		</div>
	</div>