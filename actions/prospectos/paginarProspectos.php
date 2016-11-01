<?php
$filtroQuery = $_POST['filtroParaQueryVerProspectos'];
$paginaActual = $_POST['partida'];
$paginaActualEn = $paginaActual;
include '../../conexionBD.php';
require '../../lib/prospectos.php';
$prospectos = new prospectos($datosConexionBD);

$seraPorFecha = false;
$primerDia = 0;
$ultimoDia = 0;
//$totalProspectos = $prospectos->consultarTotaldeTodoslosProspectos();
switch($filtroQuery){
	case 'estaSemana':
		$seraPorFecha = true;
						$year=date('Y');
						$month=date('n');
						$day=date('j');
						# Obtenemos el numero de la semana
						$semana=date("W",mktime(0,0,0,$month,$day,$year));

						# Obtenemos el día de la semana de la fecha dada
						$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));

						# el 0 equivale al domingo...
						if($diaSemana==0)
								$diaSemana=7;

						# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
						$primerDia=date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+1,$year));
						//$primerDia=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+1,$year));

						# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
						$ultimoDia=date("Y-m-d",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));
		break;
	case 'esteMes':
		$seraPorFecha = true;
						$month = date('m');
						$year = date('Y');
						$day = date("d", mktime(0,0,0, $month+1, 0, $year));

						$ultimoDia = date('Y-m-d', mktime(0,0,0, $month, $day, $year));

					/** Actual month first day **/
							$month = date('m');
							$year = date('Y');
							$primerDia = date('Y-m-d', mktime(0,0,0, $month, 1, $year));
		break;
		
	case 'esteAno':
		$seraPorFecha = true;
			$year = date('Y');
			$primerDia = $year . "-" . "01" . "-" . "01";
			$ultimoDia = $year . "-" . "12" . "-" . "31";
		break;
} //switch

//$variabnlePrueba = "no";
if($seraPorFecha == true){
	//$variabnlePrueba = "si prueba";
	$prospectos->primeraFecha = $primerDia;
	 $prospectos->ultimaFecha = $ultimoDia;
	 $totalProspectos = $prospectos->consultarTotaldeTodoslosProspectosXfecha();
}else{
	$totalProspectos = $prospectos->consultarTotaldeTodoslosProspectos();
}

$nroLotes = 10;
$nroPaginas = ceil($totalProspectos/$nroLotes);
$lista = '';
$tabla = '';
$lista = $lista.'<script> $("p").click(function() {$("#content").show(); $("#container").hide(); $("#content").load("../views/prospectos/detalleProspecto.php?idprospecto=" + $(this).text());}); </script>';
 $lista = $lista.'<div class="paginacionStyle">';
if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');"><span class="icon-chevron-left"></span></a></li>';
    }
for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');" class="activeEAT">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');"><span class="icon-chevron-right"></span></a></li>';
    }
 $lista = $lista.'</div>';
if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
$prospectos->limit = $limit;
$prospectos->nroLotes = $nroLotes;

if($seraPorFecha == true){
	 $prospectos->primeraFecha = $primerDia;
	 $prospectos->ultimaFecha = $ultimoDia;
	//$variabnlePrueba ="yeah";
		$registro = $prospectos->consultarProspectosConLimitesXfechas();
}else{
	$registro = $prospectos->consultarProspectosConLimites();
}

$registroRow = $registro->fetchAll();
$tabla = $tabla.'<table class="table table-hover tableEAT">
							 <thead>
									<tr>
										<th>Id</th>
										<th>Empresa</th>
										<th>Ciudad</th>
										<th class="verGrande">Creación</th>
									</tr>
							</thead>';


foreach($registroRow as $row){
		$tabla = $tabla.'<tr>
		<td>
					<p class="circulo-material id-prospecto-paginar-prospectos" style="background-color:'.$row['color'].'">
						'.$row['idprospecto'].'
					</p>
		</td>
		<td>
			'.$row['nombre'].'
		</td>
		<td>
			'.$row['ciudad'].'
		</td>
		<td class="verGrande">
			'.$row['fechadecreacion'].'
		</td>
		</tr>';
	}
$tabla = $tabla.'</table>';

//$cuantosHay = mysql_num_rows($consultarProspectos);
//$cuantosHay = count($consultarProspectos); 
//$nroProductos = $prospectos->

$array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);

  /*$array = array(0 => $filtroQuery,
    			   1 => $enviarGeneral);
echo json_encode($array); */
?>