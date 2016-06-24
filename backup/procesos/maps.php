<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
	require("conexion_bd.php");
?>
<style type="text/css">
.subpanel
{
	background:white;
	color:black;
	float:left;
	width:580px;
	height:450px auto;
	text-align:left;
	margin-top:10px;
	border:1px solid #E2E2E2;
	border-radius:10px;
}
.panel
{
	background:#ECF1F2;
	width:580px;
	height:580px auto;	
}
</style>
<body bgcolor="#ECF1F2">
<div class="panel">
	<div class="subpanel">
   <h2>Horarios</h2>
    <table>
        <tr><td>Lunes</td><td>13:00-00:00</td></tr>
        <tr><td>Martes</td><td>13:00-00:00</td></tr>
        <tr><td>Miercoles</td><td>13:00-00:00</td></tr>
        <tr><td>Jueves</td><td>13:00-00:00</td></tr>
        <tr><td>Viernes</td><td>13:00-00:00</td></tr>
        <tr><td>Sábado</td><td>13:00-00:00</td></tr>
        <tr><td>Domingo</td><td>13:00-00:00</td></tr>
    </table>
    </div>
    <br />
    <div class="subpanel">
      <h2>Ubicación geográfica</h2>
      <?php
	  	$restaurante=$_GET['restaurante'];
	  	$sql="SELECT maps FROM restaurantes WHERE ID_Restaurante=".$restaurante;
		$resp=mysql_query($sql);
		$mapa=mysql_fetch_array($resp);
	  ?>
    	<iframe src="<?php echo $mapa['maps']; ?>" width="580" height="450" frameborder="0" style="border:0" allowfullscreen>
        </iframe>
    </div>
</div>
</body>
</html>

