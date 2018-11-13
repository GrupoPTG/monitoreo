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
        ?>
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
          <div class="modal-content">
            <div class="modal-body">
            El usuario fue actualizado con exito
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
              <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
          </div>
        </div>
      </div>
    <?php

    }else{
        ?>
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
              <div class="modal-content">
                <div class="modal-body">
                El Usuario no fue actualizado por favor consulte con el administrador
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
              </div>
            </div>
          </div>
        <?php
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
