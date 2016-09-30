<?php
  // Incluimos el archivo de configuración
	include '../../../conexionBD.php';
	require '../../../lib/metodos_jefeventas.php';
  $et = new jefeventas($datosConexionBD);
  $selectVendedores = $et->selectVendedores();  

  $aux1 = 1;
	$aux2 = 1;
	$count = 0;
	$Anios=(new DateTime)->format("Y")	;
	?>
<style>
  #containerGraf {
		margin: auto;
    width: 100%;
  }
  </style>
      
    <script>
    	
    function enters(){
			var consulta=$('#Consulta').val();
      
			$("#containerGraf").load( "../../views/jefedeventas/graficas/graficaContacto.php?IDProspecto="+consulta);
		}
    </script>


  <div class="container">
	
	
		
	<div class="row">
		<div class="col-sm-offset-4 col-md-2">
		<select name="Consulta" id="Consulta" class="form-control btn btn-primary">
							<option selected="selected" disabled="disabled">Opciones</option>
					
							<option value="0">Total</option>
							<?php
           while($row = $selectVendedores->fetch_assoc()) { ?>
							<option value="<?= $row['idvendedor']; ?>"><?=$row['Nombre'];?></option>
						  <?php
           } ?>
							
						</select>
		
  </div>

			<div class="col-md-2">
				 <form>
		       <input type="button" onclick="enters()" value="Cargar" class="form-control btn btn-primary">
					</form>
        </div>
		
	
  
	  	</div>
</div>
	<div id="containerGraf" ></div>
    

