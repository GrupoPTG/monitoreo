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
                    <a class="nav-link active" href="#">CLIENTES</a>
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
                    <a class="nav-link active" href="#">DATOS PERSONALES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">LISTA MAESTRA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">REPORTES</a>
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
    <h1 class="user-text text-center">CLIENTES</h1>

        <div class="row mt-5">
            <div class="col-md-6">
                
                <div class="input-group mb-3">
                    <span class="client-span">Cliente:</span>
                    <input  value="<?php echo $cliente   ?>"  class="form-control" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="client-span">Pais:</span>
                            <input  value="<?php echo $pais   ?>"  class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="client-span">Idioma:</span>
                            <input  value="<?php echo $idioma   ?>"  class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="client-span">Inicio Contrato:</span>
                    <input  value="<?php echo $inicioContrato   ?>"  class="form-control" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="client-span">Fin Contrato:</span>
                    <input  value="<?php echo $finContrato   ?>"  class="form-control" readonly>
                </div>

            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="client-span">Correo Electronico:</span>
                    <input  value="<?php echo $email   ?>"  class="form-control" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="client-span">Dirección:</span>
                    <textarea class="form-control hgarea" type="text" style="height: auto;"  required readonly><?php echo $direccion   ?></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="client-span">Descripción:</span>
                    <textarea class="form-control hgarea" type="text" style="height: auto;"  required readonly><?php echo $descripcion   ?></textarea>
                </div>
            </div>

            <span class="client-span">FIN DE CONTRATO:</span>
   



    



      
                <?php
                    $consulta = "SELECT * FROM contactos WHERE cliente='$usuario'";

                    $resultado = $conexion->query($consulta);

                    while($fila=$resultado->fetch_assoc()){
                        echo "<div class='col-md-12 row'>";
              
                            echo "<input class='form-control col-md-3' style='margin: 10px 0;' placeholder='Nombre de Contacto'  readonly value=". $fila['nombreContacto']." > ";
                            echo "<input class='form-control col-md-3' style='margin: 10px 0;' placeholder='Cargo'  readonly value=". $fila['cargo']." > ";
                            echo "<input class='form-control col-md-3' style='margin: 10px 0;' placeholder='Email'  readonly value=". $fila['emailContacto']." > ";
                            echo "<input class='form-control col-md-3' style='margin: 10px 0;' placeholder='Teléfono'  readonly value=". $fila['telefonoContacto']." > ";
                            
                        echo "</div>";

                    }
                    $conexion->close();
                    ?>
            <div class="col-md-12" style="text-align:center; margin: 50px 0;">
                <a href="editUser.php" class="col-boton" style="margin: 0 auto;">VOLVER A LA LISTA</a>
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
