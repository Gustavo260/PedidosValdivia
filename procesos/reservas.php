<?php
	require("../basedatos/conexion_bd.php");
	require("funciones.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Historial de Pedidos Confirmados</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../estilos/estilosCSS.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
  	<script type="text/javascript">
	function refresh()
    {
        location.reload();
    }
	</script>
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
		width:750px;
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
	
	.btn {
  background:rgba(255,0,0,1);
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0px;
  -webkit-box-shadow: 0px 0px 6px #666666;
  -moz-box-shadow: 0px 0px 6px #666666;
  box-shadow: 0px 0px 6px #666666;
  font-family: Arial;
  color: #ffffff;
  font-size: 10px;
 
  text-decoration: none;
}

.btn:hover {
  background:rgba(255,0,0,1);
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
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
                <td> </td>
           	    <td width="18%" align="center"><?php infolog(); ?></td>
            </tr>
            <tr>
            	<td width="82%">
                
                </td>
            </tr>
   	    </table>
    </div>
   
<!-- Fin encabezado --> 
	
	<section>
	<center><h1>Mis reservas</h1></center><br>
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

		<?php
		if(isset($_POST["btnQuitar"]))
		{
			$sql='UPDATE reservas SET Estado=0 WHERE ID_Pedido='.$_POST['ID'];
			mysql_query($sql);
		}
		if(isset($_GET['limpiar']))
		{
			$sql='UPDATE reservas SET Estado=3 WHERE ID_Cliente='.$_SESSION['ID_Usuario'].' AND Estado=0 OR Estado=2';
			mysql_query($sql);
		}
		
		//OBTENCION DE ID USUARIO		
			$ID_Usuario=$_SESSION['ID_Usuario'];
		//FIN OBTENCION DE ID
		
		//MUESTRA HISTORIAL DE PEDIDOS CONFIRMADOS
			$re=mysql_query("SELECT restaurantes.Nombre as rest, reservas.ID_Pedido as numeropedido, reservas.Imagen as imagen, reservas.Descripcion as nombre, reservas.Precio as precio, reservas.Cantidad as cantidad, reservas.SubTotal as subtotal, reservas.Estado as estado, reservas.hora_reserva as reserva FROM `reservas` JOIN restaurantes ON reservas.ID_Restaurante=restaurantes.ID_Restaurante WHERE reservas.ID_Cliente=".$ID_Usuario." AND reservas.Estado=0 OR reservas.Estado=1 OR reservas.Estado=2 order by reservas.ID_Pedido DESC");
			$numeropedido=0;
			while ($f=mysql_fetch_array($re)) {
					
					if($numeropedido	!=$f['numeropedido']){
						echo '<tr><td colspan="9"><hr color="#000000"></td></tr>';
						echo '<tr><td>Pedido Número: '.$f['numeropedido'].' </td></tr>';
					}		
					$numeropedido=$f['numeropedido'];
					$sqltest="SELECT usuarios.Nombre, usuarios.Apellido, reservas.ID_Pedido as numeropedido, reservas.Imagen as imagen, reservas.Descripcion as nombre, reservas.Precio as precio, reservas.Cantidad as cantidad, reservas.SubTotal as subtotal reservas.Estado as estado, reservas.hora_reserva as reserva FROM `reservas` JOIN usuarios ON reservas.ID_Cliente=usuarios.ID_Usuario WHERE ID_Cliente=4 order by reservas.ID_Pedido DESC";	//PRUEBA ESTO		
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
<center><a class="envio" href="../inforestaurante.php?txtRestaurante=<?php echo $_GET['txtRestaurante']; ?>&estado=<?php echo $_GET['estado']; ?>">Volver</a>&nbsp;<a class="envio" id="limpiar" name="limpiar" href="reservas.php?limpiar?txtRestaurante=<?php echo $_GET['txtRestaurante']; ?>&estado=<?php echo $_GET['estado']; ?>">Limpiar</a></center>
	</section>
</body>

</html>

<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {	
					
			});
		</script>
        
      