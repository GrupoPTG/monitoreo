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
                    <a class="nav-link active" href="#">USUARIOS</a>
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
                        <a class="dropdown-item"  href="crearusuario.html">CLIENTE</a>
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
    <h1 class="user-text text-center">CREAR USUARIO CLIENTE</h1>
    <form method="post" action="#" id="resetear" >
        <div class="row my-5">
            <h5>DATOS DEL CLIENTE</h5>
        </div>
        <div class="row">
            <div class="col-md-6">

                <p>Nombre del Cliente</p>
                <div class="input-group mb-3">
                    <input type="text"  class="form-control"  name="cliente" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">*</span>
                    </div>
                </div>

                <p>Correo Electrónico</p>
                <div class="input-group mb-3">
                    <input type="email"  class="form-control"  name="direccion" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">*</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Pais</p>
                        <div class="input-group mb-1">
                            <select class="custom-select" name="pais"  required>
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
                            <div class="input-group-append">
                                <label class="input-group-text" for="#">*</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Idioma</p>
                        <div class="input-group mb-1">
                            <select class="custom-select" name="idioma" required>
                              <option>Espanol</option>
                              <option>Portuges</option>
                              <option>Ingles</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="#">*</label>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <div class="col-md-6">

                <p>Usuario</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control"  name="email" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">*</span>
                    </div>
                </div>

                <p>Dirección</p>
                <div class="input-group">
                    <textarea class="form-control hgarea" type="text" aria-label="With textarea" name="direccion" required></textarea>
                    <div class="input-group-prepend">
                        <span class="input-group-text">* </span>
                    </div>
                </div>

            </div>
        </div>

        <div class="row my-5">
            <h5>DATOS DE CONTACTOS</h5>
        </div>
        <div class="col-md-12 row">
            <div class="input-group wd-1 m-1">
                <input type="text"  class="form-control" placeholder="Nombre"  name="nombreContacto[]" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">*</span>
                </div>
            </div>
<!--
            <div class="input-group wd-1 m-1">
                <input type="text"  class="form-control" placeholder="Cargo"  required>
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">*</span>
                </div>
            </div>
    -->
            <div class="input-group wd-1 m-1">
                <input type="text"  class="form-control" placeholder="Correo Electrónico" name="nombreCorreo[]"  required>
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">*</span>
                </div>
            </div>

            <div class="input-group wd-1 m-1 clonedInput">
                <input type="text"  class="form-control" placeholder="Teléfono" name="nombreTelefono[]" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">*</span>
                </div>
            </div>
            <button type="button" id="btnAdd" class="btn btn-light btn-circle" onclick="agregarContacto()"><i class="fas fa-plus"></i></button>
            <div id="formularioCliente" class="col-md-12 row"></div>  
            <!--
            <button type="button" id="btnAdd" class="btn btn-light btn-circle"><i class="fas fa-plus"></i></button>
            -->
        </div>

        <div class="row my-5">
            <h5>DATOS DE CONTRATO</h5>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!--
                <p>Número de contrato</p>
                <div class="input-group mb-3">
                    <input type="text"  class="form-control" >
                </div>
                -->
                <div class="row">
                    <div class="col-md-6">
                        <p>Fecha de Inicio</p>
                        <input type="text" name="inicioContrato" class="tcal" value="" />
                        <!--
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="inicioContrato" aria-label="Seleccione" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="date"><img src="../assets/img/calendar.png" class="calen-img" alt=""></button>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-md-6">
                        <p>Fecha de Culminación</p>
                        <input type="text" name="finContrato" class="tcal" value="" />
                        <!--
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="finContrato" aria-label="Seleccione" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="text"><img src="../assets/img/calendar.png" class="calen-img" alt=""></button>
                            </div>
                        </div> -->
                    </div>
                    <!--
                    <p>Vendedor</p>
                    <div class="input-group mb-1">
                        <select class="custom-select"  required>
                            <option selected>Seleccione..</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    -->
                </div>

            </div>
            <!--
            <div class="col-md-6">
                <p>Descripción</p>
                <div class="input-group">
                    <textarea class="form-control hgarea" aria-label="With textarea"></textarea>
                </div>
            </div>
    -->
        </div>
<!--
        <div class="row my-5">
            <h5>CARGAR UNA FOTO</h5>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-2">
                <div class="box-img">
                    <img src="assets/img/photo.png" alt="" class="box-img-cont">
                </div>
            </div>
            <div class="col-md-5">
                <p>Seleccione un archivo</p>
                <p>.jpg o .png</p>
                <div class="custom-file wd-1">
                    <input type="file" class="custom-file-input" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Cargar imagen</label>
                </div>
            </div>
        </div>
    -->
        <div class="row m-5">
            <div class="col-md-12 txt-center ">
                <button class="btn btn-send btn-col1 m-1" type="submit" name="registrarCliente">CREAR</button>
                <button class="btn btn-send btn-col2 m-1" type="button" onclick="limpiarFormulario()">LIMPIAR</button>
            </div>
        </div>
    </form>
  </section>

<?php
  require_once("../controlador/registroUsuario.php");
?>



<br><br>
Lista de Usuarios Creados


<?php


require_once("../modelo/connect.php");

   $consulta = "SELECT * FROM usuarios";

   ?>
			 		<div style="width: 90%; margin:0 auto; font-size: 13px;" >
					<?php

          $hacerconsulta = $conexion->query($consulta);
							 
			
							echo "<table class='table-sm table-striped' style='width:100%;'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Id</b></font></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Cliente</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Email Cliente</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Direccion</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'><b><font color='black'>Pais</b></td>";
							echo "<td align='center' bgcolor='#e8e8e8'style='border: inset 0pt;'></td>";
							
							echo "</tr>";
							
							
              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center' >".$reg[0]."</td>";
							echo "<td align='center' >".$reg[1]."</td>";
							echo "<td align='center' >".$reg[2]."</td>";
							echo "<td align='center' >".$reg[4]."</td>";
							echo "<td align='center' >".$reg[5]."</td>";


							echo "<td  align='center' style='border: inset 0pt'>				
								<form action='usuario.php' method='post'>			
									<input type='hidden' name='idUser' value=".$reg[0].">
									<input type='image' name='imageField' src='../img/view.gif' />
								</form>				
							</td>";//FIN DEL echo

							
					


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
