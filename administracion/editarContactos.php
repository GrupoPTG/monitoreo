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
  


  <?php
  require_once("../modelo/connect.php");
     $idContacto= $_POST['idContacto'];
      $editNombre= $_POST['editNombre'];
      $editCargo= $_POST['editCargo'];
      $editEmail= $_POST['editEmail'];
      $editTlf= $_POST['editTlf'];
      $editTipo= $_POST['editTipo'];
  ?>

  

<?php
    if(isset($_POST['guardarCambios'])){

        

    if($editTipo=="Cambiar Tipo.."){
        $editTipo=$_POST['tipoOld'];
    }
    $actualizarUsuario = "UPDATE contactos SET 
    nombreContacto='$editNombre',
    emailContacto='$editEmail',
    telefonoContacto='$editTlf',
    cargo='$editCargo',
    tipoContacto='$editTipo'

    WHERE id=$idContacto";
  
    
    //Consulta Actualizar Usuario
    if($conexion->query($actualizarUsuario)!==False){
      ?>
      <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
            <div class="modal-content">
              <div class="modal-body">
              El contacto fue actualizado con exito
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
              </div>
            </div>
          </div>
        </div>
      <?php
    }else{
      ?>
      <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
            <div class="modal-content">
              <div class="modal-body">
              El Contacto no fue actualizado por favor consulte con el administrador
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
    }//fin del isset guardarCambios
?>







  <section class="user-create container">
  <br><br><br><br>
  


<?php
if(isset($_POST['delete'])){


    $consulta = "DELETE FROM contactos WHERE id='$idContacto' ";
    $hacerconsulta = $conexion->query($consulta);

    echo "Contacto Eliminado<br><br>";

    echo "<a href='editUser.php'>Volver..</a>";
}else{
?>

  <form method="post"action="#">
        <span>Nombre de Contacto</span><br>
        <input type="text" name="editNombre" value="<?php echo $editNombre?>"> <br>
        <span>Cargo</span><br>
        <input type="text" name="editCargo" value="<?php echo $editCargo?>"> <br>
        <span>Email</span><br>
        <input type="text" name="editEmail" value="<?php echo $editEmail?>"> <br>
        <span>Telefono</span><br>
        <input type="text" name="editTlf" value="<?php echo $editTlf?>"> <br>
        <span>Tipo de Contacto</span><br>
        <input type="text" name="tipoOld" value="<?php echo $editTipo?>" readonly> <br>
        <select name="editTipo">
            <option>Cambiar Tipo..</option>
            <option>Principal</option>
            <option>Secundario</option>
        </select>
        <br><br>
        <input type="hidden" name="idContacto" value="<?php echo $idContacto ?>">
        <input type="submit" name="guardarCambios" value="Guardar Cambios">
  </form>
<br>
  <form method="post" action="#">
  <input type="hidden" name="idContacto" value="<?php echo $idContacto ?>">
  <input type="hidden" name="editNombre" value="">
  <input type="hidden" name="editCargo" value="">
  <input type="hidden" name="editEmail" value="">
  <input type="hidden" name="editTlf" value="">
  <input type="hidden" name="editTipo" value="">
    <input type="submit" value="Eliminar este Contacto" name="delete">
</form>

<?php
}
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
