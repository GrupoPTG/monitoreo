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
    



    require_once("../modelo/consultas.php");
    
    //Consulta Registrar Usuario
    if($conexion->query($registrarUsuario)!==False){
        echo "El Usuario fue registrado con exito";
    }else{
        echo "El Usuario no fue registrado por favor consulte con el administrador";
    }  
    
    //Consulta obtener el ultimo ID de usuario registrado
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
    

  }//existe registrar cliente?























if(isset($_POST['createVendedor'])){

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

    
    $nombreVendedor= $_POST['vendedor'];
    $emailVendedor=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $territorio=$_POST['territorio'];
    $cliente=$_POST['cliente'];


    $registrarVendedor = "INSERT INTO vendedor VALUES (
      '',
      '$nombreVendedor',
      '$telefono',
      '$emailVendedor',
      '$cad',
      '$territorio'
      )";

    
    //Consulta Registrar Usuario
    if($conexion->query($registrarVendedor)!==False){
        echo "El Vendedor fue registrado con exito";
    }else{
        echo "El Vendedor no fue registrado por favor consulte con el administrador";
    }



       //Consulta obtener el ultimo ID de vendedor registrado
       $ultimoIdVendedor ="SELECT MAX(id) AS id FROM vendedor";
       $resultado = $conexion->query($ultimoIdVendedor);
       if ($row = $resultado->fetch_row() ){
             $code = trim($row[0]);
             $vendedorId = $code++;
           }





    for($i=0; $i<sizeof($cliente); ++$i){

      $clienteName = $cliente[$i];

       $clienteName;


      $registrarVendedor = "INSERT INTO vendedorcliente VALUES (
        '',
        '$vendedorId',
        '$clienteName',
        '',
        ''
        )";
  

      $registroVendedor = $conexion->query($registrarVendedor);
  
    }

}//existe registrar vendedor?




















if(isset($_POST['editarCliente'])){


  $idUsuario= $_POST['idUsuario'];
  $nombreCliente= $_POST['cliente'];
  $emailCliente=$_POST['email'];
  $pass=$_POST['pass'];
  $dirCliente=$_POST['direccion'];
  $pais=$_POST['pais'];
  $idioma=$_POST['idioma'];
  
  /*
  $nombreContacto = $_POST['nombreContacto'];
  $nombreCorreo = $_POST['nombreCorreo'];
  $nombreTelefono = $_POST['nombreTelefono'];
  */



  $actualizarUsuario = "UPDATE usuarios SET 
  cliente='$nombreCliente',
  pass='$pass',
  direccion='$dirCliente',
  pais='$pais',
  idioma='$idioma'
  WHERE id=$idUsuario";

  
  //Consulta Actualizar Usuario
  if($conexion->query($actualizarUsuario)!==False){
      echo "El Usuario fue actualizado con exito";
  }else{
      echo "El Usuario no fue actualizado por favor consulte con el administrador";
  }  

  
  
}//Si Existe editar cliente?























if(isset($_POST['cargarNorma'])){


    
    $sdo= $_POST['sdo'];
    $documento=$_POST['documento'];
    $titulo=$_POST['titulo'];
    $idioma=$_POST['idioma'];
    $formato=$_POST['formato'];
    $revision=$_POST['revision'];
    $estatus=$_POST['estatus'];
    $observaciones=$_POST['observaciones'];





    $cargarNorma = "INSERT INTO normas VALUES (
      '',
      '$sdo',
      '$documento',
      '$titulo',
      '$idioma',
      '$formato',
      '$revision',
      '',
      '$estatus',
      '$observaciones'
      )";

require ("../modelo/connect.php");
    
    //Consulta Registrar Usuario
    if($conexion->query($cargarNorma)!==False){
        echo "La Norma fue cargada con exito";
    }else{
        echo "La Norma no fue cargada por favor consulte con el administrador";
    }


  }// si existe cargar norma?

?>