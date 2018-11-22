<?php
  session_start();
  if ($_SESSION['login'])
    {
 $session=$_SESSION['login'];
 require_once("../modelo/connect.php");
 $sql = "SELECT * FROM usuarios WHERE usuario='$session'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
	 $cliente= $fila['id'];
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
include("../administracion/menu.php");
?>

    <div class="menu ">
        <div class="menu-down">
            <ul class="nav nav-tabs container">
                <li class="nav-item">
                    <a class="nav-link active" href="info.php">USUARIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">REPORTES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">,</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">,</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="mrg">
            <ul class="nav container">
                <li class="nav-item">
                    
                        <form action='reportes.php' method='post'>
                            <input type="hidden" value="<?php echo $cliente ?>" name="cliente">
                            <input type="submit" value="Reporte Gerencial">
                        </form>
                    
                </li>
                <li class="nav-item">
                    
                    <form method="post" action="reporteAuditoriaCliente.php">
                            <input type="hidden" value="<?php echo $cliente?>" name="cliente">
                            <input type="submit" value="Reporte de Auditoria">
                        </form>
                    
                </li>

            </ul>
        </div>
    </div>









  <section class="user-create container">
  


<div style="background-color:yellow;">
    <form method="post" action="#">

        <span>Estatus</span>
        <select name='estatus' height="200px" >
            <option>Actualizada</option>
            <option>Desactualizada</option>
            <option>Informar</option>
            <option>-</option>
           
        </select>
        
        <br><br>

        <span>SDO</span>
        <select name='sdo' height="200px" >
            <option>Todos</option>
            <option>ASTM</option>
            <option>ASME</option>
            <option>ISO</option>
            <option>IMO</option>
        </select><br><br>
        
        <input type="hidden" value="<?php echo $cliente ?>" name="cliente">
        <input type="submit" value="Generar Reporte" name="filtrar">

    </form>
</div>





<div style="background-color:green;">

        <?php
            if(isset($_POST['filtrar'])){
                require_once("../controlador/filtrarGeneral.php");
            }
        ?>
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
