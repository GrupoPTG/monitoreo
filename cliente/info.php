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
                    <a class="nav-link " href="crearusuario.php">USUARIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="reporteCliente.php">REPORTES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">,</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">,</a>
                </li>
            </ul>
        </div>
    </div>
    


  <section class="user-create container">
  <?php
 echo $usuario = $_SESSION['login'];

require_once("../modelo/connect.php");


$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
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

<?php
                        if(isset($_POST['enviar'])){
                            ?>
                            <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:700px;" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" onclick="cerrarVentana()">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            Su comentario ha sido enviado con exito..
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
              <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
          </div>
        </div>
      </div>
                            

                            <?php
                        }
                    ?>

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



                    <?php
                        if(isset($_POST['contactar'])){
                            ?>
                            <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:700px;" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" onclick="cerrarVentana()">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="#" method="post">

<textarea placeholder="Escriba su duda, comentario o Sugerencia pronto nos comunicaremos con usted….
" name="comentario"></textarea>
<input type="submit" value="enviar" name="enviar">
</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
              <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
          </div>
        </div>
      </div>
                            

                            <?php
                        }
                    ?>

                <form method="post" action="#">
                        <input type="submit" value="contactar" name="contactar">
                </form>

                        <a href="../certificados/<?php echo $cliente ?>.pdf" target="_blank"><input type="button" value="Dscargra Certificado" name="contactar" ></a>
                
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
