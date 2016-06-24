function abrir(url) { 
open('popupRegistro.php','','top=300,left=300,width=300,height=300') ; 
} 

function abrir2(url) 
{ 
	open('popupSesion.php','','top=300,left=300,width=300,height=300') ; 
} 

function refresh()
{
   var pagina="index.php"
   location.href=pagina
}

function openVentana()
{
   $(".ventana").slideDown(4000);
}

function openDetalle(id)
{
   $("#ID").val(id);  
   $(".ventanaDetalle").slideDown(2000);
}

function openVentanaRegistro()
{
   $(".ventanaModal").slideDown(4000);
}

function closeVentana()
{
	$(".ventana").slideUp("fast");
	$(".ventanaModal").slideUp("fast");
}

function closeDetalle()
{
	$(".ventanaDetalle").slideUp("fast");
}

function sesion()
{		
	 var email=$("#txtEmail").val();
	 var clave=$("#txtClave").val();
	 $.post('procesos/autentificacion.php',{
	 Email:email,
	 Clave:clave
	 },function(e){
			location.href="index.php";	
	 });		
}

		