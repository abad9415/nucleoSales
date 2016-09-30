<?php
  // Incluimos el archivo de configuración
	include '../../../conexionBD.php';
	require '../../../lib/Setapas.php';
    $Setapas = new Setapas($datosConexionBD);
  	$DatosPie = $Setapas->DatosPie();
		$ID = $_GET["IDProspecto"];
		$condicionContactos = $Setapas->condicionContactos($ID);
		$rowC=$condicionContactos->fetch_assoc(); 
 		
?>
		<script type="text/javascript">
			
			if(<?php echo $rowC['Total']; ?> > 0){
			   $("contentInt0").show();
			}else{
				$("contentInt0").hidden();
			}
				
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'contentInt0'
				
			},
			title: {
				text: 'Contacto'
			},
			plotArea: {
				shadow: null,
				borderWidth: null,
				backgroundColor: null
			},

			tooltip: {
				formatter: function() {
					return '<b>'+ this.point.name +'</b>: '+ this.y ;
				}
			},
			plotOptions: {

				pie: {
					allowPointSelect: true,
					click: function(e) {	
            		alert(this.name);
                  },
					cursor: 'pointer',
					  point: {
                events: {
                  click: function(e) {
                  cont= this.name;
										
										$('#OrigenCont #Origen').val(cont);
										$.ajax({
															type: "POST",
															url: "../../views/jefedeventas/graficas/ContactoOrigen.php",
															cache: false,
															data: "origen="+cont+"&IDProspecto="+'<?php echo $ID?>',
															success: function(datos){
															 $("#Origenes").html(datos);				
															}
												 	});
										$('#OrigenCont').modal('show');
                  }
                }
              },
					dataLabels: {
						enabled: true,
						color: null,
						connectorColor: null,
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y ;
						}
					}
				}
			},
		    series: [{
				type: 'pie',
				name: 'Browser share',
				data: [
							 <?php ;
              while($row = $DatosPie->fetch_assoc()) { 
									$aux=$row['nombre'];
									$totalOrigenJefe = $Setapas->totalOrigenJefe($aux,$ID);  
                  $row2=$totalOrigenJefe->fetch_assoc(); 
              ?>
                ['<?php echo $row['nombre']; ?>',parseInt('<?php echo $row2['Total']; ?>')],
               <?php  } ?>
						]
			}]
		});
	});			
</script>
	<div  id="contentInt0"></div>



<div class="modal fade" id="OrigenCont" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<form class="formsDetalleProspectos">
				<input type="text" name="Origen" class="col-md-5 txt-oscuro" disabled id="Origen" >
				</form>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div id="Origenes" class="modal-body">
					
			</div>
		  </div>
		</div>