<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pedidos Valdivia</title>
 	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href="estilos/estilosCSS3.css" rel="stylesheet" type="text/css" />
    <link href="estilos/estilos.css" rel="stylesheet" type="text/css" />
	<link href="estilos/modales.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/funciones.js"></script> 
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type='text/javascript'> window.onload = detectarCarga; function detectarCarga(){ document.getElementById("imgLOAD").style.display="none"; }</script>
</head>

<?php
	require("basedatos/conexion_bd.php");
	require("procesos/funciones.php");
	session_start();
?>
<body>

<?php
	$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
	$sesion=mysql_query($sql); 
	if($_SESSION)
	{
			?>
			<?php //echo $row2['Nombre']." ".$row2['Apellido'];?>
            <?php
					if($_SESSION['Perfil']=="2")
					{
						?>
                        	 <a href="admin/adminPanel.php" class="aceptar">Admin Panel</a>
                        <?php
					}
					
			?>    
           
               <form action="procesos/autentificacion.php" method="POST">
                <input type="hidden" id="txtUser" name="txtUser" value="<?php echo $usuario; ?>" />
			    <button name="btnCierre" id="btnCierre" class="btn" type="submit"><span class="glyphicon glyphicon-search"></span>Desloguear</button></form>
                 
            <?php
					
		
	}
	else
	{
		
		?>
        <!-- ingresar y registrarse -->
       		<div class="contenedor">
            	<div class="panelIR">
                	<p><font color="#FFFFFF"><a href="javascript:openVentanaRegistro()">Registrate </a></font>
                    <font color="#FFFFFF"><a href="javascript:openVentana()">Ingresar</a></font></p>
                </div>
            </div>
        <!-- fin -->
        <?php
	}
?>

<!-- Cuerpo de la pagina -->
		<div class="logo">
        		<p><h1>Pedidos Valdivia</h1></p>
                <p>Tus restaurantes mas cercanos</p> 
        </div>
        <div id='imgLOAD' style="TEXT-ALIGN: center"><IMG src="recursos/loading.gif"></div>
        <div class="buscador">
        			<center>
  					<div class="container-4">
                    	<form action="restaurantes.php" method="POST">
   						  <input type="search"  id="txtLocalizacion" name="txtLocalizacion" placeholder="ej: German Saelzer #40" />
   						  <button class="icon" id="btnBuscar" name="btnBuscar" type="submit"><i class="fa fa-search"></i></button>
                        </form>
 				    </div>
					</center>
        </div>
        
        <div>
        	<p class="seudofooter"><b>Proximamente también para celulares</b></p>
        </div>   
<!-- Fin -->

    <!-- MIS MODALES -->
	<div class="ventana">
			<h1>Pedidos Valdivia</h1>
			<div class="form">
				<div class="cerrar"><a href="javascript:closeVentana();">Cerrar X</a></div>
				<h1>Login</h1>
				<hr>
				<form method="post" name="form2" id="form2" action="procesos/autentificacion.php">
                    <br />
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
     <!-- Registro de usuario -->
    <div class="ventanaModal">
			<h1>Pedidos Valdivia</h1>
			<div class="formModal" style="height:450px">
				<div class="cerrar"><a href="javascript:closeVentana();">Cerrar X</a></div>
				<h1>Registro</h1>
				<hr>
                	<form method="post" name="form3" id="form3" action="procesos/procesos.php">
                            <table width="200" border="0" align="center">
                              <tr>
                                <th scope="col">Registratro de usuario</th>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="50" align="center">
                                <div class="input-prepend" style="margin-left:15%;">
                        <span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" id="txtNombre" name="txtNombre" width="250px" placeholder="Nombre" /></div></td>
                              </tr>
                              <tr>
                               <td height="50" align="center">
                               <div class="input-prepend" style="margin-left:15%;">
                        <span class="add-on"><i class="icon-user"></i></span>
                               <input type="text" width="250px" id="txtApellido" name="txtApellido" placeholder="Apellido" /></div></td>
                              </tr>
                              <tr>
                               <td height="50" align="center"><div class="input-prepend" style="margin-left:15%;">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                               <input type="email" width="250px" id="txtEmail" name="txtEmail" placeholder="Email" /></div></td>
                              </tr>
                              
                              <tr>
                                <td height="50" align="center"><div class="input-prepend" style="margin-left:15%;">
                        <span class="add-on"><i class="icon-key"></i></span>
                                <input type="password" width="250px" id="txtClave" name="txtClave" placeholder="Contraseña" /></div></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                 <td align="center"><input type="submit" id="btnRegistro" name="btnRegistro" style="background:url(recursos/botonregistro.png)" value="Registrarme"  /></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table>
                    </form>
                    <?php
					if(isset($_GET["respuesta"]))
					{
						echo '<script>alert("'.$_GET["respuesta"].'");</script>';  
					}
					?>
			</div>
	</div>
	
    <div id='loading' hidden="true"><img src='recursos/loading.gif' style='margin:0 auto; position: absolute; top: 50%; left: 50%; margin: -30px 0 0 -30px;'></div>
   <script type='text/javascript'>
		$(document).ready(function(){
        $("#loading").css("display","none");
		});

		$(".load").click(function(event){
		$("#loading").css("display","block");
		});
		</script>
</body>
</html>