<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClI2HojkcEtpd1yNXYHZSneWHQkmnl3pw&&libraries=geometry,places,spherical&sensor=true"></script>

</head>
<style type="text/css">
.cont {
  width: 93%;
  max-width: 350px;
  text-align: center;
  margin: 4% auto;
  padding: 30px 0;
  background: #111;
  color: #EEE;
  border-radius: 5px;
  border: thin solid #444;
  overflow: hidden;
}

hr {
  margin: 20px;
  border: none;
  border-bottom: thin solid rgba(255,255,255,.1);
}

div.title { font-size: 2em; }

h1 span {
  font-weight: 300;
  color: #Fd4;
}

div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>



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


function infolog()
{
	if($_SESSION)
	{ 
			echo $_SESSION['Nombre'];?>&nbsp;<?php
			echo $_SESSION['Apellido']; 
	}
    if($_SESSION)
	{
		?>
            <form action="procesos/autentificacion.php" method="POST">
            <input type="hidden" id="txtUser" name="txtUser" value="<?php echo $usuario; ?>" />
            <button name="btnCierre" id="btnCierre" class="btn" type="submit">Desloguear</button></form> 
      	<?php
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
		if($_SESSION)
		{	
				$usuario=$_SESSION['ID_Usuario'];
				$sqlBus="SELECT usuarios.Nombre, usuarios.Apellido, sesiones.ID_Perfil as perfil FROM usuarios JOIN sesiones ON usuarios.ID_Usuario=sesiones.ID_Usuario WHERE sesiones.ID_Usuario=".$usuario." AND sesiones.ID_Perfil=2";
				$sesionIniciada=mysql_query($sqlBus); 
				if($_SESSION['Perfil']=="2")
				{
					?>
					<?php echo $_SESSION['Nombre']." ".$_SESSION['Apellido'];?>
						
					<form action="index.php" method="POST">
					<input type="hidden" id="txtUser" name="txtUser" value="<?php echo $usuario; ?>" />
					<button name="btnCierre" id="btnCierre" style="background:url(recursos/botonregistro.png)" type="submit">Desloguear</button></form> 
					<?php
				}
				else
				{
					header("Location: ../index.php");
					
				}
		}
		else
		{
			?><p>Bienvenido</p><?php 
		}
}
function checkHora($iniTemp, $finTemp, $iniTarde, $finTarde, $horaActual) 
{ 
		$iniTemp_p1 = strtotime($iniTemp); 
		$finTemp_p1 = strtotime($finTemp); 
												
		$iniTarde_p2 = strtotime($iniTarde); 
		$finTarde_p2 = strtotime($finTarde);
																					
		$horaActual = strtotime($horaActual); 
												
		return ((($horaActual >= $iniTemp_p1) && ($horaActual < $finTemp_p1) || ($horaActual >= $iniTarde_p2) && ($horaActual < $finTarde_p2))); 
}

function cargarRestaurantes()
{			
		if(isset($_POST["btnBuscar"]))
		{	
			$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo, Map FROM Restaurantes JOIN sectores ON restaurantes.ID_Sector=sectores.ID_Sector WHERE restaurantes.Hubicacion LIKE '%".$_POST['txtLocalizacion']."%' AND restaurantes.Estado=1";
			?>
			
            <?php
		}
		else
		{
			if(!isset($_GET["btnFiltro"]))
			{
				$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Estado=1 LIMIT 4";
			}
			else
			{
				//Se reciven los filtros
				$Comida=$_GET['Comidas'];
				$Valor=$_GET['Valor'];
				$PedidoMinimo=$_GET['Precio'];
				$Ubicacion=$_GET['Ubicacion'];
				if($Comida=="Todos" && $Valor=="Todos" && $PedidoMinimo=="Todos" && $Ubicacion=="Cualquiera") //TODOS POR DEFECTO
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes  WHERE Estado=1 LIMIT 4";
				}
				elseif($Comida!="Todos" && $Valor!="Todos" && $PedidoMinimo!="Todos" && $Ubicacion!="Cualquiera") //TODOS DISTINTOS
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Tipo_Comida='".$Comida."' AND Rating='".$Valor."' AND Pedido_minimo".$PedidoMinimo." AND Hubicacion LIKE '%".$Ubicacion."%'  AND Estado=1 LIMIT 4";
				}
				elseif($Comida=="Todos" && $Valor=="Todos" && $PedidoMinimo=="Todos" && $Ubicacion!="Cualquiera") //SOLO UBICACION
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Hubicacion LIKE '%".$Ubicacion."%' AND Estado=1";
				}
				elseif($Comida=="Todos" && $Valor!="Todos" && $PedidoMinimo!="Todos" && $Ubicacion!="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Rating='".$Valor."' AND Pedido_minimo".$PedidoMinimo." AND Hubicacion LIKE '%".$Ubicacion."%' AND Estado=1 LIMIT 4";
				}
				
				elseif($Comida!="Todos" && $Valor=="Todos" && $PedidoMinimo!="Todos" && $Ubicacion!="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Tipo_Comida='".$Comida."' AND Pedido_minimo".$PedidoMinimo." AND Hubicacion LIKE '%".$Ubicacion."%' AND Estado=1 LIMIT 4";
				}
				
				elseif($Comida!="Todos" && $Valor!="Todos" && $PedidoMinimo=="Todos" && $Ubicacion!="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Tipo_Comida='".$Comida."' AND Rating='".$Valor."' AND Hubicacion LIKE '%".$Ubicacion."%' AND Estado=1 LIMIT 4";
				}
				
				elseif($Comida!="Todos" && $Valor!="Todos" && $PedidoMinimo!="Todos" && $Ubicacion=="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Tipo_Comida='".$Comida."' AND Rating='".$Valor."' AND Estado=1 LIMIT 4";
				}
				elseif($Comida!="Todos" && $Valor=="Todos" && $PedidoMinimo=="Todos" && $Ubicacion=="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Tipo_Comida='".$Comida."' AND Estado=1 LIMIT 4";
				}
				elseif($Comida=="Todos" && $Valor=="Todos" && $PedidoMinimo!="Todos" && $Ubicacion=="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Pedido_minimo".$PedidoMinimo." AND Estado=1 LIMIT 4";
				}
				elseif($Comida=="Todos" && $Valor!="Todos" && $PedidoMinimo=="Todos" && $Ubicacion=="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Rating='".$Valor."' AND Estado=1 LIMIT 4";
				}
				elseif($Comida!="Todos" && $Valor!="Todos" && $PedidoMinimo=="Todos" && $Ubicacion=="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Tipo_Comida='".$Comida."' AND Rating='".$Valor."' AND Estado=1 LIMIT 4";
				}
				elseif($Comida=="Todos" && $Valor=="Todos" && $PedidoMinimo!="Todos" && $Ubicacion!="Cualquiera")
				{
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Hubicacion LIKE '%".$Ubicacion."%' AND Pedido_minimo".$PedidoMinimo." AND Estado=1 LIMIT 4";
				}	
				elseif($Comida=="Todos" && $Valor!="Todos" && $PedidoMinimo!="Todos" && $Ubicacion=="Cualquiera")
				{	
					$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE Rating='".$Valor."' AND Pedido_minimo".$PedidoMinimo." AND Estado=1 LIMIT 4";
				}			
			}
		}
		$resp=mysql_query($sqlBusqueda) or die("Sql:".$sqlBusqueda); 
		if(mysql_num_rows($resp)>0)
		{
			while($row2=mysql_fetch_array($resp))
			{
				?>                              
					<section> 
                    <!-- NODOS -->
                    <div class="caja" style="background-color:rgba(255,255,255,1); border:1px solid #999;">
                    <form id="form<?php echo $row2['ID_Restaurante']; ?>" name="form<?php echo $row2['ID_Restaurante']; ?>" method="get" action="inforestaurante.php?txtLocalizacion=<?php echo $_GET['txtLocalizacion'];?>&estado=<?php echo $estado; ?>">  
                    <table width="614" height="25" border="0">
                        <tr>
                        <td width="100" align="center"><center>&nbsp;&nbsp;<img style="border:10px outset dashed;" src="<?php echo $row2['Imagen']; ?>" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" width="100px" height="100px"></center></td>
                            <td width="441">
                                <table>
                                    <tr><td align="left" colspan="2"><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;<?php echo $row2['Nombre']; ?></h4></td><td></td></tr>
                                    <tr>
                                      <td colspan="2">
                                      <?php 
									  	//MINI SISTEMA DE RATING BAR
									  	if($row2['Rating']==$row2['Rating'])
										 {
											$estrellastotales=5;
											$estrellasRellenas=$row2['Rating'];
											$estrellasVacias=$estrellastotales-$row2['Rating'];
											$contador=6;
											for($i=1;$i<=$estrellastotales;$i++) //estrellas rellenas
											{
												$contador--;
												if($contador>=$estrellasRellenas)
												{
												?>	
												<input class="star star-<?php echo $contador; ?>" id="star-<?php echo $contador; ?>-2" type="radio" checked="checked" disabled="disabled" name="star"/>
												<label class="star star-<?php echo $contador; ?>" for="star-<?php echo $contador; ?>-2"></label>
												<?php
												}
												else
												{
												?>
												<input class="star star-<?php echo $contador; ?>" id="star-<?php echo $contador; ?>-2" type="radio" disabled="disabled" name="star"/>
												<label class="star star-<?php echo $contador; ?>" for="star-<?php echo $contador; ?>-2"></label>
												<?php
												}
											}
										}
										//FIN DEL SISTEMA
									  ?>
                                      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
                                     </td><td colspan="2" align="center">
                                      <link href="estilos/estilosCSS3.css" rel="stylesheet" type="text/css">
                                      <button type="submit" style=" height:50px; width:100px;" class="btn" id="btnRestaurante" name="btnRestaurante">Buscar <i class="fa fa-search"></i></button>
                                      <input type="hidden" id="txtRestaurante" name="txtRestaurante" value="<?php echo $row2['ID_Restaurante']; ?>"></td><td width="6"></td></tr>
                                      <?php
									  		//SISTEMA VALIDADOR DE HORARIOS DE RESTAURANTES
											date_default_timezone_set('America/Santiago');
											
											$dia=date("l");
											if($dia=="Monday" || $dia=="Tuesday" || $dia=="Wednesday" || $dia=="Thursday" || $dia=="Friday")
											{
									  		$sqlHorario="SELECT Dias, primer_horario as temprano, segundo_horario as tarde FROM horarios_restaurantes WHERE Dias='Lunes/Viernes' AND ID_Restaurante=".$row2['ID_Restaurante'];
											}
											elseif($dia=="Saturday")
											{
												$sqlHorario="SELECT Dias, primer_horario as temprano, segundo_horario as tarde FROM horarios_restaurantes WHERE Dias='Sabados' AND ID_Restaurante=".$row2['ID_Restaurante'];
											}
											elseif($dia=="Sunday")
											{
												$sqlHorario="SELECT Dias, primer_horario as temprano, segundo_horario as tarde FROM horarios_restaurantes WHERE Dias='Domingos' AND ID_Restaurante=".$row2['ID_Restaurante'];
											}
											
											
											$respHorario=mysql_query($sqlHorario);
											$rowHorario=mysql_fetch_array($respHorario);
											
											
											$hora=date("G:i");		  //Obtiene hora actual de España
											$horaInt=((int)$hora); //Hora en valor entero y se le resta la diferencia entre horario de Chile y España
											$horaActual=$horaInt.":".date("i"); //Hora completa actual
											
											//Horario Temprano
											$HorarioTemprano=$rowHorario['temprano'];
											if($HorarioTemprano=="null" || $HorarioTemprano==""){ $HorarioTemprano="00:00/00:00"; }else{ $HorarioTemprano=$rowHorario['temprano']; }
											$porcionTemp = explode("/", $HorarioTemprano);
											$horaIniTemp=$porcionTemp[0];
											$horaFinTemp=$porcionTemp[1];
											
											//Horario Tarde
											$HorarioTarde=$rowHorario['tarde'];
											if($HorarioTarde=="null" || $HorarioTarde==""){ $HorarioTarde="00:00/00:00"; }else{ $HorarioTarde=$rowHorario['tarde']; }
											$porcionTarde = explode("/", $HorarioTarde);
											$horaIniTarde=$porcionTarde[0];
											$horaFinTarde=$porcionTarde[1];		
									  ?>
                                    <tr><td width="133"><?php if(checkHora($horaIniTemp,$horaFinTemp,$horaIniTarde,$horaFinTarde,$horaActual)){?> <img src="recursos/restaurantes/Estado/btn1.png" width="50px" height="25px" /> <?php $estado='Abierto'; }else{?> <img src="recursos/restaurantes/Estado/btn2.png" width="50px" height="25px" /> <?php $estado='Cerrado'; } ?></td><td width="166">$<?php echo $row2['envio']; ?></td><td width="118">$<?php echo $row2['minimo']; ?><input type="hidden" id="estado" name="estado" value="<?php echo $estado; ?>" /></td></tr>
                                    <tr><td>Estado</td><td>Costo de envio</td><td>Pedido Minimo</td></tr>
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
                    <!-- Fin repetidor!! -->
                <?php
			}
		}
		else
		{
			echo "No se encontraron resultados...";
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