<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php
	$cnn=mysql_connect("localhost","root","") or die("<br><br><br><br><br><table align='center'><tr><td><img src='imagenes/error.png' id='imagen' /></td></tr><tr><td align='center'>Problemas en la conexion!</td></tr></table>");;
	mysql_select_db("pedidosvaldivia",$cnn) or
    die("<br><br><br><br><br><table align='center'><tr><td><img src='imagenes/error.png' id='imagen' /></td></tr><tr><td align='center'>Problemas en la seleccion de la base de datos!</td></tr></table>");;
?>
<body>
</body>
</html>