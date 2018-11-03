<?php


/*

$sql = "SELECT * FROM usuario";

$resultado = $conexion->query($sql);

while($fila=$resultado->fetch_assoc()){

	echo "<table><tr>";

	echo "<td>". $fila['nombre']."</td>";
	echo "<td>". $fila['apellido']."</td>"; 

	echo "</tr><table>";
}

$conexion->close();
*/


/*
class Usuarios_modelo{

	private $bd;
	private $usuarios;

	public function __construc(){

		$this->db=Conectar::conexion();
		$this->usuarios=array();
	}


public function get_usuarios(){

	$consulta = $this->db->query("SELECT * FROM usuario");

		while($fila=$consulta->fetch_assoc()){

			echo "<table><tr>";

			echo "<td>". $fila['nombre']."</td>";
			echo "<td>". $fila['apellido']."</td>"; 

			echo "</tr><table>";
		}

		return $this->usuarios;
	}

}

*/


?>