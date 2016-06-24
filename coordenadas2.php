<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<html>
	    <head>
	        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	        <title>Google Maps Geoposicionamiento</title>
 
	         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClI2HojkcEtpd1yNXYHZSneWHQkmnl3pw&libraries=places&callback=initAutocomplete"
         async defer></script>
 
	        <style>
 
	        #map
	        {
	            width: 100%;
	            height: 300px;
	            border: 1px solid #d0d0d0;
	        }
 
	        </style>
	 <script>
	 function localize()
		{
		 	if (navigator.geolocation)
			{
                navigator.geolocation.getCurrentPosition(mapa);
            }
            else
            {
                alert('Tu navegador no soporta geolocalizacion.');
            }
		}
 
		function mapa(pos)
		{
		/************************ Aqui están las variables que te interesan***********************************/
			var latitud = pos.coords.latitude;
			var longitud = pos.coords.longitude;
			var precision = pos.coords.accuracy;
			
			var coordenadas=latitud+", "+longitud;
			document.getElementById("coordenadas").value=coordenadas;
			
			var contenedor = document.getElementById("map")
 
			var centro = new google.maps.LatLng(latitud,longitud);
 
			var propiedades =
			{
                zoom: 15,
                center: centro,
                mapTypeId: google.maps.MapTypeId.ROADMAP
			};
 
			var map = new google.maps.Map(contenedor, propiedades);
 
			var marcador = new google.maps.Marker({
                position: centro,
                map: map,
                title: "Tu posicion actual"
            });
		}
 
		function error(errorCode)
		{
			if(errorCode.code == 1)
				alert("No has permitido buscar tu localizacion")
			else if (errorCode.code==2)
				alert("Posicion no disponible")
			else
				alert("Ha ocurrido un error")
		}
 </script>
	    </head>
 
	    <body onLoad="localize()">
        		<?php session_start(); ?>
                <form method="post" action="">
	        		 <input type="text" id="coordenadas" name="coordenadas">
                     <div  id="map" hidden="true" style="width: 500px; height:400px;"></div>
                </form>
               
	            
	    </body>
 
	</html>