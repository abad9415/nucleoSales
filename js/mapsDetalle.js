$(document).ready(function() {
                load_map();
           

            var map;

            function load_map() {
                var myLatlng = new google.maps.LatLng(20.68009, -101.35403);
                var myOptions = {
                    zoom: 4,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map($("#map_canvasDetalle").get(0), myOptions);
            }

           
           function agregarEjecutar(){
                // Obtenemos la dirección y la asignamos a una variable
                var address = $('#calleEmpresa').val()+" "+$('#numeroEmpresa').val()+","+$('#coloniaEmpresa').val()+","+$('#cpEmpresa').val()+" "+$('#ciudadEmpresa').val();
                
                // Creamos el Objeto Geocoder
                var geocoder = new google.maps.Geocoder();
                // Hacemos la petición indicando la dirección e invocamos la función
                // geocodeResult enviando todo el resultado obtenido
                geocoder.geocode({ 'address': address}, geocodeResult);
                
           }
            
            $('#cpEmpresa').focusout(function() {
               agregarEjecutar();
            });
           
            $('#ciudadEmpresa').focusout(function() {
               agregarEjecutar();
            });
  
          agregarEjecutar();
            function geocodeResult(results, status) {
                // Verificamos el estatus
                if (status == 'OK') {
                    // Si hay resultados encontrados, centramos y repintamos el mapa
                    // esto para eliminar cualquier pin antes puesto
                    var mapOptions = {
                        center: results[0].geometry.location,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map($("#map_canvasDetalle").get(0), mapOptions);
                    // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
                    map.fitBounds(results[0].geometry.viewport);
                    // Dibujamos un marcador con la ubicación del primer resultado obtenido
                    var markerOptions = { position: results[0].geometry.location }
                    var marker = new google.maps.Marker(markerOptions);
                    marker.setMap(map);
                } else {
                    // En caso de no haber resultados o que haya ocurrido un error
                    // lanzamos un mensaje con el error
                    //alert("Geocoding no tuvo éxito debido a: " + status);
                }
            }
     });