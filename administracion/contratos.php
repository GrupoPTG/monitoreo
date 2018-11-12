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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
                    <a class="nav-link active" href="crearUsuario.php">USUARIOS</a>
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



        <section class="vendedor container">
            <h1 class="user-text text-center">LISTA DE VENDEDORES</h1>


            <div class="row my-5">
                <div class="col-md-6">
                    <h5>USUARIOS CREADOS</h5>
                </div>
                <div class="col-md-6">
                    <div class="input-group ">
                        <input type="text" id="searchTerm" class="form-control" onkeyup="doSearch()" placeholder="Buscar" />
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

 $consulta = "SELECT * FROM usuarios";

 ?>
                   <div style="margin:0 auto; font-size: 13px;" >
                  <?php

        $hacerconsulta = $conexion->query($consulta);
                           
                echo "<table class='table table-bordered' id='datos'>";
                echo "<thead class='bck-thead txt-center'>";
                echo "<tr>";
                echo "<th><img src='../assets/img/check (1).png' class='wdt-form' alt=''></th>";
                echo "<th> ID </th>";
                echo "<th>CLIENTE</th>";
                echo "<th>CORREO ELECTRÓNICO </th>";
                echo "<th> PAIS</th>";
                echo "<th>INICIO DE CONTRATO</th>";
                echo "<th>FIN DE CONTRATO</th>";
                echo "<th> N° CONTRATO </th>";
                echo "<th> ESTATUS </th>";
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
                            echo "<td>                            
                            <input type='checkbox' aria-label='Checkbox for following text input' name='usersID[]' value='".$reg[0]."'>
                            </form>
                            </td>";
                            echo "<td align='center' >".$reg[0]."</td>";
                            echo "<td align='center' >".$reg[1]."</td>";
                            echo "<td align='center' >".$reg[2]."</td>";
                            echo "<td align='center' >".$reg[6]."</td>";
                            echo "<td align='center' >".$reg[8]."</td>";
                            echo "<td align='center' >".$reg[9]."</td>";
                            echo "<td align='center' >".$reg[11]."</td>";
                            echo "<td align='center' >".$reg[10]."</td>";

                          
                          echo "
                          <td  align='center'>				
								<form action='verUsuario.php' method='post'>			
                                    <input type='hidden' name='idUser' value=".$reg[0].">
                                    <input type='hidden' name='delete'>
									<input type='image' name='imageField' src='../assets/img/magnifier.png' width='20px'/>
                                </form>                                								
                              <form action='listaMaestra.php' method='post'>			
                                  <input type='hidden' name='cliente' value=".$reg[0].">                                  
                                  <input type='submit' class='btn m-1' name='imageField' value='Lista Maestra'/>
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

 
 <div class="col-md-12 p-0">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <a href="javascript:myFunction()" class="btn btn-trash p-1">ELIMINAR SELECCIÓN |  <img src="../assets/img/trash-can.png" class="wdt-form" alt=""></a>
                    </div>
                    <div class="col-md-6 p-0 d-flex justify-content-end">
                        <nav aria-label="Page navigation ">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link clpg" href="#">Previa</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link clpg" href="#">Próxima</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
  </section>





    <script src="../js/jquery.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>
