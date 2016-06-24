<!doctype html>
<html>


<?php
	require("../basedatos/conexion_bd.php");
	require("../procesos/funciones.php");
	session_start();
?>
<?php if($_SESSION['Perfil']=="2" && $_SESSION){ ?>

<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
.caja
{
	background:white;
	color:black;
	float:center;
	width:614px;
	height:170px;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:15px;
}

div#panelgeneral
{
	width:1000px;
	height:600px auto;
	background-color:#ECF1F2;
	margin-top:100px auto;
	
	
}
div#subpanel
{
	border:1px solid #E2E2E2;
	border-radius:10px;
	float:right;
	margin-top: 50px auto;
	width:250px;
	height:250px;
	background-color:white;
}
	*
	{
		padding:0px;
		margin:0px;
	}
	
	#header
	{ 
		
		margin:auto;
		width:500px;
		font-family:Arial, Arial, Helvetica, sans-serif;
		
	}
	ul, ol 
	{
	
		list-style:none;
	}
	
	.nav li a
	{
		background:#000;
		color:#fff;
		padding:10px 15px;
		text-decoration:none;
		display:block;
	}
	
	.nav li a:hover
	{
		background:#434343;
	}
	
	.nav > li
	{
		float:left;	
	}
	
	.nav li ul
	{
		position:absolute;
		min-width:140px;
		display:none;
	}
	
	.nav li:hover > ul
	{
		display:block;
	}
	
	.nav li ul li
	{
		position:relative;
	}
	
	.nav li ul li ul 
	{
		right:-140px;
		top:0px;
	}
</style>

<link href="../estilos/ratingbar.css" rel="stylesheet" type="text/css">

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<body bgcolor="#ECF1F2">
<div>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilos/estilosCSS.css">
   	
</head>
	<!-- Header -->
	<div id="header">  	
                <ul class="nav" style="background:rgba(204,0,51,1); margin-left:15%;">
                    <li><a href="">Inicio</a></li>
                    <li><a class="ver" href="">Ver</a>
            	<ul>
                	<li><a class="restaurantes" href="">Restaurantes</a></li>
                    <li><a class="platillos" href="">Platillos</a></li>
                    <li><a class="menus" href="">Menus</a></li>
                    <li><a class="User" href="">Usuarios</a></li>
                    <li><a class="reservas" href="">Reservas</a></li>
                    <li><a class="pedidos" href="">Pedidos</a></li>
                </ul>
                    </li>
                    <li><a href="">Agregar</a>
            	<ul>
                        <li><a class="agregarR" href="">Restaurantes</a></li>
                        <li><a class="agregarP" href="">Platillos</a></li>
                        <li><a class="agregarM" href="">Menus</a></li>
                        <li><a class="agregarU" href="">Usuarios</a></li>
                    	
                    </li>
                </ul>
            </li>
            <li><a href="">Contacto</a></li> 
        </ul>
                 <?php
					if($_SESSION['Perfil']=="2")
					{
						
					}
					else
					{
						
					}
				?>	
           	  
	</div>
   
<!-- Fin encabezado --> 
	<div style="text-align:center; margin-top:2%;"><p style="text-align:center;"><h4>Panel de administración</h4></p></div>
	<hr color="black" />
    <div id="panelgeneral" style=" margin-left:10%;"></div>
    <hr color="black" />
 <!-- Pie de pagina -->
	<div id="footer" style="margin-top: 50px auto; height:auto">
    		<p style="text-align:center">Contactanos</p>	
            <p  style="text-align:center"> Email: contacto@pedidosvaldivia.com &nbsp; &nbsp;Fono:(2) 9 571 83 27</p>
    </div>
<!-- Fin Pie de pagina --> 
  <!-- end .container -->
</div>
</body>

<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {	
				$(".Agregar").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/agregar.php');			
				});
				
				$(".Ver").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/ver.php');				
				});	
				
				$(".User").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/usuarios.php');			
				});	
				
				$(".reservas").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/reservas.php');			
				});	
				
				$(".platillos").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/platillos.php');			
				});	
				
				$(".menus").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/menus.php');			
				});	
				
				$(".restaurantes").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/restaurantes.php');			
				});	
				
					$(".ver").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/ver.php');			
				});	
				
				$(".pedidos").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/pedidos.php');			
				});	
				
				$(".agregarU").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/agregarusuario.php');			
				});	
				
				$(".agregarR").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/agregarrestaurantes.php');			
				});	
				
				$(".agregarM").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/agregarmenus.php');			
				});	
				
				$(".agregarP").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/agregarplatillos.php');			
				});	
				
			});
		</script>
</html>
<?php 
  } 
  else
  {
	 header("Location: ../index.php");
  }
  ?>