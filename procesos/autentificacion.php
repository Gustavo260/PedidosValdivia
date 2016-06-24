<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	require("../basedatos/conexion_bd.php");
?>
<body>
<?php
//VARIABLES DE AUTENTIFICACION
		$email=$_POST['txtEmail'];
		$clave=$_POST['txtClave'];
		//COMPROBACION
		$sql="SELECT usuarios.Nombre as nombre, usuarios.Avatar as avatar, usuarios.Apellido as apellido, usuarios.ID_Usuario, sesiones.ID_Perfil as Perfil, usuarios.Email, usuarios.Clave, usuarios.Domicilio as domicilio, perfiles.Estado as Estado FROM usuarios JOIN sesiones ON usuarios.ID_Usuario=sesiones.ID_Usuario JOIN perfiles ON sesiones.ID_Perfil=perfiles.ID_Perfil WHERE Email='".$email."' AND perfiles.Estado=1 AND usuarios.Estado=1";
		$respuesta=mysql_query($sql) or die("Usuario no registrado");
		if(mysql_num_rows($respuesta)>0)
		{
			if($row=mysql_fetch_array($respuesta))
			{
				$id_usuario=$row['ID_Usuario'];
				$emailbd= $row['Email'];
				$nombre= $row['nombre'];
				$apellido= $row['apellido'];
				$clavebd= $row['Clave'];
				$perfil=$row['Perfil'];
				$avatar=$row['avatar'];
				$domicilio=$row['domicilio'];
				
				if($clavebd==$clave)
				{
					session_start();
					$_SESSION['ID_Usuario']=$id_usuario;
					$_SESSION['Nombre']=$nombre;
					$_SESSION['Apellido']=$apellido;
					$_SESSION['Perfil']=$perfil;
					$_SESSION['Avatar']=$avatar;
					$_SESSION['Domicilio']=$domicilio;
				
					if($perfil=="1")
					{
					echo "<br><br><br><br><br>
						<form action='../index.php' method='get'>
						<table align='center' border='0'>
						<tr>
							<tr><td>Logeado correctamente!</td></tr>
							<tr><td><input type='hidden' id='txtUser' name='txtUser' value='".$id_usuario."' /></td></tr>
							<tr><td align='center'><button name='btnContinuar' id='btnContinuar' style='background:url(../recursos/botonregistro.png)' type='submit' onclick='window.close()'>Continuar</button></td></tr>
						</tr>
						</table>
						</form>
						";	
						$respuesta="Logueado correctamente!";
						header("Location: ../index.php?respuesta=".$respuesta);
					}
					
					elseif($perfil=="2")
					{
						echo "<br><br><br><br><br>
						<form action='../admin/adminPanel.php' method='get'>
						<table align='center' border='0'>
						<tr>
							<tr><td>Logeado correctamente!</td></tr>
							<tr><td><input type='hidden' id='txtUser' name='txtUser' value='".$id_usuario."' /></td></tr>
							<tr><td align='center'><button name='btnContinuar' id='btnContinuar' style='background:url(../recursos/botonregistro.png)' type='submit'>Continuar</button></td></tr>
						</tr>
						</table>
						</form>
						";	
						$respuesta="Logueado correctamente como administrador";
						header("Location: ../index.php?respuesta=".$respuesta);
					}
				}
				elseif($clave!=$clavebd)
				{
					echo "<br><br><br><br><br>
			
						<table align='center' border='0'>
						<tr>
							<tr><td>Email o contraseña incorrectas</td></tr>
							<tr><td><p></p></td></tr>
							<tr><td align='center'><a href='../popupSesion.php'>Volver atras</a></td></tr>
						</tr>
						</table>
						<script type='text/javascript'>alert('Los datos no coinciden!');</script>
						";
						$respuesta="Los datos no coinciden!";
						header("Location: ../index.php?respuesta=".$respuesta);
							
				}
				else
				{
					echo "<br><br><br><br><br>
			
						<table align='center' border='0'>
						<tr>
							<tr><td>Problema Interno...</td></tr>
							<tr><td><p></p></td></tr>
							<tr><td align='center'><a href='../popupSesion.php'>Volver atras</a></td></tr>
						</tr>
						</table>
						";	
						$respuesta="Problema desconocido, porfavor contacte al administrador";
						header("Location: ../index.php?respuesta=".$respuesta);
				}
			}
			else
			{
				
			}
		}
		else
			{
				$respuesta="El usuario no esta registrado!";
				header("Location: ../index.php?respuesta=".$respuesta);
			}
		if(isset($_POST["btnCierre"]))
		{
			session_start();
		
			session_destroy();
			$respuesta="Deslogueado correctamente!";
			header("Location: ../index.php?respuesta=".$respuesta);
		}		
?>
</body>
</html>