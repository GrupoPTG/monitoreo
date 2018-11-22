<?php
session_start();


if(isset($_POST['ingresar'])){

    require_once("modelo/connect.php");
     $user=$_POST['user'];
     $pass=$_POST['pass'];

    


    if($user=="admin" && $pass=="admin"){

        
        
        $_SESSION["login"] = $user;
        
                
                        ?>
                        <script type="text/javascript">
                            window.location="administracion/crearusuario.php";
                        </script>
                        <?php
                        
    }else{
          $sql = "SELECT * FROM usuarios WHERE usuario='$user' and pass='$pass'";
          $resultado = $conexion->query($sql);
          $rowcount=mysqli_num_rows($resultado);
          if($rowcount>0){
            
            session_start();
             echo $_SESSION["login"] = $user;
                
                        ?>
                        <script type="text/javascript">
                            window.location="cliente/info.php";
                        </script>
                        <?php
                        
                


          }
          else{


          $sql = "SELECT * FROM vendedor WHERE correo='$user' and pass='$pass'";
          $resultado = $conexion->query($sql);
          $rowcount=mysqli_num_rows($resultado);
          if($rowcount>0){
            
            session_start();
             echo $_SESSION["login"] = $user;
                
                        ?>
                        <script type="text/javascript">
                            window.location="vendedor/index.php";
                        </script>
                        <?php
                        
                


          }else{
              echo "EL USUARIO NO ESTA REGISTRADO";

          }//Fin del else rowcont vendedores



              
          }//fin del if rowcont usuarios
    }//if user and pass are iqual
}
    
?>