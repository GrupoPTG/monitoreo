<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Automatizado de Normas PTG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>
<body>

<header style="height:130px; background-color:black;">

    <div style="height:100px; background-color:black; float:left; padding-top:35px; -moz-box-sizing: border-box;
         box-sizing: border-box; margin-left:150px;">
        <img src="img/logoptg.png" width="100px">
    </div>

    <div style="height:100px; background-color:black; float:right; padding-top:55px; -moz-box-sizing: border-box;
         box-sizing: border-box; margin-right:50px;">
        <div class="item-menu";>INICIO</div>
        <div class="item-menu";>NOSOTROS</div>
        <div class="item-menu";>PRODUCTOS Y SOLUCIONES</div>
        <div class="item-menu";>IDIOMAS</div>
        <div class="item-menu";>AREA DE CLIENTES</div>
    </div>
</header>

    <div id="login">
        
        <div id="formularioLogin">
            <div style="text-align:center; font-family:verdana; padding-top:20px; color:white; font-size:20px;">MONITOREO DE NORMAS</div>
            <div style="text-align:center; font-family:verdana; padding-top:10px; color:white; font-size:14px;">USUARIOS</div>
            <form method="post" action="login.php">
                <input type="text" name="user" placeholder="Usuario" required class="formLogin"><br>
                <input type="password" name="pass" placeholder="Contraseña" required class="formLogin"><br>
                <input type="submit" value="LOGIN" class="btn_singIn" name="ingresar">
            </form>





            <?php

                if (isset($_POST['btn_singIn'])){

                    $nick =  $_POST['user'];

                    if ($_POST['user']=="admin" && $_POST['pass']=="admin"){
                        
                        $_SESSION["login"] = $nick;
                
                        ?>
                        <script type="text/javascript">
                            window.location="administracion/crearusuario.php";
                        </script>
                        <?php
                
                    }else{

                        echo"<font color='white'>Usuario o Contraseña Incorrecto</font>";
                    }
                }
            ?>

            <p style="text-align:right; margin-right:20px; font-size:13px; color: #29ab3e ;"><br>¿OlVIDO SU CONTRASEÑA?</p>

        </div>
    </div>

    
</body>
</html>