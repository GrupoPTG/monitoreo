

<?php





if(isset($_POST['editarNormas'])){

    
    $cliente= $_POST['cliente'];
    $sdo= $_POST['sdo'];
    $documento= $_POST['documento'];
    $titulo=$_POST['titulo'];
    $revision= $_POST['revision'];
    $revisionSelect=$_POST['revisionSelect'];

    if( $revision == "" && $revisionSelect == ""){
        $revisionCliente = $_POST['revisionNormaCli'];
    } else if( $revision != ""){
        $revisionCliente = $revision;
    }else if( $revisionSelect != ""){
        $revisionCliente = $revisionSelect;
    }
    
    $estatusCli=$_POST['estatusSelect'];
    if($estatusCli=="Modificar Estatus"){
        $estatus = $_POST['estatusNormaCli'];
    }else{
         $estatus = $estatusCli;
    }
    
    $r = $_POST['rada'];
    $e= $_POST['e'];
    $strz= $_POST['strz'];
    $crgo=$_POST['crgo'];
    $add=$_POST['add'];
    $tc=$_POST['tc'];
    $amd=$_POST['amd'];
    $erta=$_POST['erta'];
    $observaciones=$_POST['observaciones'];
    
  
/////////////////////////DATOS LISTA GENERAL


    $revisionNorma= $_POST['revision2'];
    $revisionSelectEstatus=$_POST['revisionSelect2'];

    if( $revisionNorma == "" && $revisionSelectEstatus == ""){
        $revisionActual = $_POST['revisionActualNorma'];
    } else if( $revisionNorma != ""){
        $revisionActual = $revisionNorma;
    }else if( $revisionSelectEstatus != ""){
        $revisionActual = $revisionSelectEstatus;
    }


    $estatusNorma=$_POST['estatusSelect2'];
    if($estatusNorma=="Modificar Estatus"){
        $estatusNormaGral = $_POST['estatusNormaGralPost'];
    }else{
        $estatusNormaGral = $estatusNorma;
    }

    $sustituida = $_POST['sustituida'];
    $ar = $_POST['ar'];
    $ae= $_POST['ae'];
    $astrz= $_POST['astrz'];
    $acrgo=$_POST['acrgo'];
    $aadd=$_POST['aadd'];
    $atc=$_POST['atc'];
    $aamd=$_POST['aamd'];
    $aerta=$_POST['aerta'];
    $aobservaciones=$_POST['aobservaciones'];


/////////////////////CONSULTAS




  
    $actualizarNorma = "UPDATE normacliente SET 
    revisionCliente='$revisionCliente',
    estatusCliente='$estatus',
    r='$r',
    e='$e',
    strz='$strz',
    crgo='$crgo',
    adds='$add',
    tc='$tc',
    amd='$amd',
    erta='$erta',
    observaciones='$observaciones'
    WHERE norma='$documento' AND cliente='$cliente'";
    
  
    
            //Consulta Actualizar Usuario
            if($conexion->query($actualizarNorma)!==False){
                ?>
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
          <div class="modal-content">
            <div class="modal-body">
            La norma fue actualizada con exito
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
            La norma no fue actualizado por favor consulte con el administrador
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


//Actualizacion de Norma General


    $actualizarNormaGral = "UPDATE normas SET 
    revisionActual='$revisionActual',
    sustituida='$sustituida',
    estatus='$estatusNormaGral',
    r='$ar',
    e='$ae',
    strz='$astrz',
    crgo='$acrgo',
    adds='$aadd',
    tc='$atc',
    amd='$aamd',
    erta='$aerta',
    observaciones='$aobservaciones'
    WHERE documento='$documento'";
    
  
    
            //Consulta Actualizar Usuario
            if($conexion->query($actualizarNormaGral)!==False){
                e{
                    ?>
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
              <div class="modal-content">
                <div class="modal-body">
                La norma fue actualizada con exito
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
                e{
                    ?>
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
              <div class="modal-content">
                <div class="modal-body">
                La norma no fue actualizado por favor consulte con el administrador
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

}





/* 
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