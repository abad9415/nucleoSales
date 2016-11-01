<div class="contentInt">
		<ul class="navEAT content-meno-prsopectos">
			<li role="button" class="btn-menu-prospecto li-EAT"><h4>Comision de Ventas</h4>
					<ul>
						<li id="comisionGeneralXventas">General</li>
						<li id="comisionPorVendedorXventas">Vendedor Especifico</li>
					</ul>
			</li>
				
			<li role="button" class="btn-menu-prospecto li-EAT"><h4>Comision de Instalaciones</h4>
					<ul>
						<li id="comisionGeneralXInstalacion">General</li>
						<li id="comisionVendedorXInstalacion">Vendedor Especifico</li>
					</ul>
				</li>
		</ul>
	<div id="contentDetalleComision"></div>
</div>

<script>
	$('.dropdown-toggleEAT').dropdown()
 	 $("#comisionGeneralXventas").click(function(){
			 $("#contentDetalleComision").load( "comisiones/comisionGeneral.php");
	});
	
	$("#comisionPorVendedorXventas").click(function(){
			 $("#contentDetalleComision").load( "comisiones/comisionXvendedor.php");
	});
	
	$("#comisionGeneralXInstalacion").click(function(){
			 $("#contentDetalleComision").load( "comisiones/instalaciones/comisionGeneraIns.php");
	});
	
	$("#comisionVendedorXInstalacion").click(function(){
			 $("#contentDetalleComision").load( "comisiones/instalaciones/comisionXvendedorInstalacion.php");
	});
</script>