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

<form  method="post" action="#">


          <?php
          require_once("../modelo/connect.php");
            $consulta = "SELECT * FROM usuarios WHERE estatus='Activo'";
            $hacerconsulta = $conexion->query($consulta);
        ?>

        
        
<br><br>
<label>Cliente:</label>

    <?php
       echo "<select name='cliente'";
    ?>
       <!--<option>Seleccionar..</option>-->
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['cliente']."</option>";
        }

        echo "</select>";
    ?>  

  <input type="submit" value="Buscar Contrato" name="buscarContrato">

</form>







<?php

if(isset($_POST['buscarContrato'])){


   $cliente = $_POST['cliente'];
  require_once("../modelo/connect.php");
  
  $sql = "SELECT * FROM usuarios WHERE cliente='$cliente'";
  $resultado = $conexion->query($sql);
  $fila=$resultado->fetch_assoc();
     
   $inicioContrato= $fila['inicioContrato'];
   $finContrato =$fila['finContrato'];
   $estatus =$fila['estatus'];




?>

<form mthod="POST" action="">
<br><br>
<label>Cliente</label><br>
<input type="text" name="finContrato" value="<?php echo $cliente ?>"  readonly/><br>
  <label>Inicio Ultimo Contrato</label><br>
  <input type="text" name="inicioContrato"  value="<?php echo $inicioContrato ?>" readonly /><br>
  <label>Fin Ultimo Contrato</label><br>
  <input type="text" name="finContrato" value="<?php echo $finContrato ?>"  readonly/><br>
  <label>Estatus de Cliente</label><br>
  <input type="text" name="finContrato" value="<?php echo $estatus ?>"  readonly/><br>
  
<br><br>
  
<label>Inicio Nuevo Contrato</label><br>
  <input type="text" name="inicioContrato" class="tcal" value="" /><br>
  <label>Fin Nuevo Contrato</label><br>
  <input type="text" name="finContrato" class="tcal" value="" />
<br>

<input type="submit" value="Actualizar Contrato" name="actualizarContrato">
</form>

<?php
}
?>








<?php
if(isset($_POST['actualizarContrato'])){

    
    $cliente= $_POST['vendedor'];
    $inicioContrato=$_POST['correo'];
    $fincontrato=$_POST['telefono'];
    $inicioContratoAnterior="";
    $finContratoAnterior="";
    $fecha=$_POST['territorio'];


    $actualizarContrato = "INSERT INTO vendedor VALUES (
      '',
      '$nombreVendedor',
      '$telefono',
      '$emailVendedor',
      '$cad',
      '$territorio'
      )";

    
    //Consulta Registrar Usuario
    if($conexion->query($actualizarContrato)!==False){
        echo "El contrato fue actualizado con exito";
    }else{
        echo "El contrato no fue actualizado por favor consulte con el administrador";
    }

           }

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