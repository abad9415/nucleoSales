<?php
  // Incluimos el archivo de configuración
  $aux1 = 1;
	$aux2 = 1;
	$count = 0;
	$Anios=(new DateTime)->format("Y")	;
	?>
<style>
  #containerGraf {
		margin: auto;
    width: 100px;
  }
  </style>
    <script>
    $('#Consulta').on('change', function(){
				$('#idMes option').remove();
					$('#idMes').append(llenarSelect($("#Consulta").val()));
		});
			
			function llenarSelect(aux){
				switch(aux){
					case '0':
						$( "#containerGraf" ).css( "width", "30%" );
						return "<option value=1>Enero</option><option value=2>Febrero</option><option value=3>Marzo</option><option value=4>Abril</option><option value=5>Mayo</option><option value=6>Junio</option><option value=7>Julio</option><option value=8>Agosto</option><option value=9>Septiembre</option><option value=10>Octubre</option><option value=11>Noviembre</option><option value=12>Diciembre</option>";
						break;
					case '1':
						$( "#containerGraf" ).css( "width", "60%" );
						return "<option value=1>Enero-Febrero</option><option value=3>Marzo-Abril</option><option value=5>Mayo-Junio</option><option value=7>Julio-Agosto</option><option value=9>Septiembre-Octubre</option><option value=11>Noviembre-Diciembre</option>";
						break;
					case '5':
						$( "#containerGraf" ).css( "width", "90%" );
						return "<option value=1>Enero-Junio</option><option value=7>Julio-Diciembre</option>";
						break;
					case '11':
						$( "#containerGraf" ).css( "width", "100%" );
						return "<option value=1>Enero-Diciembre</option>";
						break;
				}
				
			}
			
    function enters(){
			var consulta=$('#Consulta').val();
      var anio =$('#años').val();
			var iniMes=$("#idMes").val();	
			$("#containerGraf").load( "../../views/grafica/GraficaVentas.php?variable1="+iniMes+"&variable2="+consulta+"&variable3="+anio);
		}
    </script>


  <div class="container">
	
	
		
	<div class="row">
		
	
  <div class="col-sm-offset-2 col-md-2">
		<select name="Consulta" id="Consulta" class="form-control btn btn-primary">
							<option selected="selected" disabled="disabled">Opciones</option>
					
							<option value="0">Mes</option>
							<option value="1">Bimestre</option>
							<option value="5">Semestre</option>
							<option value="11">Anual</option>
						  
						</select>
		
  </div>
  <div class="col-md-2">
    <form action="" method="post">
          <select name="Meses" id="idMes" class="form-control btn btn-primary">

        </select>
		</form>
  </div>
		
  <div class="col-md-2">
     <input type="text" id="años"  name="años" value="<?php echo $Anios?>" class="form-control">
  </div>
       <div class="col-md-2">
				 <form>
		       <input type="button" onclick="enters()" value="Cargar" class="form-control btn btn-primary">
					</form>
        </div>
        </form>
	  	</div>
</div>
	<div id="containerGraf" ></div>
    

