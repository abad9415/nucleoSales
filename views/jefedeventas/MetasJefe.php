<?php
 include '../../conexionBD.php';
  //requerimos de la clase prospectos que esta en el siguiente archivo
  require '../../lib/metodos_jefeventas.php';
  //Instaciamos la clase prospectos
	session_start();
  $vendedor = new jefeventas($datosConexionBD);
  $consultarvendedor= $vendedor->selectVendedores();
	$idJefe=$_SESSION['idvendedor'];

?>

<div class=row>
  <div class=col-md-4></div>
	
  <div class="col-md-4 text-center" >
    <button onclick="izquirda()"  class="btn btn-success"><span class="icon-arrow-left"></span></button>
    <button onclick="actual()"  class="btn btn-success"><span class="icon-calendar-check-o"></span></button>
    <button onclick="derecha()"  class="btn btn-success"><span class="icon-arrow-right"></span></button>
  </div>
  <div class="col-md-4 text-right">
		<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#MetasJefe">Metas</button>
		  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#MetasVendedor">Metas Vendedor</button>
	</div>
</div>
<div class="col-md-12 text-center">
	<h3 id="idh1Metas"></h3>
<div class=col-md-6 id="ValoresMetas"></div>	
<div class=col-md-6 id="idActividad"></div>
</div>

		<div class="modal fade" id="MetasVendedor" role="dialog">
    <div class="modal-dialog">
    			<div class="modal-content">
			<form id="CrearMetaV" class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" >Metas Vendedor</h4>
			  </div>
			  <div class="modal-body">
					<select name="Vendedor" class="form-control" id="Vendedor">
							<option selected="selected" disabled="disabled">Vendedores</option>
								<?php
           while($row = $consultarvendedor->fetch_assoc()) { ?>
							<option value="<?= $row['idvendedor']; ?>"><?=$row['Nombre'];?></option>
						  <?php
           } ?>
						</select>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Ventas</label>
					<div class="col-sm-4">
					  <input type="number" min="0" name="VentasV" class="form-control" required id="VentasV">
						</div>
						<div class="col-sm-3">
						<input type="number" id="AnioV"min="0" class="form-control" required name="AnioV" value="<?php echo (new \DateTime())->format('Y');?>">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Prospecto</label>
					<div class="col-sm-4">
					  <input type="number" min="0" name="ProspectoV" class="form-control" required id="ProspectoV" >
						</div>
						<div class="col-sm-3">
						 <select name="Mes" id="MesV"class="form-control" >
							<option selected="selected" disabled="disabled">Mes</option>
							<option value=1>Enero</option>
							 <option value=2>Febrero</option>
							 <option value=3>Marzo</option>
							 <option value=4>Abril</option>
							 <option value=5>Mayo</option>
							 <option value=6>Junio</option>
							 <option value=7>Julio</option>
							 <option value=8>Agosto</option>
							 <option value=9>Septiembre</option>
							 <option value=10>Octubre</option>
							 <option value=11>Noviembre</option>
							 <option value=12>Diciembre</option>
							</select>
						</div>
				  </div>
					<div class="form-group">
					<label for="end" class="col-sm-2 control-label">Citas</label>
					<div class="col-sm-4">
					  <input type="number" min="0" name="CitasV" class="form-control" required id="CitasV" >
						</div>
						
				  </div>
				
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Crear</button>
			  </div>
			</form>
			</div>
    </div>
  </div>
			</div>
		
<div class="modal fade" id="MetasJefe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form id="CrearMeta" class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Metas Departamento</h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Ventas</label>
					<div class="col-sm-4">
					  <input type="number" min="0" name="Ventas" class="form-control" required id="Ventas">
						</div>
						<div class="col-sm-3">
						<input type="number" id="Anio"min="0" class="form-control" required name="Anio" value="<?php echo (new \DateTime())->format('Y');?>">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Prospecto</label>
					<div class="col-sm-4">
					  <input type="number" min="0" name="Prospecto" class="form-control" required id="Prospecto" >
						</div>
						<div class="col-sm-3">
						 <select name="Mes" id="Mes"class="form-control" id="empresa">
							<option selected="selected" disabled="disabled">Mes</option>
							<option value=1>Enero</option>
							 <option value=2>Febrero</option>
							 <option value=3>Marzo</option>
							 <option value=4>Abril</option>
							 <option value=5>Mayo</option>
							 <option value=6>Junio</option>
							 <option value=7>Julio</option>
							 <option value=8>Agosto</option>
							 <option value=9>Septiembre</option>
							 <option value=10>Octubre</option>
							 <option value=11>Noviembre</option>
							 <option value=12>Diciembre</option>
							</select>
						</div>
				  </div>
					<div class="form-group">
					<label for="end" class="col-sm-2 control-label">Citas</label>
					<div class="col-sm-4">
					  <input type="number" min="0" name="Citas" class="form-control" required id="Citas" >
						</div>
						
				  </div>
				
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Crear</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

	
	<script>
		function Meses(idM)
{
 switch (idM) {
				case 1:
        Nmes="Enero";
        break;
				case 2:
        Nmes="Febrero";
        break;
        case 3:
        Nmes="Marzo";
        break;
        case 4:
        Nmes="Abril";
        break;
        case 5:
        Nmes="Mayo";
        break;
        case 6:
        Nmes="Junio";
        break;
        case 7:
        Nmes="Julio";
        break;
        case 8:
        Nmes="Agosto";
        break;
        case 9:
        Nmes="Septiembre";
        break;
        case 10:
        Nmes="Octubre";
        break;
        case 11:
        Nmes="Noviembre";
        break;
        case 12:
        Nmes="Diciembre";
        break;
    default:
    }  
    return Nmes;     
}
	
  aux=parseInt('<?php echo (new \DateTime())->format('m');?>');
  anio=parseInt('<?php echo (new \DateTime())->format('Y');?>');
		
		document.getElementById("idh1Metas").innerHTML ="Metas "+Meses(aux)+" "+anio;
		$.ajax({
						type: "POST",
						url: "../../views/jefedeventas/TablaMetas.php",
						cache: false,
						data: "mes="+aux+"&anio="+anio,
						success: function(datos){
						 $("#ValoresMetas").html(datos);				
						}
					});
  $("#idActividad").load( "../../views/jefedeventas/GraficaMetasJefe.php?variable1="+aux+"&variable2="+anio);
		
function izquirda() {
  aux=aux-1;
  if(aux<1){
    aux=12;
    anio--;
  }
  document.getElementById("idh1Metas").innerHTML ="Metas "+Meses(aux)+" "+anio;
	$.ajax({
						type: "POST",
						url: "../../views/jefedeventas/TablaMetas.php",
						cache: false,
						data: "mes="+aux+"&anio="+anio,
						success: function(datos){
						 $("#ValoresMetas").html(datos);				
						}
					});
  $("#idActividad").load( "../../views/jefedeventas/GraficaMetasJefe.php?variable1="+aux+"&variable2="+anio);
}
  function actual() {
  aux=parseInt('<?php echo (new \DateTime())->format('m');?>');
  anio=parseInt('<?php echo (new \DateTime())->format('Y');?>');
  document.getElementById("idh1Metas").innerHTML ="Metas "+Meses(aux)+" "+anio;
		$.ajax({
						type: "POST",
						url: "../../views/jefedeventas/TablaMetas.php",
						cache: false,
						data: "mes="+aux+"&anio="+anio,
						success: function(datos){
						 $("#ValoresMetas").html(datos);				
						}
					});
    $("#idActividad").load( "../../views/jefedeventas/GraficaMetasJefe.php?variable1="+aux+"&variable2="+anio);
}
  function derecha() {
  aux=aux+1;
    if(aux>12){
    aux=1;
      anio++;
  }
    document.getElementById("idh1Metas").innerHTML ="Metas "+Meses(aux)+" "+anio;
		$.ajax({
						type: "POST",
						url: "../../views/jefedeventas/TablaMetas.php",
						cache: false,
						data: "mes="+aux+"&anio="+anio,
						success: function(datos){
						 $("#ValoresMetas").html(datos);				
						}
					});
    $("#idActividad").load( "../../views/jefedeventas/GraficaMetasJefe.php?variable1="+aux+"&variable2="+anio);
}
		

		
		$("#CrearMeta").submit(function(e) {
			$.ajax({
   			type: "POST",
   			url: "../../lib/insertMetasJefe.php",
   			cache: false,
   			data: "vendedor=" +"<?php echo $idJefe?>"+
   						'&ventas=' +$("#Ventas").val() +
   						'&prospectos=' + $("#Prospecto").val()+
				 			'&citas='+ $("#Citas").val()+
				 			'&fecha=' + $("#Anio").val()+'-'+$("#Mes").val()+'-01',

   		}).done(function(result) {
				$('#MetasJefe').modal('hide');
				 
				setTimeout ("$('#content').load( '../../views/jefedeventas/MetasJefe.php' );", 500); 
   		});
			return false;
			 
			
   	});
		$("#CrearMetaV").submit(function(e) {
			
			$.ajax({
   			type: "POST",
   			url: "../../lib/insertMetasJefe.php",
   			cache: false,
   			data: "vendedor=" +$("#Vendedor").val()+
   						'&ventas=' +$("#VentasV").val() +
   						'&prospectos=' + $("#ProspectoV").val()+
				 			'&citas='+ $("#CitasV").val()+
				 			'&fecha=' + $("#AnioV").val()+'-'+$("#MesV").val()+'-01',

   		}).done(function(result) {
				$('#MetasVendedor').modal('hide');
			setTimeout ("$('#content').load( '../../views/jefedeventas/MetasJefe.php' );", 500); 
   		});
			return false;
			
			
		});
  
		

</script>
