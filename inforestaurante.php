<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	require("basedatos/conexion_bd.php");
	require("procesos/funciones.php");

	if(isset($_GET["respuesta"]))
	{
		echo '<script>alert("'.$_GET["respuesta"].'");</script>';  
	}
					
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="estilos/estilosCSS.css" rel="stylesheet" type="text/css" />
	<link href="estilos/estilosCSS3.css" rel="stylesheet" type="text/css" />
   	<link href="estilos/menus.css" rel="stylesheet" type="text/css" />
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script> 
   
</head>
<style type="text/css">
.caja
{
	background:#ECF1F2;
	color:black;
	float:center;
	width:614px;
	height:170px;
	text-align:center;
}
</style>

<!-- VARIABLES DE ENTRADA -->

<?php
	session_start();
	$ID_Restaurante=$_GET['txtRestaurante'];
	$sql="SELECT Nombre, Coordenadas FROM `restaurantes` WHERE ID_Restaurante=".$ID_Restaurante;
	$respuesta=mysql_query($sql) or die(header("Location: restaurantes.php")); 
	$row=mysql_fetch_array($respuesta);	
	
	$cordRestaurante=$row['Coordenadas'];	
	
	$porcionRest = explode(", ", $cordRestaurante);
	$latRest=$porcionRest[0];
	$lonRest=$porcionRest[1];
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClI2HojkcEtpd1yNXYHZSneWHQkmnl3pw&&libraries=geometry,places,spherical&sensor=true"></script>
<script type='text/javascript'> window.onload = detectarCarga; function detectarCarga(){ document.getElementById("imgLOAD").style.display="none"; }</script>
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


<body bgcolor="#ECF1F2" onload="localize()">
<!-- Header -->
	
	<div id="header">
    <br />
    <br />
    	<table border="0" bordercolordark="#000000" width="100%">
            <tr>
            	<td width="60%">
            		 
           	    </td>
                <td width="20%" rowspan="2"><?php if($_SESSION){ ?><div class="carrito"><span><a title="Ver historial" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" href="procesos/historialpedidos.php?txtRestaurante=<?php echo $_GET['txtRestaurante']; ?>"><img alt="Mis Reservas" src="recursos/historial2.png" width="45px" /></a></span></div><?php }?></td>
                <td rowspan="2"> <?php if($_SESSION){ ?><div class="carrito"><span><a title="Ver mis reservas" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" href="procesos/reservas.php?txtRestaurante=<?php echo $_GET['txtRestaurante']; ?>&estado=<?php echo $_GET['estado']; ?>"><img alt="Mis Reservas" src="recursos/reservas2.png" width="60px" /></a></span></div><?php }?></td>
           	   
           	    <td width="20%" align="center" rowspan="2"><?php infolog() ?></td>
            </tr>
            
            <tr>
            	<td>
                <?php
				$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE ID_Restaurante=".$ID_Restaurante;
				$resp=mysql_query($sqlBusqueda); 
				if(mysql_num_rows($resp)>0)
				{
					while($row2=mysql_fetch_array($resp))
					{
						$envio=$row2['envio'];
						?>               	                	
							<!-- NODOS -->
							<div style="color:white">
							<table width="614" height="25" border="0">
								<tr>
								<td width="100px"><center><img src="<?php echo $row2['Imagen']; ?>" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" width="120px" height="100px"></center></td>
									<td width="441">
										<table>
											<tr><td align="left" colspan="2"><h4><?php echo $row2['Nombre']; ?></h4></td></tr>
											<tr><td width="133"><label id="label" for="male"></label></td><td width="166">$<?php echo $row2['envio']; ?></td><td width="118">$<?php echo $row2['minimo']; ?></td></tr>
											<tr><td>Distancia</td><td>Costo de envio</td><td>Pedido Minimo</td></tr>
										</table>
									</td>       
								</tr>
							</table>		
                   		 	</div>
                     <!-- FIN NODOS -->
                   
                    
                    <!-- Fin repetidor!! -->
                <?php
					}
				}
					?>
                </td>
            </tr>
   	    </table>
    	</div>
       
   
<!-- Fin encabezado --> 

<!-- Contenido de la pagina -->
	<div id="general">
    	<div id="ofertas">
        	<div id='imgLOAD' style="TEXT-ALIGN: center"><IMG src="recursos/loading.gif"></div>
        </div> 
        <div id="novedades">
        	<div class="menudes">
                  <ul>
                    <li><a class="btnMenu" href="procesos/CargaMenus.php">Menu</a></li>
                    <li><a class="btnInfo" href="procesos/maps.php">Información</a></li>
                    <li><a href="procesos/comentarios.php" class="btnComentario">Comentarios</a></li>
                     <li><a href="restaurantes.php">Volver</a></li>
                    <div class="marca"></div>
                 </ul>
 			 </div>
        </div>
        <div id="body" style="height:auto; background:#ECF1F2;">
        	<div id='imgLOAD' style="TEXT-ALIGN: center"><IMG src="recursos/loading.gif"></div>
        </div>
    </div>
<!-- Fin contenido de la pagina -->  
<div hidden="true" id="map" style="width: 500px; height:400px;"></div>
<!-- Pie de pagina -->
	<div id="footer" style="margin-top:50px auto;">
    	 <table align="center">
        	<tr><td align="center" colspan="2">Contactanos</td></tr>
   			<tr><td align="center" colspan="2"><hr /></td></tr>
            <tr><td>Email: contacto@pedidosvaldivia.com &nbsp; &nbsp;</td><td>Fono:(2) 9 571 83 27</td></tr>
        </table>
    </div>
<!-- Fin Pie de pagina --> 



	
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {
				
					$("#body").load('procesos/cargaMenus.php?restaurante=<?php echo $ID_Restaurante; ?>');
					$("#ofertas").load('procesos/cargaCompras.php?restaurante=<?php echo $ID_Restaurante; ?>&envio=<?php echo $envio; ?>&estado=<?php echo $_GET['estado']; ?>');
					
				$(".btnMenu").click(function(event) {
					event.preventDefault();
					$("#body").load('procesos/CargaMenus.php?restaurante=<?php echo $ID_Restaurante; ?>').slideDown(1000);
					$("#body").css("visibility","visible");					
				});
				
				$(".btnInfo").click(function(event) {
					event.preventDefault();
					$("#body").load('procesos/maps.php?restaurante=<?php echo $ID_Restaurante; ?>').slideDown(1000);
					$("#body").css("visibility","visible");					
				});
				
				$(".btnComentario").click(function(event) {
					event.preventDefault();
					$("#body").load('procesos/comentarios.php?restaurante=<?php echo $ID_Restaurante; ?>').slideDown(1000);
					$("#body").css("visibility","visible");					
				});
				
				$(".cantidad22").keyup(function(e){
					if($(this).val()!=''){
						if(e.keyCode==13){
							var id=$(this).attr('data-id');
							var precio=$(this).attr('data-precio');
							var cantidad=$(this).val();
							$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
							$.post('procesos/modificarDatos.php',{
								Id:id,
								Precio:precio,
								Cantidad:cantidad
							},function(e){
									$("#total").text('Total: '+e);
							});
						}
					}
					
				});
				
			});
		</script>

</html>