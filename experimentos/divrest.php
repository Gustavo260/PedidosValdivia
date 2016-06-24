<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	require("../basedatos/conexion_bd.php");
	require("../procesos/funciones.php");
?>

<style type="text/css">
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
p
{
	font-size:1em auto;
}
.menuaccion
{
	width:100%;
	background-color:#E2E2E2;
	color:black;
	float:left;
	border:1px solid #E2E2E2;
	border-radius:10px;
}
.menucomplemento
{
	position:static;
	color:black;
	float:left;
	top:0px;
	bottom:0px;
	right:0px;
	left:0px;
	position:relative;
}

.cajona
{
	margin:5%;
	background:#ECF1F2;
	color:black;
	float:left;
	width:20%;
	font-size:9px;
	height:15%;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	padding-bottom:-5%;
}
.cajaN
{
	margin:5%;
	background:#ECF1F2;
	color:black;
	float:left;
	width:20%;
	font-size:9px;
	height:15%;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	padding-bottom:-5%;
}
.cajitasN
{
	position:static;
	color:black;
	float:left;
	top:0px;
	bottom:0px;
	right:0px;
	left:0px;
	margin-left:10%;
	position:relative;
	
	
}
.caja
{
	margin:5%;
	background:#ECF1F2;
	color:black;
	float:center;
	width:43%;
	height:10%;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	
}

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 0.5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<body>
 <?php
				$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen, Costo_envio as envio, Pedido_minimo as minimo FROM Restaurantes WHERE ID_Restaurante=1";
				$resp=mysql_query($sqlBusqueda); 
				if(mysql_num_rows($resp)>0)
				{
					while($row2=mysql_fetch_array($resp))
					{
						$envio=$row2['envio'];
						?>         

							<div style="color:black" class="caja">
							<table width="614" height="25" border="0">
								<tr>
								<td width="100"><center><img src="../<?php echo $row2['Imagen']; ?>" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" width="120px" height="100px"></center></td>
									<td width="441">
										<table>
											<tr><td align="left" colspan="2"><h4><?php echo $row2['Nombre']; ?></h4></td></tr>
											<tr><td width="133">Actual</td><td width="166">$<?php echo $row2['envio']; ?></td><td width="118">$<?php echo $row2['minimo']; ?></td></tr>
											<tr><td>Distancia</td><td>Costo de envio</td><td>Pedido Minimo</td></tr>
										</table>
									</td>       
								</tr>
							</table>		
                   		 	</div>
							
							<!-- VIEJA REPLICA -->
							<div style='color:black' class='caja' onmouseover='this.style.opacity=0.5' onmouseout='this.style.opacity=1'>
							<table width='50%' height='25' border='0'>
								<tr>
								<td width='45%'><center><img src='recursos/reservas.jpg' onmouseover='this.style.opacity=0.5' onmouseout='this.style.opacity=1' width='120px' height='100px'></center></td>
									<td width='441'>
										<table>
											<tr><td align='left' colspan='2'><h4>Prueba</h4></td></tr>
											<tr><td width='133'>Actual</td><td width='166'>$2.000</td><td width='118'>$5.000</td></tr>
											<tr><td>Distancia</td><td>Costo de envio</td><td>Pedido Minimo</td></tr>
										</table>
									</td>       
								</tr>
							</table>		
                   		 	</div>
							
							<a href=''>
								<div style='color:black' class='caja' onmouseover='this.style.opacity=0.5' onmouseout='this.style.opacity=1'>
							<table width='250' height='25' border='0' border='1'>
								<tr>
								<td width='100'><center><img src='{$Linha->Imagen}' onmouseover='this.style.opacity=0.5' onmouseout='this.style.opacity=1' width='75px' height='75px'></center></td>
									<td width='60%'>
										<table>
											<tr style=" margin-b"><td align='left' colspan='3' width='300'><h4>Restaurante Lomo de toro</h4></td></tr>
											<tr><td><fieldset class='rating'>
    <input type='radio' id='star5' name='rating' value='5' /><label class = 'full' for='star5' title='Awesome - 5 stars'></label>
    <input type='radio' id='star4half' name='rating' value='4 and a half' /><label class='half' for='star4half' title='Pretty good - 4.5 stars'></label>
    <input type='radio' id='star4' name='rating' value='4' /><label class = 'full' for='star4' title='Pretty good - 4 stars'></label>
    <input type='radio' id='star3half' name='rating' value='3 and a half' /><label class='half' for='star3half' title='Meh - 3.5 stars'></label>
    <input type='radio' id='star3' name='rating' value='3' /><label class = 'full' for='star3' title='Meh - 3 stars'></label>
    <input type='radio' id='star2half' name='rating' value='2 and a half' /><label class='half' for='star2half' title='Kinda bad - 2.5 stars'></label>
    <input type='radio' id='star2' name='rating' value='2' /><label class = 'full' for='star2' title='Kinda bad - 2 stars'></label>
    <input type='radio' id='star1half' name='rating' value='1 and a half' /><label class='half' for='star1half' title='Meh - 1.5 stars'></label>
    <input type='radio' id='star1' name='rating' value='1' /><label class = 'full' for='star1' title='Sucks big time - 1 star'></label>
    <input type='radio' id='starhalf' name='rating' value='half' /><label class='half' for='starhalf' title='Sucks big time - 0.5 stars'></label>
</fieldset></td></tr>
											<tr><td width='250'>Abierto</td><td width='166'>2000</td><td width='118'>5000</td></tr>
											<tr><td>Estado</td><td>Envio</td><td>Minimo</td></tr>
										</table>
									</td>       
								</tr>
							</table>		
                   		 	</div>
                           </a>
                     
                            <?php
					}
				}
							?>
                            
                            
                            
                         
</body>
</html>



