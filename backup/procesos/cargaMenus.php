<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de usuarios</title>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php 
	require("conexion_bd.php");
	require("funciones.php");
?>
<style type="text/css">
.caja
{
	background:white;
	color:black;
	float:left;
	width:150px;
	height:300px;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:10px;
}
.contenedor
{
	background:white;
	width:580px;
	height:580px;
	margin:auto;		
}
</style>
</head>

<body>

<div class="contenedor" style="background-color:#ECF1F2">	
	<?php	
		$restaurante=$_GET['restaurante'];
		$sqlBusqueda="SELECT platillos.ID_Platillo, platillos.Descripcion as Platillo, platillos.Costo, platillos.Imagen as Imagen FROM platillos JOIN menus ON platillos.ID_Menu=menus.ID_Menu WHERE platillos.ID_Menu=1 and menus.ID_Restaurante=".$restaurante;
		$resp=mysql_query($sqlBusqueda); 
		if(mysql_num_rows($resp)>0)
		{
			while($row2=mysql_fetch_array($resp))
			{
	?>
                <div class="caja">
                    <h2><?php echo $row2['Platillo']; ?></h2>
                    <img src="<?php echo $row2['Imagen']; ?>" width="140px" height="100px" />
                    <p>$<?php echo $row2['Costo']; ?></p>
                    <input type="button" value="Detalle" id="platillo<?php echo $row2['ID_Platillo']; ?>" name="platillo<?php echo $row2['ID_Platillo']; ?>" />
                    <?php
						$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
						$sesion=mysql_query($sql); 
						if(mysql_num_rows($sesion)>0)
						{
					?>
                    		 <input type="button" class="claseagregar" value="Agregar" data-id="<?php echo $row2['ID_Platillo']; ?>" id="platillo<?php echo $row2['ID_Platillo']; ?>" name="platillo<?php echo $row2['ID_Platillo']; ?>" />	
                             <input type="hidden" data-id="<?php echo $restaurante; ?>" class="restaurante" value="" id="txtRestaurante" name="txtRestaurante" />	
					<?php	
						}
					?>
                </div>
    <?php
			}
		}
		else
		{
			echo "<table align='center'><tr><td>No se encontraron platillos!</td></tr></table>";
		}
	
	?>
    
</div>
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {	
				$(".claseagregar").click(function(event) {
					var id=$(this).attr('data-id');
					$.post('CargaCompras.php',{Id:id},function(a)
					{
						location.reload("CargaCompras.php");
					}
				);
				});		
			});
		</script>
</html>