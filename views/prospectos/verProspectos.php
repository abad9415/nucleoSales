<?php
	$filtroQuery=(isset($_REQUEST['filtroParaQueryVerProspectos']))?$_REQUEST['filtroParaQueryVerProspectos']:"";
  //incluimos el archivo de configuracion de la BD
  include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
  require '../../lib/prospectos.php';
  //Instaciamos la clase prospectos
  $prospectos = new prospectos($datosConexionBD);
 	

  $consultarProspectos = $prospectos->consultarProspectos(); 
switch($filtroQuery){
	case 'estaSemana':
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

						//echo "<br>Semana: ".$semana." - año: ".$year;
						//echo "<br>Primer día ".$primerDia;
						//echo "<br>Ultimo día ".$ultimoDia;
						$prospectos->primeraFecha = $primerDia;
						$prospectos->ultimaFecha = $ultimoDia;
						
						$consultarProspectos = $prospectos->consultarProspectosXfecha(); 
		break;
	case 'esteMes':
						$month = date('m');
						$year = date('Y');
						$day = date("d", mktime(0,0,0, $month+1, 0, $year));

						$ultimoDia = date('Y-m-d', mktime(0,0,0, $month, $day, $year));

					/** Actual month first day **/
							$month = date('m');
							$year = date('Y');
							$primerDia = date('Y-m-d', mktime(0,0,0, $month, 1, $year));
		
						$prospectos->primeraFecha = $primerDia;
						$prospectos->ultimaFecha = $ultimoDia;
						
						$consultarProspectos = $prospectos->consultarProspectosXfecha(); 
		break;
		
	case 'esteAno':
			$year = date('Y');
			$primerDia = $year . "-" . "01" . "-" . "01";
			$ultimoDia = $year . "-" . "12" . "-" . "31";
		$prospectos->primeraFecha = $primerDia;
						$prospectos->ultimaFecha = $ultimoDia;
						
						$consultarProspectos = $prospectos->consultarProspectosXfecha();
		//echo $primerDia;
		break;
}


?>
	<script type="text/javascript">
	
			$('p').click(function() { 
				$("#con").load("../views/prospectos/detalleProspecto.php?idprospecto=" + $(this).tex());
			});
		});
	</script>
		<div class="row" align="center">
			<form action="#" method="post" id="formVerProspect">
				<div class="col-md-12">
					<?php
					$datos = count($consultarProspectos);
					if ($datos==0) {
							?>
					<center><h2>No tienes prospectos registrados!</h2></center>
					<?php
					}else{
						?>
						<table class="table table-hover tableEAT">
						<thead>
							<tr>
								<th>Id</th>
								<th>Empresa</th>
								<th>Ciudad</th>
								<th>Creación</th>
							</tr>
						</thead>

						<?php
           while($row = $consultarProspectos->fetch_assoc()) { ?>
							<tr>
								<td>
									<a href="#">
										<p>
											<?= $row['idprospecto']; ?>
										</p>
									</a>
								</td>
								<td>
									<?=$row['nombre'];?>
								</td>
								<td>
									<?=$row['ciudad'];?>
								</td>
								<td>
									<?=$row['fechadecreacion'];?>
								</td>
							</tr>
							<?php
           } ?>
					</table>
					<?php
					}
					?>
					
				</div>
			</form>
		</div>