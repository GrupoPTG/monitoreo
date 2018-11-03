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
<div style="display:inline block; width:50%; ">
<?php

$norma = $_POST['norma'];
require_once("../modelo/connect.php");

$sql = "SELECT * FROM normas WHERE documento='$norma'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 
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





<?php

 if(isset($_POST['editarNormas'])){


    $sdo= $_POST['sdo'];
    $documento= $_POST['documento'];
    $titulo=$_POST['titulo'];
    $formato=$_POST['formato'];
    $idioma=$_POST['idioma'];
    $revisionActual=$_POST['revisionActual'];
    $ultimaRevision=$_POST['ultimaRevision'];
    $estatus=$_POST['estatus'];
    $observaciones=$_POST['observaciones'];
  
  
    $actualizarNorma = "UPDATE normas SET 
    sdo='$sdo',
    titulo='$titulo',
    idioma='$idioma',
    formato='$formato',
    revisionActual='$revisionActual',
    ultimaRevision='$ultimaRevision',
    estatus='$estatus',
    observaciones='$observaciones'
    WHERE documento='$documento'";
  
    
            //Consulta Actualizar Usuario
            if($conexion->query($actualizarNorma)!==False){
                echo "La norma fue actualizada con exito";
            }else{
                echo "La norma no fue actualizado por favor consulte con el administrador";
            }  


//Carga en Registro por actualizacion de norma


            $registroActNorma = "INSERT INTO normas_actualizadas VALUES (
                '',
                '$documento',
                '$titulo',
                '$revisionActual',
                '$ultimaRevision',
                '$estatus',
                '$observaciones'
                )";       
  

  //Consulta Actualizar Usuario
  if($conexion->query($registroActNorma)!==False){
    echo "El reporte normas fue actualizado actualizada con exito";
}else{
    echo "El reporte de normas no fue actualizado por favor consulte con el administrador";
} 
    
  }else{
      ?>

      <form  method="post" action="#">
        <label>SDO</label><br>
        <input type="text" name="sdo" value="<?php echo $sdo; ?>" required><br>
        <label>Documento</label><br>
        <input type="text" name="documento" value="<?php echo $documento; ?>" required readonly><br>
        <label>Titulo</label><br>
        <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>
        <label>Formato</label><br>
        <select name="formato">
            <option>Digital</option>
        </select><br>
        <label>Idioma</label><br>
        <select name="idioma">
            <option>Ingles</option>
            <option>Espanol</option>
        </select><br>
        <label>Revision Actual</label><br>
        <input type="text" name="revisionActual" class="tcal" value="<?php echo $revisionActual ?>" /><br>
        <label>Ultima Revision</label><br>
        <input type="text" name="ultimaRevision" class="tcal" value="<?php echo $ultimaRevision ?>" /><br>
        <label>Estatus</label><br>
        <input type="text" name="estatus" value="<?php echo $estatus; ?>"><br><br>
        <label>Observaciones</label><br>
        <textarea name="observaciones"><?php echo $observaciones ?></textarea>
        
        
        <br><br>
        <input type="hidden" value="<?php echo $norma?>" name="norma">
        <input type="submit" name="editarNormas" value="Guardar Cambios">
        </form>

            

      <?php
  }
  
  ?>


</div>

Hola mundo
<div style="display:inline block; width:50%; ">

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
