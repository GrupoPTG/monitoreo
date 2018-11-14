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
                    <a class="nav-link " href="crearusuario.php">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="contratos.php">CLIENTES</a>
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
                    <a class="nav-link" href="#">Reporte Gerencial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reporte de Auditoria</a>
                </li>

            </ul>
        </div>
    </div>


  <section class="user-create container">
  
<?php
echo $cliente=$_POST['cliente'];
?>

<div class="col-md-12">
    <form method="post" action="#" class="row">


        <div class="col-md-5">
            <p>Estatus</p>
            <div class="input-group mb-1">
                <select name='estatus' class="custom-select">
                <option>Actualizada</option>
                <option>Desactualizada</option>
                <option>Informar</option>                      
                </select>
            </div>
        </div>

        <div class="col-md-5">
            <p>SDO</p>
            <div class="input-group mb-1">
                <select class="custom-select" name='sdo'>
                    <option>Todos</option>
                    <option>ASTM</option>
                    <option>ASME</option>
                    <option>ISO</option>
                    <option>IMO</option>                      
                </select>
            </div>
        </div>

        <div class="col-md-2">
        <input type="hidden" value="<?php echo $cliente ?>" name="cliente">
        <input type="submit" class="btn btn-send btn-col1 mt-4" value="Generar Reporte" name="filtrar">

        </div>

    </form>
</div>





<div class="my-5">

        <?php
            if(isset($_POST['filtrar'])){
                require_once("../controlador/filtrarGeneral.php");
            }
        ?>
</div>


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
