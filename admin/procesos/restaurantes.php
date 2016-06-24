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
	 <!-- LISTA DE PLATILLOS REGISTRADOS -->
    
<section>
	<center><h1>Restaurantes Registrados</h1></center><br>
    <div class="caja">
	<table border="0px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Ciudad</td>
            <td>Hubicacion</td>
			<td>Rating</td>
            <td>Pedido Minimo</td>
            <td>Estado</td>
            <td>Acciones</td>
		</tr>	

	<tr><td colspan="8"><hr /></td></tr>
		<?php	
		//MUESTRA RESTAURANTES REGISTRADOS
		
			$re=mysql_query("SELECT Imagen, ID_Restaurante, Nombre, Ciudad, Hubicacion, Rating, Pedido_minimo as pedido, Estado FROM restaurantes order by ID_Restaurante ASC");
			$numerorestaurante=0;
			while ($f=mysql_fetch_array($re)) {
					
					$numerorestaurante=$f['ID_Restaurante'];
					if($f['Estado']==1)
					{
						$estado="Habilitado";
					}
					else
					{
						$estado="Deshabilitado";
					}
					echo '<tr>
						<td><img src="../'.$f['Imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$f['Nombre'].'</td>
						<td>'.$f['Ciudad'].'</td>
						<td>'.$f['Hubicacion'].'</td>
						<td>'.$f['Rating'].'</td>
						<td>'.$f['pedido'].'</td>
						<td>'.$estado.'</td>
						<td><input type="button" value="Editar"><input type="button" value="Eliminar"></td>
						<td rowspan="2"></td>
					</tr>
					<tr><td colspan="8"><hr /></td></tr>
					<tr><td></td></tr>';			
			}
		?>
	</table>
    </div>
    <br>
    <br>
	</section>
</body>
</html>