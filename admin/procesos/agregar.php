<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../../estilos/estilosCSS2.css">
</head>
<?php
	require("../../basedatos/conexion_bd.php");
?>
<body>
<center><h1>Agregar un nuevo Restaurante</h1></center>
	<form action="procesos/altarestaurante.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Nombre<br>
			<center><input type="text" name="Nombre" id="Nombre" required="required" placeholder="ej: Restaurante El Yugo"></center>
		</fieldset>
		<fieldset>
			Ubicacion<br>          
			<center><input type="text" id="Hubicacion" name="Hubicacion" required="required" placeholder="ej: Los Alerces"></center>
		</fieldset>
		<fieldset>
			Sector dentro de Valdivia<br>          
			<center>
				<select id="Categoria" name="Categoria">
				<?php
					$re=mysql_query("SELECT ID_Sector as ID, Descripcion FROM sectores");
					while ($f=mysql_fetch_array($re)) 
					{
				?>
                          <option value="<?php echo $f['ID']; ?>"><?php echo $f['Descripcion']; ?></option> 
				<?php
					}
				?>
               </select>
			</center>
		</fieldset>
        <fieldset>
			Link Google Maps<br>
			<center>Url google maps <input type="text" name="Map" id="Map" required="required" placeholder="pegar url google maps"> Lat <input type="text" name="Map" id="Map" required="required" placeholder="ej: -34.666" size="8px"> Long <input type="text" name="Map" id="Map" required="required" placeholder="ej: 66.000" size="8px"></center>
		</fieldset>
		 <fieldset>
			Horarios de atención<br>
			<center>Lunes a Viernes <input type="text" name="Map" id="Map" placeholder="ej: 11:00/13:00" size="10px"> Sabado & Domingo <input type="text" name="Map" id="Map" placeholder="ej: 15:00/19:00" size="10px"> Sabados <input type="text" name="Map" id="Map" placeholder="ej: 15:00/19:00" size="10px"> Domingos <input type="text" name="Map" id="Map" placeholder="ej: 15:00/19:00" size="10px"></center>
		</fieldset>
		<fieldset>
			Imagen representativa<br>
			<center><input type="file" name="fileRestaurante" id="fileRestaurante"></center>
		</fieldset>
		<fieldset>
			Rating<br>
			<select id="ratingRestaurante" name="ratingRestaurante">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                       <option value="5">5</option>
                    </select>
        <fieldset>
			Tipos de Comidas<br>
		<center><input type="text" name="Comida" id="Comida" required="required" placeholder="ej: Pastas, Pizzas, etc. "></center>
		</fieldset>
        <fieldset>
			Pedido Minimo<br>
		<center><input type="text" name="PedidoMinimo" id="PedidoMinimo" required="required" placeholder="ej: 5000"></center>
		</fieldset>
		<center><input type="submit" name="accion" value="Enviar" class="aceptar"></center>
        </fieldset>
	</form>	
 <br /><br />
<hr />
<br /><br />   	
<center><h1>Agregar un nuevo Menu</h1></center>
	<form action="procesos/altamenu.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Descripcion<br>
			<center><input type="text"  id="DescripcionMenu" required="required" name="DescripcionMenu"></center>
		</fieldset>
        <fieldset>
			Restaurante<br>
			<select id="Restaurante" name="Restaurante">
            <?php 
			$sql="SELECT ID_Restaurante, Nombre FROM restaurantes WHERE Estado=1";
			$sesion=mysql_query($sql); 
			if(mysql_num_rows($sesion)>0)
			{
				while($sesionON=mysql_fetch_array($sesion))
				{
					?>
                     <option value="<?php echo $sesionON['ID_Restaurante']; ?>"><?php echo $sesionON['Nombre']; ?></option>        
                    <?php
				}
			}
			?>  
            </select>
        </fieldset>
		<fieldset>
			Valorización<br>
			<select id="ValoracionMenu" name="ValoracionMenu">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                       <option value="5">5</option>
                    </select>
        </fieldset>
		<fieldset>
			Categoria<br>
			<select id="Categoria" name="Categoria">
                      <option value="Pizzas">Pizzas</option>
                       <option value="Ensaladas">Ensaladas</option>
                        <option value="Pastas">Pastas</option>
                        <option value="Sopas">Sopas</option>
                        <option value="Guisos">Guisos</option>
             </select>
		</fieldset>
		<center><input type="submit" name="accion" value="Enviar" class="aceptar"></center>
	</form>
<br /><br />
<hr />
<br /><br />
<center><h1>Agregar un nuevo Platillo</h1></center>
	<form action="procesos/altaplatillo.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Menu<br>
			<select id="Menu" name="Menu">
				<?php 
                $sql="SELECT ID_Menu, Descripcion FROM menus WHERE Estado=1";
                $sesion=mysql_query($sql); 
                if(mysql_num_rows($sesion)>0)
                {
                    while($sesionON=mysql_fetch_array($sesion))
                    {
                        ?>
                         <option value="<?php echo $sesionON['ID_Menu']; ?>"><?php echo $sesionON['Descripcion']; ?></option>        
                        <?php
                    }
                }
                ?>  
            </select>
        </fieldset>
		<fieldset>
			Descripcion<br>
			<center><input type="text" required="required"  id="DescripcionPlatillo" name="DescripcionPlatillo"></center>
		</fieldset>
		<fieldset>
			Componentes<br>
			<center><textarea id="Componentes" required="required" name="Componentes" style="resize:horizontal;" rows="5px" cols="50px"></textarea></center>
		</fieldset>
		<fieldset>
			Valorización<br>
			<select id="Valorizar" name="Valorizar">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                       <option value="5">5</option>
                    </select>
		</fieldset>
        <fieldset>
			Categoria<br>
            <select id="Categoria" name="Categoria">
                          <option value="Pizzas">Pizzas</option>
                           <option value="Ensaladas">Ensaladas</option>
                            <option value="Pastas">Pastas</option>
                            <option value="Sopas">Sopas</option>
                            <option value="Guisos">Guisos</option>
             </select>
		</fieldset>
        <fieldset>
			Imagen<br>
			<center><input type="file" name="filePlatillo" id="filePlatillo"></center>
		</fieldset>
         <fieldset>
			Precio<br>
			<center><input type="text" id="Precio" name="Precio"></center>
		</fieldset>
		<center><input type="submit" name="accion" value="Enviar" class="aceptar"></center>
<br /><br />
<hr />
<br /><br />
		<center><h1>Agregar un nuevo Usuario</h1></center>
	<form action="procesos/altaplatillo.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Nombre<br>
			<center><input type="text"  id="DescripcionPlatillo" name="DescripcionPlatillo" placeholder="Juan" required="required"></center>
        </fieldset>
		<fieldset>
			Apellido<br>
			<center><input type="text"  id="DescripcionPlatillo" name="DescripcionPlatillo" placeholder="Perez" required="required"></center>
        </fieldset>
		<fieldset>
			Email<br>
			<center><input type="text"  id="DescripcionPlatillo" name="DescripcionPlatillo" placeholder="juanperez@hotmail.com" required="required"></center>
		</fieldset>
		<fieldset>
			Contraseña por defecto<br>
			<center><input type="password"  id="DescripcionPlatillo" name="DescripcionPlatillo" required="required"></center>
		</fieldset>
		<center><input type="submit" name="accion" value="Enviar" class="aceptar"></center>
	</form>	
</body>
</html>