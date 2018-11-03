<?php






if(isset($_POST['registrarCliente'])){

    $largo=5;
    $str = "abcdefghijklmnopqrstuvwxyz";
    $may = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $num = "1234567890";
    $cad = "";
    # Comienzo de la generacion de clave.
    $cad = substr($may ,rand(0,24),1);
    $cad .= substr($num ,rand(0,10),1);
    $cad .= substr($num ,rand(0,10),1);
    for($i=0; $i<$largo; $i++) {
    $cad .= substr($str,rand(0,24),1);
    }
    ;

    
    $nombreCliente= $_POST['cliente'];
    $emailCliente=$_POST['correoElectronico'];
    $usuarioCliente=$_POST['usuario'];
    $dirCliente=$_POST['direccion'];
    $pais=$_POST['pais'];
    $idioma=$_POST['idioma'];
    $inicioContrato=$_POST['inicioContrato'];
    $finContrato=$_POST['finContrato'];        
    $nombreContacto = $_POST['nombreContacto'];
    $nombreCorreo = $_POST['nombreCorreo'];
    $nombreTelefono = $_POST['nombreTelefono'];
    $nombreCargo = $_POST['cargo'];
    $estatus="Activo";
    $numeroContrato=$_POST['numeroContrato'];
    $descripcion=$_POST['descripcionCliente'];
    $vendedor=$_POST['vendedor'];
    



    require_once("../modelo/connect.php");
    


    $registrarUsuario = "INSERT INTO usuarios VALUES (
        '',
        '$nombreCliente',
        '$emailCliente',
        '$usuarioCliente',
        '$cad',
        '$dirCliente',
        '$pais',
        '$idioma',
        '$inicioContrato',
        '$finContrato',
        '$estatus',
        '$numeroContrato',
        '$descripcion'
        )";


    //Consulta Registrar Usuario
    if($conexion->query($registrarUsuario)!==False){
        echo "El Usuario fue registrado con exito";
    }else{
        echo "El Usuario no fue registrado por favor consulte con el administrador";
    }  
    

 //Consulta obtener el ultimo ID de usuario registrado
    $ultimoIdUsuario ="SELECT MAX(id) AS id FROM usuarios";
    $resultado = $conexion->query($ultimoIdUsuario);
    if ($row = $resultado->fetch_row() ){
          $code = trim($row[0]);
          $usuarioId = $code++;
        }




    for($i=0; $i<sizeof($nombreContacto); ++$i){

      $contactName = $nombreContacto[$i];
      $contactEmail= $nombreCorreo[$i];
      $contactTelef= $nombreTelefono[$i];
      $contactCargo= $nombreCargo[$i];

      

      

      $registrarContacto = "INSERT INTO contactos VALUES (
        '',
        '$usuarioId',
        '$contactName',
        '$contactEmail',
        '$contactTelef',
        '$contactCargo'
        )";
  
      $regitrarContacto = $conexion->query($registrarContacto);
    }








<<<<<<< HEAD
    
=======
>>>>>>> 48fea412ae2a4dd66f5d6951347cc9777aeb7f37




<<<<<<< HEAD
    $sql = "SELECT * FROM vendedor WHERE nombre='$vendedor'";
    $resultado = $conexion->query($sql);
    $fila=$resultado->fetch_assoc();
    $id= $fila['id'];



    $aggVendedor = "INSERT INTO vendedorcliente VALUES (
        '',
        '$id',
        '$nombreCliente',
        '',
        ''
        )";
  
      $aggVendedor = $conexion->query($aggVendedor);
    
    
    

  }//existe registrar cliente?
=======
>>>>>>> 48fea412ae2a4dd66f5d6951347cc9777aeb7f37






























