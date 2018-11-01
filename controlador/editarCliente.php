<?php

 if(isset($_POST['editarCliente'])){


    echo $idUsuario= $_POST['idUser']; 
    $nombreCliente= $_POST['cliente'];
    $emailCliente=$_POST['correoElectronico'];
    $usuario= $_POST['usuarioCliente'];
    $pass=$_POST['pass'];
    $dirCliente=$_POST['direccion'];
    //$pais=$_POST['pais'];
    //$idioma=$_POST['idioma'];
    $contratoInicio= $_POST['inicioContrato'];
    $contratoFin=$_POST['finContrato'];
     $contrato=$_POST['numeroContrato'];
    $descripContrato=$_POST['descripcionCliente'];


    
    $nombreContacto = $_POST['nombreContacto'];
    $nombreCorreo = $_POST['nombreCorreo'];
    $nombreTelefono = $_POST['nombreTelefono'];
    $nombreCargo = $_POST['cargo'];
    
  
  
  
    $actualizarUsuario = "UPDATE usuarios SET 
    cliente='$nombreCliente',
    pass='$pass',
    direccion='$dirCliente',
    emailCliente='$emailCliente',
    usuario='$usuario',
    inicioContrato='$contratoInicio',
    finContrato='$contratoFin',
    numero_contrato='$contrato',
    descripcion='$descripContrato'

    WHERE id=$idUsuario";
  
    
    //Consulta Actualizar Usuario
    if($conexion->query($actualizarUsuario)!==False){
        echo "El Usuario fue actualizado con exito";
    }else{
        echo "El Usuario no fue actualizado por favor consulte con el administrador";
    }  
  
    

    for($i=0; $i<sizeof($nombreContacto); ++$i){

        $contactName = $nombreContacto[$i];
        $contactEmail= $nombreCorreo[$i];
        $contactTelef= $nombreTelefono[$i];
        $contactCargo= $nombreCargo[$i];
  
        
  
        $registrarContacto = "INSERT INTO contactos VALUES (
          '',
          '$idUsuario',
          '$contactName',
          '$contactEmail',
          '$contactTelef',
          '$contactCargo'
          )";
    
        $regitrarContacto = $conexion->query($registrarContacto);
      }
    
  }
?>
