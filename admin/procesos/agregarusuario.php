<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../../estilos/estilosCSS2.css">
</head>
<?php
	require("../../basedatos/conexion_bd.php");
?>
<body>
		<center><h1>Agregar un nuevo Usuario</h1></center>
	<form action="procesos/altaplatillo.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Nombre<br>
			<center><input type="text"  id="txtNombre" name="txtNombre" placeholder="Juan" required="required"></center>
        </fieldset>
		<fieldset>
			Apellido<br>
			<center><input type="text"  id="txtApellido" name="txtApellido" placeholder="Perez" required="required"></center>
        </fieldset>
		<fieldset>
			Email<br>
			<center><input type="text"  id="txtEmail" name="txtEmail" placeholder="juanperez@hotmail.com" required="required"></center>
		</fieldset>
		<fieldset>
			Domicilio<br>
			<center><input type="text"  id="txtDomicilio" name="txtDomicilio" placeholder="juanperez@hotmail.com" required="required"></center>
		</fieldset>
		<fieldset>
			Contraseña por defecto<br>
			<center><input type="password"  id="txtClave" name="txtClave" required="required"></center>
		</fieldset>
		<center><input type="submit" id="btnAgregarUsuarios" name="btnAgregarUsuarios" value="Enviar" class="aceptar"></center>
	</form>	
</body>
</html>