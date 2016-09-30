<?php
/*  // Incluimos el archivo de configuración
	include '../../conexionBD.php';
	require '../../lib/Setapas.php';
  $Setapas = new Setapas($datosConexionBD);
  $consultarEtapas = $Setapas->consultarEtapas();  */
?>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	   <title>Grafica</title>
		<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../js/highcharts.js"></script>
		<script type="text/javascript" src="../js/Grid-light.js"></script>
	<script type="text/javascript">
			
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'containerGraph'
				
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
					cursor: 'pointer',
					
					dataLabels: {
						enabled: true,
						color: '#000000',
						connectorColor: '#000000',
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
							['Correo',   2],
						]
			}]
		});
	});			
</script>
		
	
	</head>
<body>

	<div  class="col-md-12"id="containerGraph"></div>
		
</body>
</html>

