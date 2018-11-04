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
 $norma = $_POST['norma'];

require_once("../modelo/connect.php");


$sql = "SELECT * FROM normas WHERE documento='$norma'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
     $id= $fila['id'];
	 $sdo= $fila['sdo'];
     $documento =$fila['documento'];
     $titulo =$fila['titulo'];
     $idioma =$fila['idioma'];
     $formato =$fila['formato'];
     $revisionActual =$fila['revisionActual'];
     $ultimaRevision =$fila['ultimaRevision'];
     $estatus =$fila['estatus'];
     $observaciones =$fila['observaciones'];
?>



<br><br>
<input type="text" value="<?php echo $id ?>" name="id">
<br><br>
<input type="text" value="<?php echo $sdo ?>" name="id">
<br><br>
<input type="text" value="<?php echo $documento ?>" name="documento">
<br><br>

<input type="text" value="<?php echo $titulo ?>" name="titulo">
<br><br>

<input type="text" value="<?php echo $idioma ?>" name="titulo">
<br><br>    
<input type="text" value="<?php echo $formato ?>" name="titulo">
<br><br>
<input type="text" value="<?php echo $revisionActual ?>" name="titulo">
<br><br>

<input type="text" value="<?php echo $ultimaRevision ?>" name="titulo">
<br><br>
<input type="text" value="<?php echo $estatus ?>" name="titulo">
<br><br> 

<input type="text" value="<?php echo $observaciones ?>" name="titulo">





<br><br>


<form method="post" action="editarNorma.php">
<input type="hidden" name="norma" value="<?php echo $norma; ?>">
<input type="submit" name="editarNorma" value="Modificar Registro">
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
