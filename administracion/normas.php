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
        <!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="../css/tcal.css" />
	<script type="text/javascript" src="../js/tcal.js"></script>
</head>
<body>


<?php
include("menu.php");
?>



<br><br>
ASIGNAR NORMAS A CLIENTE
<br><br>


<?php         
    require_once("../modelo/connect.php");
    $consulta = "SELECT * FROM usuarios WHERE estatus='Activo'";
    $hacerconsulta = $conexion->query($consulta);
    $consultaVendedor = "SELECT * FROM vendedor";
    $hacerconsultaVendedor = $conexion->query($consultaVendedor);
    $consultaNormas = "SELECT * FROM normas";
    $hacerconsultaNormas = $conexion->query($consultaNormas);
?>


<form method="post" action="#">
<label>Normas:</label>
    <?php
       echo "<select name='normas[]' size='6' multiple>";
    ?>
       <!--<option>Seleccionar..</option>-->
    <?php  
        while($fila=$hacerconsultaNormas->fetch_assoc()){
          echo "<option>".$fila['documento']."</option>";
        }
        echo "</select>";
    ?> 

    <br><br>

<label>Clientes:</label>
    <?php
       echo "<select name='cliente'>";
    ?>
       <option>Seleccionar..</option>
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['cliente']."</option>";
        }
        echo "</select>";
    ?> 

<br><br>

<label>Vendedor:</label>
<?php
   echo "<select name='vendedor'>";
?>
   <option>Seleccionar..</option>
<?php  
    while($fila=$hacerconsultaVendedor->fetch_assoc()){
      echo "<option>".$fila['nombre']."</option>";
    }
    echo "</select>";
?>

<br><br>
<input type="submit" name="asignarNorma" value="Asignar Norma">
</form>








<?php

if(isset($_POST['asignarNorma'])){
  
  $normas = $_POST['normas'];
  $cliente = $_POST['cliente'];
  $vendedor = $_POST['vendedor'];


  for($i=0; $i<sizeof($normas); ++$i){

    $listaNormas = $normas[$i];



    $asignarNormas = "INSERT INTO normacliente VALUES (
      '',
      '$listaNormas',
      '$cliente',
      '$vendedor'
      )";


    $registroVendedor = $conexion->query($asignarNormas);


    echo "La norma fue asignada con exito al cliente";

  }
}
?>





















<hr>
<br><br>

CARGAR NUEVA NORMAS
<br><br>

<form  method="post" action="#">

<label>SDO - ORG</label><br>
  <input type="text" name="sdo" required><br>

<label>Nombre del Documento</label><br>
  <input type="text" name="documento" required><br>

<label>Titulo</label><br>
  <input type="text" name="titulo" required><br>

    <label>Idioma</label><br>
  <select name="idioma">
      <option>English</option>
      <option>Espanol</option>
  </select><br>

   <label>Formato</label><br>
  <select name="formato">
      <option>Digital</option>
  </select><br>

  <label>Revision Actual</label><br>
  <input type="text" name="revision" class="tcal" value="" /><br>

    <label>Estatus</label><br>
  <select name="estatus">
      <option>Actualizada</option>
      <option>Desactualizada</option>
  </select><br>

  <label>Observaciones</label><br>
  <textarea name="observaciones"></textarea><br>


  <br>
  <input type="submit" value="Cargar Norma" name="cargarNorma">

</form>




<?php
  require_once("../controlador/registroUsuario.php");
?>
















<br><br>
Lista Maestra de Normas


<?php


require_once("../modelo/connect.php");

   $consulta = "SELECT * FROM normas";

   ?>
			 		<div style="width: 90%; margin:0 auto; font-size: 13px;" >
					<?php

          $hacerconsulta = $conexion->query($consulta);
							 
			
							echo "<table class='table-sm table-striped' style='width:100%;'>";
							echo "<tr>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Id</b></font></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>SDO/ORG</b></font></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Documento</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Titulo</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Revision Actual</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Ultima Revision</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Estatus</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Idioma</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Formato</b></td>";
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
							echo "<td align='center' >".$reg[6]."</td>";
              echo "<td align='center' >".$reg[7]."</td>";
              echo "<td align='center' >".$reg[8]."</td>";
							echo "<td align='center' >".$reg[4]."</td>";
							echo "<td align='center' >".$reg[5]."</td>";


							echo "<td  align='center' style='border: inset 0pt'>				
								<form action='norma.php' method='post'>			
									<input type='hidden' name='norma' value=".$reg[2].">
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