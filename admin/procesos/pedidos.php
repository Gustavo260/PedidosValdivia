<?php
	require("../../basedatos/conexion_bd.php");
	require("../../procesos/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Historial de Pedidos Confirmados</title>
	<link rel="stylesheet" type="text/css" href="../../estilos/estilosCSS.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
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
		background:#ECF1F2;
		color:black;
		width:1000px;
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
	<section>
	<center><h1>Todos los pedidos confirmados</h1></center><br>
    <div class="caja">
	<table border="0px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Solicitante</td>
			<td>Restaurante</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
            <td>Acción</td>
		</tr>	
		<?php
		//MUESTRA HISTORIAL DE PEDIDOS CONFIRMADOS
		
			$re=mysql_query("SELECT usuarios.Nombre as name, usuarios.Apellido as ape, restaurantes.Nombre as rest, ventas.ID_Pedido as numeropedido, ventas.Imagen as imagen, ventas.Descripcion as nombre, ventas.Precio as precio, ventas.Cantidad as cantidad, ventas.SubTotal as subtotal FROM `ventas` JOIN restaurantes ON ventas.ID_Restaurante=restaurantes.ID_Restaurante JOIN usuarios ON ventas.ID_Cliente=usuarios.ID_Usuario order by ventas.ID_Pedido ASC");
			$numeropedido=0;
			while ($f=mysql_fetch_array($re)) {
					if($numeropedido	!=$f['numeropedido']){
						echo '<tr><td colspan="8"><hr /></td></tr><tr><td>Pedido Número: '.$f['numeropedido'].' </td></tr>
								<tr><td colspan="8"><hr color="black"></td></tr>
						';
					}
					$numeropedido=$f['numeropedido'];
					echo '<tr>
						<td><img src="../'.$f['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$f['nombre'].'</td>
						<td>'.$f['name'].' '.$f['ape'].'</td>
						<td>'.$f['rest'].'</td>
						<td>'.$f['precio'].'</td>
						<td>'.$f['cantidad'].'</td>
						<td>'.$f['subtotal'].'</td>
						<td><input type="button" value="Editar"><input type="button" value="Eliminar"></td>
						<td rowspan="2"></td>
						
					</tr>
					
					<tr><td ></td></tr>';	
					
			}
			
		
		?>
	</table>
    </div>
    <br>
    <br>
     <center><a class="envio" href="../adminPanel.php">Volver</a></center>
	</section>
</body>

</html>