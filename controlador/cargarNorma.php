<?php

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
?>