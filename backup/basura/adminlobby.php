<?php
	require("conexion_bd.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="estilosCSS2.css">
    <link rel="stylesheet" type="text/css" href="estilosCSS.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<style type="text/css">
div#panelgeneral
{
	width:1000px;
	height:600px;
	background-color:white;
	margin:auto;
	
	
}
div#subpanel
{
	border:1px solid #E2E2E2;
	border-radius:10px;
	float:right;
	margin-top:auto;
	width:250px;
	height:250px;
	background-color:white;
}
</style>
<body>
	<header>
		
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="recursos/icon_shopcart.png">
		</a>
	</header>
	<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="./">Inicio</a></li>
	    <li><a href="#" class="selected">Admin</a></li>
	    <li><a href="#" >Agregar</a></li>
	    <li><a href="#">Salir</a></li>
	  </menu>
	</nav>
    <div id="panelgeneral">
    <table align="center" class="tablax">
    	<tr>
            <td><div id="subpanel" class="p1"><a href="" class="busqueda"><img src="recursos/btnbuscar.png" width="250px" height="250px" ></a></div></td>
            <td><div id="subpanel" class="p2"><a href=""><img src="recursos/btnbuscar.png" width="250px" height="250px" ></a></div></td>
        </tr>
        <tr>
        	<td><div id="subpanel" class="p3"><a href=""><img src="recursos/btnbuscar.png" width="250px" height="250px" ></a></div></td>
            <td><div id="subpanel" class="p4"><a href=""><img src="recursos/btnbuscar.png" width="250px" height="250px" ></a></div></td>
        </tr>
    </table>
    	
    </div>
	</section>
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {
				$(".busqueda").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('CargaCompras.php');
					$(".tablax").css("visibility","hidden");							
				});
				
				$("#boton2").click(function(event) {
					$("#registros").load('popupSesion.php');
					
				});
			});
		</script>

</html>