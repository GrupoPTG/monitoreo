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


<form  method="post" action="#">

<label>Nombre del Vendedor</label><br>
  <input type="text" name="vendedor" value="<?php echo $nomVendedor ?>"><br>


<label>Usuario</label><br>
  <input type="text" name="correo" value="<?php echo $email ?>"><br>

<label>Clave</label><br>
  <input type="text" name="pass" value="<?php echo $pass ?>"><br>

<label>Telefono</label><br>
  <input type="text" name="telefono" value="<?php echo $telefono ?>"><br>


<label>Pais</label><br>
  <input type="text" name="pais" value="<?php echo $territorio ?>"><br>




  



        
        
<br><br>
<label>Clientes:</label>
<br>

<ul>
   <?php

        require_once("../modelo/connect.php");

        $consulta = "SELECT * FROM vendedorcliente WHERE vendedor='$vendedor'";

 ?>
                   <div style="width: 90%; margin:0 auto; font-size: 13px;" >
                  <?php

        $hacerconsulta = $conexion->query($consulta);
                           
          
                          echo "<table class='table-sm table-striped' style='width:100%;'>";
                          echo "<tr>";
                          
                          echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Cliente</b></td>";
                          echo "<td align='center' bgcolor='#e8e8e8'style='border: inset 0pt;'></td>";
                          
                          echo "</tr>";
                          
                          
            //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
            $reg=$hacerconsulta->fetch_array();
                          
                          while ($reg)
                          {
                          echo "<tr>";
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
                              </div>
                          <?php

   ?>
























  </ul>
            <input type="hidden" value="<?php echo $vendedor ?>" name="idUser"> 
            <input type="submit" value="Guardar" name="actualizar">
            <br><br>
  <br>
 

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
