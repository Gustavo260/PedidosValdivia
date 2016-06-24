<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de usuarios</title>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type='text/javascript' src="../js/funciones.js"></script>
<link href="estilos/estilosCSS3.css" rel="stylesheet" type="text/css" />
<?php 
	require("../basedatos/conexion_bd.php");
	require("funciones.php");
	session_start();
?>
<style type="text/css">
.caja
{
	background:white;
	color:black;
	float:left;
	width:150px;
	height:280px;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:10px;
	margin-left:5%;
}
.contenedor
{
	background:white;
	width:580px;
	height:580px auto;
	margin:auto;		
}

</style>
</head>

<body>

<div class="contenedor" style="background-color:#ECF1F2">	
	<?php	
		$restaurante=$_GET['restaurante'];
		$sqlBusqueda="SELECT Menus.Descripcion as menu, platillos.ID_Platillo, platillos.Descripcion as Platillo, platillos.Costo, platillos.Imagen as Imagen FROM platillos JOIN menus ON platillos.ID_Menu=menus.ID_Menu WHERE platillos.ID_Menu and menus.ID_Restaurante=".$restaurante;
		$resp=mysql_query($sqlBusqueda); 
		if(mysql_num_rows($resp)>0)
		{
			$numeromenu=1;
			while($row2=mysql_fetch_array($resp))
			{
				if($numeromenu	!=$row2['menu'])
				{
	?>	    	  
    				<div style="margin-left:6%;"><p><b><h3><u><?php echo $row2['menu']; ?></u></h3></b></p></div>
                <?php
				}
				$numeromenu=$row2['menu'];
				?>
                <div class="caja" style="margin-bottom:5%;">
                    <h2><?php echo $row2['Platillo']; ?></h2>
                    <img src="<?php echo $row2['Imagen']; ?>" width="140px" height="100px" />
                    <p>$<?php echo $row2['Costo']; ?></p>  
					<?php $detalle=$row2['ID_Platillo']; ?>
                    <!-- <input type="button" href="#openmodal" value="Detalle" id="platillo<?php //echo $row2['ID_Platillo']; ?>" name="platillo<?php //echo $row2['ID_Platillo']; ?>" /> -->
					<a id="cargaModal" href="javascript:openDetalle(<?php echo $detalle; ?>)" class="open">Detalle</a>
                    <?php
						$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
						$sesion=mysql_query($sql); 
						if($_SESSION)
						{
					?>
                    		 <input type="button" class="claseagregar" value="Agregar" data-id="<?php echo $row2['ID_Platillo']; ?>" id="platillo" name="platillo" />	
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
<!-- MIS MODALES -->
		<div class="ventanaDetalle">
			<h1>Pedidos Valdivia</h1>
			<div class="formDetalle">
				<div class="cerrarDetalle"><a href="javascript:closeDetalle();">Cerrar X</a></div>
				<h1>Login</h1>
				<hr>
				<form method="post" name="form2" id="form2" action="procesos/autentificacion.php">
                    <br />
					ID <input type="text" id="ID" name="ID" value="" />
					<script>var ID=$("#ID").val();</script>
					<?php $ELID="<script> document.write(ID); </script>"; ?>
					COMPROBAR <input type="text" id="IDc" name="IDc" value="<?php echo "ID = ".$ELID; ?>" />
                    <table width="200" border="0" align="center">
                      <tr>
                        <th scope="col">Iniciar Sesion</th>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="50" align="center"><div class="input-prepend" style="margin-left:25%;">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="span2" type="text" id="txtEmail" name="txtEmail" width="250px" required="required" placeholder="Email" />
                      </div></td>
                      </tr>
                      <tr>
                       <td height="50" align="center"><div class="input-prepend" style="margin-left:25%;">
                        <span class="add-on"><i class="icon-key"></i></span>
                        <input class="span2" type="password"  width="250px" id="txtClave" required="required" name="txtClave" placeholder="Contraseña" />
                      </div></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                         <td align="center"><button class="sesion" data-id="btnSesion" name="btnSesion" id="btnSesion" style="background:url(recursos/botonregistro.png)" type="submit">Ingresar</button></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    </form>
                  
			</div>
	</div>
		
<!-- FIN MODALES -->
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {	
				$(".claseagregar").click(function(event) {
					var id=$(this).attr('data-id');
					$.post('procesos/cargaCompras.php',{Id:id},function(a)
					{	
						location.reload("inforestaurante.php");
					}
				);
				});		
			});
		</script>
</html>