<script type="text/javascript">
		$(document).ready(function() {
			var banderaGrafica = 0;
			//pagination(1);
			$("#nuevoProspecto").click(function(){
        $("#content").load( "../views/prospectos/altaProspectos.php" );
	});
		$("#verGraficaContactos").click(function(){
			banderaGrafica = 1;
			$('#agrega-registros').html("");
						$('#pagination').html("");
						$('#pagination2').html("");
       // $("#content").load( "../views/prospectos/altaProspectos.php" );
			$("#verProspectosContent").load("/views/prospectos/graficas/graficaContacto.php");
	});
			
			$("#opFiltro").click(function(){
				$('#verProspectosContent').html("");
				pagination(1);
			});
			pagination(1);
      
      $("#opFiltro").change(function(){
				$('#verProspectosContent').html("");
				pagination(1);
	   });
		});
	function pagination(partida){
				var url = '/actions/prospectos/paginarProspectos.php';
				$.ajax({
					type:'POST',
					url:url,
					data:"filtroParaQueryVerProspectos="+$("#opFiltro").val()+
					'&partida='+partida,
					success:function(data){
						var array = eval(data);
						$('#agrega-registros').html(array[0]);
						$('#pagination').html(array[1]);
						$('#pagination2').html(array[2]);
					}
				});
				return false;
}
	
	</script>
	<section class="contentInt">
		<div class="row">
				<div class="content-btn-principal-vista-prospecto">
						<div class="btnPrincipalProspectos titulosG">
								<select name="opFiltro" id="opFiltro" class="form-control btn btn-primary">
														<option value="todosProspectos" selected>Todos los prospectos</option>
														<option value="estaSemana">Agregados esta semana</option>
														<option value="esteMes">Agregados este mes</option>
														<option value="esteAno" >Agregados este año</option>
													</select>
							</div>
							<div class="btnPrincipalProspectos">
								<a href="#" class="form-control btn btn-success" id="nuevoProspecto"><span class="icon-plus"></span> Nuevo Prospecto</a>
							</div>
					</div>
	
      <div class="col-md-12" id="verProspectosContent"></div>
			<div class="col-md-12" id="agrega-registros"></div>
					<div class="col-md-12" id="pagination"></div>	
					<div class="col-md-12" id="pagination2"></div>
		</div>
	</section>