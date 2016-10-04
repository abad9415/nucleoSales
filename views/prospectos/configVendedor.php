<div class="contentInt">
  <h3 class="txt-centered">Configuraciónes</h3>
	<div class="content-menu-vendedor-items"> 
		<span id="configImg" class="btn-menu-vendedor">
				<div class="content-elementos-menu-vendedor">
					<span  class="icon-file-text2 icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Imagen</span>
				</div>
		</span>
		
		<span id="configCotizacion" class="btn-menu-vendedor">
				<div class="content-elementos-menu-vendedor">
					<span  class="icon-file-text2 icono-menu-principal-vendedor"></span> <span class="texto-menu-vendedor">Cotización</span>
				</div>
		</span>
</div>
  
  <div id="cargarConfig"></div>
  
</div>

<script>
$("#configCotizacion").click(function(){
        $("#cargarConfig").load( "../views/prospectos/config/configCotizacion.php" );      
	});
	
$("#configImg").click(function(){
        $("#cargarConfig").load( "../views/vendedor/configImgPerfil.php" );
	});
</script>