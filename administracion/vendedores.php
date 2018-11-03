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


  <section class="user-create container">
 <?php
 require_once("../modelo/connect.php");

 if(isset($_POST['delete'])){

    $usuario = $_POST['idUser'];
    
    $consulta = "DELETE FROM vendedor WHERE id='$usuario' ";
    $hacerconsulta = $conexion->query($consulta);
    echo "<br><br>";
    echo "Vendedor eliminado";
    echo "<br><br>";
}

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

                          
                          echo "
                          <td  align='center' style='border: inset 0pt'>				
								<form action='#' method='post'>			
                                    <input type='hidden' name='idUser' value=".$reg[0].">
                                    <input type='hidden' name='delete'>
									<input type='image' name='imageField' src='../img/trash-can.png' width='20px' />
                                </form>                                				
                            </td>
                            
                            <td  align='center' style='border: inset 0pt'>				
                              <form action='editarVendedor.php' method='post'>			
                                  <input type='hidden' name='idUser' value=".$reg[0].">
                                  <input type='image' name='imageField' src='../img/edit.gif' />
                              </form>				
                          </td>
                          
                          <td  align='center' style='border: inset 0pt'>				
                          <form action='verVendedor.php' method='post'>			
                              <input type='hidden' name='idUser' value=".$reg[0].">
                              <input type='image' name='imageField' src='../img/view.gif' />
                          </form>                                				
                        </td>
                          ";//FIN DEL echo

                          
                  


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
