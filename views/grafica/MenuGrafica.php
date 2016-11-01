<script>
  $("#Ventas").click(function() {
			
    $("#contentG").load("../views/grafica/Botones.php" );
				
    });
	$("#comisionGanada").click(function() {
			
    $("#contentG").load("../views/grafica/comisiones.php" );
				
    });
    $("#Etapas").click(function(){
			
			$("#contentG").load( "../views/grafica/funnel.php" );
  });
	    $("#Cerrado").click(function(){
			
			$("#contentG").load( "../views/grafica/GraficaCerrado.php" );
  });

  $("#Contacto").click(function(){
			
			$("#contentG").load( "../views/grafica/graficaContacto.php" );
  });  
</script>

<div class="row">
			<div id="menu" >
				<ul class=" nav nav-tabs nav-justified">
					<li role="presentation">
						<a href="#" class="" role="button" id= "Ventas" ><span  class="icon  icon-bar-chart iconsize"></span> Ventas</a>
					</li>
					<li role="presentation">
						<a href="#" class="" role="button" id= "Etapas" ><span  class="icon  icon-filter2 iconsize"></span> Etapas</a>
					</li>
					<li role="presentation">
						<a href="#" class="" role="button" id= "Cerrado" ><span  class="icon  icon-filter2 iconsize"></span> Etapas Cerrado</a>
					</li>
          <li role="presentation">
						<a href="#" class="" role="button" id= "Contacto" ><span  class="icon  icon-pie-chart iconsize"></span> Contacto</a>
					</li> 
					<li role="presentation">
						<a href="#" class="" role="button" id= "comisionGanada" ><span  class="icon  icon-money iconsize"></span> Comisiones</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="contentG" ></div>