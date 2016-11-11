<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/ http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

include'../bd/conexion.php';
include('../sistema/conexionamigos.php');
@$session = $_SESSION["logged"];

/*********************************
 * 
 * EN LA FUNCION LISTAR AMIGOS SE 
 * GENERA EL ENLACE O URL 
 * QUE TIENE COMO VARIABLE  A 
 * USUARIO POR LA CUAL 
 * SE HACE EL $_GET['USUARIO'] 
 * RAZON POR LA CUAL SE HACE
 * INCLUDE DEL ARCHIVO CONEXIONAMIGOS.PHP
 * */

    @$user = $_GET['usuario'];  
    
    
$data = array( 
               'usuario'  => @$_GET['usuario'],
             
               );


    
    
	@$add = $_GET["add"]; 
	
	
/*@$usr = $_GET['usr'];*/
@$opt = $_GET['opt'];
/*@$optfotos = $_GET['optf'];
@$sk = $_GET['sk'];*/

 
 $data = array( 
'id' => @$_GET['id'] 

); 


$datados = array( 
'id' => @$_GET['id'], 
'sk' => @$_GET['sk'] 
); 

?> 

<!doctype html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8" /> 
<title>Document</title> 

<link rel="stylesheet" href="estilo.css" type="text/css" media="screen" title="no title" charset="utf-8"/> 

 <script language="JavaScript" type="text/javascript" src="../ajax/ajaxsolicitudamistad.js"></script>
	

     <!---FOTO PERFIL---> 
	 <link rel='stylesheet'  href='../csssistema/estilo.css' />
	 <script type='text/javascript' src='../js/opcionsubirfotoperfil.js'></script>
	 <!--END FOTO PERFIL--> 


<style>

#contglobal
{
   width:700px;
   min-height:200px;
   height:auto;
   border:1px solid orange;
   position:relative;
   margin:0px auto;
  

}

ul 
{ 

width: auto; 
height:50px; 
display: table;
position: relative;
margin: 0px auto;
border:1px solid green;

} 

li 
{ 
margin-left: 5px; 
list-style-type: none; 
padding: 10px; 
display: table-cell;


} 
 
 #continferior
 {
    width:auto;
   min-height:200px;
   height:auto;
   border:1px solid red;
   position:relative;
   margin:10px auto;
   text-align: center;

 }


 
</style>


</head> 
<body> 

<a href="../php/cpusuario.php?">Inicio</a> 
<br> 
<br> 
<br> 

<div id="contglobal">
<ul> 

<li> 
<?php echo '<li><a class="uno" href="profile.php?'.http_build_query($data).'&sk=wall">Biografia</a></li>'; ?> 
</li> 

<li> 
<?php echo '<li><a class="dos" href="profile.php?'.http_build_query($data).'&sk=info">Informacion</a></li>'; ?> 
</li> 

<li> 
<?php echo '<li><a class="tres" href="profile.php?'.http_build_query($data).'&sk=friends">Amigos</a></li>'; ?> 
</li> 

<li> 
<?php echo '<li><a class="cuatro" href="profile.php?'.http_build_query($data).'&sk=photo">Fotos</a></li>'; ?> 
</li> 

</ul> 



  <div id="continferior">
  	
  	<?php 

if( @$_GET['sk'] == "wall")
{ 

echo "aqui va el muro"; 
} 

if( @$_GET['sk'] == "friends")
{ 


$con = "SELECT * 
        FROM amigos s 
        INNER JOIN usuarios  u ON s.amigos = u.id_usuario 
        WHERE usuario = ".$session." ";

    $query = $conexion->query($con);
    while($array = $query->fetch(PDO::FETCH_LAZY))
    {
    	 echo "<br>".$array->nombre." ".$array->apellido."<br>";
    }	


} 

if( @$_GET['sk'] == "photo")
{ 

echo "aqui va los albums del usuario"; 
} 


?>


<!-- 
SUBMENU DE LA SECCION INFORMACION 

--> 

<?php 
if( @$_GET['sk'] == "info")
{ 
echo '<li><a href="profile.php?'.http_build_query($datados).'&section=overview">Informacion general</a></li><br>'; 
echo '<li><a href="profile.php?'.http_build_query($datados).'&section=education">Trabajo y formacion academica</a></li><br>'; 
echo '<li><a href="profile.php?'.http_build_query($datados).'&section=living">Lugares en los que has vivido</a></li><br>'; 
echo '<li><a href="profile.php?'.http_build_query($datados).'&section=contact-info">Informacion basica y de contacto</a></li><br>'; 
echo '<li><a href="profile.php?'.http_build_query($datados).'&section=relationship">Familia y relaciones</a></li><br>'; 
echo '<li><a href="profile.php?'.http_build_query($datados).'&section=bio">Detalles sobre ti</a></li><br>'; 
echo '<li><a href="profile.php?'.http_build_query($datados).'&section=year-overviews">Acontecimientos importantes</a></li><br>'; 
} 

?> 
  </div>


</div>






</body> 
   
