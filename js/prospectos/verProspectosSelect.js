//alert("ho");
$("#aquiPHP").load( "../../actions/prospectos/consultarParaVerProspectos.php" );
$(document).ready(function(){
  //alert("entre!!");
  $("#opFiltro").change(function(){
    //alert($("#opFiltro").val());
		$("#aquiPHP").load("../../actions/prospectos/consultarParaVerProspectos.php?filtroParaQueryVerProspectos=" + $("#opFiltro").val());
		$("#aquiHTML").load( "../../views/prospectos/verProspectosSection.php" );
		//$( "spanPHP" ).append( "<?=consultarProspectos()?>" );
	});
});