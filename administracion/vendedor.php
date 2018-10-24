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
echo $vendedor = $_POST['idUser'];

require_once("../modelo/connect.php");


$sql = "SELECT * FROM vendedor WHERE id='$vendedor'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 $id= $fila['id'];
     $nomVendedor =$fila['nombre'];
     $email =$fila['correo'];
     $telefono =$fila['telefono'];
     $pass =$fila['pass'];
     $territorio =$fila['territorio'];
?>




<table>
    <tr>
        <td>Id:</td>
        <td><?php echo $id ?></td>
    </tr>
    <tr>
        <td>Nombre de Vendedor:</td>
        <td><?php echo $nomVendedor ?></td>
    </tr>
    <tr>
        <td>Email de Cliente:</td>
        <td><?php echo $email ?></td>
    </tr>
    <tr>
        <td>Telefono:</td>
        <td><?php echo $telefono ?></td>
    </tr>
    <tr>
        <td>Clave Usuario:</td>
        <td><?php echo $pass ?></td>
    </tr>
    <tr>
        <td>Territorio</td>
        <td><?php echo $territorio ?></td>
    </tr>
</table>


















Contratos:<br>
<?php
$consulta = "SELECT * FROM vendedorcliente WHERE vendedor='$vendedor'";

?>
    <div style="width: 90%; margin:0 auto; font-size: 13px;" >
                 <?php

       $hacerconsulta = $conexion->query($consulta);
                          
         
                         echo "<table class='table-sm table-striped' style='width:100%;'>";
                         echo "<tr>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Id</b></font></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Cliente</b></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Inicio Contrato</b></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Fin de Contrato</b></td>";

                         
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



Normas Vendidas:<br>
<?php
$consulta = "SELECT * FROM normacliente WHERE vendedor='$nomVendedor'";

?>
    <div style="width: 90%; margin:0 auto; font-size: 13px;" >
                 <?php

       $hacerconsulta = $conexion->query($consulta);
                          
         
                         echo "<table class='table-sm table-striped' style='width:100%;'>";
                         echo "<tr>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Id</b></font></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Norma</b></td>";
                         echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Cliente</b></td>";
                         

                         
                         echo "</tr>";
                         
                         
           //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
           $reg=$hacerconsulta->fetch_array();
                         
                         while ($reg)
                         {
                         echo "<tr>";
                         echo "<td align='center' >".$reg[0]."</td>";
                         echo "<td align='center' >".$reg[1]."</td>";
                         echo "<td align='center' >".$reg[2]."</td>";



           $reg=$hacerconsulta->fetch_array();
                         echo "</tr>";
                         }
                         echo "</table>";
                        

?>




<br><br>

<!--
<form method="post" action="editarUsuario.php">
<input type="hidden" name="idUsuario" value="<?php echo $usuario; ?>">
<input type="submit" name="editarUsuario" value="Modificar Datos del Usuario">
</form>
-->
    
</body>
</html>
<?php
}else{
  header("location:../index.php");
}
?>