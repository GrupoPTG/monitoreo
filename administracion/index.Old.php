<?php
  session_start();
  if ($_SESSION['login'])
    {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administracion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="../js/script.js"></script>

    <!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="../css/tcal.css" />
	<script type="text/javascript" src="../js/tcal.js"></script>
</head>
<body>


<?php
include("menu.php");
?>

<br><br>



<form  method="post" action="#">
  <label>Nombre del Cliente</label><br>
  <input type="text" name="cliente" required><br>
  <label>Usuario</label><br>
  <input type="text" name="email" required><br>
  <label>Direccion del Cliente</label><br>
  <input type="text" name="direccion"><br>
  <label>Pais</label><br>
  <select name="pais">
      <option>Brasil</option>
      <option>Venezuela</option>
      <option>Argentina</option>
      <option>Bolivia</option>
      <option>Brasil</option>
      <option>Chile</option>
      <option>Colombia</option>
      <option>Ecuador</option>
      <option>Panama</option>
      <option>Peru</option>
      <option>Paraguay</option>
      <option>Uruguay</option>
      <option>Mexico</option>
  </select><br>
  <label>Idioma</label><br>
  <select name="idioma">
      <option>Espanol</option>
      <option>Portuges</option>
      <option>Ingles</option>
  </select><br>
  <label>Datos de Contactos</label><br>
  <input type="text" name="nombreContacto[]" placeholder="Nombre">
  <input type="text" name="nombreCorreo[]" placeholder="Correo">
  <input type="text" name="nombreTelefono[]" placeholder="Telefono">
  <br>
  <div id="formularioCliente"></div>  
  <input type="button" value="Agregar Contacto" onclick="agregarContacto()"><br><br>

  <label>Inicio de Contrato</label><br>
  <input type="text" name="inicioContrato" class="tcal" value="" /><br>
  <label>Fin de Contrato</label><br>
  <input type="text" name="finContrato" class="tcal" value="" />
  
  <br><br>
  <input type="submit" name="registrarCliente" value="Crear Cliente">
</form>





<?php
  require_once("../controlador/registroUsuario.php");
?>








<br><br>
Lista de Usuarios Creados


<?php


require_once("../modelo/connect.php");

   $consulta = "SELECT * FROM usuarios";

   ?>
			 		<div style="width: 90%; margin:0 auto; font-size: 13px;" >
					<?php

          $hacerconsulta = $conexion->query($consulta);
							 
			
							echo "<table class='table-sm table-striped' style='width:100%;'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Id</b></font></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Cliente</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Email Cliente</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Direccion</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Pais</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'style='border: inset 0pt;'></td>";
							
							echo "</tr>";
							
							
              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center' >".$reg[0]."</td>";
							echo "<td align='center' >".$reg[1]."</td>";
							echo "<td align='center' >".$reg[2]."</td>";
							echo "<td align='center' >".$reg[4]."</td>";
							echo "<td align='center' >".$reg[5]."</td>";


							echo "<td  align='center' style='border: inset 0pt'>				
								<form action='usuario.php' method='post'>			
									<input type='hidden' name='idUser' value=".$reg[0].">
									<input type='image' name='imageField' src='../img/view.gif' />
								</form>				
							</td>";//FIN DEL echo

							
					


              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							echo "</tr>";
							}
							echo "</table>";
							$conexion->close();

							?>
								</div>
							<?php
?>









</body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>