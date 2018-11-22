<?php
  session_start();
  if ($_SESSION['login'])
    {
 $cliente=$_POST['cliente'];
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
                    <a class="nav-link " href="crearusuario.php">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href="contratos.php">CLIENTES</a>
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
                    <a class="nav-link" href="edituser.html">
                        <form action='reportes.php' method='post'>
                            <input type="hidden" value="<?php echo $cliente ?>" name="cliente" >
                            <input type="submit" value="Reporte Gerencial" style="background: white;border: 0;">
                        </form>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edituser.html">
                    <form method="post" action="reporteAuditoria.php">
                            <input type="hidden" value="<?php echo $cliente?>" name="cliente">
                            <input type="submit" value="Reporte de Auditoria"  style="background: white;border: 0;">
                        </form>
                    </a>
                </li>

            </ul>
        </div>
    </div>









  <section class="user-create container">

    <form method="post" action="#" style="width:100%">
    <div class="row">

        <div class="col-md-3">
            <p>Reportes</p>
            <div class="input-group mb-1">
                <select class="custom-select" name="dias">
                    <option>30 DIAS</option>
                    <option>60 DIAS</option>
                    <option>90 DIAS</option>
                    <option>periodo</option>                             
                </select>
            </div>
        </div>
        <!-- codigo que integraras
        <div class="col-md-3">
            <p>Fecha de Inicio</p>
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="inicioContrato" aria-label="Seleccione" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="date"><img src="../assets/img/calendar.png" class="calen-img" alt=""></button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <p>Fecha de Culminación</p>
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="finContrato" aria-label="Seleccione" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="text"><img src="../assets/img/calendar.png" class="calen-img" alt=""></button>
                </div>
            </div> 
        </div>
        -->
        <div class="col-md-3">
            <p>SDO</p>
            <div class="input-group mb-1">
                <select class="custom-select" name="sdo" >
                <option>Todos</option>
                    <option>ASTM</option>
                    <option>ASME</option>
                    <option>ISO</option>
                    <option>TODOS</option>                              
                </select>
            </div>
        </div>

        <div class="offset-md-5">
        <input type="hidden"  class="btn btn-send btn-col1 m-1" value="<?php echo $cliente ?>"  type="submit" name="cliente"/>
        <input type="submit"  class="btn btn-send btn-col1 m-1" value="Generar Reporte"  type="submit" name="filtrar"/>
        </div>
        </div>        
    </form>







        <?php
            if(isset($_POST['filtrar'])){
                require_once("../controlador/filtrarAuditoria.php");
            }
        ?>



        
  </section>





<?php include("js.php");?> 
</body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>
