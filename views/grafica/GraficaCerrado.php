<?php
  
    include '../../conexionBD.php';
	  require '../../lib/Setapas.php';
    $Setapas = new Setapas($datosConexionBD);
?>


 
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


  <script type="text/javascript">
	
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Ventas Cerradas'
        },
        
        xAxis: {
            type: 'category',
            labels: {
                rotation: 0,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        legend: {
            enabled: false
        },
			plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function (e) {
															etapa=this.name;
                              
															$.ajax({
															type: "POST",
															url: "../../views/grafica/ListaProspectos.php",
															cache: false,
															data: "variableL="+etapa,
															success: function(datos){
                                $("#CerradoGanado").html(datos);				
				
															}
												 	});
                              $('#Ganado').modal('show');
																
                            }
                        }
                    },
                    
                }
            },
        tooltip: {
				  pointFormat: '<b>{point.y:.0f} </b>'
        },
        series: [{
            name: 'Population',
            data: [
        <?php 
              $totalEtapa = $Setapas->totalEtapa(5);  
                    $row=$totalEtapa->fetch_assoc();    
              $totalEtapa = $Setapas->totalEtapa(6);  
                    $row2=$totalEtapa->fetch_assoc();  
        ?>
                ['<?php echo $row['nombre']; ?>', parseFloat('<?php echo $row['Netapas']+" ";?>')],
                ['<?php echo $row2['nombre']; ?>', parseFloat('<?php echo $row2['Netapas']+" ";?>')],
              
            ],
            dataLabels: {
                enabled: true,
                rotation: 360,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.0f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Lucida Grande, sans-serif'
                }
            }
        }]
    });
});
  </script>

<div class="modal fade" id="Ganado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<form class="formsDetalleProspectos">
				
				</form>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			
			  <div id="CerradoGanado" class="modal-body">
					
			</div>
		  </div>
		</div>