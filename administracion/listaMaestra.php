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
include("menu.php");
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
    <div class="sub-menu">
        <div class="mrg">
            <ul class="nav container">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" > CREAR USUARIO </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a class="dropdown-item"  href="crearusuario.php">CLIENTE</a>
                        <a class="dropdown-item" href="vendedor.html">VENDEDOR</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edituser.html">EDITAR USUARIO</a>
                </li>

            </ul>
        </div>
    </div>






<?php
if(isset($_POST['asignarNorma'])){
  require_once("../controlador/aggNormaListaMaestra.php");
}
?>








  <section class="user-create container">
  <br><br>
Lista Maestra de Normas


<?php


require_once("../modelo/connect.php");

 $cliente = $_POST['cliente'];


$sql = "SELECT * FROM usuarios WHERE id='$cliente'";
   $resultado = $conexion->query($sql);
   $fila=$resultado->fetch_assoc();
   echo "<br><br>";
 echo "Cliente:".$nombreCliente= $fila['cliente'];



   $consulta = "SELECT * FROM normacliente WHERE cliente='$cliente'";

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
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Revision Cliente</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Revision Actual</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Estatus Norma</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Estatus del Cliente</b></td>";
              echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Observaciones</b></td>";
            
							echo "<td align='center' bgcolor='#e8e8e8'style='border: inset 0pt;'></td>";
							
							echo "</tr>";
							
							
              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							
							while ($reg)
							{
							echo "<tr>";
                            echo "<td align='center' >".$reg[0]."</td>";
                            echo "<td align='center' >".$reg[3]."</td>";
							echo "<td align='center' >".$reg[1]."</td>";
							echo "<td align='center' >".$reg[4]."</td>";
							echo "<td align='center' >".$reg[5]."</td>";
                            echo "<td align='center' >".$reg[6]."</td>";
                            echo "<td align='center' >".$reg[7]."</td>";
                            echo "<td align='center' >EstatusCliente</td>";
							echo "<td align='center' >".$reg[8]."</td>";
							


							echo "<td  align='center' style='border: inset 0pt'>				
								<form action='verNorma.php' method='post'>			
									<input type='hidden' name='norma' value=".$reg[1].">
									<input type='image' name='imageField' src='../img/view.gif' />
								</form>				
							</td>";//FIN DEL echo

							
					


              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							echo "</tr>";
							}
							echo "</table>";
							

							?>
								</div>
							<?php
?>










<br><br><br>
<form method="post" action="#">
        <ul class="nav flex-column m-3">
        <li class="nav-item my-3"><input type="text" value="Buscar norma"></li>

        <li class="nav-item my-3">
        <input type="checkbox" class="check" id="checkAll"> Seleccionar todos</li>
            <?php
                require_once("../modelo/connect.php");
                $consulta = "SELECT * FROM normas";
                $resultado = $conexion->query($consulta);
                while($fila=$resultado->fetch_assoc()){
                    echo "<li class='nav-item'> <input type='checkbox' class='check' name='documento[]' value='". $fila['documento']."'> "  . $fila['documento']."</li>";
                }
                                    
             ?>    
        </ul>
        <input type='hidden' name='cliente' value="<?php echo $cliente ?>">
        <input type="submit" name="asignarNorma" value="Asignar Norma">
</form>










  </section>





    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>
        function limpiarFormulario() {
            document.getElementById("resetear").reset();
        };
    </script>
</body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>
