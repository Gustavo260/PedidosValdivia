<?php
	require("../conexion_bd.php");
	if(!isset($_POST['Nombre']) &&  !isset($_POST['Hubicacion']) && !isset($_POST['Ciudad']) && !isset($_POST['ratingRestaurante'])){
		header("Location: Agregar.php");
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
					$Sql="insert into restaurantes (Nombre, Hubicacion, Ciudad, Imagen, Rating) values(
							'".$Nombre."',
							'".$Hubicacion."',
							'".$Ciudad."',
							'".$imagen."',
							'".$Rating."')";
					mysql_query($Sql);
					header ("Location: ../AdminPanel.php");
		      }
		    }
		  }else{
		  echo "Formato no soportado";
		  }

		
	}
?>
