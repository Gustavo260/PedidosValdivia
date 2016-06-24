<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de usuarios</title>

<link rel="stylesheet" href="../estilos/estilosCSS3.css">
<?php 
	require("../basedatos/conexion_bd.php");
	require("funciones.php");
?>
<style type="text/css">
.caja
{
	background:white;
	color:black;
	float:center;
	width:500px;
	height:125px auto;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:20px;
}

.contenedor
{
	background-color:#ECF1F2;
	width:580px;
	height:580px;
	margin:25px;
		
}
</style>
</head>

<body>
<?php
	session_start();
     
     $SQL = "SELECT usuarios.ID_Usuario as usuario, usuarios.Nombre as nombre, usuarios.Apellido as apellido, usuarios.Avatar as avatar, comentarios.Comentario as comentario, comentarios.Valoracion as valor, comentarios.Likes as likes, comentarios.Dislikes as dislikes FROM comentarios JOIN usuarios ON comentarios.ID_Usuario=usuarios.ID_Usuario WHERE ID_Restaurante=".$_GET['restaurante'];
     $re = mysql_query($SQL);
 
     $num = mysql_num_rows($re);

     if($num > 0){
 
         //Visualizar em Tela
           while($Linha = mysql_fetch_object($re)){
                  echo "<a href=''>
								<div style='color:black' class='caja'>
							<table width='250' height='25' border='0' border='1'>
								<tr>
								<td width='100'><center><img src='{$Linha->avatar}' onmouseover='this.style.opacity=0.5' onmouseout='this.style.opacity=1' width='75px' height='75px'></center></td>
									<td width='60%'>
										<table>
											<tr><td align='left' colspan='3' width='133'><h4>{$Linha->nombre}</h4></td></tr>
                                            <tr><td align='left' colspan='3' width='133'><br></td></tr>
                                            <tr><td align='left' colspan='3' width='133'>{$Linha->comentario}</td></tr>
											
											
										</table>
									</td>       
								</tr>
							</table>		
                   		 	</div>
                           </a>
                   		 	";    
           }
          echo '<br><hr color="black"><br><h2>Deja tu comentario</h2>';

      }
      else{
          echo 'No hay comentarios :( ...';
          echo '<br><hr color="black"><br><h2>Deja tu comentario</h2>';
      }
?>
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {	
				$(".claseagregar").click(function(event) {
					var id=$(this).attr('data-id');
					$.post('procesos/cargaCompras.php',{Id:id},function(a)
					{
						location.reload("procesos/cargaCompras.php");
					});	
				});		
			});
		</script>
</html>