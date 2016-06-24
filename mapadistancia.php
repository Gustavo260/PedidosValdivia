<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClI2HojkcEtpd1yNXYHZSneWHQkmnl3pw&&libraries=geometry,places,spherical&sensor=true"></script>

<script>
function localize()
{
		 	if (navigator.geolocation)
			{
                navigator.geolocation.getCurrentPosition(initMap);
            }
            else
            {
                alert('Tu navegador no soporta geolocalizacion.');
            }
}

function initMap(pos) {

  var latPersona = pos.coords.latitude;
  var lonPersona = pos.coords.longitude;
  var latRestaurante ="-39.810207";
  var lonRestaurante ="-73.254093";
  var precision = pos.coords.accuracy;
  
  var Valdivia = {lat: -39.810207, lng: -73.254093};
  var Temuco = {lat: -39.812497, lng: -73.244674};
	
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
	var kilometros= ((Math.round(distancia/100))/10)+0.8+"Km";
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
</script>
<body onload="localize()">
<div  id="map" style="width: 500px; height:400px;"></div>
</body>
</html>