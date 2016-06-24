<?php
session_start();
require("../basedatos/conexion_bd.php");


		$ID_Usuario=$_SESSION['ID_Usuario'];
		$arreglo=$_SESSION['carrito'];
		
		$numeropedido=0;
		$re=mysql_query("select * from ventas order by ID_Pedido DESC limit 1") or die(mysql_error());	
		while (	$f=mysql_fetch_array($re)) {
					$numeropedido=$f['ID_Pedido'];	
		}
		if($numeropedido==0){
			$numeropedido=1;
		}else{
			$numeropedido=$numeropedido+1;
		}
		for($i=0; $i<count($arreglo);$i++){
			mysql_query("insert into ventas (ID_Pedido, ID_Cliente, Descripcion, Precio, Cantidad, Imagen, Subtotal) values(
				".$numeropedido.",
				".$ID_Usuario.",
				'".$arreglo[$i]['Nombre']."',	
				'".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".$arreglo[$i]['Imagen']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
				)")or die(mysql_error());
		}
		unset($_SESSION['carrito']);
		//header("Location: ../inforestaurante.php?txtRestaurante=".$_GET['txtRestaurante']);
		header("Location: ../experimentos/script_enviarmail.php?txtRestaurante=".$_GET['txtRestaurante']."&total=".$_GET['total']);

?>