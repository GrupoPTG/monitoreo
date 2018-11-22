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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administracion</title>
    <link rel="stylesheet" type="text/css"  href="main.css" />
    <link rel="stylesheet" href="../assets/css/flexboxgrid.css">
    <link rel="stylesheet" href="../assets/css/mega.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/tcal.css">

    <script src="../js/script.js"></script>
    <script type="text/javascript" src="../js/tcal.js"></script>
</head>
<body>


<?php
include("../administracion/menu.php");
?>

    <div class="menu ">
        <div class="menu-down">
            <ul class="nav nav-tabs container">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="cliente.html">CLIENTES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">VENDEDORES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">NORMAS</a>
                </li>
            </ul>
        </div>
    </div>
    


  <section class="user-create container">
<br><br><br><br>
<h1 class="user-text text-center">CLIENTES</h1>
<?php
require_once("../modelo/connect.php");

$vendedor= $_SESSION['login'];

$sql = "SELECT * FROM vendedor WHERE correo='$vendedor'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
$idVendedor =$fila['id'];
?>
















<?php
$consulta = "SELECT * FROM vendedorcliente WHERE vendedor='$idVendedor'";

?>
                  <div style="font-size: 12px;" >
                 <?php

       $hacerconsulta = $conexion->query($consulta);
                          
                       echo "<table class='table table-bordered' id='datos'>";
                       echo "<thead class='bck-thead txt-center'>";
                       echo "<tr>";
                       echo "<th> ID </th>";
                       echo "<th>CLIENTE</th>";
                       echo "<th>COOREO</th>";
                       echo "<th>PAIS</th>";
                       echo "<th> OPCIONES </th>";
                       echo "</tr>";
                       echo "</thead>";
                       echo "<tbody  style='font-size: 15px;'>";
                       echo "<tr>";
                       echo "</tr>";	
                       
           //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
           $reg=$hacerconsulta->fetch_array();
                         
                         while ($reg)
                         {
                           echo "<tr>";
                           echo "<td align='center' >".$reg[3]."</td>";
                           echo "<td align='center' >".$reg[2]."</td>";
                           echo "<td align='center' >".$reg[4]."</td>";
                           echo "<td align='center' >".$reg[5]."</td>";

                           echo "
                         <td  align='center'>				
                               <form action='verUsuario.php' method='post' style='display: inline-block;'>			
                                   <input type='hidden' name='idUser' value=".$reg[3].">
                                   <input type='image' style='padding: 2px' name='imageField' src='../assets/img/magnifier.png' width='20px'/>
                               </form>                                								
    	
                         </td>";//FIN DEL echo

                         
                 


           //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
           $reg=$hacerconsulta->fetch_array();
                         echo "</tr>";
                         }
                         echo "</table>";
                         $conexion->close();

                         ?>

<br><br>

<form method="post" action="#">
    <input type="submit" value="Agregar Nueva Compra" name="aggCompra">
</form>


<?php
if(isset($_POST['aggCompra'])){
  ?>
    
    <form method="post" action="#">

        <span>Codigo:</span>
        <input type="text" name="codigo">
        <br>
        <span>Revision de Cliente:</span>
        <input type="text" name="codigo" placeholder="yy/mm/dd">
        <br>
        

    </form>

  <?php
}
?>

  </section>





<?php
include("../administracion/js.php");
?>
</body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>
