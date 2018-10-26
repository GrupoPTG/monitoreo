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
                    <a class="nav-link" href="editUser.php">EDITAR USUARIO</a>
                </li>

            </ul>
        </div>
    </div>


  <section class="user-create container">
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
     $descripcion =$fila['descripcion'];

?>




<section class="user-create container">
    <h1 class="user-text text-center">INFORMACIÓN DE CLIENTE</h1>

        <div class="row mt-5">
            <div class="col-md-6">
                <h4> <span style="color:black">Cliente: </span><?php echo $cliente   ?></h4>
                <h4> <span style="color:black">Idioma: </span><?php echo $idioma   ?></h4>
                <h4> <span style="color:black">Inicio Contrato: </span><?php echo $inicioContrato   ?></h4>
            </div>
            <div class="col-md-6">
                <h4> <span style="color:black">Correo Electronico: </span><?php echo $email   ?></h4>
                <h4> <span style="color:black">Pais: </span><?php echo $pais   ?></h4>
                <h4> <span style="color:black">Fin Contrato: </span><?php echo $finContrato   ?></h4>
            </div>
            <div class="col-md-12">
                <h4> <span style="color:black">Direccion de Cliente: </span><?php echo $direccion   ?></h4>
                <h4> <span style="color:black">Descripción: </span><?php echo $descripcion   ?></h4>
            </div>
            <div class="col-md-12">
                <h4>Contactos:</h4>
                <ul>
                <?php
                    $consulta = "SELECT * FROM contactos WHERE cliente='$usuario'";

                    $resultado = $conexion->query($consulta);

                    while($fila=$resultado->fetch_assoc()){

                        echo "<li> Contacto: ". $fila['nombreContacto']." </li>";
                        echo "<li> Cargo: ". $fila['cargo']." </li>";
                        echo "<li> Email: ". $fila['emailContacto']." </li>";
                        echo "<li> Teléfono: ". $fila['telefonoContacto']." </li>";

                    }
                    $conexion->close();
                    ?>
                </ul>

            </div>

        </div>
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
