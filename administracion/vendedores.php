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
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>


<?php
include("menu.php");
?>

<form  method="post" action="#">

<label>Nombre del Vendedor</label><br>
  <input type="text" name="vendedor" required><br>

<label>Telefono</label><br>
  <input type="text" name="telefono" required><br>

<label>Correo</label><br>
  <input type="text" name="correo" required><br>

    <label>Territorio</label><br>
  <select name="territorio">
      <option>Brasil</option>
      <option>Venezuela</option>
  </select><br>


          <?php
          require_once("../modelo/connect.php");
            $consulta = "SELECT * FROM usuarios WHERE estatus='Activo'";
            $hacerconsulta = $conexion->query($consulta);
        ?>

        
        
<br><br>
<label>Cliente:</label>

    <?php
       echo "<select name='cliente[]' size='6' multiple>";
    ?>
       <!--<option>Seleccionar..</option>-->
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['cliente']."</option>";
        }

        echo "</select>";
    ?>  
  
  <br>
  <input type="submit" value="Crear Vendedor" name="createVendedor">

</form>




<?php
  require_once("../controlador/registroUsuario.php");
?>
















<br><br>
Lista de Vendedores Creados


<?php


require_once("../modelo/connect.php");

   $consulta = "SELECT * FROM vendedor";

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
							echo "<td align='center' >".$reg[3]."</td>";
							echo "<td align='center' >".$reg[5]."</td>";


							echo "<td  align='center' style='border: inset 0pt'>				
								<form action='vendedor.php' method='post'>			
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