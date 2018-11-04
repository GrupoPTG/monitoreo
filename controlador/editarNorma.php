<?php


echo "LOS DATOS DE LA NORMA FUERON ACTUALIZADOS";

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