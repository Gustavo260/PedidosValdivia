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
			<td>Apellido</td>
            <td>Domicilio</td>
			<td>Estado de cuenta</td>
            <td>Acciones</td>
		</tr>	

	<tr><td colspan="8"><hr /></td></tr>
		<?php	
		//MUESTRA USUARIOS REGISTRADOS
		
			$re=mysql_query("SELECT Avatar, ID_Usuario, Nombre, Apellido, Domicilio, Estado FROM usuarios order by ID_Usuario ASC");
			$numerorestaurante=0;
			while ($f=mysql_fetch_array($re)) {
					
					$numerorestaurante=$f['ID_Usuario'];
					if($f['Estado']==1)
					{
						$estado="Activa";
					}
					elseif($f['Estado']==2)
					{
						$estado="Baneada";
					}
					else
					{
						$estado="No Activa";
					}
					?><tr>
						<td><img src="../<?php echo $f['Avatar']; ?>" width="50px" heigth="50px" /></td>
						<td><?php echo $f['Nombre']; ?></td>
						<td><?php echo $f['Apellido']; ?></td>
						<td><?php echo $f['Domicilio']; ?></td>
						<td><?php echo $estado; ?></td>
						<td><?php if($estado=='Activa'){ ?><input id="btnEliminar" name="btnEliminar" type="button" value="Desactivar"><?php }elseif($estado=='Baneada'){ ?><input id="btnUnban" name="btnUnban" type="button" value="Desbanear"><?php }else{ ?><input id="btnActivar" name="btnActivar" type="button" value="Activar"><?php } ?>
						
						<td rowspan="2"></td>
					</tr>
					<tr><td colspan="8"><hr color="black"></td></tr>
					<tr><td colspan="8"></td></tr>
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