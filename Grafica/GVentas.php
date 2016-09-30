<html>
	<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	   <title>Grafica</title>
		<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../js/highcharts.js"></script>
		

	<?php
		$Me1='Feb12';
		$Me2='Mar12';
		
		$Ingresot1 = 4; 
		$Ingresot2 = 8; 

		$Venta1 = 45; 
		$Venta2 = 85; 
		?>
		<input type="hidden" id="1mes" value="<?php echo$Me1;?>">
		<input type="hidden" id="2mes" value="<?php echo$Me2;?>">
		<input type="hidden" id="1ing" value="<?php echo$Ingresot1;?>">
		<input type="hidden" id="2ing" value="<?php echo$Ingresot2;?>">
		<input type="hidden" id="1ven" value="<?php echo$Venta1;?>">
		<input type="hidden" id="2ven" value="<?php echo$Venta2;?>">
	<script type="text/javascript">
			
		MesP=$("#1mes").val();
		MesS=$("#2mes").val();
		ing1=$("#1ing").val();
		ing2=$("#2ing").val();
		Ven1=$("#1ven").val();
		Ven2=$("#2ven").val();
		</script>
		

<script type="text/javascript">
	var chart;
	$(document).ready(function() {

		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'graficaLineal', 	// Le doy el nombre a la gráfica
				defaultSeriesType: 'line'	// Pongo que tipo de gráfica es
			},
			title: {
				text: 'Datos de las Visitas'	// Titulo (Opcional)
			},

			// Pongo los datos en el eje de las 'X'
			xAxis: {
				categories: [MesP,MesS],
				// Pongo el título para el eje de las 'X'
				title: {
					text: 'Meses'
				}
			},
			yAxis: {
				// Pongo el título para el eje de las 'Y'
				title: {
					text: 'Nº Visitas'
				}
			},
			// Doy formato al la "cajita" que sale al pasar el ratón por encima de la gráfica
			tooltip: {
				enabled: true,
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
						this.x +': '+ this.y +' '+this.series.name;
				}
			},
			// Doy opciones a la gráfica
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: true
				}
			},
			// Doy los datos de la gráfica para dibujarlas
			series: [{
		                name: 'Ventas',
		                data: [parseInt(Ven1),parseInt(Ven2)]
		            },
					{
		                name: 'Ingreso',
		                data: [parseInt(ing1),parseInt(ing2)]
		            },
		            ],
		});	
	});				
</script>
		
	</head>
<body>
	<div id="graficaLineal"></div>
	<!--<div id="graficaLineal" style="width: 500px; height: 250px;"></div>-->

</body>
</html>

