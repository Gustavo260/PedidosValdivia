<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery.js"></script>
 <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="estilos/estilosCSS3.css" rel="stylesheet" type="text/css" />
<link href="estilos/modales.css" rel="stylesheet" type="text/css" />
</head>

<script> 
function abrir(url) { 
open('popupRegistro.php','','top=300,left=300,width=300,height=300') ; 
} 
</script> 
<script> 
function abrir2(url) 
{ 
	open('popupSesion.php','','top=300,left=300,width=300,height=300') ; 
} 

function refresh()
{
   var pagina="index.php"
   location.href=pagina
}

function openVentana()
{
   $(".ventana").slideDown(4000);
}

function openVentanaRegistro()
{
   $(".ventanaModal").slideDown(4000);
}

function closeVentana()
{
	$(".ventana").slideUp("fast");
	$(".ventanaModal").slideUp("fast");
}

function sesion()
{		
	 var email=$("#txtEmail").val();
	 var clave=$("#txtClave").val();
	 $.post('procesos/autentificacion.php',{
	 Email:email,
	 Clave:clave
	 },function(e){
			location.href="index.php";	
	 });		
}

		
</script> 

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
        	<table border="1" align="right">
			<tr><td><font color="#FFFFFF"><a href="javascript:openVentanaRegistro()" onclick="localize()">Registrate </a></font></td><td><font color="#FFFFFF"><a href="javascript:openVentana()">Ingresar</a></font></td></tr>
</table>
        <?php
	}
?>
<br />
<style>

body
	{
		background:url(recursos/fondo.png);
		no-repeat top;
		background-size:1370px 800px;
	}
	p
	{
		color:white;
	}
.menuaccion
	{
	background-color:#000;
	opacity:0.5;
	
	border:1px solid #E2E2E2; 
	
	}
	.cosa
	{
		padding-top:20px;
	background-color:#000 transparent;
	height:90%;
	padding-left:10px;
	width:400px;
	
	
	}
	.trans {
    opacity: 0.5;
	}
	.trans2 {
    opacity: 1;
	}
	.menucomplemento
	{
	
	position:static;
	color:black;
	margin-top:10%;
	top:0px;
	bottom:0px;
	right:0px;
	left:0px;
	position:relative;
	background-color: transparent;
	}
	.boxi
	{
	background-color: transparent;
	position:static;
	color:black;
	width:25%;
	height:10%;
	top:0px;
	bottom:0px;
	right:0px;
	left:0px;
	position:relative;
	}
	.container-4{
  overflow: hidden;
  width: 300px;
  vertical-align: middle;
  white-space: nowrap;
}

.container-4 input#txtLocalizacion{
  width: 300px;
  height: 50px;
  background: #2b303b;
  border: none;
  font-size: 10pt;
  
  color: #fff;
  padding-left: 15px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.container-4 input#txtLocalizacion::-webkit-input-placeholder {
   color: #65737e;
}
 
.container-4 input#txtLocalizacion:-moz-placeholder { /* Firefox 18- */
   color: #65737e;  
}
 
.container-4 input#txtLocalizacion::-moz-placeholder {  /* Firefox 19+ */
   color: #65737e;  
}
 
.container-4 input#txtLocalizacion:-ms-input-placeholder {  
   color: #65737e;  
}

.container-4 button.icon{
  -webkit-border-top-right-radius: 5px;
  -webkit-border-bottom-right-radius: 5px;
  -moz-border-radius-topright: 5px;
  -moz-border-radius-bottomright: 5px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
 
  border: none;
  background: #232833;
  height: 50px;
  width: 50px;
  color: #4f5b66;
  opacity: 0;
  font-size: 10pt;
 
  -webkit-transition: all .55s ease;
  -moz-transition: all .55s ease;
  -ms-transition: all .55s ease;
  -o-transition: all .55s ease;
  transition: all .55s ease;
}

.container-4:hover button.icon, .container-4:active button.icon, .container-4:focus button.icon{
  outline: none;
  opacity: 1;
  margin-left: -76px;
  margin-bottom:13px;
}
 
.container-4:hover button.icon:hover{
  background: white;
}
</style>


<form action="restaurantes.php" method="POST">
	<div class="boxi" style=" margin-left:40%; margin-top:7%;"><h1> <img src="recursos/logonuevo.png" width="250" height="55" id="Insert_logo" /><h1></div><div class="boxi" style=" margin-left:40%;"></h1> <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tus restaurantes mas cercanos</b></p></div>
  
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="menucomplemento">
<div class="box">
  <div class="container-4" style="margin-left:38%;">
    <input type="search"  id="txtLocalizacion" name="txtLocalizacion" placeholder="ej: German Saelzer #40" />
    <button class="icon" id="btnBuscar" name="btnBuscar" type="submit"><i class="fa fa-search"></i></button>
  </div>
</div>
</div>
 <div class="boxi" style=" margin-left:40%; margin-top:10%;"><p><b>Proximamente también para celulares</b></p></div>
</form>


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
                        <td height="50" align="center"><div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="span2" type="text" id="txtEmail" name="txtEmail" width="250px" required="required" placeholder="Email" />
                      </div></td>
                      </tr>
                      <tr>
                       <td height="50" align="center"><div class="input-prepend">
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
                                <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" id="txtNombre" name="txtNombre" width="250px" placeholder="Nombre" /></div></td>
                              </tr>
                              <tr>
                               <td height="50" align="center">
                               <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                               <input type="text" width="250px" id="txtApellido" name="txtApellido" placeholder="Apellido" /></div></td>
                              </tr>
                              <tr>
                               <td height="50" align="center"><div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                               <input type="email" width="250px" id="txtEmail" name="txtEmail" placeholder="Email" /></div></td>
                              </tr>
                              
                              <tr>
                                <td height="50" align="center"><div class="input-prepend">
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
   
</body>
</html>