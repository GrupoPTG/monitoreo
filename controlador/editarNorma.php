<?php

?>
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
          <div class="modal-content">
            <div class="modal-body">
            LOS DATOS DE LA NORMA FUERON ACTUALIZADOS
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
              <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
          </div>
        </div>
      </div>
    <?php

/*
$sdo= $_POST['sdo'];
    $documento= $_POST['documento'];
    $titulo=$_POST['titulo'];
    $formato=$_POST['formato'];
    $idioma=$_POST['idioma'];
    $revisionActual=$_POST['revisionActual'];
    $ultimaRevision=$_POST['ultimaRevision'];
    $estatus=$_POST['estatus'];
    $observaciones=$_POST['observaciones'];
  
  
    $actualizarNorma = "UPDATE normas SET 
    sdo='$sdo',
    titulo='$titulo',
    idioma='$idioma',
    formato='$formato',
    revisionActual='$revisionActual',
    ultimaRevision='$ultimaRevision',
    estatus='$estatus',
    observaciones='$observaciones'
    WHERE documento='$documento'";
  
    
            //Consulta Actualizar Usuario
            if($conexion->query($actualizarNorma)!==False){
                echo "La norma fue actualizada con exito";
            }else{
                echo "La norma no fue actualizado por favor consulte con el administrador";
            }  


//Carga en Registro por actualizacion de norma


            $registroActNorma = "INSERT INTO normas_actualizadas VALUES (
                '',
                '$documento',
                '$titulo',
                '$revisionActual',
                '$ultimaRevision',
                '$estatus',
                '$observaciones'
                )";       
  

  //Consulta Actualizar Usuario
  if($conexion->query($registroActNorma)!==False){
    echo "El reporte normas fue actualizado actualizada con exito";
}else{
    echo "El reporte de normas no fue actualizado por favor consulte con el administrador";
} 
*/
?>