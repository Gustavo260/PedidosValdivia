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
		<center><input type="submit" id="btnAgregarRestaurante" name="btnAgregarRestaurante" value="Enviar" class="aceptar"></center>
        </fieldset>
	</form>	
</body>
</html>