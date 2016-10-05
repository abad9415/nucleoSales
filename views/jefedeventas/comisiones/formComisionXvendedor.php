<?php
$idComision=(isset($_REQUEST['idComision']))?$_REQUEST['idComision']:"";
?>
<form method="post" id="formComisionXvendedor">
<input type="hidden" id="idComision" value="<?=$idComision;?>">
<input  type="text" id="comisionNueva" class="inputDisfrasadoComision">%
<input type="submit" value="" class="inpu-submit-escondido">
  </form>

<script>
  var banderaPaSalir = 0;
  var banderaElijeUnAction = 0;
$('.inputDisfrasadoComision').focusout(function() {
      if(banderaElijeUnAction == 0 ){
          banderaElijeUnAction = 1;
           if($(this).val().length == 0){
            $("#contentDetalleComision").load( "/views/jefedeventas/comisiones/comisionXvendedor.php");
          }else{
             $.ajax({
               type: "POST", 	
                url: "/actions/jefeventas/comisiones/comisionXvendedor.php",
                data:"comisionVendedor="+$(this).val()+
                      '&idComision='+$("#idComision").val()
              }).done(function(result) {
            //alert(result)
               swal(result + "!", "", "success")
            });
          }
          $("#contentDetalleComision").load( "/views/jefedeventas/comisiones/comisionXvendedor.php");
    
         return false;
      }
     });
  
  $("#formComisionXvendedor").submit(function(e) {
        if(banderaElijeUnAction == 0){
          banderaElijeUnAction = 1;
        if($("#comisionNueva").val().length == 0){
            $("#contentDetalleComision").load( "/views/jefedeventas/comisiones/comisionXvendedor.php");
          }else{
             $.ajax({
               type: "POST", 	
                url: "/actions/jefeventas/comisiones/comisionXvendedor.php",
                data:"comisionVendedor="+$("#comisionNueva").val()+
                      '&idComision='+$("#idComision").val()
              }).done(function(result) {
            //alert(result)
               swal(result + "!", "", "success")
            });
          }
          $("#contentDetalleComision").load( "/views/jefedeventas/comisiones/comisionXvendedor.php");
    
              return false;
        }
    
     });
$( ".inputDisfrasadoComision" ).mouseout(function() {
    banderaPaSalir = 1;
  })
$( ".inputDisfrasadoComision" ).mouseover(function() {
    banderaPaSalir = 0;
  })
$("body").click(function(){
  if(banderaPaSalir == 1){
    //alert("allouz")
    banderaPaSalir = 0;
     $("#contentDetalleComision").load( "/views/jefedeventas/comisiones/comisionXvendedor.php");
  }
})
</script>