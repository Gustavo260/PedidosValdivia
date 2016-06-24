<?php
	require("conexion_bd.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php 
	//REGISTRO DE USUARIOS
	if(isset($_POST["btnRegistro"]))
	{
		
		//VARIABLES DE REGISTRO
		$nombre=$_POST['txtNombre'];
		$apellido=$_POST['txtApellido'];
		$email=$_POST['txtEmail'];
		$clave=$_POST['txtClave'];
		
		//CALCULO DE LAS NOCHES DE ESTANCIA
		
		/*$fechaLlegada="".$fechaLlegada." 00:00:00";
		$fechaSalida="".$fechaSalida." 00:00:00";
		$time=-(strtotime($fechaLlegada) - strtotime($fechaSalida));
		$noches=intval($time/60/60/24);*/

   		//INGRESO DE LOS DATOS DEL USUARIO A LA BD
	$CrearCuenta="INSERT INTO `usuarios`(`Nombre`, `Apellido`, `Email`, `Clave`, `Estado`) VALUES ('".$nombre."','".$apellido."','".$email."','".$clave."',1)";
		mysql_query($CrearCuenta) or die("NO se pudo realizar el registro... ".mysql_error()."<br> <br> <b>Revise la instruccion Sql</b>: ".$CrearSesion);
		
		//CREAR SESION
		$sqlBuscar="SELECT ID_Usuario FROM usuarios WHERE Email='".$email."'";
		$buscarID=mysql_query($sqlBuscar); 
		$row=mysql_fetch_array($buscarID);
		$usuario=$row['ID_Usuario'];
		$CrearSesion="INSERT INTO `sesiones`(`ID_Usuario`, `ID_Perfil`, `estado`) VALUES (".$usuario.", 1, 0);";
		mysql_query($CrearSesion) or die("NO se pudo realizar el registro... ".mysql_error()."<br> <br> <b>Revise la instruccion Sql</b>: ".$CrearSesion." usuario:".$usuario);
		mysql_close($cnn);
		echo "<br><br><br><br><br><br><br><br>
		
		<table align='center' border='2'>
			<tr>
				<tr><td>Registro realizado con éxito!</td></tr>
			</tr>
		</table>
		";	
			
	}	
	
	//AUTENTIFICACION DE USUARIOS
	
	elseif(isset($_POST["btnSesion"]))
	{
		
		//VARIABLES DE AUTENTIFICACION
		$email=$_POST['txtEmail'];
		$clave=$_POST['txtClave'];
		
		//COMPROBACION
		$sql="SELECT usuarios.ID_Usuario, sesiones.ID_Perfil as Perfil, usuarios.Email, usuarios.Clave, perfiles.Estado as Estado FROM usuarios JOIN sesiones ON usuarios.ID_Usuario=sesiones.ID_Usuario JOIN perfiles ON sesiones.ID_Perfil=perfiles.ID_Perfil WHERE Email='".$email."' AND perfiles.Estado=1 AND usuarios.Estado=1";
		$respuesta=mysql_query($sql); 
		if(mysql_num_rows($respuesta)>0)
		{
			if($row=mysql_fetch_array($respuesta))
			{
				$emailbd= $row['Email'];
				$clavebd= $row['Clave'];
				$id_usuario=$row['ID_Usuario'];
				$perfil=$row['Perfil'];
				
				if($clavebd==$clave)
				{
					$sqlAbrirSesion="UPDATE `parametros` SET `Estado`=1 WHERE Estado=0 && Tipo='Sesion';";
					mysql_query($sqlAbrirSesion);
					$sqlSesionPersona="UPDATE `sesiones` SET `estado`=1 WHERE ID_Usuario=".$id_usuario;
					mysql_query($sqlSesionPersona);
					if($perfil=="1")
					{
					echo "<br><br><br><br><br>
						<form action='index.php' method='get'>
						<table align='center' border='0'>
						<tr>
							<tr><td>Logeado correctamente!</td></tr>
							<tr><td><input type='hidden' id='txtUser' name='txtUser' value='".$id_usuario."' /></td></tr>
							<tr><td align='center'><button name='btnContinuar' id='btnContinuar' style='background:url(recursos/botonregistro.png)' type='submit' onclick='window.close()'>Continuar</button></td></tr>
						</tr>
						</table>
						</form>
						";	
					}
					elseif($perfil=="2")
					{
						echo "<br><br><br><br><br>
						<form action='AdminPanel.php' method='get'>
						<table align='center' border='0'>
						<tr>
							<tr><td>Logeado correctamente!</td></tr>
							<tr><td><input type='hidden' id='txtUser' name='txtUser' value='".$id_usuario."' /></td></tr>
							<tr><td align='center'><button name='btnContinuar' id='btnContinuar' style='background:url(recursos/botonregistro.png)' type='submit'>Continuar</button></td></tr>
						</tr>
						</table>
						</form>
						";	
					}
				}
				elseif($clave!=$clavebd)
				{
					echo "<br><br><br><br><br>
			
						<table align='center' border='0'>
						<tr>
							<tr><td>Email o contraseña incorrectas</td></tr>
							<tr><td><p></p></td></tr>
							<tr><td align='center'><a href='popupSesion.php'>Volver atras</a></td></tr>
						</tr>
						</table>
						";	
				}
				else
				{
					echo "<br><br><br><br><br>
			
						<table align='center' border='0'>
						<tr>
							<tr><td>Problema Interno...</td></tr>
							<tr><td><p></p></td></tr>
							<tr><td align='center'><a href='popupSesion.php'>Volver atras</a></td></tr>
						</tr>
						</table>
						";	
				}
			}
			
		}
		else
			{
				echo "<br><br><br><br><br>
			
						<table align='center' border='0'>
						<tr>
							<tr><td>Cuenta inexistente</td></tr>
							<tr><td><p></p></td></tr>
							<tr><td align='center'><a href='popupSesion.php'>Volver atras</a></td></tr>
						</tr>
						</table>
						";	
			}		
	
	}
	
	elseif(isset($_POST["btnCierre"]))
	{
			$user=$_POST['txtUser'];
			$sqlAbrirSesion="UPDATE `parametros` SET `Estado`=0 WHERE Estado=1 && Tipo='Sesion';";
			mysql_query($sqlAbrirSesion);
			$sqlSesionPersona="UPDATE `sesiones` SET fecha='10/12/1991', `estado`=0 WHERE ID_Usuario=".$user;
			mysql_query($sqlSesionPersona);	
			
			echo "<br><br><br><br><br>
						<form action='restaurantes.php' method='get'>
						<table align='center' border='0'>
						<tr>
							<tr><td>Deslogeado correctamente!</td></tr>
							<tr><td align='center'><button name='btnContinuar' id='btnContinuar' style='background:url(recursos/botonregistro.png)' type='submit'>Continuar</button></td></tr>
						</tr>
						</table>
						</form>
						";	
	}
	else
	{
		echo "aun sigo en el else :(";
	}
?>    

</body>
</html>