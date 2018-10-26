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
                        <a class="dropdown-item"  href="index.php">CLIENTE</a>
                        <a class="dropdown-item" href="#">VENDEDOR</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="editUser.php">EDITAR USUARIO</a>
                </li>

            </ul>
        </div>
    </div>


   <section class="vendedor container">
    <form method="post" action="#">
        <h1 class="user-text text-center">CREAR USUARIO VENDEDOR</h1>


        <div class="row my-5">
            <h5>DATOS DEL VENDEDOR</h5>
        </div>
        <div class="row">
        
            <div class="col-md-6">
                <p>Nombre</p>
                <div class="input-group mb-3">
                    <input type="text" id="#" name="vendedor" class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text">*</span>
                    </div>
                </div>
<!--
                <p>Usuario</p>
                <div class="input-group mb-3">
                    <input type="text" id="#" class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text">*</span>
                    </div>
                </div>
    -->
                <p>Correo Electrónico</p>
                <div class="input-group mb-3">
                    <input type="text" id="#" name="correo" class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text">*</span>
                    </div>
                </div>

                <p>Telefono</p>
                <div class="input-group mb-3">
                    <input type="text" id="#" name="telefono" class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text">*</span>
                    </div>
                </div>
<!--
                <div class="row">
                    <div class="col-md-6">
                        <p>Pais</p>
                        <div class="input-group mb-1">
                            <select class="custom-select" id="inputGroupSelect02" required>
                                        <option selected>Seleccione..</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">*</label>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-12" style="padding: 0 !important;">
                        <p>Territorio</p>
                        <div class="input-group mb-1">
                            <select class="custom-select" id="inputGroupSelect02" name="territorio" required>
                                        <option selected>Seleccione..</option>
                                        <option value="1">Brasil</option>
                                        <option value="2">Venezuela</option>
                                    </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">*</label>
                            </div>
                        </div>
                    </div>
                    <!--
                </div>-->


            </div>

            <div class="col-md-6">
                <div class="box-vend">
                    <div class="menu-down p-4">
                        <ul class="nav nav-tabs container">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Clientes</a>
                            </li>
                        </ul>

                        <div class="input-group py-3">
                            <input type="text" class="form-control" placeholder="Buscar" />
                            <span class="input-group-btn">
                                <button class="btn btn-search" type="button">
                                    <img src="assets/img/magnifier.png" class="calen-img" alt="">
                                </button>
                            </span>
                        </div>

                        <div class="box-search">
                            <nav>
                                <ul class="nav flex-column m-3">
                                <li class="nav-item my-3"><input type="checkbox" class="check" id="checkAll"> Seleccionar todos</li>
                                <?php
                                    require_once("../modelo/connect.php");
                                    $consulta = "SELECT * FROM usuarios WHERE estatus='Activo'";
                                    $resultado = $conexion->query($consulta);
                                    while($fila=$resultado->fetch_assoc()){
                                    echo "<li class='nav-item'> <input type='checkbox' class='check' name='cliente[]' value='". $fila['cliente']."'> "  . $fila['cliente']."</li>";
                                    }
                                    $conexion->close();
                                    ?>    
                                </ul>
                            </nav>

                        </div><!--
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-col3 m-1" type="submit">CANCEL</button>
                            <button class="btn btn-send btn-col1 m-1" type="submit">SALVAR</button>
                        </div>
                                -->
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-5" style="text-align:center">
                <button class="btn btn-send btn-col1 m-1" name="createVendedor" type="submit">CREAR VENDEDOR</button>
                
                    
<!--
                <div class=" box-select my-5">
                    <nav>
                        <ul class="nav">
                            <li class="box-select-client p-1 m-2">cliente 1 <span class="x mx-2"> X </span> </li>
                            <li class="box-select-client p-1 m-2">cliente 2 <span class="x mx-2"> X </span> </li>
                            <li class="box-select-client p-1 m-2">cliente 3 <span class="x mx-2"> X </span> </li>
                            <li class="box-select-client p-1 m-2">cliente 4 <span class="x mx-2"> X </span> </li>
                        </ul>
                    </nav>
                </div>
                                -->
                

            </div>
        </div>
        </form>
    </section>


<?php
if(isset($_POST['createVendedor'])){

$largo=5;
  $str = "abcdefghijklmnopqrstuvwxyz";
  $may = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $num = "1234567890";
  $cad = "";
  # Comienzo de la generacion de clave.
  $cad = substr($may ,rand(0,24),1);
  $cad .= substr($num ,rand(0,10),1);
  $cad .= substr($num ,rand(0,10),1);
  for($i=0; $i<$largo; $i++) {
  $cad .= substr($str,rand(0,24),1);
  }
  ;

  
  $nombreVendedor= $_POST['vendedor'];
  $emailVendedor=$_POST['correo'];
  $telefono=$_POST['telefono'];
  $territorio=$_POST['territorio'];
  $cliente=$_POST['cliente'];


  $registrarVendedor = "INSERT INTO vendedor VALUES (
    '',
    '$nombreVendedor',
    '$telefono',
    '$emailVendedor',
    '$cad',
    '$territorio'
    )";

  
require ("../modelo/connect.php");
  //Consulta Registrar Usuario
  if($conexion->query($registrarVendedor)!==False){
      echo "El Vendedor fue registrado con exito";
  }else{
      echo "El Vendedor no fue registrado por favor consulte con el administrador";
  }



     //Consulta obtener el ultimo ID de vendedor registrado
     $ultimoIdVendedor ="SELECT MAX(id) AS id FROM vendedor";
     $resultado = $conexion->query($ultimoIdVendedor);
     if ($row = $resultado->fetch_row() ){
           $code = trim($row[0]);
           $vendedorId = $code++;
         }





  for($i=0; $i<sizeof($cliente); ++$i){

    $clienteName = $cliente[$i];

     $clienteName;


    $registrarVendedor = "INSERT INTO vendedorcliente VALUES (
      '',
      '$vendedorId',
      '$clienteName',
      '',
      ''
      )";


    $registroVendedor = $conexion->query($registrarVendedor);

  }

}//existe registrar vendedor?

?>















<br><br><br>

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
