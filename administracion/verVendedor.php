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
                    <a class="nav-link" href="crearusuario.php">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="contratos.php">CLIENTES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="vendedores.php">VENDEDORES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="normas.php">NORMAS</a>
                </li>
            </ul>
        </div>
    </div>
    


  <section class="user-create container">





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
    <h1 class="user-text text-center">Vendedor</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                
                <div class="input-group mb-3">
                    <span class="client-span">Nombre del Vendedor:</span>
                    <input  value="<?php echo $nomVendedor   ?>"  class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="client-span">Telefono:</span>
                    <input  value="<?php echo $telefono   ?>"  class="form-control" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="client-span">Pais:</span>
                    <input  value="<?php echo $territorio   ?>"  class="form-control" readonly>
                </div>

            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="client-span">Correo Electronico:</span>
                    <input  value="<?php echo $email   ?>"  class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                        <span class="client-span">Clave:</span>
                        <input  value="<?php echo $pass   ?>"  class="form-control" readonly>
                    </div>


            </div>
        </div>



  



        
        

<span class="client-span">CLIENTES:</span>


<?php

require_once("../modelo/connect.php");

$consulta = "SELECT * FROM vendedorcliente WHERE vendedor='$vendedor'";

?>
           <div style=" font-size: 13px;" >
          <?php

$hacerconsulta = $conexion->query($consulta);
                   
  
                  echo "<div class='col-md-12 row'>";

                  
              
                 
                  

                  
                  
    //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
    $reg=$hacerconsulta->fetch_array();
                  
                  while ($reg)
                  {
                  echo "<input class='form-control col-md-3' style='margin: 10px 0;' placeholder='Nombre de Contacto'  readonly value=". $reg[2]." > ";


    //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
    $reg=$hacerconsulta->fetch_array();

                  }
  
                  $conexion->close();

                  ?>
                      </div>
                  <?php

?>

<div class="col-md-12" style="text-align:center; margin: 50px 0;">
                <a href="vendedores.php" class="col-boton" style="margin: 0 auto;">VOLVER A LA LISTA</a>
            </div>

         
  <br>

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
