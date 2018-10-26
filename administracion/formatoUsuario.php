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
                    <a class="nav-link" href="editUser.php">EDITAR USUARIO</a>
                </li>

            </ul>
        </div>
    </div>


  <section class="user-create container">
  <?php
echo $usuario = $_POST['idUser'];

require_once("../modelo/connect.php");


$sql = "SELECT * FROM usuarios WHERE id='$usuario'";
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


<br><br>
<span>Cliente</span>
<input type="text" name="" value="<?php echo $cliente   ?>" readonly>
<br><br>


<span>Pais</span>
<input type="text" name="" value="<?php echo $pais   ?>" readonly>


<span>Idioma</span>
<input type="text" name="" value="<?php echo $idioma   ?>" readonly>
<br><br>

<span>Inicio Contrato</span>
<input type="text" name="" value="<?php echo $inicioContrato   ?>" readonly>
<br><br>

<span>Fin Contrato</span>
<input type="text" name="" value="<?php echo $finContrato   ?>" readonly>
<br><br>

<span>Correo Electronico</span>
<input type="text" name="" value="<?php echo $email   ?>" readonly>
<br><br>


<span>Direccion de Cliente</span>
<input type="text" name="" value="<?php echo $direccion   ?>" readonly>
<br><br>

<span>Descripcion</span>
<input type="text" name="" value="<?php echo  $descripcion   ?>" readonly>
<br><br>




















Contactos:<br>
<?php
$consulta = "SELECT * FROM contactos WHERE cliente='$usuario'";

?>
    <div style="width: 90%; margin:0 auto; font-size: 13px;" >
 <?php
$resultado = $conexion->query($consulta);

while($fila=$resultado->fetch_assoc()){

	

	echo "<input type='text' value='". $fila['nombreContacto']."'>";
  echo "<input type='text' value='". $fila['cargo']."'>";
	echo "<input type='text' value='". $fila['emailContacto']."'>";
  echo "<input type='text' value='". $fila['telefonoContacto']."'>";
  echo "<br>";
	

}

$conexion->close();

           
                         
                        

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
