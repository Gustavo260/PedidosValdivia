<?php
	require("../../basedatos/conexion_bd.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php 
	//AGREGA RESTAURANTES!!
	if(isset($_POST["btnAgregarRestaurante"]))
	{
			if(!isset($_POST['Nombre']) && !isset($_POST['PedidoMinimo']) &&  !isset($_POST['Comida']) &&  !isset($_POST['Hubicacion']) &&  !isset($_POST['Map']) && !isset($_POST['Ciudad']) && !isset($_POST['ratingRestaurante'])){
			header("Location: agregar.php");
			}else{
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["fileRestaurante"]["name"]);
				$extension = end($temp);
				$imagen="";
				$random=rand(1,999999);
				if ((($_FILES["fileRestaurante"]["type"] == "image/gif")
					|| ($_FILES["fileRestaurante"]["type"] == "image/jpeg")
					|| ($_FILES["fileRestaurante"]["type"] == "image/jpg")
					|| ($_FILES["fileRestaurante"]["type"] == "image/pjpeg")
					|| ($_FILES["fileRestaurante"]["type"] == "image/x-png")
					|| ($_FILES["fileRestaurante"]["type"] == "image/png"))){
					//Verificamos que sea una imagen
				if ($_FILES["fileRestaurante"]["error"] > 0){
					//verificamos que venga algo en el input file
					echo "Error numero: " . $_FILES["fileRestaurante"]["error"] . "<br>";
				}else{
					//subimos la imagen

					$imagen= "recursos/restaurantes/".$_FILES["fileRestaurante"]["name"];
					if(file_exists("recursos/restaurantes/".$random.'_'.$_FILES["fileRestaurante"]["name"])){
						echo $_FILES["fileRestaurante"]["name"] . " Ya existe. ";
					}else{
						move_uploaded_file($_FILES["fileRestaurante"]["tmp_name"],
						"recursos/restaurantes/" .$random.'_'.$_FILES["fileRestaurante"]["name"]);
						echo "Archivo guardado en " . "recursos/restaurantes/" .$random.'_'. $_FILES["fileRestaurante"]["name"];
						$Nombre=$_POST['Nombre'];
						$Hubicacion=$_POST['Hubicacion'];
						$Ciudad=$_POST['Ciudad'];
						$Rating=$_POST['ratingRestaurante'];
						$Map=$_POST['Map'];
						$PedidoMinimo=$_POST['PedidoMinimo'];
						$Comida=$_POST['Comida'];
						$Sql="insert into restaurantes (Nombre, Hubicacion, Ciudad, Imagen, Rating, Pedido_minimo, Maps, Tipo_comida, Estado) values(
								'".$Nombre."',
								'".$Hubicacion."',
								'".$Ciudad."',
								'".$imagen."',
								'".$Rating."',
								'".$PedidoMinimo."',
								'".$Map."',
								'".$Comida."',
								'1')";
						mysql_query($Sql);
						header ("Location: ../adminPanel.php");
				  }
				}
			  }else{
			  echo "Formato no soportado";
			  }
		}
	}	
	
	//AGREGA USUARIOS!!
	if(isset($_POST["btnAgregarUsuario"]))
	{
		//VARIABLES DE REGISTRO
		$nombre=$_POST['txtNombre'];
		$apellido=$_POST['txtApellido'];
		$email=$_POST['txtEmail'];
		$clave=$_POST['txtClave'];
		$domicilio=$_POST['txtDomicilio'];

		//VERIFICACION DE EXISTENCIA DE LA CUENTA
		$sql="SELECT Email FROM usuarios";
		$re=mysql_query($sql);
		$f=mysql_fetch_array($re)
		//$f['estado'];
		
   		//INGRESO DE LOS DATOS DEL USUARIO A LA BD
	$CrearCuenta="INSERT INTO `usuarios`(`Nombre`, `Apellido`, `Email`, `Clave`, `Domicilio`, `Estado`) VALUES ('".$nombre."','".$apellido."','".$email."','".$clave."','".$domicilio."',1)";
		mysql_query($CrearCuenta) or die("NO se pudo realizar el registro... ".mysql_error()."<br> <br> <b>Revise la instruccion Sql</b>: ".$CrearSesion);
		
		//CREAR SESION
		$sqlBuscar="SELECT ID_Usuario FROM usuarios WHERE Email='".$email."'";
		$buscarID=mysql_query($sqlBuscar); 
		$row=mysql_fetch_array($buscarID);
		$usuario=$row['ID_Usuario'];
		$CrearSesion="INSERT INTO `sesiones`(`ID_Usuario`, `ID_Perfil`, `estado`) VALUES (".$usuario.", 1, 0);";
		mysql_query($CrearSesion) or die("NO se pudo realizar el registro... ".mysql_error()."<br> <br> <b>Revise la instruccion Sql</b>: ".$CrearSesion." usuario:".$usuario);
		mysql_close($cnn);
		$respuesta="Registrado correctamente!";
		header("Location: ../index.php?respuesta=".$respuesta);
	}
	
	//AGREGA MENUS!!
	if(isset($_POST["btnAgregarMenu"]))
	{
		$Descripcion=$_POST['DescripcionMenu'];
		$Restaurante=$_POST['Restaurante'];
		$Valoracion=$_POST['ValoracionMenu'];
		$Categoria=$_POST['Categoria'];
		$Sqll="insert into menus(ID_Restaurante, Descripcion, Valorizacion, Categoria, Estado) values(
			".$Restaurante.",
			'".$Descripcion."',
			".$Valoracion.",
			'".$Categoria."',
			1);";
		mysql_query($Sqll) or die("error en la insercion!");
		header ("Location: ../adminPanel.php");
	}
	
	//AGREGA PLATILLOS!!
	if(isset($_POST["btnAgregarPlatillo"]))
	{
		if(!isset($_POST['Menu']) &&  !isset($_POST['DescripcionPlatillo']) && !isset($_POST['Componentes']) && !isset($_POST['Valorizar']) && !isset($_POST['Categoria']) && !isset($_POST['Precio'])){
			header("Location: agregar.php");
		}else{
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["filePlatillo"]["name"]);
				$extension = end($temp);
				$imagen="";
				$random=rand(1,999999);
				if ((($_FILES["filePlatillo"]["type"] == "image/gif")
					|| ($_FILES["filePlatillo"]["type"] == "image/jpeg")
					|| ($_FILES["filePlatillo"]["type"] == "image/jpg")
					|| ($_FILES["filePlatillo"]["type"] == "image/pjpeg")
					|| ($_FILES["filePlatillo"]["type"] == "image/x-png")
					|| ($_FILES["filePlatillo"]["type"] == "image/png"))){
					//Verificamos que sea una imagen
				if ($_FILES["filePlatillo"]["error"] > 0){
					//verificamos que venga algo en el input file
					echo "Error numero: " . $_FILES["filePlatillo"]["error"] . "<br>";
				}else{
					//subimos la imagen

					$imagen= "../../recursos/restaurantes/menus/".$_FILES["filePlatillo"]["name"];
					if(file_exists("../../recursos/restaurantes/menus/".$random.'_'.$_FILES["filePlatillo"]["name"])){
						echo $_FILES["filePlatillo"]["name"] . " Ya existe. ";
					}else{
						move_uploaded_file($_FILES["filePlatillo"]["tmp_name"],
						"../../recursos/restaurantes/menus/" .$random.'_'.$_FILES["filePlatillo"]["name"]);
						echo "Archivo guardado en " . "../../recursos/restaurantes/menus/" .$random.'_'. $_FILES["filePlatillo"]["name"];
						$Menu=$_POST['Menu'];
						$Descripcion=$_POST['DescripcionPlatillo'];
						$Componentes=$_POST['Componentes'];
						$Valorizar=$_POST['Valorizar'];
						$Categoria=$_POST['Categoria'];
						$Costo=$_POST['Precio'];
						$Sql="insert into platillos (ID_Menu, Descripcion, Componentes, Valorizacion, Categoria, Imagen, Costo, Estado) values(
								".$Menu.",
								'".$Descripcion."',
								'".$Componentes."',
								'".$Valorizar."',
								'".$Categoria."',
								'".$imagen."',
								'".$Costo."',
								1)";
						mysql_query($Sql);
						header ("Location: ../adminPanel.php");
				  }
				}
			  }else{
			  echo "Formato no soportado";
			  }
		}
	}
?>    

</body>
</html>