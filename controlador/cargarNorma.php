<?php

if(isset($_POST['cargarNorma'])){


    
    $sdo= $_POST['sdo'];
    $documento=$_POST['documento'];
    $titulo=$_POST['titulo'];
    $idioma=$_POST['idioma'];
    $formato=$_POST['formato'];
    $revisionFecha=$_POST['revision'];
    $revisionSelect=$_POST['revisionSelect'];
    $sustituida=$_POST['sustituida'];
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
        echo "La Norma fue cargada con exito";
    }else{
        echo "La Norma no fue cargada por favor consulte con el administrador";
    }


  }// si existe cargar norma?

?>
?>