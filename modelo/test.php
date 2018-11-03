<?php

$server= "localhost";
$bd = "monitoreo_bd";
$user= "root";
$pass = "";



$conexion = new mysqli ($server, $user, $pass, $bd); 

if ($conexion -> connect_errno){

    echo "la conexion fallo". $conexion -> connect_errno;
}else{

    echo "la conexion fue exitosa";
}

$registrarUsuario = "INSERT INTO usuarios VALUES (
	'',
	'nombreCliente',
	'EmailCliente',
	'UsuarioCliente',
	'Pasword',
	'DireccionCliente',
	'Pais',
	'Idioma',
	'inicioContrato',
	'finContrato',
    'Activo',
	'NumContrato',
	'Descripcion'
	)";

$regitrarContacto = $conexion->query($registrarUsuario);
//$ultimoIdUsuario ="SELECT MAX(id) AS id FROM usuarios";

echo "usuario creado"

?>