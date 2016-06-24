<!doctype html>
<html>


<?php
	require("basedatos/conexion_bd.php");
	require("procesos/funciones.php");
	session_start();
	unset($_SESSION['carrito']);
?>



<meta charset="utf-8">
<title>Untitled Document</title>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<script type='text/javascript'> window.onload = detectarCarga; window.closed = detectarCarga; function detectarCarga(){ document.getElementById("imgLOAD").style.display="none"; }</script>
<style type="text/css">

.sidebar1 {
	float: right;
	width: 179px;
	background-color:#;
	padding-bottom:100%;
	
}
.content {
	padding: 10px 0;
	width: 780px;
	float:left;
}

/* ~~ This grouped selector gives the lists in the .content area space ~~ */
.content ul, .content ol {
	padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
}

/* ~~ The navigation list styles (can be removed if you choose to use a premade flyout menu like Spry) ~~ */
ul.nav {
	list-style: none; /* this removes the list marker */
	border-top: 1px solid #666; /* this creates the top border for the links - all others are placed using a bottom border on the LI */
	margin-bottom: 15px; /* this creates the space between the navigation on the content below */
}
ul.nav li {
	border-bottom: 1px solid #666; /* this creates the button separation */
}
ul.nav a, ul.nav a:visited { /* grouping these selectors makes sure that your links retain their button look even after being visited */
	padding: 5px 5px 5px 15px;
	display: block; /* this gives the link block properties causing it to fill the whole LI containing it. This causes the entire area to react to a mouse click. */
	width: 160px;  /*this width makes the entire button clickable for IE6. If you don't need to support IE6, it can be removed. Calculate the proper width by subtracting the padding on this link from the width of your sidebar container. */
	text-decoration: none;
	background-color: #C6D580;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* this changes the background and text color for both mouse and keyboard navigators */
	background-color: #ADB96E;
	color: #FFF;
}

-->
.filtros
{
	width:100%;
}

.caja
{
	background:white;
	color:black;
	float:center;
	width:580px;
	height:165px auto;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:15px;
}

</style>
<style type="text/css">
body{
  margin      : 0;
  padding     : 1.5em;
  font-family : sans-serif;
  line-height : 1.5;
}

p{
  margin  : 0 0 1.5em;
  padding : 0;
}

a{
  color           : #9c3;
  text-decoration : none;
}

.starRating:not(old){
  display        : inline-block;
  width          : 7.5em;
  height         : 1.5em;
  overflow       : hidden;
  vertical-align : bottom;
}

.starRating:not(old) > input{
  margin-right : -100%;
  opacity      : 0;
}

.starRating:not(old) > label{
  display         : block;
  float           : right;
  position        : relative;
  background      : url('star-off.svg');
  background-size : contain;
}

.starRating:not(old) > label:before{
  content         : '';
  display         : block;
  width           : 1.5em;
  height          : 1.5em;
  background      : url('star-on.svg');
  background-size : contain;
  opacity         : 0;
  transition      : opacity 0.2s linear;
}

.starRating:not(old) > label:hover:before,
.starRating:not(old) > label:hover ~ label:before,
.starRating:not(:hover) > :checked ~ label:before{
  opacity : 1;
}

div#encabezado
{
	border:1px solid #E2E2E2;
	border-radius:10px;
	background-color:transparent;
	width:100%;
	height:200px;
	-moz-opacity: 0.8;
	background-color: black;
    opacity:0.80;
	background:url(recursos/encabezados/encabezado.jpg);
	no-repeat top;
	background-size:100% 800px	
}

.menuaccion
{
	width:100%;
	background-color:#E2E2E2;
	color:black;
	float:left;
	border:1px solid #E2E2E2;
	border-radius:10px;
}
.menucomplemento
{
	position:static;
	color:black;
	float:left;
	top:0px;
	bottom:0px;
	right:0px;
	left:0px;
	position:relative;
}

.desplegable
{
	width:50%;
	height:950px;
	margin-top:10px;
	background-color:#ECF1F2;
	border-radius:10px;
	color:black;
	float:left;
}

.panelcarga
{
	width:auto;
	height:auto;
	margin:10px;
	float:left;
	position:relative;
}

.banner
{
	width:612px;
	height: 213px;
	margin:auto;
	background-size: 100% 100%;
	animation: banner 10s infinite;
	border:1px solid #E2E2E2;
	border-radius:10px;
}

@keyframes banner
{
	0%, 30%
	{
		background-image:url(recursos/restaurantes/renzo.png);
		opacity:1;
	}
	31%, 34%
	{
		opacity:0.1;
	}
	35%, 65%
	{
		background-image:url(recursos/restaurantes/sushileno2.png);
		opacity: 1;
	}
	66%, 69%
	{
		opacity:0.1;
	}
	70%, 100%
	{
		opacity:1;
		background-image:url(recursos/restaurantes/ama.png);
	}	
}

</style>
<link href="estilos/ratingbar.css" rel="stylesheet" type="text/css">
<link href="estilos/estilosCSS.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<body bgcolor="#ECF1F2">

<div>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   	<link href="estilos/menus.css" rel="stylesheet" type="text/css" /> 
</head>
	<!-- Header -->
	<div id="encabezado">
    	<table border="0" bordercolordark="#000000" width="100%">
            <tr>
            	<td width="82%">
            		<img src="recursos/logonuevotrans.png" width="202" height="100" id="Insert_logo" /> 
                  
           	    </td>
                <br>
                <td >
                
                
                </td>
                
                <td ></td>
           	    <td width="18%" align="center">
                <br>
				<?php infolog(); ?>
                </td>
            </tr>
           
            <tr>
            	<td width="82%">
                
                </td>
            </tr>
   	    </table>
    </div>
   
<!-- Fin encabezado --> 
  
  
 
  <article >
  <br>
   <div class="menuaccion" style="position:static;"> <!-- FILTROS! -->
  		<div class="menucomplemento"> &nbsp; &nbsp; <b>Restaurantes</b> </div>
		<form id="Filtros" name="Filtros" method="GET" action="">
         <div class="menucomplemento" style="margin-left:50px;">
         		Comidas:   
                	<select id="Comidas" name="Comidas">
                    	<option id="Todos" name="Todos" value="Todos">Todos</option>
            			<option id="Pizzas" name="Pizzas" value="Pizzas" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Comidas']=='Pizzas'){?>selected<?php } } ?>>Pizzas</option>
                        <option id="Guisos" name="Guisos" value="Guisos" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Comidas']=='Guisos'){?>selected<?php } } ?>>Guisos</option>
                        <option id="Sopas" name="Sopas" value="Sopas" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Comidas']=='Sopas'){?>selected<?php } } ?>>Sopas</option>
                        <option id="Azados" name="Azados" value="Azados" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Comidas']=='Azados'){?>selected<?php } } ?>>Azados</option>
                        <option id="Sandwichs" name="Sandwichs" value="Sandwichs" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Comidas']=='Sandwichs'){?>selected<?php } } ?>>Sandwichs</option>
            		</select>
         </div>
         
          <div class="menucomplemento" style="margin-left:50px;">
          		Valoración: 
                	<select id="Valor" name="Valor">
            			<option id="Todos" name="Todos">Todos</option>
 						<option id="5" name="5" value="5" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Valor']=='5'){?>selected<?php } } ?>>Excelente</option>
                        <option id="4" name="4" value="4" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Valor']=='4'){?>selected<?php } } ?>>Muy buena</option>
                        <option id="3" name="3" value="3" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Valor']=='3'){?>selected<?php } } ?>>Buena</option>
                        <option id="2" name="2" value="2" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Valor']=='2'){?>selected<?php } } ?>>Regular</option>
            		</select>
          </div>
          
          <div class="menucomplemento" style="margin-left:50px;">
          		Pedido Mínimo: 
                  <select id="Precio" name="Precio">
                   		<option id="Todos" name="Todos">Todos</option>
            			<option id=">=2500" name=">=2500" value=">=2500" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Precio']=='>=2500'){?>selected<?php } } ?>>Mayor o igual a $2.500</option>
                        <option id=">2500" name=">2500" value=">2500" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Precio']=='>2500'){?>selected<?php } } ?>>Mayor a $2.500</option>
                        <option id="<2500" name="<2500" value="<2500" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Precio']=='<2500'){?>selected<?php } } ?>>Menor a $2.500</option>
                        <option id=">5000" name=">5000" value=">5000" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Precio']=='>5000'){?>selected<?php } } ?>>Mayor a $5.000</option>
                        <option id="<5000" name="<5000" value="<5000" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Precio']=='<5000'){?>selected<?php } } ?>>Menor a $5.000</option>
                        <option id=" BETWEEN 2500 AND 5000" value=" BETWEEN 2500 AND 5000" <?php if(isset($_GET["btnFiltro"])){ if($_GET['Precio']==' BETWEEN 2500 AND 5000'){?>selected<?php } } ?> name=" BETWEEN 2500 AND 5000">Entre $2.500 y $5.000</option>
            	  </select>
          </div>
          <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="menucomplemento" style="float:right; margin-left:50px;">
        	<div class="box">
                  <div class="container-4">
                  	Ubicación:
                    <input type="search" id="Ubicacion" name="Ubicacion" value="<?php if(isset($_GET["btnFiltro"])){ if($_GET['Ubicacion']!='Cualquiera'){ echo $_GET['Ubicacion']; }else{ echo "Cualquiera"; } }else{ echo "Cualquiera"; } ?>" placeholder="Search..." />
                    <button class="icon" id="btnFiltro" name="btnFiltro"  type="submit"><i class="fa fa-search"></i></button> &nbsp; 
                  </div>
			</div> 
		</div>    
        </form> 	
   </div>
  
   <br>
  <hr color="black"  />
  <div class="desplegable" style="float:right;">
  	 <div class="caja" style="width:614px; height:215px; border:1px solid #999;">
     	<!-- Contenido adicional -->
        <div class="banner"></div>
     </div>
     <div class="caja" style="width:614px; height:642px; margin-top:4.5%; border:1px solid #999;">
     	<!-- MAPA -->
        <h2>Ubicación geográfica</h2>
        
      <?php
	  if(isset($_GET["btnFiltro"]))
	  {
		  if($_GET['Ubicacion']=="Cualquiera")
		  {
			  ?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6129.151108934684!2d-73.24416756241827!3d-39.8165116511323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615ee70b10ceb9b%3A0x92cb4f523322282a!2sBeuchef+676%2C+Valdivia%2C+Regi%C3%B3n+de+los+R%C3%ADos!5e0!3m2!1ses!2scl!4v1443751614467" width="614" height="642" frameborder="1" style="border:0" allowfullscreen>
        </iframe>
              <?php
		  }
		  else
		  {
			 //CARGAR EL SECTOR
			$sqlSector="SELECT Map FROM sectores WHERE Descripcion LIKE '%".$_GET['Ubicacion']."%' AND Estado=1";
			$resp=mysql_query($sqlSector);
			$row=mysql_fetch_array($resp);
			?>
			<iframe src="<?php echo $row['Map']; ?>" width="614" height="642" frameborder="1" style="border:0" allowfullscreen></iframe>
			<?php
		  }
	  }
	  elseif(isset($_POST["btnBuscar"]))
	  {
		  
		 //CARGAR EL SECTOR
		$sqlSector="SELECT Map FROM sectores WHERE Descripcion LIKE '%".$_POST['txtLocalizacion']."%' AND Estado=1";
		$resp=mysql_query($sqlSector);
		$row=mysql_fetch_array($resp);
		  ?>
          <iframe src="<?php echo $row['Map']; ?>" width="614" height="642" frameborder="1" style="border:0" allowfullscreen></iframe>
          <?php
	  }
	  else
	  {
		  ?>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6129.151108934684!2d-73.24416756241827!3d-39.8165116511323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615ee70b10ceb9b%3A0x92cb4f523322282a!2sBeuchef+676%2C+Valdivia%2C+Regi%C3%B3n+de+los+R%C3%ADos!5e0!3m2!1ses!2scl!4v1443751614467" width="614" height="642" frameborder="1" style="border:0" allowfullscreen>
        </iframe>
          <?php
	  }
	  ?>
     </div>
  </div>
  
    <div class="panelcarga">
	<div id='imgLOAD' style="TEXT-ALIGN: center"><IMG src="recursos/loading.gif"></div>
    <?php 
		cargarRestaurantes();
	?>
    </div>  
    
    <section> </section>
    
    <!-- end .content -->
</article>
    
   
 <!-- Pie de pagina -->
 
	<div id="footer" style="height:auto; margin-top:50px;">
    	 <table align="center">
        	<tr><td align="center" colspan="2">Contactanos</td></tr>
   			<tr><td align="center" colspan="2"><hr /></td></tr>
            <tr><td>Email: contacto@pedidosvaldivia.com &nbsp; &nbsp;</td><td>Fono:(2) 9 571 83 27</td></tr>
        </table>
    </div>
<!-- Fin Pie de pagina --> 
  <!-- end .container --></div>
 
</body>

<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
<script type="text/javascript">
			$(document).ready(function() {
				$(':radio').change
				(
 					 function()
					 {
    					$('.choice').text( this.value + ' stars' );
 					 } 
				)
			});
		</script>
</html>