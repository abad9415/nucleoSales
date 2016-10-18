<?php

session_start(); //Iniciamos la Sesion o la Continuamos
include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
 	require '../../lib/Setapas.php';


if(!isset($_SESSION['session']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../../index.php');
//esto ocurre cuando la sesion caduca.
        
   }

	$Setapas = new Setapas($datosConexionBD);
	$ListadoJefe = $Setapas->ListadoJefe($etapa);  


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
	<link rel="stylesheet" type="text/css" href="../../node_modules/sweetalert/dist/sweetalert.css">
	</head>


<body>
	
	<div  class="container">
		<div class="conent-btn-menu-vendedor circuloEAT-ch" id="btnMostrarMenuVendedor">
					<span class="icon-menu"></span>
			</div>
		<div class="cabezera-red7-vendedor">
		 		<img src="../../recursos/imagenes/logred2.jpg">
		 </div>
	 <div class="MenuPrincipalEAT" id="ConentenMenuPrincipalVendedor">
		 	<div class="content-items-menu-vendedor">
								<div class="row" id="encabezado">
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
		 
		 
		<!--  MENU PRINCIPAL  -->
		 	<div class="content-menu-vendedor-items">
				<span id="current" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-user-tie icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Inicio</span>
						</div>
					</span>
					<span id="vendedores" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-user-tie icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Vendedor</span>
						</div>
					</span>
				
					<span id="funnel" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-filter icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Oportunidades</span>
						</div>
					</span>
				
					<span id="Departamento" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-pie-chart icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Departamento</span>
						</div>
					</span>
				
					<span id="ventasO" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-money icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Ventas</span>
						</div>
					</span>	
				
					<!--<span id="Calendar" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-calendar icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Calendario</span>
						</div>
					</span>-->
				
					<span id="Metas" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-trophy2 icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Metas</span>
						</div>
					</span>
				
					<span id="Comisiones" class="btn-menu-vendedor">
						<div class="content-elementos-menu-vendedor">
							<span  class="icon iconsize icon-percent icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Comisiones</span>
						</div>
					</span>
		  </div>
		 </div>
		<!--  /MENU PRINCIPAL  -->
	 </div>
		<div id="content" >
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#MetasJefe">Prospectos Inactivos</button>
		</div>
		<div class="modal fade" id="MetasJefe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form id="CrearMeta" class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Prospectos Inactivos</h4>
			  </div>
			  <div class="modal-body">
					<table class="table table-hover tableEAT">
           <thead>
             <tr>
							   <th>Id Prospectos</th>
                <th>Nombre Prospecto</th>
							 	<th>Nombre Vendedor</th>
                
              </tr>
           </thead>
                  
           <?php
           while($row = $ListadoJefe->fetch_assoc()) {
						 	$fecha1 =  $row['fechadeetapa'];
							$fecha2 = date("Y-m-d"); 
							$diferencia = abs((strtotime($fecha1) - strtotime($fecha2))/86400);  
						if($diferencia>=15){?>
                <tr>
								<td><?= $row['idprospecto']; ?></p></a></td>
                <td><?= $row['Nombre']; ?></p></a></td>
                <td><?= $row['Vendedor'];?></td>
                
              </tr>
           <?php
           	} 
						}?>
          </table>
				  
			</div>
		  </div>
		</div>
		
	</div>
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
	<script src="../../recursos/hammer/hammer.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script src="../../node_modules/sweetalert/dist/sweetalert.min.js"></script> 
	<script>
		
			  var $burguerButton = document.getElementById('btnMostrarMenuVendedor');
      var $menu = document.getElementById('ConentenMenuPrincipalVendedor');

      $burguerButton.addEventListener('touchstart', toggleMenu);

      function toggleMenu(){
        $menu.classList.toggle('active')
      };
		 
		 $(".btn-menu-vendedor").click(function(){
			 hideMenu();
		 });
		 function hideMenu(){
			 $( "#ConentenMenuPrincipalVendedor" ).removeClass( "active" );
		 }
		  function showMenu(){
			 $( "#ConentenMenuPrincipalVendedor" ).addClass( "active" );
		 }
		  // Gestos touch
      var $body = document.querySelector("html")
      var gestos = new Hammer($body);
			
      gestos.on('swipeleft', hideMenu);
      gestos.on('swiperight', showMenu);
	</script>
</body>
</html>

	
