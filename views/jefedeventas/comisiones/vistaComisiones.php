<div class="contentInt">
  	<div class="content-meno-prsopectos">
        <span role="button" id="comisionGeneral" class="btn-menu-prospecto">
          <h4>General</h4>
        </span>
        <span role="button" id="comisionPorVendedor" class="btn-menu-prospecto">
           <h4>Por vendedor</h4>
        </span>
		</div>
    <div id="contentDetalleComision"></div>
</div>
<script>
  $("#comisionGeneral").click(function(){
			 $("#contentDetalleComision").load( "comisiones/comisionGeneral.php");
	});
  
  $("#comisionPorVendedor").click(function(){
			 $("#contentDetalleComision").load( "comisiones/comisionXvendedor.php");
	});
</script>