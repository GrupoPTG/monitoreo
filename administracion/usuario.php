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
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<?php
include("menu.php");
?>
 


<br><br>

<?php
echo $usuario = $_POST['idUser'];

require_once("../modelo/connect.php");


$sql = "SELECT * FROM usuarios WHERE id='$usuario'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 $id= $fila['id'];
     $cliente =$fila['cliente'];
     $email =$fila['emailCliente'];
     $pass =$fila['pass'];
     $direccion =$fila['direccion'];
     $pais =$fila['pais'];
     $idioma =$fila['idioma'];
     $inicioContrato =$fila['inicioContrato'];
     $finContrato =$fila['finContrato'];

	


?>




<table>
    <tr>
        <td>Id:</td>
        <td><?php echo $id ?></td>
    </tr>
    <tr>
        <td>Nombre de Cliente:</td>
        <td><?php echo $cliente ?></td>
    </tr>
    <tr>
        <td>Direccion de Cliente:</td>
        <td><?php echo $direccion ?></td>
    </tr>
    <tr>
        <td>Clave de Cliente:</td>
        <td><?php echo $pass ?></td>
    </tr>
    <tr>
        <td>Usuario de Cliente:</td>
        <td><?php echo $email ?></td>
    </tr>
    <tr>
        <td>Clave de Cliente:</td>
        <td><?php echo $email ?></td>
    </tr>
    <tr>
        <td>Pais:</td>
        <td><?php echo $pais ?></td>
    </tr>
    <tr>
        <td>Idioma:</td>
        <td><?php echo $idioma ?></td>
    </tr>
    <tr>
        <td>Inicio Contrato:</td>
        <td><?php echo $inicioContrato ?></td>
    </tr>
    <tr>
        <td>Fin de Contrato:</td>
        <td><?php echo $finContrato ?></td>
    </tr>
</table>


















Contactos:<br>
<?php
$consulta = "SELECT * FROM contactos WHERE cliente='$usuario'";

?>
    <div style="width: 90%; margin:0 auto; font-size: 13px;" >
                 <?php

       $hacerconsulta = $conexion->query($consulta);
                          
         
                         echo "<table class='table-sm table-striped' style='width:100%;'>";
                         echo "<tr>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Id</b></font></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Nombre</b></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Email</b></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Telefono</b></td>";

                         
                         echo "</tr>";
                         
                         
           //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
           $reg=$hacerconsulta->fetch_array();
                         
                         while ($reg)
                         {
                         echo "<tr>";
                         echo "<td align='center' >".$reg[0]."</td>";
                         echo "<td align='center' >".$reg[2]."</td>";
                         echo "<td align='center' >".$reg[3]."</td>";
                         echo "<td align='center' >".$reg[4]."</td>";



           $reg=$hacerconsulta->fetch_array();
                         echo "</tr>";
                         }
                         echo "</table>";
                        

?>
</div>












Lista de Normas:
<?php

echo $cliente;
   $consulta = "SELECT * FROM normacliente WHERE cliente='$cliente'";

   ?>
			 		<div style="width: 90%; margin:0 auto; font-size: 13px;" >
					<?php

          $hacerconsulta = $conexion->query($consulta);
							 
			
							echo "<table class='table-sm table-striped' style='width:100%;'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Id</b></font></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Norma</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Vendedor</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'style='border: inset 0pt;'></td>";
							
							echo "</tr>";
							
							
              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center' >".$reg[0]."</td>";
							echo "<td align='center' >".$reg[1]."</td>";
							echo "<td align='center' >".$reg[3]."</td>";



							echo "<td  align='center' style='border: inset 0pt'>				
								<form action='norma.php' method='post'>			
									<input type='hidden' name='norma' value=".$reg[1].">
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









<form method="post" action="editarUsuario.php">
<input type="hidden" name="idUsuario" value="<?php echo $usuario; ?>">
<input type="submit" name="editarUsuario" value="Modificar Datos del Usuario">
</form>
    
</body>
</html>
<?php
}else{
  header("location:../index.php");
}
?>