<?php

if(isset($_POST['cargarNorma'])){


    
    $sdo= $_POST['sdo'];
    $documento=$_POST['documento'];
    $titulo=$_POST['titulo'];
    $idioma="";
    $formato="";
    $revisionFecha=$_POST['revision'];
    //$revisionSelect=$_POST['revisionSelect'];
    //$sustituida=$_POST['sustituida'];
    $estatus=$_POST['estatus'];
    $observaciones=$_POST['observaciones'];
    $r = $_POST['r'];
    $e=$_POST['e'];
    $strz=$_POST['strz'];
    $crgo=$_POST['crgo'];
    $add=$_POST['add'];
    $tc=$_POST['tc'];
    $amd=$_POST['amd'];
    $erta=$_POST['erta'];


if($revisionFecha==""){
    $revision = $revisionSelect;
}else{
    $revision = $revisionFecha;
    $sustituida = "";
}


    $cargarNorma = "INSERT INTO normas VALUES (
      '',
      '$sdo',
      '$documento',
      '$titulo',
      '$idioma',
      '$formato',
      '$revision',
      '$sustituida',
      '$estatus',
      '$observaciones',
      '$r',
      '$e',
      '$strz',
      '$crgo',
      '$add',
      '$tc',
      '$amd',
      '$erta'
      )";

require ("../modelo/connect.php");
    
    //Consulta Registrar Usuario
    if($conexion->query($cargarNorma)!==False){
      ?>
      <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
            <div class="modal-content">
              <div class="modal-body">
              La Norma fue cargada con exito
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
              La Norma no fue cargada por favor consulte con el administrador
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


  }// si existe cargar norma?

?>
