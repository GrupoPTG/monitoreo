<?php

$usuario = $_POST['idUser'];
require_once("../modelo/connect.php");

$sql = "SELECT * FROM usuarios WHERE id='$usuario'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 
     $cliente =$fila['cliente'];
     $email =$fila['emailCliente'];
     $usuarioCliente =$fila['usuario'];
     $pass =$fila['pass'];
     $direccion =$fila['direccion'];
     $pais =$fila['pais'];
     $idioma =$fila['idioma'];
     $inicioContrato =$fila['inicioContrato'];
     $finContrato =$fila['finContrato'];
     $numContrato=$fila['numero_contrato'];
     $descripcion=$fila['descripcion'];


?>