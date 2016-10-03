  <?php
session_start(); //Iniciamos la Sesion o la Continuamos


if(!isset($_SESSION['session']))
   {
        echo "No hay ninguna sesion iniciada";
		header('Location: ../index.php');
//esto ocurre cuando la sesion caduca.
        
   }

  // Incluimos el archivo de configuración
	include '../conexionBD.php';
//echo $datosConexionBD[3];

					$idvendedor=$_SESSION['idvendedor'];
					try {
							$conexion = new PDO('mysql:host=localhost;dbname='.$datosConexionBD[3], $datosConexionBD[1], $datosConexionBD[2]);

							$resultado = $conexion->prepare("SELECT * FROM vendedor WHERE idvendedor ='".$idvendedor."' ");
						$resultado->execute();
							

					} catch (PDOException $e) {
							
					} 

foreach ($resultado as $row) {
	$nombreVendedor = $row['nombreusuario'];
	$apellidoVendedor = $row['apellidoP'];
}
/*
$datosVendedorRow = datosUsuarioXId();
while($row = $datosVendedorRow->fetch_assoc()) {
	$nombreVendedor = $row['nombreusuario'];
}
*/

?>
<html>
<head>
	
    <title>Ventas</title>
	<meta charset="UTF-8">  
	<!--<link rel="stylesheet" href="/css/bulma.css">-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="../js/menu.js"></script>
		<link rel="stylesheet" href="/recursos/icomoon/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="icon" type="image/png" sizes="16x16" href="http://red-7.com.mx/images/icon.png">
		<link rel="stylesheet" type="text/css" href="/css/stylemenu.css">   
	  <link rel="stylesheet" href="../recursos/alertas/style/freeow/freeow.css">
    <link rel="stylesheet" href="../css/styleEAT.css">
	 	<link rel="stylesheet" href="../css/fontastic/styles.css">
		<link rel="stylesheet" href="../css/reportes/reportescss.css">
	<script src="https://use.fontawesome.com/27f2685670.js"></script>
<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.7/hammer.min.js"></script> -->
	<script src="../recursos/hammer/hammer.min.js"></script>


	<link href="/recursos/colores/jquery.colorpanel.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="Calendario/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core JavaScript -->
    <script src="Calendario/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRxC6Y4f-j6nECyHWigtBATtJyXyha-XU&libraries=adsense&sensor=true&language=es"></script>
 
		<!-- FullCalendar -->
		<link href='Calendario/css/fullcalendar.css' rel='stylesheet' />
		<script src='../../views/Calendario/js/moment.min.js'></script>
		<script src='../../views/Calendario/js/fullcalendar.min.js'></script>
		<script src="../../js/lang-es.js"></script>
	<!-- Graficas -->
		<script src="../js/highcharts.js"></script>
		<script src="../js/funnel.js"></script>
		<script src="../js/Grid-light.js"></script>
		<script src="../js/highcharts-more.js"></script>
		<script src="../js/solid-gauge.js"></script>
		<script type="text/javascript" src="../js/exporting.js"></script>
		<script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="../node_modules/sweetalert/dist/sweetalert.css">
</head>

 <body>
	 <div class="content">
			<div class="conent-btn-menu-vendedor circuloEAT-ch" id="btnMostrarMenuVendedor">
					<span class="icon-menu"></span>
			</div>
		 
		 <div class="cabezera-red7-vendedor">
		 		<img src="http://red-7.com.mx/images/icon.png">
		 </div>

			
						
						
<div class="MenuPrincipalEAT" id="ConentenMenuPrincipalVendedor">
	<div class="content-items-menu-vendedor">
		<div class="content-img-personal-vendedor">
				<div class="datos-verndedor">
					<img src="../recursos/imagenes/perfil.jpg" alt="..." class="img-circle">
					<span class="txt-nombre-vendedor"><?=$nombreVendedor . " " .$apellidoVendedor;?></span>
				</div>
		</div>
		
		<div class="content-menu-vendedor-items">
				<span id="inicio" class="btn-menu-vendedor">
					<div class="content-elementos-menu-vendedor">
						<span  class="icon-home icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Inicio</span>
					</div>
				</span>

				<span id= "altaProspectos" class="btn-menu-vendedor">
					<div class="content-elementos-menu-vendedor">
						<span  class="icon-filter icono-menu-principal-vendedor"></span>  <span class="texto-menu-vendedor">Prospecto</span>
					</div>
				</span>

				<span id= "Graficas" class="btn-menu-vendedor">
					<div class="content-elementos-menu-vendedor">
						<span  class="icon-line-chart icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Graficas</span>
					</div>
				</span>

				<span id= "Calendario" class="btn-menu-vendedor">
					<div class="content-elementos-menu-vendedor">
						<span  class="icon-calendar icono-menu-principal-vendedor"></span>  <span class="texto-menu-vendedor">Calendario</span>
					</div>
				</span>

				<span id= "reportes" class="btn-menu-vendedor">
					<div class="content-elementos-menu-vendedor">
						<span  class="icon-calendar icono-menu-principal-vendedor"></span>  <span class="texto-menu-vendedor">Reportes</span>
					</div>
				</span>

				<span id= "configGeneral" class="btn-menu-vendedor">
					<div class="content-elementos-menu-vendedor">
						<span  class="icon-cog icono-menu-principal-vendedor"></span>  <span class="texto-menu-vendedor">Configuración</span>
					</div>
				</span>
			
				<form action="../lib/cerrarsesion.php" method="post" class="btn-cerrar-sesion btn-menu-vendedor">
						<button id= CerrarSesion type="summit" class="quitar-style-button content-elementos-menu-vendedor">
									<span  class="icon-switch icono-menu-principal-vendedor"></span>  <span class="texto-menu-vendedor">Salir</span>
						</button>
				</form>
		</div>
 </div>
</div>
		<div id="content" ></div>
	</div>
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
      var $body = document.body;
      var gestos = new Hammer($body);
      gestos.on('swipeleft', hideMenu);
      gestos.on('swiperight', showMenu);
		 
	 </script>
</body>
	
</html>


