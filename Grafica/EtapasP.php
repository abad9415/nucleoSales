<?php 
include('../actions/datosGraficas.php');

  
?>
<html>

<head>
<!-- SELECT *FROM  `prospecto` WHERE  `idetapa` =1 -->
	
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../js/highcharts.js"></script>
	<script type="text/javascript" src="../js/funnel.js"></script>
	<script type="text/javascript" src="../js/Grid-light.js"></script>
	
	<script type="text/javascript" src="EtapasG.js"></script>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="recursos/alertas/jquery.freeow.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/stylemenu.css">
	<link rel="stylesheet" href="../css/styleEAT.css">
</head>

<body>
	<div class="jumbotron text-center ">
		<h2 class="text-primary">
			Grafica Etapas Prospectos
			</h2>
</div>
	<div class ="container ">
		
	
	<div class="row" >
  
  <div class="col-md-12">
		<form action="../views/vendedor.php" method="post">
			<button id= RegresarV type="summit" class="btn pull-right btn-primary">Regresar</button>
		</form>
				</div>
</div>

<div  >
	<div id="listP" class="col-md-6">
		
	
	</div>
	<div id="Gfunnel" class="col-md-6 "></div>
	</div>

  
           
</div>
</body>

</html>