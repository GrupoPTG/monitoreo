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
                    <a class="nav-link active" href="crearusuario.php">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="contratos.php">CLIENTES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="vendedores.php">VENDEDORES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="normas.php">NORMAS</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="mrg">
            <ul class="nav container">
                <li class="nav-item">
                    <a class="nav-link " href="#">INFORMACIÓN GENERAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="listaMaestra.php">LISTA MAESTRA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">REPORTES</a>
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
    <h1 class="user-text text-center">LISTA MAESTRA</h1>
<?php


require_once("../modelo/connect.php");

 $cliente = $_POST['cliente'];





 if(isset($_POST['usersID'])){

    $usuario = $_POST['usersID'];

    for($i=0; $i<sizeof($usuario); ++$i){

        $userToDelete = $usuario[$i];
 
        $consulta = "DELETE FROM normacliente WHERE id='$userToDelete' ";
        $hacerconsulta = $conexion->query($consulta);
        
    }

    echo "Usuarios eliminados";
}







$sql = "SELECT * FROM usuarios WHERE id='$cliente'";
   $resultado = $conexion->query($sql);
   $fila=$resultado->fetch_assoc();
   
?>

   <div class="row mt-5">
        <div class="col-md-6">
            <?php
   echo "<h5>".$nombreCliente= $fila['cliente']."</h5>";
            ?>
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
   $consulta = "SELECT * FROM normacliente WHERE cliente='$cliente'";
   $hacerconsulta = $conexion->query($consulta);
   $row_cnt = $hacerconsulta->num_rows;

   ?>
   <div style="float: right;"><p>TOTAL DE NORMAS: <?php echo $row_cnt ?></p></div>
			 		<div style="font-size: 13px;" >
                     <form method='post' action='#' name='myForm'>
                     <input type="hidden" value="<?php echo $cliente ?>" name="cliente">
					<?php

          
							 
			
                            echo "<table class='table table-bordered' id='datos'>";
                            echo "<thead class='bck-thead txt-center'>";
                            echo "<tr>";
                            echo "<th><img src='../assets/img/check (1).png' class='wdt-form' alt=''></th>";
                            echo "<th > ID</font></th>";
                            echo "<th > SDO/ORG</font></th>";
							echo "<th > DOCUMENTO</th>";
							echo "<th > TITULO</th>";
							echo "<th > REVISIÓN CLIENTE</th>";
                            echo "<th > REVISIÓN ACTUAL</th>";
                            echo "<th > ESTATUS NORMA</th>";
                            echo "<th > ESTATUS DEL CLIENTE</th>";
                            echo "<th > OBSERVACIONES</th>";
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
                            echo "<td align='center' ><input type='checkbox' aria-label='Checkbox for following text input' name='usersID[]' value='".$reg[0]."'></td>";
                            echo "<td align='center' >".$reg[3]."</td>";
							echo "<td align='center' >".$reg[1]."</td>";
							echo "<td align='center' >".$reg[4]."</td>";
							echo "<td align='center' >".$reg[5]."</td>";
                            echo "<td align='center' >".$reg[6]."</td>";
                            echo "<td align='center' >".$reg[7]."</td>";
                            echo "<td align='center' >EstatusCliente</td>";
							echo "<td align='center' >".$reg[8]."</td>";
							


							echo "<td  align='center''>				
								<form action='verNorma.php' method='post'>			
									<input type='hidden' name='norma' value=".$reg[1].">
									<input type='image' name='imageField' src='../assets/img/magnifier.png' width='20px' />
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


<form method="post" action="#">

 <div class="col-md-6">
                <div class="box-vend">
                    <div class="menu-down p-4">
                        <ul class="nav nav-tabs container">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Clientes</a>
                            </li>
                        </ul>

                        <div class="input-group py-3">
                            <input type="text" class="form-control" id="datos2" placeholder="Buscar" onkeyup="doSearchLi()"/>
                            <span class="input-group-btn">
                                <button class="btn btn-search" type="button">
                                    <img src="../assets/img/magnifier.png" class="calen-img" alt="">
                                </button>
                            </span>
                        </div>

                        <div class="box-search">
                            <nav>
                                <ul class="nav flex-column m-3">
                                    <li class="nav-item my-3"><input type="checkbox" class="check" id="checkAll"> Seleccionar todos</li>
                                        
                                        <ul  class="nav flex-column m-3" id="myUl">
                                        <?php
                                            require_once("../modelo/connect.php");
                                            $consulta = "SELECT * FROM normas";
                                            $resultado = $conexion->query($consulta);
                                            while($fila=$resultado->fetch_assoc()){
                                                echo "<li class='nav-item'> <input type='checkbox' class='check' name='documento[]' value='". $fila['documento']."'> "  . $fila['documento']."</li>";
                                            }
                                                                
                                        ?> 
                                        </ul>
                                </nav>
                                
                        </div>
                        <input type='hidden' name='cliente' value="<?php echo $cliente ?>">
        <input type="submit" name="asignarNorma" value="Asignar Norma">
 </div>
</div>
</div>



</form>










  </section>




<script>
function myFunction() {
    document.myForm.submit() 
}
</script>
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
