<?php
	require("../conexion_bd.php");
	require("../funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Historial de Pedidos Confirmados</title>
	<link rel="stylesheet" type="text/css" href="../estilosCSS.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
    <style type="text/css">
	
	section
	{
		width: 80%;
		min-height: 500px;
		padding: 2%;
		margin:0 auto;
		margin-left: 10%;
		margin-top: 50px;
	}
	
	.caja
	{
		background:white;
		color:black;
		width:614px;
		height:auto;
		text-align:center;
		border:1px solid #E2E2E2;
		border-radius:10px;
		margin:15px auto;
		margin-bottom:auto;
		margin-top:auto;
	}
	
	.envio
	{
		background-color: #f13453;
		color:white;
		padding-left: 20px;
		padding-right: 20px;
		border-radius: 4px;
		font-size: 1.3rem;
	}
	.envio:hover{
		background-color: #4a4a4a;
		cursor: pointer;
	}
	</style>
</head>
<body>
<!-- Header -->
	<div id="header">
    	<table border="0" bordercolordark="#000000" width="100%">
            <tr>
            	<td width="82%">
            		<img src="../recursos/cooltext138285584887145.png" width="202" height="55" id="Insert_logo" /> 
           	    </td>
                <td> <div class="carrito"><a href="../CargaCompras.php"><img src="../recursos/icon_shopcart.png" width="40px" /></a></div></td>
           	    <td width="18%" align="center"><?php login(); ?></td>
            </tr>
            <tr>
            	<td width="82%">
                
                </td>
            </tr>
   	    </table>
    </div>
   
<!-- Fin encabezado --> 
	
	<section>
	<center><h1>Todos los pedidos confirmados</h1></center><br>
    <div class="caja">
	<table border="0px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
            <td>Acción</td>
		</tr>	

		<?php
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
		
		//MUESTRA HISTORIAL DE PEDIDOS CONFIRMADOS
		
			$re=mysql_query("SELECT ventas.ID_Pedido as numeropedido, ventas.Imagen as imagen, ventas.Descripcion as nombre, ventas.Precio as precio, ventas.Cantidad as cantidad, ventas.SubTotal as subtotal FROM `ventas` order by ventas.ID_Pedido ASC");
			$numeropedido=0;
			while ($f=mysql_fetch_array($re)) {
					if($numeropedido	!=$f['numeropedido']){
						echo '<tr><td>Pedido Número: '.$f['numeropedido'].' </td></tr>';
					}
					$numeropedido=$f['numeropedido'];
					echo '<tr>
						<td><img src="../'.$f['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$f['nombre'].'</td>
						<td>'.$f['precio'].'</td>
						<td>'.$f['cantidad'].'</td>
						<td>'.$f['subtotal'].'</td>
						<td><input type="button" value="Editar"><input type="button" value="Eliminar"></td>
						<td rowspan="2"></td>
						
					</tr>
					<tr><td></td></tr>';	
					
			}
			
		
		?>
	</table>
    </div>
    <br>
    <br>
     <center><a class="envio" href="../AdminPanel.php">Volver</a></center>
	</section>
</body>

</html>