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
                        <a class="dropdown-item" href="crearVendedor.php   ">VENDEDOR</a>
                    </div>
                </li>
                <li class="nav-item">
                <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" > EDITAR USUARIO </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a class="dropdown-item" href="editUser.php">CLIENTE</a>
                        <a class="dropdown-item" href="vendedores.php">VENDEDOR</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>


      <section class="vendedor container">
        <h1 class="user-text text-center">LISTA DE VENDEDORES</h1>


        <div class="row my-5">
            <div class="col-md-6">
                <h5>VENDEDORES CREADOS</h5>
            </div>
            <div class="col-md-6">
                <div class="input-group ">
                    <input type="text" id="searchTerm" class="form-control" placeholder="Buscar" onkeyup="doSearch()" />
                    <span class="input-group-btn">
                      <button class="btn btn-search" type="button">
                          <img src="../assets/img/magnifier.png" class="calen-img" alt="">
                      </button>
                  </span>
                </div>
            </div>

        </div>
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
                   <div style="font-size: 13px;" >
                  <?php

        $hacerconsulta = $conexion->query($consulta);

                        echo "<table class='table table-bordered' id='datos'>";
                        echo "<thead class='bck-thead txt-center'>";
                        echo "<tr>";
                        echo "<th><img src='../assets/img/check (1).png' class='wdt-form' alt=''></th>";
                        echo "<th> ID </th>";
                        echo "<th>VENDEDOR</th>";
                        echo "<th>CORREO ELECTRÓNICO </th>";
                        echo "<th> DIRECCIÓN</th>";
                        echo "<th>PAIS</th>";
                        echo "<th> OPCIONES </th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "</tr>";
          
                          
            //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
            $reg=$hacerconsulta->fetch_array();
                          
                          while ($reg)
                          {
                          echo "<tr>";
                          echo "<td style='text-align: center'>                            
                          <input type='checkbox'  aria-label='Checkbox for following text input' name='usersID[]' value='".$reg[0]."'>
                          </form>
                          </td>";
                          echo "<td align='center' >".$reg[0]."</td>";
                          echo "<td align='center' >".$reg[1]."</td>";
                          echo "<td align='center' >".$reg[2]."</td>";
                          echo "<td align='center' >".$reg[3]."</td>";
                          echo "<td align='center' >".$reg[5]."</td>";

                          
                          echo "
                          <td  align='center' >				
                          <form action='verVendedor.php' method='post' class='btn-table'>			
                                <input type='hidden' name='idUser' value=".$reg[0].">
                                <input type='image' name='imageField' src='../assets/img/magnifier.png' width='20px' />
                            </form>    
                            <form action='editarVendedor.php' method='post' class='btn-table'>			
                                  <input type='hidden' name='idUser' value=".$reg[0].">
                                  <input type='image' name='imageField' src='../assets/img/edit-draw-pencil.png' width='20px' />
                              </form>	

                            <form action='#' method='post' class='btn-table'>			
                                <input type='hidden' name='idUser' value=".$reg[0].">
                                <input type='hidden' name='delete'>
                                <input type='image' name='imageField' src='../img/trash-can.png' width='20px' />
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
    <script src="../js/custom.js"></script>
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
