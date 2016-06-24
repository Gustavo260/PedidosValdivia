<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script> 
function abrir(url) { 
open('popupRegistro.php','','top=300,left=300,width=300,height=300') ; 
} 
</script> 
<script> 
function abrir2(url) { 
open('popupSesion.php','','top=300,left=300,width=300,height=300') ; 
} 
function refresh()
{
   var pagina="index.php"
   location.href=pagina
}

</script> 
<?php
	require("conexion_bd.php");
?>
<body>
<?php
	$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
	$sesion=mysql_query($sql); 
	if(mysql_num_rows($sesion)>0)
	{
		if($row=mysql_fetch_array($sesion))
		{
			$usuario=$row['ID_Usuario'];
			$sqlBus="SELECT usuarios.Nombre, usuarios.Apellido FROM usuarios JOIN sesiones ON usuarios.ID_Usuario=sesiones.ID_Usuario WHERE sesiones.ID_Usuario=".$usuario;
			$sesionIniciada=mysql_query($sqlBus); 
			$row2=mysql_fetch_array($sesionIniciada);
			?>
			<?php //echo $row2['Nombre']." ".$row2['Apellido'];?>
                    
				<form action="index.php" method="POST">
                <input type="hidden" id="txtUser" name="txtUser" value="<?php echo $usuario; ?>" />
			    <button name="btnCierre" id="btnCierre" style="background:url(recursos/botonregistro.png)" type="submit">Cerrar sesión</button></form> 
            <?php
			$sql="SELECT ID_Usuario, ID_Perfil, ID_Sesion FROM sesiones WHERE estado=1";
					$sesion=mysql_query($sql); 
					mysql_num_rows($sesion);
					$sesionON=mysql_fetch_array($sesion);
					$usuario=$sesionON['ID_Usuario'];
					$perfil=$sesionON['ID_Perfil'];
					if($perfil=="2")
					{
						?>
                        	 <a href="AdminPanel.php" class="aceptar">Admin Panel</a>
                        <?php
					}
					else
					{
						
					}
			?>    
               
            <?php
		}
	}
	else
	{
		?>
        	<table border="1" align="left">
			<tr><td><font color="#FFFFFF"><a href="javascript:abrir2('popupSesion.php')">Ingresar</a></font></td><td><font color="#FFFFFF">   <a href="javascript:abrir('popupRegistro.php')">Registrate </a></font></td></tr>
</table>
        <?php
	}
	if(isset($_POST["btnCierre"]))
	{
			$user=$_POST['txtUser'];
			$sqlAbrirSesion="UPDATE `parametros` SET `Estado`=0 WHERE Estado=1 && Tipo='Sesion';";
			mysql_query($sqlAbrirSesion);
			$sqlSesionPersona="UPDATE `sesiones` SET fecha='10/12/1991', `estado`=0 WHERE ID_Usuario=".$user;
			mysql_query($sqlSesionPersona);	
			echo "<script>setTimeout('refresh()', 1);</script>";
	}
	
?>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<form action="restaurants.php" method="POST">
<table width="50%" border="0" align="center">
  <tr>
 	<td width="50%" colspan="3" align="center"><h1> <img src="recursos/cooltext138285584887145.png" width="250" height="55" id="Insert_logo" /><h1></h1>&nbsp; Tus restaurantes mas cercanos <br /><br /><br /><br /><br /><br />&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Dirección <input type="text" size="20" width="500" height="30" id="txtLocalizacion" name="txtLocalizacion"  placeholder="ej: German Saelzer #40" /></td><td align="left"><input name="btnBuscar" type="submit" style="background:url(recursos/botonregistro.png)" class="positive" id="btnBuscar" value="Buscar" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td align="center" colspan="3"><br /><br /><br /><br />Proximamente también para celulares</td>
  </tr>
</table>
<style type="text/css">
	body
	{
		background:url(recursos/main.jpg);
		no-repeat top;
		background-size:1370px 800px;
	}
</style>
</body>
</html>