<?php


	$mes = $_GET["variable1"];
	$anio = $_GET["variable2"];
	include '../../conexionBD.php';
	require '../../lib/metodos_jefeventas.php';
  $vendedor = new jefeventas($datosConexionBD);
  $CGanado = $vendedor->CGanado($mes,$anio);  
  $ventasM=$CGanado->fetch_assoc();
	$CVentas = $vendedor->CVentas($mes,$anio);  
  $ventasV=$CVentas->fetch_assoc();
	$Ccitas = $vendedor->Ccitas($mes,$anio);  
  $citasV=$Ccitas->fetch_assoc();
	$Cprospecto = $vendedor->Cprospecto($mes,$anio);  
  $prospectoV=$Cprospecto->fetch_assoc();
  
  if(intval($ventasV['Ventas'])>0){ 
	$porVentas=intval($ventasM['TotalV'])*100/intval($ventasV['Ventas']);
}else{
		$porVentas=0;
	}
	if(intval($ventasV['Citas'])>0){ 
	$porCitas=intval($citasV['Citas'])*100/intval($ventasV['Citas']);
}else{
		$porCitas=0;
	}
	if(intval($ventasV['Prospectos'])>0){ 
	$porProspectos=intval($prospectoV['Prospectos'])*100/intval($ventasV['Prospectos']);
}else{
		$porProspectos=0;
	}
	

function idMeses($aux)
{
switch ($aux) {
    case "1":
        $Nmes="Enero";
        break;
    case "2":
        $Nmes="Febrero";
        break;
		case "3":
        $Nmes="Marzo";
        break;
		case "4":
        $Nmes="Abril";
        break;
		case "5":
        $Nmes="Mayo";
        break;
		case "6":
        $Nmes="Junio";
        break;
		case "7":
        $Nmes="Julio";
        break;
		case "8":
        $Nmes="Agosto";
        break;
		case "9":
        $Nmes="Septiembre";
        break;
		case "10":
        $Nmes="Octubre";
        break;
		case "11":
        $Nmes="Noviembre";
        break;
		case "12":
        $Nmes="Diciembre";
        break;
    default:
    }  
	return $Nmes;     
}



?>
<script type="text/javascript">
  	//alert(screen.width + " x " + screen.height) ;
 
  $(function() {
    Highcharts.chart('containMetas', {

        chart: {
          type: 'solidgauge',
          marginTop: 50
        },

        title: {
          text: '',
          style: {
            fontSize: '24px'
          }
        },

        tooltip: {
          borderWidth: 0,
          backgroundColor: 'none',
          shadow: false,
          style: {
            fontSize: '16px'
          },
          pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
          positioner: function(labelWidth, labelHeight) {
            return {
							
              x: (($("#containMetas").width())/2)-40,
              y: 180
            };
          }
        },

        pane: {
          startAngle: 0,
          endAngle: 360,
          background: [{ // Track for Move
            outerRadius: '112%',
            innerRadius: '88%',
            backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get(),
            borderWidth: 0
          }, { // Track for Exercise
            outerRadius: '87%',
            innerRadius: '63%',
            backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1]).setOpacity(0.3).get(),
            borderWidth: 0
          }, { // Track for Stand
            outerRadius: '62%',
            innerRadius: '38%',
            backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2]).setOpacity(0.3).get(),
            borderWidth: 0
          }]
        },

        yAxis: {
          min: 0,
          max: 100,
          lineWidth: 0,
          tickPositions: []
        },

        plotOptions: {
          solidgauge: {
            borderWidth: '34px',
            dataLabels: {
              enabled: false
            },
            linecap: 'round',
            stickyTracking: false
          }
        },

        series: [{
          name: 'Ventas',
          borderColor: Highcharts.getOptions().colors[0],
          data: [{
            color: Highcharts.getOptions().colors[0],
            radius: '100%',
            innerRadius: '100%',
            y: parseInt('<?php echo $porVentas; ?>')
          }]
        }, {
          name: 'Prospectos',
          borderColor: Highcharts.getOptions().colors[1],
          data: [{
            color: Highcharts.getOptions().colors[1],
            radius: '75%',
            innerRadius: '75%',
            y: parseInt('<?php echo $porProspectos; ?>')
          }]
        }, {
          name: 'Citas',
          borderColor: Highcharts.getOptions().colors[2],
          data: [{
            color: Highcharts.getOptions().colors[2],
            radius: '50%',
            innerRadius: '50%',
            y: parseInt('<?php echo $porCitas; ?>')
          }]
        }
        ]
      },

      /**
       * In the chart load callback, add icons on top of the circular shapes
       */
      function callback() {

        
        this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8, 'M', 0, -8, 'L', 16, 0, 0, 8])
          .attr({
            'stroke': '#000',
            'stroke-linecap': 'round',
            'stroke-linejoin': 'round',
            'stroke-width': 2,
            'zIndex': 10
          })
          .translate(($("#containMetas").width())/2, 26)
          .add(this.series[2].group);

        
        this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8, 'M', 0, -8, 'L', 16, 0, 0, 8])
          .attr({
            'stroke': '#000',
            'stroke-linecap': 'round',
            'stroke-linejoin': 'round',
            'stroke-width': 2,
            'zIndex': 10
          })
          .translate(($("#containMetas").width())/2, 61)
          .add(this.series[2].group);

        
        this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8, 'M', 0, -8, 'L', 16, 0, 0, 8])
          .attr({
            'stroke': '#000',
            'stroke-linecap': 'round',
            'stroke-linejoin': 'round',
            'stroke-width': 2,
            'zIndex': 10
          })
          .translate(($("#containMetas").width())/2, 96)
          .add(this.series[2].group);
      });


  });
				
</script>

	

<div id="containMetas" ></div>
