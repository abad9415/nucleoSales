<?php
  // Incluimos el archivo de configuración
	//inline-block
  include '../../conexionBD.php';
  require '../../lib/Setapas.php';
  $Setapas = new Setapas($datosConexionBD);
  $consultarEtapas = $Setapas->consultarEtapas();  
		$condicionE = $Setapas->condicion();
		$rowC=$condicionE->fetch_assoc(); 
		
?>

    <script type="text/javascript">
			
			if(<?php echo $rowC['Netapas']; ?> > 0){
			    document.getElementById("Gfunnel").style.display = "inline-block";
			}
$(function () {
  var etapP;
    $('#Gfunnel').highcharts({
        chart: {
            type: 'funnel',
            marginRight: 100
        },
        title: {
            text: 'Etapas',
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
															url: "../views/grafica/ListaProspectos.php",
															cache: false,
															data: "variableL="+etapP,
															success: function(datos){
															 $("#listP2").html(datos);				
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
            name: 'Prospectos',
            data: [
              <?php $id=1;
              while($row = $consultarEtapas->fetch_assoc()) { 
                  
                    $totalEtapa = $Setapas->totalEtapa($id);  
                    $row2=$totalEtapa->fetch_assoc(); 
              ?>
                ['<?php echo $row['nombre']; ?>', <?php echo $row2['Netapas'] ?>],
              
               <?php $id++; } ?>
            ]
        }]
    });
});
    </script>




	
	

	<div class ="container ">
		
	
	<div class="row" >
  
  <div class="col-md-12">
			<div id="listP2" class="col-md-6">
		
	
	</div>
	<div id="Gfunnel"  class="col-md-6 "></div>
		
				</div>
</div>
         
</div>

	
	
	
</div>