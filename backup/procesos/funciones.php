<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php
//FUNCIONES DEL SISTEMA
function login()
{
		$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
		$sesion=mysql_query($sql); 
		if(mysql_num_rows($sesion)>0)
		{
			if($row=mysql_fetch_array($sesion))
			{
				$usuario=$row['ID_Usuario'];
				$sqlBus="SELECT usuarios.Nombre, usuarios.Apellido FROM usuarios JOIN sesiones ON usuarios.ID_Usuario=sesiones.ID_Usuario WHERE sesiones.ID_Usuario=".$usuario;
				$sesionIniciada=mysql_query($sqlBus); 
				$row2=mysql_fetch_array($sesionIniciada);
				?>
				<?php echo $row2['Nombre']." ".$row2['Apellido'];?>
						
					<form action="index.php" method="POST">
					<input type="hidden" id="txtUser" name="txtUser" value="<?php echo $usuario; ?>" />
					<button name="btnCierre" id="btnCierre" style="background:url(recursos/botonregistro.png)" type="submit">Cerrar sesión</button></form> 
				<?php
			}
		
			else
			{
				?><p>Bienvenido</p><?php 
			}
			?>
					   <?php
		}
		else
		{
			?><p>Bienvenido</p><?php 
		}
}
function MostrarPerfil()
{
	$sql="SELECT ID_Usuario, ID_Perfil, ID_Sesion FROM sesiones WHERE estado=1";
	$sesion=mysql_query($sql); 
	mysql_num_rows($sesion);
	$sesionON=mysql_fetch_array($sesion);
	$usuario=$sesionON['ID_Usuario'];
	$perfil=$sesionON['ID_Perfil'];
}

function loginAdmin()
{
		$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
		$sesion=mysql_query($sql); 
		if(mysql_num_rows($sesion)>0)
		{
			if($row=mysql_fetch_array($sesion))
			{
				$usuario=$row['ID_Usuario'];
				$sqlBus="SELECT usuarios.Nombre, usuarios.Apellido, sesiones.ID_Perfil as perfil FROM usuarios JOIN sesiones ON usuarios.ID_Usuario=sesiones.ID_Usuario WHERE sesiones.ID_Usuario=".$usuario." AND sesiones.ID_Perfil=2";
				$sesionIniciada=mysql_query($sqlBus); 
				if(mysql_num_rows($sesionIniciada)>0)
				{
					$row2=mysql_fetch_array($sesionIniciada);
					?>
					<?php echo $row2['Nombre']." ".$row2['Apellido'];?>
						
					<form action="index.php" method="POST">
					<input type="hidden" id="txtUser" name="txtUser" value="<?php echo $usuario; ?>" />
					<button name="btnCierre" id="btnCierre" style="background:url(recursos/botonregistro.png)" type="submit">Cerrar sesión</button></form> 
					<?php
				}
				else
				{
					?>
                    <form action="index.php" id="mal" name="mal" method="POST">
					<input type="hidden" id="txtUser" name="txtUser" value="<?php echo "Acceso denegado"; ?>" />
					<button name="btnCierre" id="btnCierre" style="background:url(recursos/botonregistro.png)" type="submit">Cerrar sesión</button></form> 
                    <?php
					
				}
				
			}
		
			else
			{
				?><p>Bienvenido</p><?php 
			}
			?>
					   <?php
		}
		else
		{
			?><p>Bienvenido</p><?php 
		}
}



function cargarRestaurantes()
		{
		$localizacion=$_POST['txtLocalizacion'];
		$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Hubicacion='".$localizacion."';";
		$resp=mysql_query($sqlBusqueda); 
		if(mysql_num_rows($resp)>0)
		{
			while($row2=mysql_fetch_array($resp))
			{
				?>               	                
					<section> 
                    <!-- NODOS -->
                    <div class="caja">
                    <form id="form<?php echo $row2['ID_Restaurante']; ?>" name="form<?php echo $row2['ID_Restaurante']; ?>" method="GET" action="testestilos2.php?txtLocalizacion=<?php echo $_GET['txtLocalizacion'];?>">  
                    <table width="614" height="25" border="0">
                        <tr>
                        <td width="100"><center><img src="<?php echo $row2['Imagen']; ?>" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" width="100px" height="100px"></center></td>
                            <td width="441">
                                <table>
                                    <tr><td align="left" colspan="2"><h4><?php echo $row2['Nombre']; ?></h4></td><td></td></tr>
                                    <tr>
                                      <td colspan="2">
                                      <?php if($row2['Rating']=="1")
									  	{
											?>
										<img src="recursos/ratingbar/1estrella.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="2")
									  	{
											?>
										<img src="recursos/ratingbar/2estrellas.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="3")
									  	{
											?>
										<img src="recursos/ratingbar/3estrellas.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="4")
									  	{
											?>
										<img src="recursos/ratingbar/4estrellas.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="5")
									  	{
											?>
											<img src="recursos/ratingbar/5estrellas.png" id="" name="">
                                           	<?php
										}?>
                                     </td><td colspan="2" align="center">
                                      
                                      <input type="submit" class="verificarUsuario" id="btnRestaurante<?php echo $row2['ID_Restaurante']; ?>" name="btnRestaurante<?php echo $row2['ID_Restaurante']; ?>" value="Buscar >">
                                      <input type="hidden" id="txtRestaurante" name="txtRestaurante" value="<?php echo $row2['ID_Restaurante']; ?>"></td><td width="6"></td></tr>
                                    <tr><td width="133">0Km</td><td width="166">$<?php echo $row2['envio']; ?></td><td width="118">$<?php echo $row2['minimo']; ?></td></tr>
                                    <tr><td>Distancia</td><td>Costo de envio</td><td>Pedido Minimo</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                     <!-- FIN NODOS -->
                    </section>
                    <section>          
                    <h1></h1>
                    <p></p>
                    </section>
                    <!-- Fin repetidor!!
                <?php
			}
		}
}

function platillos()
{
	if(isset($_POST["btnMenu"]))
	{ 
		$restaurante=$_GET['txtRestaurante'];
		$sqlBusqueda="SELECT platillos.ID_Platillo, platillos.Descripcion as Platillo, platillos.Costo, platillos.Imagen as Imagen FROM platillos JOIN menus ON platillos.ID_Menu=menus.ID_Menu WHERE platillos.ID_Menu=1 and menus.ID_Restaurante=".$restaurante;
		$resp=mysql_query($sqlBusqueda); 
		if(mysql_num_rows($resp)>0)
		{
			while($row2=mysql_fetch_array($resp))
			{
	?>
                <div class="caja">
                    <h2><?php echo $row2['Platillo']; ?></h2>
                    <img src="<?php echo $row2['Imagen']; ?>" width="140" />
                    <p>$<?php echo $row2['Costo']; ?></p>
                    <input type="button" value="detalle" id="platillo<?php echo $row2['ID_Platillo']; ?>" name="platillo<?php echo $row2['ID_Platillo']; ?>" />
                </div>
    <?php
			}
		}
		else
		{
			echo "<table align='center'><tr><td>No se encontraron platillos!</td></tr></table>";
		}
	}
}
?>
<body>
</body>
</html>