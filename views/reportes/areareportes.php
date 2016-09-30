<?php


	include '../../conexionBD.php';
	//requerimos de la clase prospectos que esta en el siguiente archivo
	require '../../lib/prospectos.php';
	//Instaciamos la clase prospectos
	$rprospectos = new prospectos($datosConexionBD);
	$consultarProspectos = $rprospectos->consultarProspectos(); 



?>


	<div class="container">

		<div class="row">
			<div class="encabezado">
				<i class="fa fa-wpforms fa-5x" aria-hidden="true"></i>

				<h2>
						Reportes
				</h2>
			</div>
		</div>
		<div class="row col-lg-4">
			<div align="center">
				<button class="btn imagen3" data-toggle="modal" data-target="#modalprospectos">
					<i class="fa fa-users fa-5x" aria-hidden="true"></i>
				</button>
				<h3>
				Reporte de Prospecto
			</h3>
			</div>
		</div>

		<div class="col-md-offset-1 col-lg-3">
			<div align="center">
				<button class="btn imagen3" data-toggle="modal" data-target="#modalcitas">
					 <i class="fa fa-book fa-5x" aria-hidden="true"></i>
					 </button>
				<h3>
									Reporte de Agenda 
							</h3>
			</div>
		</div>
		<div class="col-md-offset-1 col-lg-3">
			<div align="center">
				<button class="btn imagen3" data-toggle="modal" data-target="#modalventas">
				<i class="fa fa-line-chart fa-5x" aria-hidden="true"></i>
					 </button>
				<h3>
									Reporte de Ventas
							</h3>
			</div>
		</div>

	</div>



	<!-- Inicio de modal de Prospecto -->
	<div class="modal fade" id="modalprospectos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<form method="Post" action="../../actions/reportes/datosreportes.php">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Reporte de Prospecto</h4>
					</div>
					<div class="modal-body">
						<h3>
									 Prospecto
								</h3>

						<select name="Emp" id="Emp" class="form-control">
									<option selected="selected" disabled="disabled">Prospecto</option>
									<?php
											 while($row = $consultarProspectos->fetch_assoc()) { ?>
												<option value="<?= $row['idprospecto']; ?>"><?=$row['nombre'];?></option>
									<?php
						 } ?>

							</select>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="guardar">Crear</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- Final de modal de Prospecto -->
	<!-- inicio  de modal de Citas -->
	<div class="modal fade" id="modalcitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<form action="../../actions/reportes/reportecitas.php" method="Post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Reporte de Agenda</h4>
					</div>
					<div class="modal-body">
						<select class="form-control" name="filtro" id="filtro">
						<option value=1>Semana</option>
						<option value=2>Mes</option>
						<option value=3 >Semestre</option>
						<option value=4>Año</option>
				</select>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="citas" class="btn btn-primary">Crear</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- final de modal de citas -->
	<!-- inicio  de modal de Ventas -->
	<div class="modal fade" id="modalventas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Reporte de Ventas</h4>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Crear</button>
				</div>
			</div>
		</div>
	</div>
	<!-- final de modal de Ventas -->