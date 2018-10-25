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
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="../js/script.js"></script>

<!-- link calendar resources -->
<link rel="stylesheet" type="text/css" href="../css/tcal.css" />
<script type="text/javascript" src="../js/tcal.js"></script>

</head>
<body>


<?php
include("menu.php");
?>
 



<?php

$usuario = $_POST['idUsuario'];
require_once("../modelo/connect.php");

$sql = "SELECT * FROM usuarios WHERE id='$usuario'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 
     $cliente =$fila['cliente'];
     $email =$fila['emailCliente'];
     $pass =$fila['pass'];
     $direccion =$fila['direccion'];
     $pais =$fila['pais'];
     $idioma =$fila['idioma'];
     $inicioContrato =$fila['inicioContrato'];
     $finContrato =$fila['finContrato'];


?>










<?php
 // require_once("../controlador/registroUsuario.php");

 if(isset($_POST['editarCliente'])){


    $idUsuario= $_POST['idUsuario'];
    $nombreCliente= $_POST['cliente'];
    $emailCliente=$_POST['email'];
    $pass=$_POST['pass'];
    $dirCliente=$_POST['direccion'];
    $pais=$_POST['pais'];
    $idioma=$_POST['idioma'];
    
    
    $nombreContacto = $_POST['nombreContacto'];
    $nombreCorreo = $_POST['nombreCorreo'];
    $nombreTelefono = $_POST['nombreTelefono'];
    
  
  
  
    $actualizarUsuario = "UPDATE usuarios SET 
    cliente='$nombreCliente',
    pass='$pass',
    direccion='$dirCliente',
    pais='$pais',
    idioma='$idioma'
    WHERE id=$idUsuario";
  
    
    //Consulta Actualizar Usuario
    if($conexion->query($actualizarUsuario)!==False){
        echo "El Usuario fue actualizado con exito";
    }else{
        echo "El Usuario no fue actualizado por favor consulte con el administrador";
    }  
  
    

    for($i=0; $i<sizeof($nombreContacto); ++$i){

        $contactName = $nombreContacto[$i];
        $contactEmail= $nombreCorreo[$i];
        $contactTelef= $nombreTelefono[$i];
  
        
  
        $registrarContacto = "INSERT INTO contactos VALUES (
          '',
          '$idUsuario',
          '$contactName',
          '$contactEmail',
          '$contactTelef'
          )";
    
        $regitrarContacto = $conexion->query($registrarContacto);
      }
    
  }else{











      ?>

      <form  method="post" action="#">
        <label>Nombre del Cliente</label><br>
        <input type="text" name="cliente" value="<?php echo $cliente; ?>" required><br>
        <label>Usuario del Cliente</label><br>
        <input type="text" name="email" value="<?php echo $email; ?>" required readonly><br>
        <label>Clave del Cliente</label><br>
        <input type="text" name="pass" value="<?php echo $pass; ?>" required><br>
        <label>Direccion del Cliente</label><br>
        <input type="text" name="direccion" value="<?php echo $direccion; ?>"><br>
        <label>Pais</label><br>
        <select name="pais">
            <option>Brasil</option>
            <option>Venezuela</option>
            <option>Argentina</option>
            <option>Bolivia</option>
            <option>Brasil</option>
            <option>Chile</option>
            <option>Colombia</option>
            <option>Ecuador</option>
            <option>Panama</option>
            <option>Peru</option>
            <option>Paraguay</option>
            <option>Uruguay</option>
            <option>Mexico</option>
        </select><br>
        <label>Idioma</label><br>
        <select name="idioma">
            <option>Portuges</option>
            <option>Espanol</option>
            <option>Ingles</option>
        </select><br>
        <label>Datos de Contactos</label><br>
        <div id="formularioCliente"></div>  
        <input type="button" value="Agregar Nuevo Contacto" onclick="agregarContacto()"><br><br>
        
        <br><br>
        <input type="hidden" value="<?php echo $usuario?>" name="idUsuario">
        <input type="submit" name="editarCliente" value="Guardar Cambios">
        </form>

            

      <?php
  }
  
  ?>




    </body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>
