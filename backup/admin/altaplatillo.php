<?php
	require("../conexion_bd.php");
	if(!isset($_POST['Menu']) &&  !isset($_POST['DescripcionPlatillo']) && !isset($_POST['Componentes']) && !isset($_POST['Valorizar']) && !isset($_POST['Categoria']) && !isset($_POST['Precio'])){
		header("Location: Agregar.php");
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

		    	$imagen= "recursos/restaurantes/menus/".$_FILES["filePlatillo"]["name"];
		    	if(file_exists("recursos/restaurantes/menus/".$random.'_'.$_FILES["filePlatillo"]["name"])){
		      		echo $_FILES["filePlatillo"]["name"] . " Ya existe. ";
		      	}else{
		      		move_uploaded_file($_FILES["filePlatillo"]["tmp_name"],
		      		"recursos/restaurantes/menus/" .$random.'_'.$_FILES["filePlatillo"]["name"]);
		      		echo "Archivo guardado en " . "recursos/restaurantes/menus/" .$random.'_'. $_FILES["filePlatillo"]["name"];
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
					header ("Location: ../AdminPanel.php");
		      }
		    }
		  }else{
		  echo "Formato no soportado";
		  }

		
	}
?>