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
<div style="display:inline-block; width:40%; background-color:red;">
<?php

$norma = $_POST['norma'];
require_once("../modelo/connect.php");

$sql = "SELECT * FROM normacliente WHERE norma='$norma'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 
$sdo= $fila['sdo'];
$documento =$fila['norma'];
$titulo =$fila['titulo'];

//$formato =$fila['formato'];
$revisionActual =$fila['revisionActual'];
$ultimaRevision =$fila['revisionCliente'];
$estatus =$fila['estatus'];
$observaciones =$fila['observaciones'];
$r = $fila['r'];
$e= $fila['e'];
$strz=$fila['strz'];
$crgo=$fila['crgo'];
$add=$fila['add'];
$tc=$fila['tc'];
$amd=$fila['amd'];
$erta=$fila['erta'];


?>





<?php

 if(isset($_POST['editarNormas'])){


    require_once("../controlador/editarNorma.php");

  }else{
      ?>

      <form  method="post" action="#">
        <label>SDO</label><br>
        <input type="text" name="sdo" value="<?php echo $sdo; ?>" required><br>
        <label>Documento</label><br>
        <input type="text" name="documento" value="<?php echo $documento; ?>" required readonly><br>
        <label>Titulo</label><br>
        <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>
        <!--
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
        <label>Revision Cliente</label><br>
        <input type="text" name="ultimaRevision" class="tcal" value="<?php echo $ultimaRevision ?>" /><br><br>
        -->






<?php
require_once("../modelo/connect.php");
$consulta = "SELECT * FROM normacliente WHERE norma='$norma'";
$hacerconsulta = $conexion->query($consulta);
?>

<label>Revision Actual:</label><br>
    <?php
       echo "<select name='revisionActual'>";
    ?>
       
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['revisionActual']."</option>";
        }
        echo "</select>";
    ?> 
    <br><br>















<?php
require_once("../modelo/connect.php");
$consulta = "SELECT * FROM normacliente WHERE norma='$norma'";
$hacerconsulta = $conexion->query($consulta);
?>

<label>Estatus:</label><br>
    <?php
       echo "<select name='estatus'>";
    ?>
       
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['estatus']."</option>";
        }
        echo "</select>";
    ?> 
    <br><br>

<!--
        <label>Estatus</label><br>
        <input type="text" name="estatus" value="<?php echo $estatus; ?>"><br><br>
    -->
        
        
        

        <label>R:</label>
        <input type="text" name="estatus" value="<?php echo $r; ?>"><br><br>
        <label>E:</label>
        <input type="text" name="estatus" value="<?php echo $e; ?>"><br><br>
        <label>STRZ</label>
        <input type="text" name="estatus" value="<?php echo $strz; ?>"><br><br>
        <label>CRGO</label>
        <input type="text" name="estatus" value="<?php echo $crgo; ?>"><br><br>
        <label>ADD</label>
        <input type="text" name="estatus" value="<?php echo $add; ?>"><br><br>
        <label>TC</label>
        <input type="text" name="estatus" value="<?php echo $tc; ?>"><br><br>
        <label>AMD</label>
        <input type="text" name="estatus" value="<?php echo $amd; ?>"><br><br>
        <label>ERTA</label>
        <input type="text" name="estatus" value="<?php echo $erta; ?>"><br><br>

        <label>Observaciones</label><br>
        <textarea name="observaciones"><?php echo $observaciones ?></textarea>
        
        






</div>
<div style="display:inline-block; width:40%; background-color:yellow; vertical-align:top; ">

<?php

$norma = $_POST['norma'];
require_once("../modelo/connect.php");

$sql2 = "SELECT * FROM normas WHERE documento='$norma'";
$resultado2 = $conexion->query($sql2);
$fila2=$resultado2->fetch_assoc();
	 
$asdo= $fila2['sdo'];
$adocumento =$fila2['documento'];
$atitulo =$fila2['titulo'];
//$formato =$fila['formato'];
$arevisionActual =$fila2['revisionActual'];
$aultimaRevision =$fila2['ultimaRevision'];
$aestatus =$fila2['estatus'];
$aobservaciones =$fila2['observaciones'];
$ar = $fila2['r'];
$ae= $fila2['e'];
$astrz=$fila2['strz'];
$acrgo=$fila2['crgo'];
$aadd=$fila2['add'];
$atc=$fila2['tc'];
$aamd=$fila2['amd'];
$aerta=$fila2['erta'];
?>

<!--
<label>Revision Actual</label><br>
        <input type="text" name="revisionActual" class="tcal" value="<?php echo $arevisionActual ?>" /><br>
        <label>Ultima Revision</label><br>
        <input type="text" name="ultimaRevision" class="tcal" value="<?php echo $aultimaRevision ?>" /><br>
-->












<?php
require_once("../modelo/connect.php");
$consulta = "SELECT * FROM normas WHERE documento='$norma'";
$hacerconsulta = $conexion->query($consulta);
?>

<label>Revision Actual:</label><br>
    <?php
       echo "<select name='arevisionActual'>";
    ?>
       
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['revisionActual']."</option>";
        }
        echo "</select>";
    ?> 
    <br><br>






<?php
require_once("../modelo/connect.php");
$consulta = "SELECT * FROM normas WHERE documento='$norma'";
$hacerconsulta = $conexion->query($consulta);
?>

<label>Estatus:</label><br>
    <?php
       echo "<select name='estatus'>";
    ?>
       
    <?php  
        while($fila=$hacerconsulta->fetch_assoc()){
          echo "<option>".$fila['estatus']."</option>";
        }
        echo "</select>";
    ?> 
    <br><br>




        <!--
        <label>Estatus</label><br>
        <input type="text" name="estatus" value="<?php echo $aestatus; ?>"><br><br>
        -->
<label>R:</label>
        <input type="text" name="estatus" value="<?php echo $ar; ?>"><br><br>
        <label>E:</label>
        <input type="text" name="estatus" value="<?php echo $ae; ?>"><br><br>
        <label>STRZ</label>
        <input type="text" name="estatus" value="<?php echo $astrz; ?>"><br><br>
        <label>CRGO</label>
        <input type="text" name="estatus" value="<?php echo $acrgo; ?>"><br><br>
        <label>ADD</label>
        <input type="text" name="estatus" value="<?php echo $aadd; ?>"><br><br>
        <label>TC</label>
        <input type="text" name="estatus" value="<?php echo $atc; ?>"><br><br>
        <label>AMD</label>
        <input type="text" name="estatus" value="<?php echo $aamd; ?>"><br><br>
        <label>ERTA</label>
        <input type="text" name="estatus" value="<?php echo $aerta; ?>"><br><br>

        <label>Sustituida</label><br>
        <input type="text" name="estatus" value=""><input type="button" value="Search"><br><br>

        <label>Observaciones</label><br>
        <textarea name="observaciones"><?php echo $aobservaciones ?></textarea>

       
        

</div>












        <br><br>
        <input type="hidden" value="<?php echo $norma?>" name="norma">
        <input type="submit" name="editarNormas" value="Guardar Cambios">
        </form>

 <!--  NEW -->
 <h1 class="user-text text-center">EDITAR NORMA</h1>
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

      <?php
  }
  
  ?>















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
