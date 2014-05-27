window.onload=function() {
        // Creamos la referencia al tag que va a contener el mapa
        var mapDiv = document.getElementById('map');
 
        // Creamos una instancia del objeto LatLng
        var latlng = new google.maps.LatLng(44.5997, -68.3847);
 
 
        // Creamos un objeto que posee las opciones del mapa
        var options = {
          // \--> UI y ubicación
          center:latlng,                                      // define el centro del mapa mediante una coordenada
          zoom:12,
          draggingCursor: 'move',                             // cambiar el cursor a otro tipo
                                                              // crosshair, default, help, pointer, text, wait
 
          // \--> Otras opciones de UI
          disableDefaultUI: true,                             // desabilitar interfase de usuario
 
 
 
          // \--> CONTROL OPTIONS
          // <!-- Aquí irían las control options ---> 
 
 
 
          // \--> PHYSICAL INPUT OPTIONS
          keyboardShortcuts: false,
          disableDoubleClickZoom: false,
          draggable: true,
          scrollwheel: false,
          // end
 
 
         // \--> Definir el tipo de mapa
          mapTypeId:google.maps.MapTypeId.ROADMAP    
 
        }; // Fin de configuración
 
 
          // CREACIÓN DEL MAPA
          // Le pasamos al objeto map el contenedor del mapa y las opciones de configuración
          var map = new google.maps.Map(mapDiv, options);
 
 
 
 
        // \---> MARCADORES
        // \----> Agregamos un marcador común
        var marker = new google.maps.Marker({
              position: new google.maps.LatLng(40.7457, -74.0397),
              // Le indicamos cual de los mapas estamos usando, ya que podremos
              map: map,
        });
}
 