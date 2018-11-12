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
                    <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" > CREAR USUARIO </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a class="dropdown-item"  href="crearusuario.php">CLIENTE</a>
                        <a class="dropdown-item" href="crearVendedor.php">VENDEDOR</a>
                    </div>
                </li>
                <li class="nav-item">
                <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" > EDITAR USUARIO </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a class="dropdown-item" href="editUser.php">CLIENTE</a>
                        <a class="dropdown-item " href="vendedores.php">VENDEDOR</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>


  <section class="user-create container">



<?php

if(isset($_POST['actualizar'])){

echo "EL USUARIO FUE ACTUALIZADO CON EXITO <br><br>";

    $idUsuario= $_POST['idUser']; 

   $nombreVendedor= $_POST['vendedor'];
   $emailCliente=$_POST['correo'];
   $pass= $_POST['pass'];
   $telefono=$_POST['telefono'];
   $pais=$_POST['pais'];




   /*
   $nombreContacto = $_POST['nombreContacto'];
   $nombreCorreo = $_POST['nombreCorreo'];
   $nombreTelefono = $_POST['nombreTelefono'];
   $nombreCargo = $_POST['cargo'];
   */
   
 
 
 
   $actualizarUsuario = "UPDATE vendedor SET 
   nombre='$nombreVendedor',
   correo='$emailCliente',
   pass='$pass',
   telefono='$telefono',
   territorio='$pais'
   WHERE id=$idUsuario";
 
 require_once("../modelo/connect.php");
   //Consulta Actualizar Usuario
   if($conexion->query($actualizarUsuario)!==False){
       echo "El Usuario fue actualizado con exito";
   }else{
       echo "El Usuario no fue actualizado por favor consulte con el administrador";
   }  
 
   /*

   for($i=0; $i<sizeof($nombreContacto); ++$i){

       $contactName = $nombreContacto[$i];
       $contactEmail= $nombreCorreo[$i];
       $contactTelef= $nombreTelefono[$i];
       $contactCargo= $nombreCargo[$i];
 
       
 
       $registrarContacto = "INSERT INTO contactos VALUES (
         '',
         '$idUsuario',
         '$contactName',
         '$contactEmail',
         '$contactTelef',
         '$contactCargo'
         )";
   
       $regitrarContacto = $conexion->query($registrarContacto);
     }
     */
   
 }
?>




















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

  <section class="user-create container">
<form  method="post" action="#">
    <div class="row my-5">
        <h5>DATOS DEL CLIENTE</h5>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Nombre del Cliente</p>
            <div class="input-group mb-3">
                <input type="text"  class="form-control"  name="vendedor" value="<?php echo $nomVendedor; ?>" >
            </div>
            <p>Clave</p>
            <div class="input-group mb-3">
                <input type="text"  class="form-control"  name="pass" value="<?php echo $pass; ?>" >
            </div>
            <p>Pais</p>
            <div class="input-group mb-1">
                <select class="custom-select" name="territorio" >
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
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <p>Correo Electrónico</p>
            <div class="input-group mb-3">
                <input type="email"  class="form-control"  name="correo" value="<?php echo $email; ?>">

            </div>

            <p>Telefono</p>
            <div class="input-group mb-3">
                <input type="text"  class="form-control"  name="telefono" value="<?php echo $telefono; ?>" >
            </div>
        </div>
    </div>




        
        
<br><br>
<h5>CLIENTES:</h5>
<br>


   <?php

        require_once("../modelo/connect.php");

        $consulta = "SELECT * FROM vendedorcliente WHERE vendedor='$vendedor'";

        $hacerconsulta = $conexion->query($consulta);

                          
            //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
            $reg=$hacerconsulta->fetch_array();
                          
                          while ($reg)
                          {
                          echo "<tr>";
                          echo "<table class='table table-bordered'>";
                          echo "<tbody>";
                          echo "<td align='center' >".$reg[2]."</td>";

                          
                          echo "
                          <td  align='center' style='border: inset 0pt'>				
								<form action='#' method='post'>			
                                    <input type='hidden' name='idUser' value=".$reg[1].">
                                    <input type='hidden' name='delete'>
									<input type='image' name='imageField' src='../img/trash-can.png' width='20px' />
                                </form>                                				
                            </td>
                            
                          ";//FIN DEL echo

            //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
            $reg=$hacerconsulta->fetch_array();
                          echo "</tr>";
                          }
                          echo "</table>";
                          $conexion->close();

                          ?>
                    
            <div class="row m-5">
                <div class="col-md-12 txt-center ">
                    <input type="hidden" value="<?php echo $vendedor?>" name="idUser">
                    <button class="btn btn-send btn-col1 m-1" type="submit" name="actualizar">EDITAR</button>
                   
                </div>
            </div>


 

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
