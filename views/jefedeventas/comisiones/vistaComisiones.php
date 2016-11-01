<div class="contentInt">
			<div class="content-meno-prsopectos">
       <span role="button" id="comisionVentas" class="btn-menu-vendedor">
         <h4>Comision de ventas</h4>
       </span>
       <span role="button" id="comisionInstalacion" class="btn-menu-vendedor">
          <h4>Comision de Instalacion</h4>
       </span>
	 </div>
   <div id="contentDetalleComision"></div>
	<div id="contentDetalleComisionVendedor"></div>
</div>

<script>
 	 $("#comisionVentas").click(function(){
			 $("#contentDetalleComision").load( "comisiones/comisionGeneral.php");
		 	$("#contentDetalleComisionVendedor").load( "comisiones/comisionXvendedor.php");
	});
	
	$("#comisionInstalacion").click(function(){
			 $("#contentDetalleComision").load( "comisiones/instalaciones/comisionGeneraIns.php");
				$("#contentDetalleComisionVendedor").load( "comisiones/instalaciones/comisionXvendedorInstalacion.php");
	});
	
</script>