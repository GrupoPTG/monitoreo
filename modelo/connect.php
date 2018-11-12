<?php

 require "datos.php";

 
 $conexion = new mysqli ($server, $user, $pass, $bd); 

 if ($conexion -> connect_errno){

 	echo "la conexion fallo". $conexion -> connect_errno;
 }else{

	 echo  " ";
	 
 }

?>