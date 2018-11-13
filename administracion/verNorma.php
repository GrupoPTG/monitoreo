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
                    <a class="nav-link " href="#">AGREGAR NORMA</a>
                </li>

            </ul>
        </div>
    </div>










  <section class="user-create container">
  <h1 class="user-text text-center">NORMA</h1>
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
     //$ultimaRevision =$fila['ultimaRevision'];
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


<!--  NEW -->
    <div class="row mt-5">
        <div class="col-md-6">       
            <div class="input-group mb-3">
                <span class="client-span">DOCUMENTO:</span>
                <input  value="GMW93"  class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <span class="client-span">SDO - ORG:</span>
                <input  value="ISO"  class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group mb-3">
                <span class="client-span">TITULO:</span>
                <input  value="ISO"  class="form-control" readonly>
            </div>
        </div>

        <div class="col-md-6">       
            <div class="input-group mb-3">
                <span class="client-span">REVISIÓN ACTUAL:</span>
                <input  value="15/05/2018"  class="form-control" readonly>
            </div>
            <div class="row"> 
                <div class="input-group my-2  col-md-4">
                    <span class="client-span">R:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>
                <div class="input-group my-2  col-md-4">
                    <span class="client-span">E:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>
                <div class="input-group my-2  col-md-4">
                    <span class="client-span">STBZ:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>

                 <div class="input-group my-2  col-md-4">
                    <span class="client-span">CRGD:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>
                <div class="input-group my-2  col-md-4">
                    <span class="client-span">ADD:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>
                <div class="input-group my-2  col-md-4">
                    <span class="client-span">TC:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>

                 <div class="input-group my-2  col-md-4">
                    <span class="client-span">AMD:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>
                <div class="input-group my-2  col-md-4">
                    <span class="client-span">ERTA:</span>
                    <input  value="ISO"  class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <p>OBSERVACIÓN DE LA NORMA:</p>
                <textarea class="form-control hgarea" aria-label="With textarea" name=""></textarea>
            </div>
        </div>
        <div class="col-md-12 m-4 txt-center">
            <form method="post" action="editarNorma.php">
                <input type="hidden" name="norma" value="<?php echo $norma; ?>">
                <input type="submit" class="btn btn-send btn-col1 m-1" name="editarNorma" value="EDITAR">
            </form>  
                   
        </div>

        <div class="col-md-12" style="text-align:center; margin: 50px 0;">
            <a href="contratos.php" class="col-boton" style="margin: 0 auto;">VOLVER A CONTRATOS</a>
        </div>

    </div>     
<!-- FIN -->   
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
