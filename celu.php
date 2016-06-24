//Cargar compras!
if($_GET['acao'] == 'cargarCompras')
{
    
       session_start();
    $ID="2";
    //Procesos 1
    if(isset($_SESSION['carrito']))
    {
        
		if(isset($ID)){
            
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$ID){
							$encontro=false;
							$numero=$i;
						}
					}
					if($encontro==true){
                       
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
                         
						$nombre="";
						$precio=0;
						$re=mysql_query("SELECT Descripcion, Imagen, Costo FROM platillos WHERE ID_Platillo=".$ID);
						while ($f=mysql_fetch_array($re)) {
							$Imagen=$f['Imagen'];
                            echo "<script>alert(".$Imagen.");</script>";
							$nombre=$f['Descripcion'];
							$precio=$f['Costo'];
						}
						$datosNuevos=array('Id'=>$ID,
										'Imagen'=>$Imagen,
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}
    else
    {
       
      //Procesos 2  
        
        if(isset($ID))
        {
			$Imagen="";
			$nombre="";
			$precio=0;
			$re=mysql_query("SELECT Descripcion, Imagen, Costo FROM platillos WHERE ID_Platillo=".$ID);
			while ($f=mysql_fetch_array($re)) {
				$Imagen=$f['Imagen'];
				$nombre=$f['Descripcion'];
				$precio=$f['Costo'];
			}
			$arreglo[]=array('Id'=>$ID,
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
     
    $sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
    $sesion=mysql_query($sql); 
    if($_SESSION)
    {
        echo '<table width="200" border="0" align="center">
              <tr>
                <th scope="col">Mis Pedidos</th>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>';
        $restaurante=1;
        $envio=2000;
        $total=0;
        if(isset($_SESSION['carrito']))
        {
            $datos=$_SESSION['carrito'];
            $reserva=1;
            $total=0;
        for($i=0;$i<count($datos);$i++)
        {
            $nombre=$datos[$i]['Nombre'];
            $precio=$datos[$i]['Precio'];
            $cantidad=$datos[$i]['Cantidad'];
            $dataprecio=$datos[$i]['Precio'];
            $dataid=$datos[$i]['Id'];
            $subtotal=$datos[$i]['Cantidad']*$datos[$i]['Precio'];
            $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
            $total=$total+$envio;
            echo '<tr>
					<td>
						Nombre: '.$nombre.'
					</td>     
				</tr>
                <tr>
					<td>
						Precio: '.$precio.'
					</td>     
				</tr>
                 <tr>
					<td>
						Cantidad: <input type="text" width="1" maxlength="2"  size="1"  value="'.$cantidad.'"
                        data-precio="'.$dataprecio.'"
						data-id="'.$dataid.'"
						class="cantidad">
					</td>     
				</tr>
                 <tr>
					<td> 
						<span class="subtotal">Subtotal:'.$subtotal.'</span>
					</td>     
				</tr>
                
                 <tr>
					<td>
						------------------------------------
					</td>     
				</tr>
                <tr>
					<td>
						Costo de envio: '.$envio.'
					</td>     
				</tr>
                <tr><td>Total: '.$total.' </td></tr>
                ';
            }
        }
    }
        
}//fin funcion