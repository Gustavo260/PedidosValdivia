<?php
	require("../../basedatos/conexion_bd.php");
	
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
?>
