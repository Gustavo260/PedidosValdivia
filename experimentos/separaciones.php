<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
// EJEMPLO DE LA FUNCION EXPLODE
$cadena = "juan, carlos, roberto";
$tutorial = explode(',',$cadena);

// RESULTADO
echo "Nombre 1:".$tutorial[0]."<br>";
echo "Nombre 2:".$tutorial[1]."<br>";
echo "Nombre 3:".$tutorial[2]."<br>";

?>
</body>
</html>