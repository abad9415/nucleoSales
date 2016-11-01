
<?php
  // Incluimos el archivo de configuración
	include '../../conexionBD.php';
	require '../../lib/metodos_jefeventas.php';
  $et = new jefeventas($datosConexionBD);
  $consultarEtapas = $et->consultarEtapas();  
	$IDV= $_GET['IDVendedor'];

?>


<script type="text/javascript">
	
$(function () {
  var etapP;
    $('#Gfunnel').highcharts({
        chart: {
            type: 'funnel',
            marginRight: 100
        },
        title: {
            text: 'Oportunidades',
            x: -50
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    softConnector: true
                },
              
              cursor: 'pointer',
              point: {

                events: {
                  click: function(e) {
                  etapP= this.name;
										 $.ajax({
															type: "POST",
															url: "../../views/jefedeventas/LToportunidades.php",
															cache: false,
															data: "variableL="+etapP+"&IDVendedor="+'<?php echo $IDV?>',
															success: function(datos){
															 $("#listP").html(datos);				
															}
															});
                 
                  }
                }
              },
                neckWidth: '15%',
                neckHeight: '10%'

                
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Oportunidades',
            data: [
              <?php $id=1;
							
              while($row = $consultarEtapas->fetch_assoc()) { 
                  
                    $totalEtapa = $et->etapasvendedores($id,$IDV);  
                    $row2=$totalEtapa->fetch_assoc(); 
              ?>
                ['<?php echo $row['nombre']; ?>', <?php echo $row2['Netapas'] ?>],
              
               <?php $id++; } ?>
            ]
        }]
    });
});
	
		</script>

<div>

	
	
	<div class="text-center ">
	<h2>
			Embudo de Ventas
			</h2>
</div>
	<div class ="container ">
		
	
	<div class="row" >
  
  <div class="col-md-12">
				</div>
</div>

<div  >
	<div id="listP" class="col-md-6">
		
	
	</div>
	<div id="Gfunnel"  class="col-md-6 "></div>
		</div>

  
           
</div>

	
	
	
</div>