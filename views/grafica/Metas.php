<?php
	include '../../conexionBD.php';
	require '../../lib/Setapas.php';
  $Setapas = new Setapas($datosConexionBD);
 
?>
<script>
  aux=parseInt('<?php echo (new \DateTime())->format('m');?>');
  anio=parseInt('<?php echo (new \DateTime())->format('Y');?>');
  $("#idActividad").load( "../../views/grafica/GraficaMetas.php?variable1="+aux+"&variable2="+anio);
function izquirda() {
  aux=aux-1;
  if(aux<1){
    aux=12;
    anio--;
  }
  //alert(aux+' '+anio);
  $("#idActividad").load( "../../views/grafica/GraficaMetas.php?variable1="+aux+"&variable2="+anio);
}
  function actual() {
  aux=parseInt('<?php echo (new \DateTime())->format('m');?>');
  anio=parseInt('<?php echo (new \DateTime())->format('Y');?>');
  //alert(aux+' '+anio);
    $("#idActividad").load( "../../views/grafica/GraficaMetas.php?variable1="+aux+"&variable2="+anio);
}
  function derecha() {
  aux=aux+1;
    if(aux>12){
    aux=1;
      anio++;
  }
    //alert(aux+' '+anio);

    $("#idActividad").load( "../../views/grafica/GraficaMetas.php?variable1="+aux+"&variable2="+anio);
}
  

</script>

<div class=row>
  <div class=col-md-4></div>
	
  <div class="col-md-4 text-center" >
    <button onclick="izquirda()"  class="btn btn-success"><span class="icon-arrow-left"></span></button>
    <button onclick="actual()"  class="btn btn-success"><span class="icon-calendar-check-o"></span></button>
    <button onclick="derecha()"  class="btn btn-success"><span class="icon-arrow-right"></span></button>
  </div>
  <div class=col-md-4></div>
</div>
<div class="col-md-12" id="idActividad"></div>
