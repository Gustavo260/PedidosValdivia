<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Historial de Pedidos Confirmados</title>
	<link rel="stylesheet" type="text/css" href="estilosCSS.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<style type="text/css">
	
	section
	{
		width: 80% auto;
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
		width:auto;
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
<?php
	require("../../basedatos/conexion_bd.php");
	
?>
<body bgcolor="#ECF1F2">
	<section>
	<center><h1>Restaurantes Registrados</h1></center><br>
    <div class="caja">
	<table border="0px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
            <td>Restaurante</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
            <td>Hora de la reserva</td>
            <td>Estado</td>
            <td>Acción</td>
		</tr>	

	<tr><td colspan="8"><hr /></td></tr>
		<?php	
		//MUESTRA LAS RESERVAS 
		
			$re=mysql_query("SELECT usuarios.Nombre as name, usuarios.Apellido as ape, restaurantes.Nombre as rest, reservas.ID_Pedido as numeropedido, reservas.Imagen as imagen, reservas.Descripcion as nombre, reservas.Precio as precio, reservas.Cantidad as cantidad, reservas.SubTotal as subtotal, reservas.Estado as estado, reservas.hora_reserva as reserva FROM `reservas` JOIN restaurantes ON reservas.ID_Restaurante=restaurantes.ID_Restaurante JOIN usuarios ON reservas.ID_Cliente=usuarios.ID_Usuario WHERE reservas.Estado=0 OR reservas.Estado=1 OR reservas.Estado=2 order by reservas.ID_Pedido DESC");
			$numeropedido=0;
			while ($f=mysql_fetch_array($re)) {
					
					if($numeropedido	!=$f['numeropedido']){
						echo '<tr><td colspan="9"><hr color="#000000"></td></tr>';
						echo '<tr><td>Pedido Número: '.$f['numeropedido'].' </td></tr>';
					}		
					$numeropedido=$f['numeropedido'];
						
					if($f['estado']==1)
					{
						$estado='Pendiente';
					}
					elseif($f['estado']==0)
					{
						$estado='Cancelada';
					}
					elseif($f['estado']==2)
					{
						$estado='Entregado';
					}
					echo '<tr>
						<td><img src="../'.$f['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$f['nombre'].'</td>
						<td>'.$f['rest'].'</td>
						<td>'.$f['precio'].'</td>
						<td>'.$f['cantidad'].'</td>
						<td>'.$f['subtotal'].'</td>
						<td>'.$f['reserva'].'</td>
						<td>'.$estado.'</td>'; ?>
						<td><?php if($f['estado']==1){ ?><form action="" method="POST"><input type="hidden" name="ID" id="ID" value="<?php echo $numeropedido; ?>" /><button type="submit"title="Cancelar reserva" style="height:25px; width:25px;" class="btn" id="btnQuitar" name="btnQuitar">X <i class="fa fa-search"></i></button></form><?php } ?></td>
						<td rowspan="2"></td>				
					</tr>
					<tr><td></td></tr>
                    <?php			
			}	
		?>
	</table>
    </div>
    <br>
    <br>
	</section>
    <br />
    <br />
    <br />	
     <center><a class="envio" href="AdminPanel.php">Volver</a></center>
	</section>
</body>
</html>