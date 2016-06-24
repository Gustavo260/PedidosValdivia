<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$ID_Usuario=$_SESSION['ID_Usuario'];

$subject= "Confirmacion del pedido";
$remitente = "kain_6990@hotmail.com";

$mensaje = "Hola ".$_SESSION['Nombre']."!
Tu pedido a sido confirmado, se te enviarÃ¡ en breve y llegarÃ¡ a tu domicilio dentro de 4 horas

Total a cancelar: ".$_GET['total']."

Gracias por preferirnos y por favor siga utilizando nuestro servicio :)

Cualquier insatisfecacciÃ³n, reclamo o sugerencia contactarnos por:
contacto@pedidosvaldivia.cl
";
$header = "From: info@pedidosvaldivia.cl";

$otromensaje = "Hola!
Quieres ser parte de nuestros staff de pedidos valdivianos en nuestra
pagina oficial: www.pedidosvaldivia.net84.net/PedidosValdivia/index.php

Si te interesa trabajar con nosotros envianos un correo de vuelta a:
contacto@pedidosvaldivia.cl
";
echo $mensaje;
/*if(mail($remitente, $subject, $mensaje, $header)) { echo 'mensaje enviado con exito!' ; }else { echo "A fallado el envio..."; }
$respuesta="Pedido exitoso!";
header("Location: ../inforestaurante.php?txtRestaurante=".$_GET['txtRestaurante']."&respuesta=".$respuesta);
*/
?>
</body>
</html>	