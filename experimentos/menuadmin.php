<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
	*
	{
		padding:0px;
		margin:0px;
	}
	
	#header
	{
		margin:auto;
		width:500px;
		font-family:Arial, Arial, Helvetica, sans-serif;
		
	}
	
	ul, ol 
	{
		list-style:none;
	}
	
	.nav li a
	{
		background:#000;
		color:#fff;
		padding:10px 15px;
		text-decoration:none;
		display:block;
	}
	
	.nav li a:hover
	{
		background:#434343;
	}
	
	.nav > li
	{
		float:left;	
	}
	
	.nav li ul
	{
		position:absolute;
		min-width:140px;
		display:none;
	}
	
	.nav li:hover > ul
	{
		display:block;
	}
	
	.nav li ul li
	{
		position:relative;
	}
	
	.nav li ul li ul 
	{
		right:-140px;
		top:0px;
	}
</style>
<body>
	
    	<ul class="nav">
        	<li><a href="">Inicio</a></li>
            <li><a href="">Servicios</a>
            	<ul>
                	<li><a href="">Submenu1</a></li>
                    <li><a href="">Submenu2</a></li>
                    <li><a href="">Submenu3</a></li>
                    <li><a href="">Submenu4</a></li>
                </ul>
            </li>
            <li><a href="">Acerca de</a>
            	<ul>
                	<li><a href="">Submenu1</a></li>
                    <li><a href="">Submenu2</a></li>
                    <li><a href="">Submenu3</a></li>
                    <li><a href="">Submenu4</a>
                    	<ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">Contacto</a></li> 
        </ul>
   
</body>
</html>