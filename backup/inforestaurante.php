<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	require("conexion_bd.php");
	require("funciones.php");
	include("menus.css");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="estilosCSS.css" rel="stylesheet" type="text/css" />
   	<link href="menus.css" rel="stylesheet" type="text/css" />
   
</head>
<style type="text/css">
.caja
{
	background:#ECF1F2;
	color:black;
	float:center;
	width:614px;
	height:170px;
	text-align:center;
	
}
</style>

<!-- VARIABLES DE ENTRADA -->

<?php
	$ID_Restaurante=$_GET['txtRestaurante'];
	$sql="SELECT Nombre FROM `restaurantes` WHERE ID_Restaurante=".$ID_Restaurante;
	$respuesta=mysql_query($sql); 
	$row=mysql_fetch_array($respuesta);			
?>
<body bgcolor="#ECF1F2">
<!-- Header -->
	<div id="header">
    	<table border="0" bordercolordark="#000000" width="100%">
            <tr>
            	<td width="82%">
            		<img src="recursos/cooltext138285584887145.png" width="202" height="55" id="Insert_logo" /> 
           	    </td>
                <td> <div class="carrito"><a href="historialpedidos.php?txtRestaurante=<?php echo $ID_Restaurante; ?>"><img src="recursos/icon_shopcart.png" width="40px" /></a></div></td>
           	    <td width="18%" align="center"><?php login(); ?></td>
            </tr>
            <tr>
            	<td>
                <?php
				$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE ID_Restaurante=".$ID_Restaurante;
				$resp=mysql_query($sqlBusqueda); 
				if(mysql_num_rows($resp)>0)
				{
					while($row2=mysql_fetch_array($resp))
					{
						$envio=$row2['envio'];
						?>               	                	
							<!-- NODOS -->
							<div style="color:white">
							<table width="614" height="25" border="0">
								<tr>
								<td width="100"><center><img src="<?php echo $row2['Imagen']; ?>" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" width="120px" height="100px"></center></td>
									<td width="441">
										<table>
											<tr><td align="left" colspan="2"><h4><?php echo $row2['Nombre']; ?></h4></td></tr>
											<tr><td width="133">0Km</td><td width="166">$<?php echo $row2['envio']; ?></td><td width="118">$<?php echo $row2['minimo']; ?></td></tr>
											<tr><td>Distancia</td><td>Costo de envio</td><td>Pedido Minimo</td></tr>
										</table>
									</td>       
								</tr>
							</table>		
                   		 	</div>
                     <!-- FIN NODOS -->
                   
                    
                    <!-- Fin repetidor!! -->
                <?php
					}
				}
					?>
                </td>
            </tr>
   	    </table>
    	</div>
       
   
<!-- Fin encabezado --> 

<!-- Contenido de la pagina -->
	<div id="general">
    	<div id="ofertas">
        	 
        </div> 
        <div id="novedades">
        	<div class="menudes">
                  <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a class="btnMenu" href="CargaMenus.php">Menu</a></li>
                    <li><a class="btnInfo" href="maps.php">Información</a></li>
                    <li><a href="">Comentarios</a></li>
                    <div class="marca"></div>
                 </ul>
 			 </div>
        </div>
        <div id="body">
        	
        </div>
    </div>
<!-- Fin contenido de la pagina -->  

<!-- Pie de pagina -->
	<div id="footer" style="margin-top:50px auto;">
    	 <table align="center">
        	<tr><td align="center" colspan="2">Contactanos</td></tr>
   			<tr><td align="center" colspan="2"><hr /></td></tr>
            <tr><td>Email: contacto@pedidosvaldivia.com &nbsp; &nbsp;</td><td>Fono:(2) 9 571 83 27</td></tr>
        </table>
    </div>
<!-- Fin Pie de pagina -->  
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {
				
				$("#body").load('CargaMenus.php?restaurante=<?php echo $ID_Restaurante; ?>');
				$("#ofertas").load('CargaCompras.php?restaurante=<?php echo $ID_Restaurante; ?>&envio=<?php echo $envio; ?>');
				
				$(".btnMenu").click(function(event) {
					event.preventDefault();
					$("#body").load('CargaMenus.php?restaurante=<?php echo $ID_Restaurante; ?>').slideDown(1000);
					$("#body").css("visibility","visible");					
				});
				
				$(".btnInfo").click(function(event) {
					event.preventDefault();
					$("#body").load('maps.php?restaurante=<?php echo $ID_Restaurante; ?>').slideDown(1000);
					$("#body").css("visibility","visible");					
				});
				
				$("#boton2").click(function(event) {
					$("#registros").load('popupSesion.php');
					
				});
				
				$(".cantidad").keyup(function(e){
					if($(this).val()!=''){
						if(e.keyCode==13){
							var id=$(this).attr('data-id');
							var precio=$(this).attr('data-precio');
							var cantidad=$(this).val();
							$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
							$.post('modificarDatos.php',{
								Id:id,
								Precio:precio,
								Cantidad:cantidad
							},function(e){
									$("#total").text('Total: '+e);
							});
						}
					}
					
				});
			});
		</script>

</html>