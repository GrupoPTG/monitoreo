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
                        <a class="dropdown-item" href="#">VENDEDOR</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edituser.html">EDITAR USUARIO</a>
                </li>

            </ul>
        </div>
    </div>


  <section class="user-create container">
  <form  method="post" action="#">

<label>Nombre del Vendedor</label><br>
  <input type="text" name="vendedor" required><br>

<label>Telefono</label><br>
  <input type="text" name="telefono" required><br>

<label>Correo</label><br>
  <input type="text" name="correo" required><br>

    <label>Territorio</label><br>
  <select name="territorio">
      <option>Brasil</option>
      <option>Venezuela</option>
  </select><br>


          <?php
          require_once("../modelo/connect.php");
            $consulta = "SELECT * FROM usuarios WHERE estatus='Activo'";
            $hacerconsulta = $conexion->query($consulta);
        ?>

        
        
<br><br>
<label>Cliente:</label>

    <?php
       echo "<select name='cliente[]' size='6' multiple>";
    ?>
       <!--<option>Seleccionar..</option>-->
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['cliente']."</option>";
        }

        echo "</select>";
    ?>  
  
  <br>
  <input type="submit" value="Crear Vendedor" name="createVendedor">

</form>




<?php
  require_once("../controlador/registroUsuario.php");
?>


<br><br><br>

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
