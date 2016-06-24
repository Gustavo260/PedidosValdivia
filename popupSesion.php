<?php 
	require("basedatos/conexion_bd.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de usuarios</title>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<!--
<script language="javascript">
	
	function loginAutentification(Email, Clave)
	{
		var Email;
		var Clave;
		alert("uh!");
        
		<?php
			/*
			$Email="<script> document.write(Email) </script>";
			$Clave="<script> document.write(Clave) </script>";
			$sql="SELECT Email, Clave FROM usuarios WHERE Email=".$Email." and Clave=".$Clave;
			$row=mysql_query($sql);
			$res=mysql_fetch_array($row);
		*/?>
		alert("<?php //echo $Email; ?>");
	}
</script>
-->
<body>
<form method="post" name="form2" id="form2" action="procesos/procesos.php">
<br />
<table width="200" border="0" align="center">
  <tr>
    <th scope="col">Iniciar Sesion</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="center"><div class="input-prepend">
    <span class="add-on"><i class="icon-envelope"></i></span>
    <input class="span2" type="text" id="txtEmail" name="txtEmail" width="250px" required="required" placeholder="Email" />
  </div></td>
  </tr>
  <tr>
   <td height="50" align="center"><div class="input-prepend">
    <span class="add-on"><i class="icon-key"></i></span>
    <input class="span2" type="password" width="250px" id="txtClave" required="required" name="txtClave" placeholder="Contraseña" />
  </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
     <td align="center"><button name="btnSesion" id="btnSesion" style="background:url(recursos/botonregistro.png)" type="submit">Ingresar</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

</body>
</html>