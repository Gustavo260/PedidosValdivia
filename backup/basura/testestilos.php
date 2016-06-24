<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
	//include("conexion_bd.php");
?>
<!-- <link href="estilos.css" rel="stylesheet"> -->
</head>
<style type="text/css">
.caja
{
	background:white;
	color:black;
	float:left;
	width:150px;
	height:300px;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:10px;
}

/* ~~ The footer ~~ */

footer {
	padding: 10px 0;
	width:940px;
	margin:auto;
	background-color: #999;
	position: relative;/* this gives IE6 hasLayout to properly clear */
	clear: both; /* this clear property forces the .container to understand where the columns end and contain them */
}

.carrito
{
	float:right;
}
.contenedor
{
	background:white;
	width:900px;
	height:650px;
	margin:auto;	
	
}
.cabezera
{
	background:black;
	width:940px;
	height:40px;
	margin:auto;
	color:white;
	padding:8px;
	border-radius:5px;
	text-align:left;
	font-size:16px;
	font-family:arial;
}

@font-face {
	font-family: 'icomoon';
	src:url('fonts/icomoon.eot?-ytm1bn');
	src:url('fonts/icomoon.eot?#iefix-ytm1bn') format('embedded-opentype'),
		url('fonts/icomoon.ttf?-ytm1bn') format('truetype'),
		url('fonts/icomoon.woff?-ytm1bn') format('woff'),
		url('fonts/icomoon.svg?-ytm1bn#icomoon') format('svg');
	font-weight: normal;
	font-style: normal;
}

[class^="icon-"], [class*=" icon-"] {
	font-family: 'icomoon';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;

	/* Better Font Rendering =========== */
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.icon-cart:before {
	content: "\e600";
}
</style>

<div class="cabezera">
	Inicio | Nosotros | Contacto
    <div class="carrito"><a href="index.php"><img src="recursos/icon_shopcart.png" width="40px" /></a></div>
</div>

<body>
<div class="contenedor">	
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
    
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
   <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
   <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
    <div class="caja">
        <h2>Titulo</h2>
        <img src="recursos/exito.jpg" width="140" />
        <p>$50.00</p>
        <input type="button" value="detalle" />
    </div>
</div>
<footer>
        <table align="center">
        	<tr><td align="center" colspan="2">Contactanos</td></tr>
            <tr><td>Email: contacto@pedidosvaldivia.com &nbsp; &nbsp;</td><td>Fono:(2) 9 571 83 27</td></tr>
        </table>
    <address>
    </address>
  </footer>
</body>
</html>