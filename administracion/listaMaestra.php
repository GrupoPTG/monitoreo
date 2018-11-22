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
                    <a class="nav-link " href="crearusuario.php">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="contratos.php">CLIENTES</a>
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

<?php
if(isset($_POST['asignarNorma'])){
  require_once("../controlador/aggNormaListaMaestra.php");
}
?>









  <section class="user-create container my-5">
    <h1 class="user-text text-center">LISTA MAESTRA</h1>
    
<?php


require_once("../modelo/connect.php");

  $cliente = $_POST['cliente'];


$sql = "SELECT * FROM usuarios WHERE id='$cliente'";
   $resultado = $conexion->query($sql);
   $fila=$resultado->fetch_assoc();


  

   ?>
   <div class="row my-5">
        <div class="col-md-6">
            <?php
   echo "<h3>".$nombreCliente= $fila['cliente']."</h3>";
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
			 		<div style="width: 90%; margin:0 auto; font-size: 13px;" >
					<?php

        $consulta = "SELECT Norcli.norma, Norcli.cliente, Norcli.revisionCliente, Norcli.estatusCliente,Norcli.observaciones,
        Nor.documento, Nor.revisionActual, Nor.sdo, Nor.titulo, Nor.estatus
        FROM normacliente Norcli
        INNER JOIN normas Nor ON Norcli.norma=Nor.documento WHERE cliente='$cliente'";

          $hacerconsulta = $conexion->query($consulta);
							 
            echo "<table class='table table-bordered' id='datos'>";
            echo "<thead class='bck-thead txt-center'>";
            echo "<tr>";
            echo "<th><input type='checkbox'  class='check' id='checkAll'></th>";
            echo "<th > SDO/ORG</font></th>";
            echo "<th > CODIGO</th>";
            echo "<th > REVISIÓN CLIENTE</th>";
            echo "<th > REVISIÓN ACTUAL</th>";
            echo "<th > TITULO DE NORMA </th>";
            echo "<th > ESTATUS NORMA </th>";
            echo "<th > ESTATUS DEL CLIENTE</th>";
            echo "<th > OBSERVACIONES</th>";
            echo "<th > OPCIONES </th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
					
							
              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);  <form action='editarNormaClienteNorma.php' method='post' class='mx-2' style='display:inline-block'>
              $reg=$hacerconsulta->fetch_array();
							
							while ($reg)
							{
                            echo "<tr>";
                            echo "<td align='center' ><input type='checkbox' class='check' aria-label='Checkbox for following text input' name='usersID[]' value='".$reg[0]."'></td>";
                            echo "<td align='center' >".$reg['sdo']."</td>";
							echo "<td align='center' >".$reg['norma']."</td>";
							echo "<td align='center' >".$reg['revisionCliente']."</td>";
							echo "<td align='center' >".$reg['revisionActual']."</td>";
                            echo "<td align='center' >".$reg['titulo']."</td>";
                            echo "<td align='center' >".$reg['estatus']."</td>";
                            echo "<td align='center' >".$reg['estatusCliente']."</td>";
							echo "<td align='center' >".$reg['observaciones']."</td>";
							

                      

							echo "<td  align='center'>				
                                <form action='editarNormas.php' method='post' style='display:inline-block'>
                                    <input type='hidden' name='cliente' value=".$cliente.">		
									<input type='hidden' name='norma' value=".$reg['norma'].">
									<input type='image' name='imageField' src='../assets/img/edit-draw-pencil.png' width='20px'  />
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








<div class="col-md-6">
                <div class="box-vend">
                    <div class="menu-down p-4">
                        <ul class="nav nav-tabs container">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Norma</a>
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
                            <form method="post" action="#">

                                <ul class="nav flex-column m-3">
                                    <li class="nav-item my-3"><input type="checkbox" class="check" id="checkAll"> Seleccionar todos</li>
                                        
                                        <ul  class="nav flex-column m-3" id="myUl">
                                        <?php
                                            require_once("../modelo/connect.php");
                                            $consulta = "SELECT * FROM normas";
                                            $resultado = $conexion->query($consulta);
                                            while($fila=$resultado->fetch_assoc()){
                                                echo "<li class='nav-item'><a class='alist'> <input type='checkbox' class='check' name='documento[]' value='". $fila['documento']."'/>". $fila['documento']."</a></li>";
                                            }
                                                                
                                        ?> 
                                        </ul>
                                </ul>
                            </nav>
                                
                        </div>
                        <input type='hidden' name='cliente' value="<?php echo $cliente ?>">
        <input type="submit" name="asignarNorma" class="btn btn-send btn-col1 m-1" value="Asignar Norma">
        </form>
 </div>











  </section>



<?php
include("js.php");
?>

</body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>
