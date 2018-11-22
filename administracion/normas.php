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
    
<section class="user-create container">

        <?php
        if(isset($_POST['asignarNorma'])){
        require_once("../controlador/asignarNorma.php");
        }
        ?>
        <!--<br><br><br>
        CARGAR NUEVA NORMAS
        <br><br>-->
    <h1 class="user-text text-center" style="margin: 50px;"> CARGAR NUEVA NORMAS</h1>










<?php 
    require_once("../controlador/cargarNorma.php"); 
    require_once("../controlador/asignarNorma.php");
?>





    <form  method="post" action="#">
        <div class="row mt-5">
            <!--label>Nombre del Documento</label><br>
            <input type="text" name="documento" required><br>-->
            <div class="col-md-6">       
                    <div class="input-group mb-3">
                        <span class="client-span">DOCUMENTO:</span>
                        <input type="text" name="documento" value=""  class="form-control" >
                    </div>
            </div>
            <!--<label>SDO - ORG</label><br>
        <input type="text" name="sdo" required><br>-->
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="client-span">SDO - ORG:</span>
                    <input type="text" name="sdo" required value=""  class="form-control" >
                </div>
            </div>

            <!--<label>Titulo</label><br>
            <input type="text" name="titulo" required><br>-->
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <span class="client-span">TITULO:</span>
                    <input type="text" name="titulo" required  value=""  class="form-control" >
                </div>
            </div>
            <!-- <label>Idioma</label><br>
            <select name="idioma">
                <option>English</option>
                <option>Espanol</option>
            </select><br>-->

            <!--<label>Formato</label><br>
            <select name="formato">
                <option>Digital</option>
            </select><br>-->

            <!--<label>Revision Actual</label><br>
            <input type="text" name="revision" class="tcal" value="" /><br>-->
            <div class="col-md-6">       
                <div class="input-group mb-3">
                    <span class="client-span">REVISIÓN ACTUAL:</span>
                    <input type="text" name="revision" value=""  class="form-control tcal" >
                </div>
            </div>     
            
            <!--<select name="estatus">
                <option>Actualizada</option>
                <option>Desactualizada</option>
            </select><br>-->
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label style="font-size:14px">ESTATUS:</label>
                        <select class="custom-select form-control" name="estatus" required>
                            <option>Actualizada</option>
                            <option>Desactualizada</option>                              
                        </select>
                </div>
            </div>

            
            <div class="col-md-6"> 
                <div class="row"> 
                    <!--<label>R:</label>
                    <input type="text" name="r" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">R:</span>
                        <input  type="text" name="r" value=""  class="form-control">
                    </div>
                    <!--<label>E:</label>
                    <input type="text" name="e" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">E:</span>
                        <input type="text" name="e"    value=""  class="form-control">
                    </div>

                    <!--<label>STRZ</label>
                    <input type="text" name="strz" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">STBZ:</span>
                        <input type="text" name="strz"   value=""  class="form-control" >
                    </div>

                    <!--<label>CRGO</label>
                    <input type="text" name="crgo" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">CRGO:</span>
                        <input  type="text" name="crgo"  value=""  class="form-control" >
                    </div>

                    <!--<label>ADD</label>
                    <input type="text" name="add" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">ADD:</span>
                        <input type="text" name="add" value=""  class="form-control" >
                    </div>

                    <!--<label>TC</label>
                    <input type="text" name="tc" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">TC:</span>
                        <input type="text" name="tc" value=""  class="form-control" >
                    </div>
                    <!--<label>AMD</label>
                    <input type="text" name="amd" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">AMD:</span>
                        <input type="text" name="amd" value=""  class="form-control" >
                    </div>

                    <!--<label>ERTA</label>
                    <input type="text" name="erta" ><br><br>-->
                    <div class="input-group my-2  col-md-4">
                        <span class="client-span">ERTA:</span>
                        <input type="text" name="erta" value=""  class="form-control" >
                    </div>
                </div>
            </div>
            <!--<label>Observaciones</label><br>
            <textarea name="observaciones"></textarea><br>-->
            <div class="col-md-6">
                <div>
                    <p style="">OBSERVACIÓN DE LA NORMA:</p>
                    <textarea class="form-control hgarea" aria-label="With textarea" name="observaciones"></textarea>
                </div>
            </div>

            <br>
            <!--<input type="submit" value="Cargar Norma" name="cargarNorma">-->

        </div>
        

        <div class="col-md-12 m-3 txt-center">                
                    <input type="submit" class="btn btn-send btn-col1 m-1" value="Cargar Norma" name="cargarNorma">                
            </div>

        </form>












        <form method="post" action="#">

        <h2 class="user-text text-center" style="margin: 55px;"> ASIGNAR NORMA A CLIENTES</h2>
        <form method="post" action="#">
            <?php
            require_once("../modelo/connect.php");
            $consulta = "SELECT * FROM usuarios WHERE estatus='Activo'";
            $hacerconsulta = $conexion->query($consulta);
            ?>
            
            <div class="col-md-12">
                <div class="box-vend" style="padding: 39px;">
                <!--
                    <ul class="nav nav-tabs container">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Norma</a>
                        </li>
                    </ul>
                -->
                    <!--<label>Clientes:</label>-->
                        <?php echo "<select name='cliente'>"; ?>
                        <option>Seleccionar..</option>
                        <?php  
                            while($fila=$hacerconsulta->fetch_assoc()){
                            echo "<option>".$fila['cliente']."</option>";
                            }
                            echo "</select>";
                        ?> 
                    <div class="input-group py-3">
                        <input type="text" class="form-control" id="datos2" placeholder="Buscar" onkeyup="doSearchLi()"/>
                            <span class="input-group-btn">
                                <button class="btn btn-search" type="button">
                                    <img src="../assets/img/magnifier.png" class="calen-img" alt="">
                                </button>
                            </span>
                    </div>

                    <div class="box-search">
                        <nav>
                            <ul class="nav flex-column m-3">
                            <li class="nav-item my-3"><input type="checkbox" class="check" id="checkAll"> Seleccionar todos</li>
                            <?php
                                require_once("../modelo/connect.php");
                                $consulta = "SELECT * FROM normas";
                                $resultado = $conexion->query($consulta);
                                while($fila=$resultado->fetch_assoc()){
                                echo "<li class='nav-item'> <input type='checkbox' class='check' name='documento[]' value='". $fila['documento']."'> "  . $fila['documento']."</li>";
                                }
                            ?>    
                            </ul>
                        </nav>
                    </div>
                    <div class="text-center" >
                        <input type="submit"  class="btn btn-send btn-col1 m-1" style="margin-top:10px" name="asignarNorma" value="Asignar Norma">
                    </div>       
                </div>                            
            </div>
        </form>


  </section>
  
            

  
<!-- ---------------------------------termina aqui !-- --------------------------------------->
<?php include("js.php");?>
</body>
</html>

<?php 
    }else{
         header("location:../index.php");
    }

