<?php
session_start(); //Iniciamos la Sesion o la Continuamos


if(!isset($_SESSION['session']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../../index.php');
//esto ocurre cuando la sesion caduca.
        
   }




?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">  
	<title>JEFE DE VENTAS</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/recursos/icomoon/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/stylejefeventas.css">
	<link rel="stylesheet" href="../../css/styleEAT.css">
	<link href='../../views/Calendario/css/fullcalendar.css' rel='stylesheet' />
	</head>


<body>
	
	<div  class="container">
 

		<div class="row " id="encabezado">
         <div id="fotoven">
						<img height="100px" src="../../recursos/imagenes/perfil.jpg" alt="..." class="img-circle">
         </div>
         <div id="personal">
    					 <h2> <span class="label label-primary">Jefe de Ventas </span></h2>
         </div>
			<div id="ajustes" class="btn-group">
				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opciones <span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#">Editar informacion</a></li>
											<li><a  id="cerrar" href="#">Cerrar Sesion</a></li>
										</ul>
								</div>
			</div>
		
        <br>
		<div class="row">
			<div id="menu" >
				<ul class="nav nav-tabs nav-justified">
					<li role="presentation">
						<a   role="button" id= "vendedores" ><span  class="icon iconsize icon-user-tie "></span> Vendedor</a>
					</li>
					<li role="presentation">
						<a  role="button" id="funnel"><span  class="icon iconsize icon-filter "></span>  Oportunidades</a>
					</li>
					<li role="presentation">
						<a  role="button" id="Departamento"><span  class="icon iconsize icon-pie-chart  "></span> Departamento</a>
					</li>
				
					<li role="presentation">
						<a  id="ventasO" class="" role="button"><span class="icon iconsize icon-money "></span> Ventas</a>
					</li>
						<li role="presentation">
						<a  class="" role="button" id="Calendar"><span  class="icon iconsize icon-calendar "></span> Calendario</a>
					</li>
				
					<li role="presentation">
						<a  class="" role="button" id="Metas"><span  class="icon iconsize icon-trophy2 "></span> Metas</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="content" >
			
		</div>
		
				
		
		
        
	</div>


</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="../../js/jefeventas/menujefeventas.js"></script>
	<script src="../../js/highcharts.js"></script>
	<script src="../../js/funnel.js"></script>
	<script src="../../js/Grid-light.js"></script>
	<script src="../../js/exporting.js"></script>
	<script src="../../js/highcharts-more.js"></script>
	<script src="../../js/solid-gauge.js"></script>
	<script src='../../views/Calendario/js/moment.min.js'></script>
	<script src='../../views/Calendario/js/fullcalendar.min.js'></script>
	<script src="../../js/lang-es.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
</html>

	
