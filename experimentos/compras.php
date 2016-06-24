<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de usuarios</title>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php 
	require("../basedatos/conexion_bd.php");
	require("funciones.php");
	session_start();
?>

<?php
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
<link href="../estilos/estilosCSS.css" rel="stylesheet" type="text/css" />
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
if($_SESSION)
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
				$reserva=1;
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
						Cantidad: <input type="text" width="1" maxlength="2"  size="1"  value="<?php echo $datos[$i]['Cantidad'];?>"
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
	  
		 //VALIDADOR DEL DIA Y HORAS
		
		date_default_timezone_set('America/Santiago');
		
		$dia=date("l");
		if($dia=="Monday" || $dia=="Tuesday" || $dia=="Wednesday" || $dia=="Thursday" || $dia=="Friday")
		{
			$sqlHorario="SELECT Dias, primer_horario as temprano, segundo_horario as tarde FROM horarios_restaurantes WHERE Dias='Lunes/Viernes' AND ID_Restaurante=".$_GET['restaurante'];
		}
		elseif($dia=="Saturday")
		{
			$sqlHorario="SELECT Dias, primer_horario as temprano, segundo_horario as tarde FROM horarios_restaurantes WHERE Dias='Sabados' AND ID_Restaurante=".$_GET['restaurante'];
		}
			elseif($dia=="Sunday")
		{
			$sqlHorario="SELECT Dias, primer_horario as temprano, segundo_horario as tarde FROM horarios_restaurantes WHERE Dias='Domingos' AND ID_Restaurante=".$_GET['restaurante'];
		}
		
		//PRIMERO O SEGUNDO HORARIO
		$hora=date('H:i');
		$respHorario=mysql_query($sqlHorario);
		$rowHorario=mysql_fetch_array($respHorario);
		
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
		
		$horaActual = strtotime($hora); 
		
		$iniTemp_p1 = strtotime($horaIniTemp); 
		
		$finTemp_p1 = strtotime($horaFinTemp); 
		
		$iniTarde_p2 = strtotime($horaIniTarde); 
		
		$finTarde_p2 = strtotime($horaFinTarde);
		
	  ?>
   <tr>
					<td>
						Costo de envio: <?php echo $envio;?>
					</td>     
				</tr>
                <tr>
					<td> 
                    	
						<select id="HoraReserva" name="HoraReserva">
                            <option id="Todos" name="Todos" disabled="disabled" selected="selected">Escoje tu hora de reserva</option>
					
                            <?php 
							
							
						    if(($horaActual >= $iniTemp_p1) && ($horaActual < $finTemp_p1))
							{
								$hora1=$horaIniTemp;
						   		$hora2=$horaFinTemp;
							}
							elseif(($horaActual >= $iniTarde_p2) && ($horaActual < $finTarde_p2))
							{
								$hora1=$horaIniTarde;
						   		$hora2=$horaFinTarde;
							}
							else
							{
								$hora1='00:00';
						   		$hora2='11:00';	
							}

						   $dif=date("H:i", strtotime("00:00:00") + strtotime($hora2) - strtotime($hora1) );
						   $dif=($dif*60/1)/30;
						   echo "<script type='text/javascript'>alert('".$dif."')</script>";
						   if($reserva==1)
						   {
							  $cont=1;
							  while($cont<=$dif)
							  {
							   $cont++;
							   if($hora1<=$hora2)
							   {
								  $horaIni=$hora1;
								  $hora1= date('H:i',strtotime($hora1)+1800); 
								  $id=$horaIni.'/'.$hora1;
							      $option='Entre '.$horaIni.' y '.$hora1.'';
								  
							   ?>
							  <option id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="<?php echo $id; ?>"><?php echo $option; ?></option>
							   <?php
                               
							   }
							  }
						   }
						   
						   ?>   
            		   </select>
					</td>     
				</tr>
  <tr><td><?php $total=$total+$envio; echo "Total: ".$total; ?></td></tr>
   <tr>
   			<td>
            	<br /><?php if($total!=0){
					?>
				<a href="procesos/reservasconfirmadas.php?txtRestaurante=<?php echo $restaurante; ?>" class="aceptar">Reservar</a>&nbsp;<?php if($_GET['estado']=='Abierto'){  ?><a href="procesos/pedidosconfirmados.php?txtRestaurante='.$restaurante.'&total='.$total.'" class="aceptar">Comprar</a> <?php }} ?>
            </td>
            
  </tr>
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
	$(".cantidad22").keyup(function(e){
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
	$(".cantidad").keyup(function(e){
		alert("me has presionado!");
	});
}
$(document).on('ready',inicio);
</script>
</html>