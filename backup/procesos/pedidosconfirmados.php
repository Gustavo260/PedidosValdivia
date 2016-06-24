<?php
session_start();
require("conexion_bd.php");

		//OBTENCION DE ID USUARIO
			$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
			$sesion=mysql_query($sql); 
			if(mysql_num_rows($sesion)>0)
			{
				if($row=mysql_fetch_array($sesion))
				{
					$usuario=$row['ID_Usuario'];
					$sqlBus="SELECT usuarios.ID_Usuario as usuario, usuarios.Nombre, usuarios.Apellido FROM usuarios JOIN sesiones ON usuarios.ID_Usuario=sesiones.ID_Usuario WHERE sesiones.ID_Usuario=".$usuario;
					$sesionIniciada=mysql_query($sqlBus); 
					$row2=mysql_fetch_array($sesionIniciada);
					
			 
				}
			}
			$ID_Usuario=$row2['usuario'];
		//FIN OBTENCION DE ID
		
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
		header("Location: testestilos2.php?txtRestaurante=".$_GET['txtRestaurante']);

?>