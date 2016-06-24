<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
	require("../basedatos/conexion_bd.php");
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
	<?php
	$dias= array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
	$restaurante=$_GET['restaurante'];
        $SQL = "SELECT Dias, primer_horario as p1, segundo_horario as p2 FROM restaurantes JOIN horarios_restaurantes ON restaurantes.ID_Restaurante=horarios_restaurantes.ID_Restaurante WHERE restaurantes.ID_Restaurante=".$restaurante;
            $re = mysql_query($SQL);
            $num = mysql_num_rows($re);
            if($num > 0)
            {
                    //Visualizar em Tela
                   while($resp = mysql_fetch_array($re))
                   {
                        if($resp['Dias']=="Lunes/Viernes")
                        {
                            $cont=0;
                            if($resp['p1']=="null" || $resp['p1']=="")
                            {
                                $p1="No disponible";
                            }
                            else
                            {
                                $p1=$resp['p1'];
                            }
                            
                            if($resp['p2']=="null" || $resp['p2']=="")
                            {
                                $p2="No disponible";
                            }
                            else
                            {
                                $p2=$resp['p2'];
                            }
                            while($cont<="4")
                            {
                                echo "<tr><td>".$dias[$cont]."</td><td>".$p1." - ".$p2."</td></tr>";
                                $cont++;
                            } 
                        }
                       
                        elseif($resp['Dias']=="Sabados")
                        {
                            $cont=5;
                            if($resp['p1']=="null" || $resp['p1']=="")
                            {
                                $p1="No disponible";
                            }
                            else
                            {
                                $p1=$resp['p1'];
                            }
                            
                            if($resp['p2']=="null" || $resp['p2']=="")
                            {
                                $p2="No disponible";
                            }
                            else
                            {
                                $p2=$resp['p2'];
                            }
                            echo "<tr><td>".$dias[$cont]."</td><td>".$p1." - ".$p2."</td></tr>";
                            
                        }
                        elseif($resp['Dias']=="Domingos")
                        {
                            $cont=6;
                            if($resp['p1']=="null" || $resp['p1']=="")
                            {
                                $p1="No disponible";
                            }
                            else
                            {
                                $p1=$resp['p1'];
                            }
                            
                            if($resp['p2']=="null" || $resp['p2']=="")
                            {
                                $p2="No disponible";
                            }
                            else
                            {
                                $p2=$resp['p2'];
                            }
                            echo "<tr><td>".$dias[$cont]."</td><td>".$p1." - ".$p2."</td></tr>";
                        }
                        else
                        {
                            echo "Errol!";
                        }
                   }
            }
			?>
    </table>
    </div>
    <br />
    <div class="subpanel">
      <h2>Ubicación geográfica</h2>
      <?php
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

