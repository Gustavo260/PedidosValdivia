<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
	body
	{
		background:url(recursos/fondo.png);
		no-repeat top;
		background-size:1370px 800px;
	}
	p
	{
		color:white;
	}
	.menuaccion
	{
	background-color:#000;
	opacity:0.5;
	
	border:1px solid #E2E2E2; 
	
	}
	.cosa
	{
		padding-top:20px;
	background-color:#000;
	height:90%;
	padding-left:10px;
	
	
	}
	.trans {
    opacity: 0.5;
	}
	.trans2 {
    opacity: 1;
	}
	.menucomplemento
	{
	
	position:static;
	color:black;
	margin-top:10%;
	top:0px;
	bottom:0px;
	right:0px;
	left:0px;
	position:relative;
	background-color: transparent;
	}
	.box
	{
	background-color: transparent;
	position:static;
	color:black;
	margin-left:40%;
	margin-right:30%;
	width:25%;
	height:10%;
	top:0px;
	bottom:0px;
	right:0px;
	left:0px;
	position:relative;
	}
</style>
<body>

<div class="menucomplemento">
<form action="restaurantes.php" method="POST">


 	<div class="box"><h1> <img src="recursos/cooltext138285584887145.png" width="250" height="55" id="Insert_logo" /><h1></div><div class="box"></h1> <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tus restaurantes mas cercanos</b></p> <br /><br /><br /><br /><br /><br />&nbsp;</div>
  
    <div class="box" style=" margin-left:35%; height:50px; "><div class="cosa"><font color="white"><b>Dirección</b></font><input style="margin-left:10px;" type="text" style=" height:15px" size="20" width="500" height="20" id="txtLocalizacion" name="txtLocalizacion"  placeholder="ej: German Saelzer #40" /><input style="margin-left:10px;" name="btnBuscar" type="submit" style=" height:22px;" id="btnBuscar" value="Buscar" /></div></div>

  &nbsp;
 

 
   <br /><br /><br /><br /><div class="box"><p><b>Proximamente también para celulares</b></p></div>
 

</form>
</div>
</body>
</html>