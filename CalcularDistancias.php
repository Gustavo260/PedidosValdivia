function localize(lat, lon)
{
		 	if (navigator.geolocation)
			{
				var lat=lat;
				var lon=lon;
                navigator.geolocation.getCurrentPosition(initMap,lat,lon);
            }
            else
            {
                alert('Tu navegador no soporta geolocalizacion.');
            }
}

function initMap(pos, lat, lon) {

  var latPersona = pos.coords.latitude;
  var lonPersona = pos.coords.longitude;
  var latRestaurante ="<?php echo $latRest; ?>";
  var lonRestaurante ="<?php echo $lonRest; ?>";
  var precision = pos.coords.accuracy;
  
  var Valdivia = {lat: -39.8173788, lng: -73.24253329999999};
  var Temuco = {lat: -39.810202, lng: -73.254099};
	
  var map = new google.maps.Map(document.getElementById('map'), {
    center: Valdivia,
    scrollwheel: false,
    zoom: 7
  });
  	var Origen="Valdivia";
	var Destino="Temuco";
    var x1=new google.maps.LatLng(latPersona, lonPersona);
	var x2=new google.maps.LatLng(latRestaurante, lonRestaurante);
	
	var distancia = google.maps.geometry.spherical.computeDistanceBetween(x1, x2);
	var kilometros= ((Math.round(distancia/100))/10)+1.4+"Km";
	document.getElementById("label").innerText = kilometros;

  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map
  });

  // Set destination, origin and travel mode.
  var request = {
    destination: Valdivia,
    origin: Temuco,
    travelMode: google.maps.TravelMode.DRIVING
  };

  // Pass the directions request to the directions service.
  var directionsService = new google.maps.DirectionsService();
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      // Display the route on the map.
      directionsDisplay.setDirections(response);
    }
  });
}