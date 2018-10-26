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
echo $vendedor = $_POST['idUser'];

require_once("../modelo/connect.php");


$sql = "SELECT * FROM vendedor WHERE id='$vendedor'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 $id= $fila['id'];
     $nomVendedor =$fila['nombre'];
     $email =$fila['correo'];
     $telefono =$fila['telefono'];
     $pass =$fila['pass'];
     $territorio =$fila['territorio'];
?>


<form  method="post" action="#">

<label>Nombre del Vendedor</label><br>
  <input type="text" name="vendedor" value="<?php echo $nomVendedor ?>"><br>


<label>Usuario</label><br>
  <input type="text" name="correo" value="<?php echo $email ?>"><br>

<label>Clave</label><br>
  <input type="text" name="correo" value="<?php echo $pass ?>"><br>

<label>Telefono</label><br>
  <input type="text" name="telefono" value="<?php echo $telefono ?>"><br>


<label>Pais</label><br>
  <input type="text" name="telefono" value="<?php echo $territorio ?>"><br>




  



        
        
<br><br>
<label>Clientes:</label>
<br>

<ul>
   <?php

         require_once("../modelo/connect.php");
         $consulta = "SELECT * FROM usuarios WHERE id='$vendedor'";

        $resultado = $conexion->query($consulta);
        
        while($fila=$resultado->fetch_assoc()){
        
            
        
            echo "<li> <input type='checkbox' name='cliente[]' value='". $fila['cliente']."'> "  . $fila['cliente']."</li>";
            
            
        }
        
        $conexion->close();
   ?>
  </ul>

            <div style="text-align:center;"><a href="formatoVendedores.php">Volver</div>
  <br>
 

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
