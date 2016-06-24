<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClI2HojkcEtpd1yNXYHZSneWHQkmnl3pw&&libraries=geometry,places,spherical&sensor=true"></script>

<script type="text/javascript">
function initMap() {
  var Valdivia = {lat: -39.8173788, lng: -73.24253329999999};
  var Temuco = {lat: -39.845239, lng: -73.203402};
	
  var map = new google.maps.Map(document.getElementById('map'), {
    center: Valdivia,
    scrollwheel: false,
    zoom: 7
  });
  	var Origen="Valdivia";
	var Destino="Temuco";
   var x1=new google.maps.LatLng(-39.8173788, -73.24253329999999);
	var x2=new google.maps.LatLng(-39.845239, -73.203402);
	var distancia = google.maps.geometry.spherical.computeDistanceBetween(x1, x2);
	var kilometros= ((Math.round(distancia/100))/10)+"Km";
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
<body onload="initMap()">
<?php date_default_timezone_set('America/Santiago'); ?>
<!-- <input type="button" onclick="init()" value="Mostrar mapa" /> -->
<div  id="map" style="width: 500px; height:400px;"></div>
<label id="label" for="male"></label><br />
<br />
<?php
$semana = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
echo "<table border='1'>";
foreach ($semana as $dia) {
      echo "<tr><td>".$dia."</td></tr>";
}
echo "</table>";
?>
<?php
/*
$horario= array("13–15","19–23");
if (in_array("13-15", $horario)) {
    echo "Se encuentra";
}
else
{
	echo "No se encuentra";
}
*/

//MICRO SISTEMA DE FECHAS Y HORAS
$dia=date("l"); //imprime dia actual
date_default_timezone_set('America/Santiago');
$hora=date("G:i"); $horai=((int)$hora);
echo '<br>';
echo $horai.":".date("i").' - '.gmdate("d/m/Y");

//SISTEMA RESERVAS DE HORAS
date_default_timezone_set('America/Santiago');
$hora1="16:00";
$hora2="18:00";
echo "<br>";
for($hora1="16:00";$hora1<$hora2;$hora1=date("H:i",strtotime($hora1)+30*60))
{
	$horaIni=$hora1;
	echo "Entre ".$horaIni." y ".$hora1." <br>";
}
echo "<br>";


?>
<select id="Hora" name="Hora">
           <option id="Todos" name="Todos">Escoje tu hora de reserva</option>
           <?php 
		   while($hora1<$hora2)
		   {
		   ?>
           <option id="1" name="<?php echo $horaIni."/".$hora1; ?>" value="<?php echo $horaIni."/".$hora1; ?>"><?php echo "Entre ".$horaIni." y ".$hora1; ?></option>
           <?php
		   }
		   ?>
</select>

<?php
//SISTEMA DE VERIFICACION DE HORARIOS DE RESTAURANTES
function checkHora($start_date, $end_date, $evaluame) 
{ 
	$start_ts = strtotime($start_date); 
	$end_ts = strtotime($end_date); 
	$user_ts = strtotime($evaluame); 
	$condicion=($user_ts >= $start_ts) && ($user_ts < $end_ts);
	return (($user_ts >= $start_ts) && ($user_ts < $end_ts)); 
}
if(($user_ts >= $start_ts) && ($user_ts < $end_ts) || ($user)==1)
{
}
$HorarioGeneral= "13:00-15:57";
$porciones = explode("-", $HorarioGeneral);
$horario1=$porciones[0];
$horario2=$porciones[1];
$horaactual=$horai.":".date("i");


if(checkHora($horario1,$horario2,$horaactual))
{
	echo "Abierto";
}
else
{
	echo "Cerrado";
}
//FIN SISTEMA DE VERIFICACION DE HORARIOS 
?>



</body>
</html>