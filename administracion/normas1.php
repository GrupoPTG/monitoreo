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


ASIGNAR NORMAS A CLIENTE

<form method="post" action="#">

<?php
require_once("../modelo/connect.php");
$consulta = "SELECT * FROM usuarios WHERE estatus='Activo'";
$hacerconsulta = $conexion->query($consulta);
?>

<label>Clientes:</label>
    <?php
       echo "<select name='cliente'>";
    ?>
       <option>Seleccionar..</option>
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['cliente']."</option>";
        }
        echo "</select>";
    ?> 

<br><br>






<div class="box-search">
                            <nav>
                                <ul class="nav flex-column m-3">
                                <li class="nav-item my-3"><input type="checkbox" class="check" id="checkAll"> Seleccionar todos</li>
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


<input type="submit" name="asignarNorma" value="Asignar Norma">
</form>




<?php
if(isset($_POST['asignarNorma'])){
  require_once("../controlador/asignarNorma.php");
}
?>












<br><br><br>
  CARGAR NUEVA NORMAS
<br><br>

<form  method="post" action="#">

<label>SDO - ORG</label><br>
  <input type="text" name="sdo" required><br>

<label>Nombre del Documento</label><br>
  <input type="text" name="documento" required><br>

<label>Titulo</label><br>
  <input type="text" name="titulo" required><br>

    <label>Idioma</label><br>
  <select name="idioma">
      <option>English</option>
      <option>Espanol</option>
  </select><br>

   <label>Formato</label><br>
  <select name="formato">
      <option>Digital</option>
  </select><br>

  <label>Revision Actual</label><br>
  <input type="text" name="revision" class="tcal" value="" /><br>

    <label>Estatus</label><br>
  <select name="estatus">
      <option>Actualizada</option>
      <option>Desactualizada</option>
  </select><br>

  <label>Observaciones</label><br>
  <textarea name="observaciones"></textarea><br>



<label>R:</label>
        <input type="text" name="r" ><br><br>
        <label>E:</label>
        <input type="text" name="e" ><br><br>
        <label>STRZ</label>
        <input type="text" name="strz" ><br><br>
        <label>CRGO</label>
        <input type="text" name="crgo" ><br><br>
        <label>ADD</label>
        <input type="text" name="add" ><br><br>
        <label>TC</label>
        <input type="text" name="tc" ><br><br>
        <label>AMD</label>
        <input type="text" name="amd" ><br><br>
        <label>ERTA</label>
        <input type="text" name="erta" ><br><br>


  <br>
  <input type="submit" value="Cargar Norma" name="cargarNorma">

</form>




<?php
  require_once("../controlador/cargarNorma.php");
?>



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
