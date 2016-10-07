<?php
  
    include '../../conexionBD.php';
	  require '../../lib/Setapas.php';
    $Setapas = new Setapas($datosConexionBD);
    $aux1 = $_GET["variable1"];
    $aux2 =$_GET["variable2"]	;
		$aux2=$aux1+$aux2;
    $count = 0;
    $Anios= $_GET["variable3"]	;  
    
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


 
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


  <script type="text/javascript">
	var anio=parseInt("<?= $Anios?>");
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo "Comisión: "; echo $Anios; ?>'
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
                text: 'Pesos'
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
															mes=this.name;
															
																$.ajax({
																type: "POST",
																url: "../../lib/DatosComision.php",
																cache: false,
																data: "mes="+mes+"&anio="+anio,
																	success: function(datos){
																	 	$("#CerradoGanado").html(datos);				
																	}
															 	});
															var fech=mes.concat(" "+anio);
															$('#Ganado #Fecha').val(fech);
															$('#Ganado').modal('show');
                            }
                        }
                    },
                    
                }
            },
        tooltip: {
				  pointFormat: '<b>{point.y:.1f} Pesos</b>'
        },
        series: [{
            name: 'Population',
            data: [
        <?php $count=$aux1;
                while ($count <= $aux2) { 
                $Ventas = $Setapas->ComisionVendedor($count,$Anios); 
                $row=$Ventas->fetch_assoc(); 
        ?>
                ['<?php echo idMeses($count); ?>', parseFloat('<?php echo $row['comision']+" ";?>')],
               <?php $count++; }?>
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
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
				<input type="text" name="Fecha" class="col-md-5 txt-oscuro" disabled id="Fecha" >
				</form>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			
			  <div id="CerradoGanado" class="modal-body">
					
			</div>
		  </div>
		</div>