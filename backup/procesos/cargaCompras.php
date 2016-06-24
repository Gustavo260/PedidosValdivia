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

<?php
	session_start();
	if(isset($_SESSION['carrito'])){
		if(isset($_POST['Id'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_POST['Id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$re=mysql_query("SELECT Descripcion, Imagen, Costo FROM platillos WHERE ID_Platillo=".$_POST['Id']);
						while ($f=mysql_fetch_array($re)) {
							$Imagen=$f['Imagen'];
							$nombre=$f['Descripcion'];
							$precio=$f['Costo'];
						}
						$datosNuevos=array('Id'=>$_POST['Id'],
										'Imagen'=>$Imagen,
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}else{
		?>
<link href="estilosCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div>	
        <?php
		if(isset($_POST['Id']))
		{
			$Imagen="";
			$nombre="";
			$precio=0;
			$re=mysql_query("SELECT Descripcion, Imagen, Costo FROM platillos WHERE ID_Platillo=".$_POST['Id']);
			while ($f=mysql_fetch_array($re)) {
				$Imagen=$f['Imagen'];
				$nombre=$f['Descripcion'];
				$precio=$f['Costo'];
			}
			$arreglo[]=array('Id'=>$_POST['Id'],
							'Imagen'=>$Imagen,
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
		else
		{
			echo "<table align='center'><tr><td>No hay pedidos</td></tr></table>";
		}
		
	}
?>

</head>
<body>
<div>	
 <?php
$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
$sesion=mysql_query($sql); 
if(mysql_num_rows($sesion)>0)
{
					?>
  <table width="200" border="0" align="center">
  <tr>
    <th scope="col">Mis Pedidos</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <?php
  			$restaurante=$_GET['restaurante'];
			$envio=$_GET['envio'];
			$total=0;
			if(isset($_SESSION['carrito']))
			{
				$datos=$_SESSION['carrito'];
			
				$total=0;
				for($i=0;$i<count($datos);$i++)
				{
				
  ?>
  				<tr>
					<td>
						Nombre: <?php echo $datos[$i]['Nombre'];?>
					</td>     
				</tr>
                <tr>
					<td>
						Precio: <?php echo $datos[$i]['Precio'];?>
					</td>     
				</tr>
                 <tr>
					<td>
						Cantidad: <input type="text" width="1" maxlength="2" readonly="readonly" size="1"  value="<?php echo $datos[$i]['Cantidad'];?>"
                        data-precio="<?php echo $datos[$i]['Precio'];?>"
						data-id="<?php echo $datos[$i]['Id'];?>"
						class="cantidad">
					</td>     
				</tr>
                 <tr>
					<td> 
						<span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span>
					</td>     
				</tr>
                 <tr>
					<td>
						------------------------------------
                        <?php $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total; ?>
					</td>     
				</tr>
  <?php
				}
			}
					
  ?>
  <?php
  if($total!=0)
  {
	  ?>
   <tr>
					<td>
						Costo de envio: <?php echo $envio;?>
					</td>     
				</tr>
  <tr><td><?php $total=$total+$envio; echo "Total: ".$total; ?></td></tr>
   <tr><td><br /><?php if($total!=0){
					echo '<center><a href="pedidosconfirmados.php?txtRestaurante='.$restaurante.'" class="aceptar">Comprar</a></center>';
			} ?></td></tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
}
else
{
	echo "<br><br><br><br><table align='center'><tr><td align='center'>Seccion no disponible para usuarios no registrados</td></tr></table>";
}
?>
</div>
</body>
<!-- FUNCIONES JQUERY -->
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
<script type="text/javascript">
var inicio=function () {
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
}
$(document).on('ready',inicio);
</script>
</html>