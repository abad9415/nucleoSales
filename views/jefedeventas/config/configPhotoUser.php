<?php
include '../../../conexionBD.php';
require '../../../lib/prospectos.php';
$prospectos = new prospectos($datosConexionBD);
$vendedorRow = $prospectos->consultarVendedorXId();
foreach($vendedorRow as $row){
	$imgVendedorActual = $row['foto'];
}
if($imgVendedorActual == ''){
	$imgVendedorActual = 'perfil.jpg';
}
?>

<div class="row">
  <form enctype="multipart/form-data" id="formImgVendedor" method="post" class="upload-img-vendedor">
    <div class="col-md-6 txt-center">
        <div class="content-upload-img-section">
					<input type="file" name="files" id="files" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
					<label for="files" class="btn btn-default"><i class="icon-cloud_upload"> </i><span id="spanNombredeImagenNueva">Elige la imagen...</span></label>
				</div>
        <input type="submit" value="Guardar" class='btn btn-primary'>
    </div>
    <div class="col-md-6 content-preview-img-vendedor txt-center" id="">
<!--         <img src="" alt="..." class="img-circle" id='previewImgVendedor'> -->
				<div id="previewImgVendedor" style="background-image: url('/img/vendedores/<?=$imgVendedorActual;?>');" class="content-img-vendedor img-grande"></div>
    </div>
  </form>
</div>

<script> 
function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         //document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
//                          document.getElementById("previewImgVendedor").src = ['', e.target.result,''].join('');
													document.getElementById("previewImgVendedor").style.backgroundImage = ['url(', e.target.result,''].join('');
													document.getElementById("ImgVendedorPrincipal").style.backgroundImage = ['url(', e.target.result,''].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
  
   /*Boton upload*/
  
'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
	
}( document, window, 0 ));
  
  /*MANDAR POR AJAX EL ARCHIVO ylos datos*/
 $(function(){
        $("#formImgVendedor").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formImgVendedor"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "/actions/vendedor/uploadImgVendedor.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    //$("#mensaje").html("Respuesta: " + res);
										swal(res, "", "success")
										 $("#content").load("/views/vendedor.php");
                });
        });
    });

</script>