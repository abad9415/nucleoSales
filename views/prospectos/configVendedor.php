<div class="contentInt">
  <h3 class="txt-centered">Configuraciónes</h3>
	<div class="columns MenuPrincipalEAT">    
  <a href="#" id="configCotizacion" role="button" class="column has-text-centered divliEAT">
    <span  class="icon icon-file-text2 iconsize "></span> Cotización
  </a>
</div>
  
  <div id="cargarConfig"></div>
  
</div>

<script>
$("#configCotizacion").click(function(){
        $("#cargarConfig").load( "../views/prospectos/config/configCotizacion.php" );      
	});
</script>